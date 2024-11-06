<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\WatchType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori
        $allCategory = Category::all();

        // Ambil semua produk atau filter berdasarkan kategori jika ada
        if ($request->has('category_id') && $request->category_id != '') {
            // Filter produk berdasarkan kategori yang dipilih
            $allProduct = Product::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })->get();
        } else {
            // Jika tidak ada kategori yang dipilih, tampilkan semua produk
            $allProduct = Product::all();
        }

        return view('web.home', compact('allProduct', 'allCategory'));
    }

    public function filterProducts(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId != '') {
            // Filter produk berdasarkan kategori
            $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get();
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua produk
            $products = Product::all();
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

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'formatted_price' => number_format($product->price, 0, ',', '.'),
            'images' => $product->image,
            'categories' => $product->categories->pluck('name')->toArray(),
            'color' => $product->color // Mengasumsikan color adalah array JSON
        ]);
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
        // Ambil tipe jam pertama yang tersedia dengan parts terkait
        $watchType = WatchType::with(['watchCases', 'watchDials', 'watchRings', 'watchStraps'])
            ->firstOrFail(); // Ambil tipe pertama atau sesuaikan dengan kebutuhan

        return view('web.configurator', [
            'watchType' => $watchType,
            'cases' => $watchType->watchCases,
            'dials' => $watchType->watchDials,
            'rings' => $watchType->watchRings,
            'straps' => $watchType->watchStraps,
        ]);
    }

    public function loadParts(Request $request, $typeId)
    {
        // Mendapatkan data berdasarkan tipe yang dipilih
        $watchType = WatchType::with(['watchCases', 'watchDials', 'watchRings', 'watchStraps'])
            ->findOrFail($typeId);

        return response()->json($watchType);
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
