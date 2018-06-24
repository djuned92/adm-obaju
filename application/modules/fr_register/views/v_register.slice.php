@extends('layouts.frontend')

@section('title','Produk')

@section('css')
<link href="<?=base_url('assets/plugins/bootstrap-validation/bootstrap-validation.css')?>" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <div class="col-md-12">

        <ul class="breadcrumb">
            <li><a href="#">Home</a>
            </li>
            <li>New account / Sign in</li>
        </ul>

    </div>

    <div class="col-md-6">
        <div class="box">
            <h1>New account</h1>

            <p class="lead">Not our registered customer yet?</p>
            <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
            <p class="text-muted">If you have any questions, please feel free to <a href="<?=base_url('fr_contact')?>">contact us</a>, our customer service center is working for you 24/7.</p>

            <hr>

            <form action="<?=base_url('fr_register/add')?>" method="post" id="frm-register">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                
                <div class="form-group">
                    <label for="name">Fullname</label>
                    <input type="text" class="form-control" name="fullname">
                </div>
                
                <div class="form-group">
                    <label>Gender</label>
                    <div class="row">
                        <div class="col-md-12">  
                            <div class="col-md-9">
                              <label class="radio-inline">
                                <input type="radio" name="gender" value="1">
                                Male
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="gender" value="2">
                                Female
                              </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea class="form-control" name="address" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box">
            <h1>Login</h1>

            <p class="lead">Already our customer?</p>
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                mi vitae est. Mauris placerat eleifend leo.</p>

            <hr>

            <form action="#" method="post" id="login_form_2">
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
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
        $('#frm-register').validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 12,
                },
                confirm_password: {
                    minlength: 8,
                    maxlength: 12,
                    equalTo: "#password",
                },
                fullname: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "<?=base_url('fr_register/add')?>",
                    type: 'post',
                    dataType: 'json',
                    data: $('#frm-register').serializeArray(),
                    beforeSend: function() {},
                    success: function(data) {
                        $('#frm-register')[0].reset();
                        alert(data.message);
                    }

                });
            }
        });

        $('#login_form_2').validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "<?=base_url('auth/do_login')?>",
                    type: 'post',
                    dataType: 'json',
                    data: $('#login_form_2').serializeArray(),
                    beforeSend: function() {},
                    success: function(data) {
                        $("#password").val('');
                        if (data.error == true) {
                            alert(data.message);
                        } else {
                            if(data.user.role_id == 1) {
                                window.location.href = "<?=base_url('home')?>";
                            } else {
                                window.location.href = "<?=base_url('welcome/obaju')?>";                                        
                            }
                        }
                    }

                });
            }
        });
    });
</script>
@endsection