@extends('layouts.frontend')

@section('title','Before Login')

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
                <h3>Order summary</h3>
            </div>
            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order subtotal</td>
                            <th>$446.00</th>
                        </tr>
                        <tr>
                            <td>Shipping and handling</td>
                            <th>$10.00</th>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <th>$0.00</th>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <th>$456.00</th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <div class="col-md-9" id="customer-orders">
        <div class="box">
            <h1>Payment</h1>

            <p class="lead">Your orders on one place.</p>
            <p class="text-muted">If you have any questions, please feel free to <a href="<?=base_url('fr_contact')?>">contact us</a>, our customer service center is working for you 24/7.</p>

            <hr>
            <form action="<?=base_url('fr_register/add')?>" method="post" id="frm-register">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label for="name">Date Transfer</label>
                    <input type="text" class="form-control" name="tgl_transfer">
                </div>

                <div class="form-group">
                    <label for="name">Evidence of Transfer</label>
                    <input type="file" class="form-control" name="bukti_transfer">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection