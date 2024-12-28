@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <header class="text-center mb-5">
            <h1 class="fw-bold animated fadeInLeft text-uppercase font-size-48">WELCOME TO GROW4TOMORROW</h1>
        </header>

        <main>
            <section class="row align-items-center mb-5 border-box">
                <div class="col-md-6">
                    <img src="{{ asset('images/about4.jpg') }}" alt="About Grow4Tomorrow" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <div class="content-box">
                        <h2>About Grow4Tomorrow</h2>
                        <p>Grow4Tomorrow adalah platform yang kami didedikasikan untuk mengubah lingkungan perkotaan menjadi ruang hijau yang produktif. </p>
                        <p>Kami menyediakan modul edukasi mengenai hidroponik perkotaan, teknologi pertanian perkotaan, serta informasi tentang petani perkotaan dan forum komunitas yang ingin berkontribusi pada keberlanjutan urban melalui pertanian perkotaan.</p>
                    </div>
                </div>
            </section>

            <section class="row align-items-center mb-5 border-box">
                <div class="col-md-6 ">
                    <img src="{{ asset('images/visi.jpg') }}" alt="Our Vision" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="content-box">
                        <h2>Our Vision</h2>
                        <p>Mewujudkan dunia di mana kota-kota diisi dengan ruang hijau yang mendukung keberlanjutan lingkungan, keanekaragaman hayati, dan kesejahteraan komunitas.</p>
                    </div>
                </div>
            </section>
            
            <section class="row align-items-center mb-5 border-box">
                <div class="col-md-6">
                    <img src="{{ asset('images/misi.jpg') }}" alt="Our Mission" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <div class="content-box">
                        <h2>Our Mission</h2>
                        <p>Memberdayakan individu dan komunitas untuk menghasilkan makanan mereka sendiri, mengurangi jejak karbon, dan meningkatkan kualitas hidup melalui urban farming.</p>
                    </div>
                </div>
            </section>


        </main>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow">
                <img src="{{ asset('images/akhir kiri.jpg') }}" class="card-img-top" alt="Contract Farming">
                <div class="card-body">
                    <h5 class="card-title fw-bold">CONTRACT FARMING</h5>
                    <p class="card-text">
                        Grow4Tomorrow siap untuk mengontrak pertanian untuk klien. Sistem kami dioptimalkan untuk tumbuh dan berkembang di lingkungan perkotaan.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow">
                <img src="{{ asset('images/akhir tengah.jpg') }}" class="card-img-top" alt="Corporate Farms">
                <div class="card-body">
                    <h5 class="card-title fw-bold">CORPORATE FARMS</h5>
                    <p class="card-text">
                        Grow4Tomorrow membangun dan mengoperasikan pertanian dalam ruangan untuk perusahaan yang menerapkan keberlanjutan pada semua proses dan aktivitas bisnis mereka.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow">
                <img src="{{ asset('images/akhir kanan.jpg') }}" class="card-img-top" alt="Investment">
                <div class="card-body">
                    <h5 class="card-title fw-bold">INVESTMENT</h5>
                    <p class="card-text">
                        Grow4Tomorrow percaya bahwa mereka memiliki peluang untuk membentuk pertanian modern dan membangun pasar pertanian baru yang terus berkembang.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Kotak di sekitar bagian */
        .border-box {
            border: 3px solid #2d6a4f;
            border-radius: 10px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.85); /* Background transparan */
            margin-bottom: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
        transition: transform 0.5s ease-in-out;
        }

        .card-img-top:hover {
        transform: scale(1.2);
        }

        /* Styling bagian konten */
        .content-box h2 {
            color: #2d6a4f;
            font-weight: bold;
        }

        .content-box p, 
        .content-box ul li {
            font-size: 1.1rem;
            color: #4f4f4f;
            margin-bottom: 10px;
        }

        /* Styling gambar */
        img {
            border: 5px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    
@endsection