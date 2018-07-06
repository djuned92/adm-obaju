<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        .: ZASKIATAMAM :.
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- global stylesheets -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/frontend.min.css')?>"> -->
    
    <!-- styles --> 
    <link href="<?=base_url('assets/obaju/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/obaju/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/obaju/css/animate.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/obaju/css/owl.carousel.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/obaju/css/owl.theme.css')?>" rel="stylesheet">

    <link href="<?=base_url('assets/obaju/css/style.violet.css')?>" rel="stylesheet" id="theme-stylesheet">


    <link href="<?=base_url('assets/obaju/css/custom.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    

    <link rel="shortcut icon" href="favicon.png">

    <style type="text/css">
        @media print {
            @page {
                margin: 0;
            }
            #print {
                display: none;
            }
        }
    </style>


</head>

<body>

    <div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-12" id="customer-order">
                    <div class="box">
                        <button class="btn btn-info" title="Print" id="print">
                            <i class="fa fa-print"></i> Print 
                        </button>

                        <?php

                            $status = ($order['status'] == 0) ? 'Proses': (($order['status'] == 1) ? 'Tidak Valid': 
                                            (($order['status'] == 2) ? 'Pengiriman' : 'Diterima'
                                        ));
                        ?>
                        <h4>Tanggal Order <?=date_format(date_create($order['created_at']), 'd/m/Y')?> (<?=$status?>)</h4>
                        

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
                                    <?php foreach($detail_produk['produk'] as $key => $value): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $image = $this->global->getCond('tm_produk','*',['id'=> $value['produk_id']])->row_array();
                                                $first = TRUE; 
                                            ?>
                                            <?php foreach(json_decode($image['image']) as $k => $v): ?>
                                                <?php if($first): ?>
                                                <a href="#">
                                                    <img src="<?=base_url('assets/images/product/'.$v.'')?>" alt="{{ $value['produk'] }}" style="width: 50px; height: 50px;">
                                                </a>
                                                <?php $first = FALSE ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </td>
                                        <td><a href="#"><?=$value['produk']?></a>
                                        </td>
                                        <td><?=$value['qty']?></td>
                                        <td>Rp. <?=number_format($value['harga'])?>,-</td>
                                        <td>Rp. <?=number_format($value['disc'])?>,-</td>
                                        <td>Rp. <?=number_format($value['jumlah'])?>,-</td>
                                    </tr>
                                    <?php endforeach ?>
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
                        
                        <div class="row addresses">
                            <div class="col-md-offset-6 col-md-6">
                                <h4>Alamat Pengiriman</h4>
                                <p>Jl. Raya Bekasi
                                    <br>No. 128
                                    <br>Jakarta Timur
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <!--  
    <script src="js/respond.min.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    -->
    <!-- global script -->
    <script src="<?=base_url('assets/js/frontend.min.js')?>"></script>
    <script>
        $('#print').on('click',function() {
            window.print();
        })
    </script>
</body>

</html> 