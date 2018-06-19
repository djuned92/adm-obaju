@extends('layouts.frontend')

@section('title','Produk')

@section('content')
<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Product</li>
        </ul>
    </div>

    <div class="col-md-3">
        <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">Product</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked category-menu">
                    <li>
                        <a href="<?=base_url('fr_product')?>" style="<?=($this->uri->segment(2) == 'fr_product') ? 'background-color:#eeeeee' : ''?>">
                            All Product <span class="badge pull-right">{{$total_produk}}</span>
                        </a>
                        <ul>
                            @foreach($kategori as $key => $value)
                            <li style="<?=($this->uri->segment(3) == $value['id']) ? 'background-color:#eeeeee' : ''?>"><a href="<?=base_url('fr_product/kategori/'.$value['id'].'')?>">{{ $value['kategori'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <!-- *** MENUS AND FILTERS END *** -->
    </div>

    <div class="col-md-9">

        <div class="row" id="productMain">
            <div class="col-sm-6">
                <div id="mainImage">
                    @php $first = TRUE @endphp
                    @foreach(json_decode($produk['image']) as $key => $value)
                        @if($first)
                        <img src="<?=base_url('assets/images/product/'.$value.'')?>" alt="" class="img-responsive" style="height: 390px;">
                        @php $first = FALSE @endphp
                        @endif
                    @endforeach
                </div>
                <!--
                <div class="ribbon sale">
                    <div class="theribbon">SALE</div>
                    <div class="ribbon-background"></div>
                </div>
                 /.ribbon 

                <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                </div>
                 /.ribbon -->

            </div>
            <div class="col-sm-6">
                <div class="box">
                    <h1 class="text-center">{{ $produk['produk'] }}</h1>
                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                    </p>
                    <p class="price">Rp. <?= number_format($produk['harga']) ?>,-</p>

                    <p class="text-center buttons">
                        <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a> 
                        <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                    </p>


                </div>

                <div class="row" id="thumbs">
                    @foreach(json_decode($produk['image']) as $key => $value)
                    <div class="col-xs-4">
                        <a href="<?=base_url('assets/images/product/'.$value.'')?>" class="thumb">
                            <img src="<?=base_url('assets/images/product/'.$value.'')?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>


        <div class="box" id="details">
            <p>
                <h4>Product details</h4>
                <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                <h4>Material & care</h4>
                <ul>
                    <li>Polyester</li>
                    <li>Machine wash</li>
                </ul>
                <h4>Size & Fit</h4>
                <ul>
                    <li>Regular fit</li>
                    <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                </ul>

                <blockquote>
                    <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                    </p>
                </blockquote>

                <hr>
                <div class="social">
                    <h4>Show it to your friends</h4>
                    <p>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
        </div>
    </div>
    <!-- /.col-md-9 -->
</div>
<!-- /.container -->
@endsection