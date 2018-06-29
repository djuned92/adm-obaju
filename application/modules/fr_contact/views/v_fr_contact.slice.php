@extends('layouts.frontend')

@section('title','Hubungi Kami')

@section('content')
<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Hubungi Kami</li>
        </ul>
    </div>

    <div class="col-md-12" id="basket">

        <div class="box">

            <h1>Hubungi Kami</h1>

            <p class="text-muted">Jika ada pertanyaan, klik <a href="contact.html">hubungi kami</a>. pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>

            <hr>

            <div class="row">
                <div class="col-sm-3">
                    <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                    <p>Gedung PPIKM (Pusat Promosi Industri Kayu dan Mabel) Jl. Jatinegara Kaum No. 2 Pulugadung Jakarta Timur
                    </p>
                </div>

                <div class="col-sm-3">
                    <h3><i class="fa fa-phone"></i> Call center</h3>
                    <p>Phone : <strong>(021) 72798876</strong></p>
                    <p>Fax : <strong>72798876</strong></p>
                </div>

                <div class="col-sm-3">
                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                    <p>Email : <strong>info@zazkiatamam.com</strong></p>
                    <p>Website : <strong><a href="#"> www.example.com</a></strong></p>     
                </div>

                <div class="col-sm-3">
                    <h3><i class="fa fa-clock-o"></i> Jam Kerja</h3>
                    <ul>
                        <li>Senin 08.30 – 17.00</li>
                        <li>Selasa 08.30 – 17.00</li>
                        <li>Rabu 08.30 – 17.00</li>
                        <li>Kamis 08.30 – 17.00</li>
                        <li>Jumat 08.30 – 17.00</li>
                        <li>Sabtu 08.30 – 17.00</li>
                    </ul>
                </div>  
            </div>

        </div>
        <!-- /.box -->


    </div>
    <!-- /.col-md-9 -->

</div>
<!-- /.container -->
@endsection