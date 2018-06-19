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
                            <li style="<?=($this->uri->segment(3) == $value['id']) ? 'background-color:#eeeeee' : ''?>"><a href="<?=base_url('fr_product/kategori/'.$value['id'].'')?>">{{ $value['kategori'] }} <span class="badge pull-right">{{ $value['total_produk_kategori'] }}</a>
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
            {{ html_entity_decode($produk['detail_produk']) }}
        </div>
    </div>
    <!-- /.col-md-9 -->
</div>
<!-- /.container -->
@endsection