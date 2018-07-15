@extends('layouts.backend')

@section('title','Jumlah Barang')

@section('css')
    <!-- datatables -->
    <link href="<?=base_url('assets/plugins/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Jumlah Barang</h3>
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
                    <h2>Jumlah Barang</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Gambar</th>
                                <th width="15%">Produk</th>
                                <th width="15%">Barang In</th>
                                <th width="15%">Barang Out</th>
                                <th width="15%">Jumlah Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Bangku</td>
                                <td>10</td>
                                <td>5</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Lemari</td>
                                <td>20</td>
                                <td>30</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="<?=base_url('assets/images/isyana.jpg')?>" class="img img-rounded" style="width: 120px; height: 120px;"></td>
                                <td>Meja</td>
                                <td>3</td>
                                <td>13</td>
                                <td>16</td>
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