<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button> -->
                
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="<?=($this->uri->segment(1) == 'fr_home') ? 'active':'';?>"><a href="<?=base_url('fr_home')?>">Home </a>
                </li>
                <li class="<?=($this->uri->segment(1) == 'fr_product') ? 'active':'';?>"><a href="<?=base_url('fr_product')?>">Produk</a>
                </li>
                <li class="<?=($this->uri->segment(1) == 'fr_about') ? 'active':'';?>"><a href="<?=base_url('fr_about')?>">Tentang Kami</a>
                </li>
                <li class="<?=($this->uri->segment(1) == 'fr_contact') ? 'active':'';?>"><a href="<?=base_url('fr_contact')?>">Hubungi Kami</a>
                </li>
                <!-- <li><a href="<?=base_url('fr_faq')?>">FAQ</a>
                </li> -->
            </ul>

        </div>

        <!--/.nav-collapse -->

        <div class="navbar-buttons">
            @if($this->session->logged_in == TRUE)
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200"> {{ $this->session->fullname }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url('fr_order')?>"><i class="fa fa-list fa-fw"></i>Pesanan Saya</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?=base_url('fr_profile')?>"><i class="fa fa-user fa-fw"></i>Edit Profile</a>
                                </li>
                                <li>
                                     <a href="<?=base_url('fr_change_password')?>"><i class="fa fa-lock fa-fw"></i>Ganti Password</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?=base_url('auth/do_logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
            <!--/.nav-collapse -->
            <!-- 
            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div> -->
        </div>

    </div>
    <!-- /.container -->
</div>