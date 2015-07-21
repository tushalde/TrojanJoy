@extends('layouts.main')

@section('content')
    <div id="signup_bg">
        <div ng-app="myMarket_signup">
            <div ng-controller="SignupController">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-8 col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6">
                            <div class="pad_top pad_bottom" data-ng-include="template.url">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@stop