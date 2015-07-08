@extends('layouts.layout')

@section('content')
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
@stop
