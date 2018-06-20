@extends('layouts.frontend')

@section('title','Before Login')

@section('content')

<div class="container">

    <div class="col-md-12">

        <div class="row" id="error-page">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="box">

                    <p class="text-center">
                        <img src="img/logo.png" alt="This Title Image">
                    </p>

                    <h3>Sorry you are not logged in</h3>

                    <p class="text-center">No account yet ?   
                        <strong><a href="http://localhost/i-crm/pelanggan/register">register here</a></strong> or
                        <strong><a href="#" data-toggle="modal" data-target="#login-modal">login</a></strong>
                    </p>

                    <p class="buttons"><a href="<?=base_url('fr_home')?>" class="btn btn-primary"><i class="fa fa-home"></i> Back to home</a>
                    </p>
                </div>
            </div>
        </div>


    </div>

</div>
<!-- /.container -->
@endsection