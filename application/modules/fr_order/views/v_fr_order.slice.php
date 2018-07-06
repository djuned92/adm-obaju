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
                    <li class="<?=($this->uri->segment(1) == 'fr_profile') ? 'active':''?>">
                        <a href="<?=base_url('fr_profile')?>"><i class="fa fa-user fa-fw"></i>Edit Profile</a>
                    </li>
                    <li class="<?=($this->uri->segment(1) == 'fr_change_password') ? 'active':''?>">
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

    <div class="col-md-9" id="customer-orders">
        <div class="box">
            <h1>Pesanan Saya</h1>

            <p class="text-muted">Jika ada pertanyaan, klik <a href="contact.html">hubungi kami</a>. pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>

            <hr>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($order as $key => $value):?>
                        <tr>
                            <th># <?=$i++?></th>
                            <td><?= date_format(date_create($value['created_at']), 'd/m/Y')?></td>
                            <td>Rp. <?=number_format($value['total'])?>,-</td>
                            <?php 
                                $label =   ($value['status'] == 0) ? 'info': (($value['status'] == 1) ? 'danger': 
                                            (($value['status'] == 2) ? 'warning': 'success'
                                        ));
                                $status = ($value['status'] == 0) ? 'Proses': (($value['status'] == 1) ? 'Tidak Valid': 
                                            (($value['status'] == 2) ? 'Pengiriman' : 'Diterima'
                                        ));
                            ?>
                            <td><span class="label label-<?=$label?>"><?=$status?></span>
                            </td>
                            <td>
                                <a href="<?=base_url('fr_order/detail/'.$value['id'].'')?>" class="btn btn-primary btn-sm">View</a>
                                <a href="<?=base_url('fr_order/cetak/'.$value['id'].'')?>" class="btn btn-info btn-sm">Print</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->    
@endsection