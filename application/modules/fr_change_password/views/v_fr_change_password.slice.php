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
            <li>Ganti Password</li>
        </ul>

    </div>

    <div class="col-md-3">
        <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">{{ $this->session->fullname }}</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked">
                   <li class="<?=($this->uri->segment(1) == 'fr_order') ? 'active':''?>">
                        <a href="<?=base_url('fr_order')?>"><i class="fa fa-list fa-fw"></i>Pesanan Saya</a>
                    </li>
                    <li class="<?=($this->uri->segment(1) == 'fr_profile') ? 'active':''?>">
                        <a href="<?=base_url('fr_profile')?>"><i class="fa fa-user fa-fw"></i>Edit Profile</a>
                    </li>
                    <li class="<?=($this->uri->segment(1) == 'fr_change_password') ? 'active':''?>">
                         <a href="<?=base_url('fr_change_password')?>"><i class="fa fa-lock fa-fw"></i>Ganti Password</a>
                    </li>
                    <li>
                        <a href="<?=base_url('auth/do_logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /.col-md-3 -->

        <!-- *** CUSTOMER MENU END *** -->
    </div>

    <div class="col-md-9" id="customer-orders">
        <div class="box">
            <h1>Ganti Password</h1>
            <p class="text-muted">Jika ada pertanyaan, klik <a href="contact.html">hubungi kami</a>. pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>

            <hr>

            <form action="#" id="frm-change-password">
                <div class="form-group">
                    <label for="password">Old Password</label>
                    <input type="password" class="form-control" name="old_password">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                </div>
                
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Ganti Password</button>
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
            $('#frm-change-password').validate({
                rules: {
                    old_password: {
                        required: true
                    },
                    new_password: {
                        required: true,
                        minlength: 8,
                        maxlength: 12,
                    },
                    confirm_password: {
                        equalTo: "#new_password",
                    },
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: "<?=base_url('fr_change_password/update')?>",
                        type: 'post',
                        dataType: 'json',
                        data: $('#frm-change-password').serializeArray(),
                        beforeSend: function() {},
                        success: function(data) {
                            $("#password").val('');
                            if (data.error == true) {
                                $('#frm-change-password')[0].reset();
                                $.alert({
                                    title: 'Reset Password',
                                    content: '<strong>Password lama salah</strong>',
                                    icon: 'fa fa-lock',
                                    animation: 'scale',
                                    closeAnimation: 'scale',
                                    buttons: {
                                        okay: {
                                            text: 'Okay'
                                        }
                                    }
                                });
                            } else {
                                $('#frm-change-password')[0].reset();
                                $.alert({
                                    title: 'Reset Password',
                                    content: '<strong>Password berhasil diperbaharui</strong>',
                                    icon: 'fa fa-lock',
                                    animation: 'scale',
                                    closeAnimation: 'scale',
                                    buttons: {
                                        okay: {
                                            text: 'Okay'
                                        }
                                    }
                                });
                            }
                        }

                    });
                }
            });
        })
    </script>
@endsection