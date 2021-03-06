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
    
    @yield('css')

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        @include('layouts/partials/frontend/topbar')
    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->
    @include('layouts/partials/frontend/navbar')
   
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

            @yield('content')
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        @include('layouts/partials/frontend/footer')
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        @include('layouts/partials/frontend/copyright')
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php if($this->session->logged_in == TRUE): ?>
                var user_id = <?=$this->session->user_id?>;
                count_keranjang(user_id);
            <?php endif ?>
            $('#login_form').validate({
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
                        data: $('#login_form').serializeArray(),
                        beforeSend: function() {},
                        success: function(data) {
                            $("#password").val('');
                            if (data.error == true) {
                                alert(data.message);
                            } else {
                                if(data.user.role_id == 2) {
                                    window.location.href = "<?=base_url('fr_home')?>";                                        
                                } else {
                                    window.location.href = "<?=base_url('home')?>";
                                }
                            }
                        }

                    });
                }
            });
        })

        $('.add_cart').click(function(e) {
            e.preventDefault();
            <?php if($this->session->logged_in == TRUE): ?>
                var user_id = <?=$this->session->user_id?>;
            <?php endif ?>
            $.confirm({
                title: 'Tambahkan Keranjang',
                content: 'Apakah anda yakin?',
                buttons: {
                    batal: function() {
                        $.alert('Selamat Berbelanja');
                    },
                    tambah: function() {
                        $.ajax({
                            type: 'post',
                            url: "<?=base_url('fr_keranjang/add')?>",
                            dataType: "json",
                            data: $('.frm-keranjang').serialize(),
                            beforeSend: function(e) {},
                            success: function(e) {
                                console.log(e);
                                if(e.error == true) {
                                    $.alert({
                                        title: 'Woops',
                                        content: '<strong>Anda belum login</strong>',
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
                                        title: 'Terima Kasih',
                                        content: '<strong>Selamat berbelanja</strong>',
                                        icon: 'fa fa-smile-o',
                                        animation: 'scale',
                                        closeAnimation: 'scale',
                                        buttons: {
                                            okay: {
                                                text: 'Okay'
                                            }
                                        }
                                    });
                                    count_keranjang(user_id);
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

        function count_keranjang(user_id) {
            $.ajax({
                type: 'post',
                url: "<?=base_url('fr_keranjang/count_keranjang/')?>" + user_id,
                dataType: "json",
                data: $('.frm-keranjang').serialize(),
                beforeSend: function(e) {},
                success: function(e) {
                    console.log(e);
                    $('.count_keranjang_by_user').html(e.html);
                }
            })
        }
    </script>
    @yield('script')


</body>

</html>