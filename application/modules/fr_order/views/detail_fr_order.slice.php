@extends('layouts.frontend')

@section('title','Before Login')

@section('content')
<div class="container">    
    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Pesanan Saya</li>
        </ul>

    </div>

    <div class="col-md-3">
        <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{ $this->session->fullname }}</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked">
                   <li class="<?=($this->uri->segment(1) == 'fr_order') ? 'active':''?>">
                        <a href="<?=base_url('fr_order')?>"><i class="fa fa-list fa-fw"></i>Pesanan Saya</a>
                    </li>
                    <li>
                        <a href="<?=base_url('fr_profile')?>"><i class="fa fa-user fa-fw"></i>Edit Profile</a>
                    </li>
                    <li>
                         <a href="<?=base_url('fr_change_password')?>"><i class="fa fa-lock fa-fw"></i>Ganti Password</a>
                    </li>
                    <li>
                        <a href="<?=base_url('auth/do_logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.col-md-3 -->

        <!-- *** CUSTOMER MENU END *** -->
    </div>

    <div class="col-md-9" id="customer-order">
        <div class="box">
            <h1>Order #1735</h1>

            <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being prepared</strong>.</p>
            <p class="text-muted">Jika ada pertanyaan, klik <a href="contact.html">hubungi kami</a>. pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>
            
            <hr>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Discount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $detail_produk = json_decode($order['detail_produk'], TRUE) ?>
                        @foreach($detail_produk['produk'] as $key => $value)
                        <tr>
                            <td>
                                @php
                                    $image = $this->global->getCond('tm_produk','*',['id'=> $value['produk_id']])->row_array();
                                    $first = TRUE; 
                                @endphp
                                @foreach(json_decode($image['image']) as $k => $v)
                                    @if($first)
                                    <a href="#">
                                        <img src="<?=base_url('assets/images/product/'.$v.'')?>" alt="{{ $value['produk'] }}" style="width: 50px; height: 50px;">
                                    </a>
                                    @php $first = FALSE @endphp
                                    @endif
                                @endforeach
                            </td>
                            <td><a href="<?=base_url('fr_product/detail'.$value['produk_id'].'')?>"><?=$value['produk']?></a>
                            </td>
                            <td><?=$value['qty']?></td>
                            <td>Rp. <?=number_format($value['harga'])?>,-</td>
                            <td>Rp. <?=number_format($value['disc'])?>,-</td>
                            <td>Rp. <?=number_format($value['jumlah'])?>,-</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th>Rp. <?=number_format($order['total'])?>,-</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.table-responsive -->
            <!-- 
            <div class="row addresses">
                <div class="col-md-6">
                    <h2>Invoice address</h2>
                    <p>John Brown
                        <br>13/25 New Avenue
                        <br>New Heaven
                        <br>45Y 73J
                        <br>England
                        <br>Great Britain</p>
                </div>
                <div class="col-md-offset-6 col-md-6">
                    <h2>Shipping address</h2>
                    <p>John Brown
                        <br>13/25 New Avenue
                        <br>New Heaven
                        <br>45Y 73J
                        <br>England
                        <br>Great Britain</p>
                </div>
            </div>
             -->
        </div>
    </div>
</div>
<!-- /.container -->    
@endsection