@extends('layouts.minimal-landing-layout')

@section('content')
    <div ng-app="myMarket" class="container">
        <div class="jumbotron">
            <h1>Trojan Joy</h1>
            <p>Joy for Joy</p>
            <div ng-controller="LoginController">
                <a ng-click="login()" id="loginText"> <img src="images/usc_login.png"> </a>
            </div>
        </div>
    </div>
@stop