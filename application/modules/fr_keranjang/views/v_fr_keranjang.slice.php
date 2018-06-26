@extends('layouts.frontend')

@section('title','Before Login')

@section('content')
<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Keranjang</li>
        </ul>
    </div>

    <div class="col-md-12" id="basket">

        <div class="box">

            <form method="post" action="#">

                <h1>Keranjang</h1>
                <p class="text-muted">Anda saat ini mempunyai {{ $total_keranjang['total'] }} barang dalam keranjang.</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Discount</th>
                                <th colspan="2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keranjang as $key => $value)
                            <tr>
                                <td>
                                    @php $first = TRUE @endphp
                                    @foreach(json_decode($value['image']) as $k => $v)
                                        @if($first)
                                        <a href="#">
                                            <img src="<?=base_url('assets/images/product/'.$v.'')?>" alt="{{ $value['produk'] }}" style="width: 50px; height: 50px;">
                                        </a>
                                        @php $first = FALSE @endphp
                                        @endif
                                    @endforeach
                                </td>
                                <td><a href="<?=base_url('fr_product/detail/'.$value['id'].'')?>">{{ $value['produk'] }}</a>
                                </td>
                                <td>
                                    {{ $value['qty'] }}
                                </td>
                                <td>Rp. <?=number_format($value['harga'])?>,-</td>
                                <td>Rp. <?=!empty($value['disc']) ? number_format($value['harga'] * $value['disc']) : '0'?>,-</td>
                                <td><?=!empty($value['disc']) ? number_format($value['harga'] * $value['disc']) : number_format($value['harga'])?>,-</td>
                                <td><a href="#" class="delete_keranjang" data-id="<?=$value['id']?>"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2">Rp. <?=number_format($total_harga)?>,-</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.table-responsive -->

                <div class="box-footer">
                    <div class="pull-left">
                        <a href="<?=base_url('fr_product')?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjut berbelanja</a>
                    </div>
                    <div class="pull-right">
                        <!-- <button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button> -->
                        <a href="<?=base_url('fr_payment')?>">
                            <button type="button" class="btn btn-primary"><i class="fa fa-money"></i> Pembayaran 
                            </button>
                        </a>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.box -->


    </div>
    <!-- /.col-md-9 -->

</div>
<!-- /.container -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.delete_keranjang').click(function(e) {
                var id = $(this).data('id');
                e.preventDefault();
                $.confirm({
                    title: 'Hapus Keranjang',
                    content: 'Apakah anda yakin?',
                    buttons: {
                        batal: function() {
                            $.alert('.....');
                        },
                        iya: function() {
                            $.ajax({
                                type: 'post',
                                url: "<?=base_url('fr_keranjang/delete/')?>" + id,
                                dataType: "json",
                                data: {id:id},
                                beforeSend: function(e) {},
                                success: function(e) {
                                    console.log(e);
                                    if(e.error == true) {
                                        $.alert({
                                            title: 'Woops',
                                            content: '<strong>Woops</strong>',
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
                                            title: 'Hapus',
                                            content: '<strong>Berhasil menghapus 1 keranjang</strong>',
                                            icon: 'fa fa-smile-o',
                                            animation: 'scale',
                                            closeAnimation: 'scale',
                                            buttons: {
                                                okay: {
                                                    text: 'Okay'
                                                }
                                            }
                                        });
                                        setTimeout(function() {
                                            window.location.href = "<?=base_url('fr_keranjang')?>";
                                        }, 2000);
                                    }
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