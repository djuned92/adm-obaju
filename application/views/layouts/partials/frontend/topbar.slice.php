<div class="container">
    <!-- <div class="col-md-6 offer" data-animate="fadeInDown">
        <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
    </div> -->
    <div class="col-md-offset-6 col-md-6" data-animate="fadeInDown" style="float: left;">
        <ul class="menu">
            @if($this->session->logged_in == TRUE)
                <li>
                    <a href="basket.html" class="btn btn-primary btn-xs"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </li>
            @else
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
                <li><a href="<?=base_url('fr_register')?>">Register</a>
                </li>
                <li><a href="#Contact">Contact</a>
                </li>
            @endif
        </ul>
    </div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="login_form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>

                </form>

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="<?=base_url('fr_register')?>"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>