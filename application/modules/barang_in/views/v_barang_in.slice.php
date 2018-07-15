@extends('layouts.backend')

@section('title','Barang In')

@section('css')
    <!-- datatables -->
    <link href="<?=base_url('assets/plugins/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Barang In</h3>
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
                    <h2>Barang In</h2>
                    <div class="navbar-right">
                        <a href="<?=base_url('barang_in/add')?>">
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Gambar</th>
                                <th width="15%">Produk</th>
                                <th width="35%">Detail Produk</th>
                                <th width="6%">QTY</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Bangku</td>
                                <td>
                                    <ul>
                                        <li>Ukuran 2 x 3 Meter</li>
                                        <li>Warna Merah</li>
                                        <li>Cocok digunakan diruang keluarga</li>
                                    </ul>
                                </td>
                                <td>2</td>
                                <td>
                                    <ul style="list-style: none;padding-left: 0px;padding-right: 0px; text-align: center;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-bars" style="font-size: large;"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" style="right: 0; left: auto;">
                                                <li>
                                                    <a href="<?=base_url('barang_in/update/'.encode(1))?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#" class="btn-delete" data-id="<?=encode(1)?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Lemari</td>
                                <td>
                                    <ul>
                                        <li>Ukuran 2 x 3 Meter</li>
                                        <li>Warna Coklat</li>
                                        <li>Cocok digunakan diruang kamar</li>
                                    </ul>
                                </td>
                                <td>20</td>
                                <td>
                                    <ul style="list-style: none;padding-left: 0px;padding-right: 0px; text-align: center;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-bars" style="font-size: large;"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" style="right: 0; left: auto;">
                                                <li>
                                                    <a href="<?=base_url('barang_in/update/'.encode(1))?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#" class="btn-delete" data-id="<?=encode(1)?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Meja</td>
                                <td>
                                    <ul>
                                        <li>Ukuran 2 x 3 Meter</li>
                                        <li>Warna Hijau</li>
                                    </ul>
                                </td>
                                <td>1</td>
                                <td>
                                    <ul style="list-style: none;padding-left: 0px;padding-right: 0px; text-align: center;">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-bars" style="font-size: large;"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" style="right: 0; left: auto;">
                                                <li>
                                                    <a href="<?=base_url('barang_in/update/'.encode(1))?>">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#" class="btn-delete" data-id="<?=encode(1)?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "order": [[ 1, "asc" ]]
            });
        });
    </script>
@endsection