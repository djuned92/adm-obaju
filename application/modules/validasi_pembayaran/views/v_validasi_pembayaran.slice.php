@extends('layouts.backend')

@section('title','Validasi Pembayaran')

@section('css')
    <!-- datatables -->
    <link href="<?=base_url('assets/plugins/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
@endsection

@section('content')
    <?php 
        $privileges = explode(',', $priv['privileges']);
    ?>
    <div class="page-title">
        <div class="title_left">
            <h3>Validasi Pembayaran</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Validasi Pembayaran</h2>
                    <?php if($privileges[0] == 1): ?>
                        <div class="navbar-right">
                            <a href="<?=base_url('validasi_pembayaran/add')?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </a>
                        </div>
                    <?php endif ?>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="25%">Pelanggan</th>
                                <th width="25%">Detail Pesanan</th>
                                <th width="25%">Detail Pembayaran</th>
                                <th width="10%">Status</th>
                                <th width="10%">Action</th>
                                <?php if($privileges[1] == 1 || $privileges[2] == 1): ?>
                                <th width="5%">Action</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ; foreach($transaksi as $key => $value):?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    Nama : <?=$value['fullname']?> <br/>
                                    Alamat : <?=$value['address']?> <br/>
                                    No Telp : <?=$value['phone']?> <br/>
                                    Email : <?=$value['email']?>
                                </td>
                                <td>
                                    <?php $detail_produk = json_decode($value['detail_produk'],TRUE); ?>
                                    <ul>
                                        <?php foreach($detail_produk['produk'] as $k => $v): ?>
                                            <li>
                                                Produk : <?=$v['produk']?> <br/>
                                                Harga : Rp. <?=number_format($v['harga'])?>,- <br/>
                                                Qty : <?=$v['qty']?> <br/>
                                                Total : Rp. <?=number_format($v['jumlah'])?>,-
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <b>Total Keseluruhan : Rp. <?=number_format($value['total'])?>,-</b>
                                </td>
                                <td>
                                    <?php $detail_pembayaran = json_decode($value['detail_pembayaran'], TRUE); ?>
                                    <ul>
                                        <li>
                                            Atas Nama : <?=$detail_pembayaran['nama']?> <br/>
                                            Tanggal Transfer : <?= date_format(date_create($detail_pembayaran['tgl_transfer']),'d/m/Y')?> <br/> 
                                        </li>
                                    </ul>
                                    <img class="img img-rounded" src="<?=base_url('assets/images/transfer/'.$detail_pembayaran['bukti_transfer'].'')?>"
                                        style="width: 80px; height: 80px";
                                    >
                                </td>
                                <td>
                                    <?php 
                                        $label =   ($value['status'] == 0) ? 'info': (($value['status'] == 1) ? 'danger': 
                                                    (($value['status'] == 2) ? 'warning': 'success'
                                                ));
                                        $status = ($value['status'] == 0) ? 'Proses': (($value['status'] == 1) ? 'Tidak Valid': 
                                                    (($value['status'] == 2) ? 'Pengiriman' : 'Diterima'
                                                ));
                                    ?>
                                    <span class="label label-<?=$label?>"><?=$status?></span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary validasi" data-id="<?=$value['id']?>"><span class="fa fa-check-square"> Validasi</span></button>
                                </td>
                                <?php if($privileges[1] == 1 || $privileges[2] == 1): ?>
                                    <td>
                                        <ul style="list-style: none;padding-left: 0px;padding-right: 0px; text-align: center;">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-bars" style="font-size: large;"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" style="right: 0; left: auto;">
                                                    <?php if($privileges[1] == 1): ?>
                                                        <li>
                                                            <a href="<?=base_url('validasi_pembayaran/update/'.encode($value['id']))?>">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                        </li>
                                                    <?php endif ?>
                                                    <?php if($privileges[1] == 1 && $privileges[2] == 1): ?>
                                                        <li class="divider"></li>
                                                    <?php endif ?>
                                                    <?php if($privileges[2] == 1): ?>
                                                        <li>
                                                            <a href="#" class="btn-delete" data-id="<?=encode($value['id'])?>">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                        </li>
                                                    <?php endif ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                <?php endif ?>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- datatables -->
    <script src="<?=base_url('assets/plugins/datatables/js/jquery.dataTables.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables/js/dataTables.bootstrap.js')?>"></script>
    <!-- delete js -->
    <script src="<?=base_url('assets/js/delete.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "order": [[ 0, "asc" ]]
            });
            
            $('.validasi').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.confirm({
                    title: 'Validasi Pembayaran',
                    content: 'Apakah anda yakin?',
                    buttons: {
                        tidak_valid: function() {
                            var status = 1;
                            console.log(id);
                            $.ajax({
                                type: 'post',
                                url: "<?=base_url('validasi_pembayaran/update')?>",
                                dataType: "json",
                                data: {id:id, status:status},
                                beforeSend: function(e) {},
                                success: function(e) {
                                    console.log(e);
                                    if(e.error == true) {
                                        $.alert({
                                            title: 'Woops',
                                            content: '<strong>Woopsss</strong>',
                                            icon: 'fa fa-info',
                                            animation: 'scale',
                                            closeAnimation: 'scale',
                                            buttons: {
                                                okay: {
                                                    text: 'Okay'
                                                }
                                            }
                                        });
                                    } else {
                                        $.alert({
                                            title: 'Validasi Pembayaran',
                                            content: '<strong>Validasi pembayaran berhasil</strong>',
                                            icon: 'fa fa-check',
                                            animation: 'scale',
                                            closeAnimation: 'scale',
                                            buttons: {
                                                okay: {
                                                    text: 'Okay'
                                                }
                                            }
                                        });
                                    }
                                    setTimeout(function() {
                                        window.location.href = "<?=base_url('validasi_pembayaran')?>"; 
                                    }, 2000);
                                }
                            });
                        },
                        valid: function() {
                            var status = 2;
                            console.log(id);
                            $.ajax({
                                type: 'post',
                                url: "<?=base_url('validasi_pembayaran/update')?>",
                                dataType: "json",
                                data: {id:id, status:status},
                                beforeSend: function(e) {},
                                success: function(e) {
                                    console.log(e);
                                    if(e.error == true) {
                                        $.alert({
                                            title: 'Woops',
                                            content: '<strong>Woopsss</strong>',
                                            icon: 'fa fa-info',
                                            animation: 'scale',
                                            closeAnimation: 'scale',
                                            buttons: {
                                                okay: {
                                                    text: 'Okay'
                                                }
                                            }
                                        });
                                    } else {
                                        $.alert({
                                            title: 'Validasi Pembayaran',
                                            content: '<strong>Validasi pembayaran berhasil</strong>',
                                            icon: 'fa fa-check',
                                            animation: 'scale',
                                            closeAnimation: 'scale',
                                            buttons: {
                                                okay: {
                                                    text: 'Okay'
                                                }
                                            }
                                        });
                                    }
                                    setTimeout(function() {
                                        window.location.href = "<?=base_url('validasi_pembayaran')?>"; 
                                    }, 2000);
                                }
                            });
                        },
                    },
                    onContentReady: function () {
                        // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function (e) {
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click'); // reference the button and click it
                        });
                    }
                });
            });
        });
    </script>
@endsection