@extends('layouts.frontend')

@section('title','Before Login')

@section('css')
<link href="<?=base_url('assets/plugins/bootstrap-validation/bootstrap-validation.css')?>" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Payment</li>
        </ul>

    </div>

    

    <div class="col-md-3">

        <div class="box" id="order-summary">
            <div class="box-header">
                <h3>Pembayaran</h3>
            </div>
            <p class="text-muted">Total yang harus dibayar</p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr class="total">
                            <td>Total</td>
                            <td colspan="2">Rp. <?=number_format($total_harga)?>,-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <div class="col-md-9" id="customer-orders">
        <div class="box">
            <h1>Pembayaran</h1>

            <p class="text-muted">Jika mempunyai pertanyaan, klik <a href="<?=base_url('fr_contact')?>">Hubungi Kami</a>, pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>

            <hr>
            <form action="<?=base_url('fr_payment/add')?>" method="post" id="frm-payment">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label for="name">Tanggal Transfer</label>
                    <input type="date" class="form-control" name="tgl_transfer">
                </div>

                <div class="form-group">
                    <label for="name">Bukti Transfer</label>
                    <input type="file" class="form-control" name="userfile">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection

@section('script')
    <script>
    $(document).ready(function() {
        $('#frm-payment').validate({
            rules: {
                nama: {
                    required: true,
                },
                tgl_transfer: {
                    required: true,
                },
                userfile: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                var form = $('#frm-payment')[0],
                data = new FormData(form);
                
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "<?=base_url('fr_payment/add')?>",
                    dataType: 'json',
                    data: data,
                    processData: false,
                    async: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    beforeSend: function() {},
                    success: function(data) {
                        console.log(data);
                    }

                });
            }
        });
    });
</script>
@endsection