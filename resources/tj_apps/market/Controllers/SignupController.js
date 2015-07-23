$(document).ready(function() {
    $("#phone_number").focus(function () {
        $("#phone_number").mask("(999) 999-9999");
    });
});




var myMarket_signup = angular.module('myMarket_signup', []);
myMarket_signup.service('myService', function () { /* ... */ });
myMarket_signup.controller('SignupController', function($scope, profileData){
    $scope.name = 'SignupController';
    $scope.addData = function(formData) {
        $params = $.param({
            "first_name": formData.first_name,
            "last_name": formData.last_name,
            "phone_number": 2221323232,
            "email": "nishant8@gmail.com",
            "avatar_url": "nishant@gmail.com"
        });
        profileData.saveFormData($params);
    };
    $scope.updateData = function(formData) {
        $params = $.param({
            "first_name": 'hi',
            "last_name": 'hello',
            "phone_number": 2221323232,
            "email": "nishant8@gmail.com",
            "avatar_url": "nishant@gmail.com"
        });
        profileData.updateProfileInfo($params);
    };

    profileData.get()
        .success(function(data) {
            $scope.profileContent = data;

            //when $scope.myValue is falsy (element is visible)
            //when $scope.myValue is truthy (element is hidden)
            $scope.saveProfile = true;
            $scope.editProfile = false;
            $scope.updateProfile = true;

            $scope.editProfileData = function(formData){
                var first_name = angular.element(document.getElementById('first_name'));
                var last_name = angular.element(document.getElementById('last_name'));
                first_name.replaceWith('<input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" ng-model="formData.first_name" value="'+data.data.first_name+'">');
                last_name.replaceWith('<input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" ng-model="formData.last_name" value="'+data.data.last_name+'">');
                /*if(data.data.first_name != "") {
                 first_name.val(data.data.first_name);
                 }
                 if(data.data.last_name != "") {
                 last_name.val(data.data.last_name);
                 }*/
                $scope.saveProfile = true;
                $scope.editProfile = true;
                $scope.updateProfile = false;
            };
            $scope.cancelEdit = function(){
                var first_name = angular.element(document.getElementById('first_name'));
                var last_name = angular.element(document.getElementById('last_name'));
                first_name.replaceWith('<h4 id="first_name" ng-model="formData.first_name">First Name : '+data.data.first_name+'</h4>');
                last_name.replaceWith('<h4 id="last_name" ng-model="formData.last_name">Last Name: '+data.data.last_name+'</h4>');
                //phone_number.replaceWith('<h4 id="phone_number">Phone : '+'(212) 123-2342'+'</h4>');
                $scope.saveProfile = true;
                $scope.editProfile = false;
                $scope.updateProfile = true;
            };
            if(data.data.email != "") {
                // already  a registered user
                $scope.template =  {name: 'signup_edit_template', url: 'tj_apps/market/templates/signup_edit.html'};
                var first_name = angular.element(document.getElementById('first_name'));
                var last_name = angular.element(document.getElementById('last_name'));
                var phone_number = angular.element(document.getElementById('phone_number'));
                var save_profile = angular.element(document.getElementById('saveProfile'));
                var edit_profile = angular.element(document.getElementById('editProfile'));
                first_name.replaceWith('<h4 id="first_name">First Name : '+data.data.first_name+'</h4>');
                last_name.replaceWith('<h4 id="last_name">Last Name: '+data.data.last_name+'</h4>');
                phone_number.replaceWith('<h4 id="phone_number">Phone : '+'(212) 123-2342'+'</h4>');

            }
            else {
                $scope.template =  {name: 'signup_edit_template', url: 'tj_apps/market/templates/signup_edit.html'};
                $('#editProfile').hide();
            }


        })
        .error(function(err) {
            return err;
        });

    $scope.template =  {name: 'signup_edit_template', url: 'tj_apps/market/templates/signup_edit.html'};

});


