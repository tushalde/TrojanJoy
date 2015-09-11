<div class="navbar navbar-trojanjoy" role="navigation" id="main-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand tj_brand" href="/">Trojan Wow</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="text-center">
                    <a href="#">Market</a>
                </li>
                <li class="text-center">
                    <a href="#"><i class="glyphicon glyphicon-bell"></i> </a>
                </li>
                <li class="text-center">
                    <a href="#"><i class="glyphicon glyphicon-envelope"></i> </a>
                </li>
                <li class="form dropdown text-center">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::check())
                            @if(!empty(Auth::user()->first_name) && !empty(Auth::user()->first_name))
                                <% Auth::user()->first_name .  ' ' . Auth::user()->last_name %>
                            @else
                                <% Auth::user()->email %>
                            @endif
                        @endif
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="text-center">
                            <a href="/signup/"> My Profile</a>
                        </li>
                        <li class="text-center">
                            <a href="/logout"> Log Out</a>
                        </li>
                        <li class="divider"></li>
                        <li class="text-center">
                            <a href="/customer/reset_password"> Help</a>
                        </li>
                        <li class="text-center">
                            <a href="/customer/reset_password"> Report a Problem</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</div>