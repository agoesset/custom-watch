@extends('web.base')
@section('title', 'Kontak Kami - Customwatch.id')
@section('content')
<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="active">Kontak Kami </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-area pt-115 pb-120">
        <div class="container">
            <div class="contact-info-wrap-3 pb-85">
                <h3>Kontak Info</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-info-3 text-center mb-30">
                            <i class="icon-location-pin "></i>
                            <h4>Alamat Toko</h4>
                            <p>Sindangmulya, Cibarusah, Bekasi Regency, West Java 17340 </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-info-3 extra-contact-info text-center mb-30">
                            <ul>
                                <li><i class="icon-screen-smartphone"></i> +62 851-0157-8882 </li>
                                <li><i class="icon-envelope "></i> <a href="#"> admin@customwatch.id</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-contact-info-3 text-center mb-30">
                            <i class="icon-clock "></i>
                            <h4>Jam Buka</h4>
                            <p>Senin - Jum'at. 9:00 - 17:00 WIB </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="get-in-touch-wrap">
                <h3>Hubungi Kami</h3>
                <div class="contact-from contact-shadow">
                    <form id="contact-form" action="assets/mail-php/mail.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <input name="name" type="text" placeholder="Name">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input name="email" type="email" placeholder="Email">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <input name="subject" type="text" placeholder="Subject">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button class="submit" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
            <div class="contact-map pt-120">
                <iframe class="map-size"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.693667617067!2d144.946279515845!3d-37.82064364221098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4cee0cec83%3A0xd019c5f69915a4a0!2sCollins%20St%2C%20West%20Melbourne%20VIC%203003%2C%20Australia!5e0!3m2!1sen!2sbd!4v1607512676761!5m2!1sen!2sbd">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
