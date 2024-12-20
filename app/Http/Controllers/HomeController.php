<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WatchCase;
use App\Models\WatchType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $allCategory = Category::all();

        if ($request->has('category_id') && $request->category_id != '') {
            $allProduct = Product::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })->take(8)->get();
        } else {
            $allProduct = Product::take(8)->get();
        }

        // Get latest products from "Jam Terbaik" category
        $bestWatches = Product::whereHas('categories', function ($query) {
            $query->where('name', 'Jam Terbaik');
        })
            ->latest()
            ->take(2)
            ->get();

        return view('web.home', compact('allProduct', 'allCategory', 'bestWatches'));
    }

    public function filterProducts(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId != '') {
            $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->take(8)->get();
        } else {
            $products = Product::take(8)->get();
        }

        if ($products->isEmpty()) {
            return response()->json('<p>Produk Tidak tersedia</p>');
        }

        $html = view('web.partials.product-list', compact('products'))->render();
        return response()->json($html);
    }


    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);

        $response = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'formatted_price' => number_format($product->price, 0, ',', '.'),
            'images' => $product->image,
            'categories' => $product->categories->pluck('name')->toArray(),
        ];

        // Hanya tambahkan color ke response jika ada
        if ($product->color && count($product->color) > 0) {
            $response['color'] = $product->color;
        }

        return response()->json($response);
    }

    public function showProductDetail($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::with('categories')->findOrFail($id);

        // Ambil produk terkait berdasarkan kategori
        $relatedProducts = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('category_id', $product->categories->pluck('id'));
        })
            ->where('id', '!=', $product->id) // Tidak termasuk produk yang sedang dilihat
            ->take(4) // Batasi jumlah produk terkait (misalnya 4)
            ->get();

        // Kirim data ke view
        return view('web.detail', compact('product', 'relatedProducts'));
    }

    public function configurator()
    {
        // Ambil semua cases tanpa filter tipe
        // $allCases = WatchCase::all();
        $allCases = WatchCase::with('watchTypes')->get();


        // Ambil tipe jam pertama untuk menampilkan parts terkait
        $watchType = WatchType::with(['watchDials', 'watchRings', 'watchStraps'])
            ->firstOrFail(); // Sesuaikan ini dengan logika default Anda

        // dd($allCases);

        return view('web.configurator', [
            'allCases' => $allCases,
            'watchType' => $watchType,
            'dials' => $watchType->watchDials,
            'rings' => $watchType->watchRings,
            'straps' => $watchType->watchStraps,
        ]);
    }

    public function saveMergedImage(Request $request)
    {
        try {
            $image = $request->input('image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'custom-watch-' . time() . '.png';

            Storage::disk('public')->put('merged/' . $imageName, base64_decode($image));

            $imageUrl = url('storage/merged/' . $imageName);

            return response()->json([
                'success' => true,
                'imageUrl' => $imageUrl
            ])->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function loadParts($watchTypeId)
    {
        try {
            $watchType = WatchType::with([
                'watchDials',
                'watchRings',
                'watchStraps'
            ])->findOrFail($watchTypeId);

            return response()->json([
                'dials' => $watchType->watchDials,
                'rings' => $watchType->watchRings,
                'straps' => $watchType->watchStraps,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to load parts: ' . $e->getMessage()
            ], 500);
        }
    }

    public function shop()
    {
        $allProduct = Product::all();
        // dd($allProduct);
        return view('web.shop', compact('allProduct'));
    }

    public function history()
    {

        return view('web.history');
    }

    public function contact()
    {
        return view('web.contact');
    }
}
