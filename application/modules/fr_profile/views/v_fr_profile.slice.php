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
            <li>Edit Profile</li>
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
            <h1>Edit Profile</h1>
            <p class="text-muted">Jika ada pertanyaan, klik <a href="contact.html">hubungi kami</a>. pusat layanan pelanggan kami bekerja untuk Anda 24/7.</p>

            <hr>

            <form action="#" id="frm-update-profile">
                <div class="form-group">
                    <label for="name">Fullname</label>
                    <input type="text" class="form-control" name="fullname" value="<?=isset($profile['fullname'])?$profile['fullname']:set_value('fullname');?>">
                </div>
                
                <div class="form-group">
                    <label>Gender</label>
                    <div class="row">
                        <div class="col-md-12">  
                            <div class="col-md-9">
                              <label class="radio-inline">
                                <input type="radio" name="gender" value="1" <?=($profile['gender'] == 1) ? 'checked':''?>>
                                Male
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="gender" value="2" <?=($profile['gender'] ==2) ? 'checked':''?>>
                                Female
                              </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea class="form-control" name="address" rows="3"><?=isset($profile['address'])?$profile['address']:set_value('address');?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?=isset($profile['phone'])?$profile['phone']:set_value('phone');?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?=isset($profile['email'])?$profile['email']:set_value('email');?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update</button>
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
            $('#frm-update-profile').validate({
                rules: {
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
                        url: "<?=base_url('fr_profile/update')?>",
                        type: 'post',
                        dataType: 'json',
                        data: $('#frm-update-profile').serializeArray(),
                        beforeSend: function() {},
                        success: function(data) {
                            $("#password").val('');
                            if (data.error == true) {
                                $.alert({
                                    title: 'Edit Profile',
                                    content: '<strong>Profile gagal diperbaharui</strong>',
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
                                $.alert({
                                    title: 'Edit Profile',
                                    content: '<strong>Profile berhasil diperbaharui</strong>',
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