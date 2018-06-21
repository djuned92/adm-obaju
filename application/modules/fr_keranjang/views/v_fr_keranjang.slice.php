@extends('layouts.frontend')

@section('title','Before Login')

@section('content')
<div class="container">

    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>Shopping cart</li>
        </ul>
    </div>

    <div class="col-md-12" id="basket">

        <div class="box">

            <form method="post" action="#">

                <h1>Shopping cart</h1>
                <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th colspan="2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                    </a>
                                </td>
                                <td><a href="#">White Blouse Armani</a>
                                </td>
                                <td>
                                    <input type="number" value="2" class="form-control">
                                </td>
                                <td>$123.00</td>
                                <td>$0.00</td>
                                <td>$246.00</td>
                                <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="img/basketsquare.jpg" alt="Black Blouse Armani">
                                    </a>
                                </td>
                                <td><a href="#">Black Blouse Armani</a>
                                </td>
                                <td>
                                    <input type="number" value="1" class="form-control">
                                </td>
                                <td>$200.00</td>
                                <td>$0.00</td>
                                <td>$200.00</td>
                                <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2">$446.00</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.table-responsive -->

                <div class="box-footer">
                    <div class="pull-left">
                        <a href="<?=base_url('fr_product')?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                    </div>
                    <div class="pull-right">
                        <!-- <button class="btn btn-default"><i class="fa fa-refresh"></i> Update basket</button> -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Proceed to payment 
                        </button>
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