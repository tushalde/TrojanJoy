@extends('layouts.main')

@section('content')
    <div id="signup_bg">
        <div ng-app="myMarket_signup">
            <div ng-controller="SignupController">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-8 col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6">
                            <div class="pad_top pad_bottom">
                                <form ng-submit="submit()">

                                    <!--<div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div> -->



                                    <div align="center">
                                        <img src="images/profilelarge.png" id="profile_pic" width="30%">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="fName" placeholder="First Name" name="first_name" ng-model="formData.first_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lName" placeholder="Last Name" name="last_name" ng-model="formData.last_name">
                                    </div>
                                    <!--<div class="form-group">
                                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                    </div>-->

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone_number" ng-model="formData.phone_number">
                                    </div>
                                    <button class="btn btn-large btn-success" ng-click="addData(formData)">Add</button>
                                    <!--<button type="submit" class="btn btn-success btn-block">Save profile</button>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@stop