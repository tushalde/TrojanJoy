<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Trojan Joy</title>
    <script type="application/javascript" src="<% elixir('js/all.js') %>"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    <link rel="stylesheet" href="<% elixir('css/all.css') %>"/>
    <script>

    </script>
</head>
<body>


<div class="navbar navbar-trojanjoy" role="navigation" id="main-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand tj_brand" href="/">Trojan Joy</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#">Market</a>
                </li>
                <li class="">
                    <a href="#"><i class="glyphicon glyphicon-bell"></i> </a>
                </li>
                <li class="">
                    <a href="#"><i class="glyphicon glyphicon-envelope"></i> </a>
                </li>
                <li class="form dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nishant Jani<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="text-center">
                            <a href="#"> My Profile</a> 
                        </li>
                        <li class="text-center">
                            <a href="/customer/reset_password"> Log Out</a>
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
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div>

<nav class="navbar navbar-sub" role="navigation">
    <div class="container">
        <div class="navbar-collapse">
            <div class="navbar-center-container">
                <ul class="nav navbar-nav navbar-center">

                    <li style="width: 229px;"><a class="active" href="/customer/dashboard"> Subscribed Items</a></li>
                    <li style="width: 228px;"><a href="/customer/dashboard/past"> Items on Sale</a></li>

                </ul>
            </div>



            <a href="/book" class="navbar-btn navbar-right btn btn-primary"> Sell an Item!</a>





        </div>
    </div>
</nav>


<div class="container">



    <div class="no-upcoming">

        <h1 class="text-center">You don't have any items subscribed.</h1>


        <div class="row">
            <div class="col-xs-1">
            </div>
            <div class="col-xs-10">
                <div class="row btn-circle-service-row-lg">
                    <div class="col-sm-6 col-sm-push-3 col-md-4 col-md-push-4 text-center">
                        <a href="/book" class="btn btn-circle-service btn-circle-service-cleaning">
                            <span>Subscribe to What Your Looking For</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


</body>
</html>
