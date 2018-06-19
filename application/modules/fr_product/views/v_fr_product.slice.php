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
                        <a href="<?=base_url('fr_product')?>">All Product <span class="badge pull-right">{{$total_produk}}</span></a>
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

        <div class="box info-bar">
            <div class="row">
                <div class="col-sm-12 col-md-4 products-showing">
                    Showing <strong>12</strong> of <strong>25</strong> products
                </div>

                <div class="col-sm-12 col-md-8  products-number-sort">
                    <div class="row">
                        <form class="form-inline">
                            <div class="col-md-6 col-sm-6">
                                <div class="products-number">
                                    <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="products-sort-by">
                                    <strong>Sort by</strong>
                                    <select name="sort-by" class="form-control">
                                        <option>Price</option>
                                        <option>Name</option>
                                        <option>Sales first</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row products">

            @foreach($produk as $key => $value)
                <div class="col-md-4 col-sm-6">
                    <div class="product">
                        <div class="flip-container">
                            <div class="flipper">
                                @php $first = TRUE @endphp

                                @foreach(json_decode($value['image']) as $k => $v)
                                    @if($first)
                                        <div class="front">
                                            <a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>">
                                                <img src="<?=base_url('assets/images/product/'.$v.'')?>" alt="<?=$value['produk']?>" class="img-responsive" style="width: 252.984px; height: 337.313px;">
                                            </a>
                                        </div>
                                        @php $first = FALSE @endphp
                                    @else
                                        <div class="back">
                                            <a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>">
                                                <img src="<?=base_url('assets/images/product/'.$v.'')?>" alt="<?=$value['produk']?>" class="img-responsive" style="width: 252.984px; height: 337.313px;">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>" class="invisible">
                            <img src="<?=base_url('assets/obaju/')?>img/product1.jpg" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                            <h3><a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>">{{ $value['produk'] }}</a></h3>
                            <p class="price">Rp. <?= number_format($value['harga']) ?>,-</p>
                            <p class="buttons">
                                <a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>" class="btn btn-default">View detail</a>
                                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </p>

                        </div>
                        <!-- /.text -->
                        <!--
                        <div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>
                         /.ribbon -->
                    </div>
                    <!-- /.product -->
                </div>
            @endforeach
        </div>
        <!-- /.products -->
    </div>
    <!-- /.col-md-9 -->

</div>
<!-- /.container -->
@endsection