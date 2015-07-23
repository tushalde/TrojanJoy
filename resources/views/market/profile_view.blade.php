@extends('layouts.main')

@section('content')

    <div ng-app="myMarket_profile">
        <div ng-controller="ProfileController">
            <div class="container pad_top pad_bottom">
                Profile pic will come here <br>(url: {{ profileContent.data.avatar_url }} ) <br><br><br>

                <span class="font_md_bold"> First Name: </span>
                <span class="font_md_reg"> {{ profileContent.data.first_name  }} </span> <br>
                <span class="font_md_bold"> Last Name: </span>
                <span class="font_md_reg"> {{ profileContent.data.last_name }} </span> <br>
                <span class="font_md_bold">Address:  <br>
                Phone:  <br>
                Email:  <br><br> </span>
                <button class="btn btn-primary">Edit Profile</button>
            </div>
        </div>
    </div>

@stop