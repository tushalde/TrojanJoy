$(document).ready(function() {
    $("#phone").focus(function () {
        $("#phone").mask("(999) 999-9999");
    });
});

var myMarket_signup = angular.module('myMarket_signup', []);
myMarket_signup.service('myService', function () { /* ... */ });
myMarket_signup.controller('SignupController', function($scope, sharedBooks){
    /*$scope.submit = function() {
        formData.success(function(data) {
            $scope.profileContent = data;
        });
    };*/
    $scope.name = 'SignupController';
    $scope.addData = function(formData) {
        $params = $.param({
            "first_name": formData.first_name,
            "last_name": formData.last_name,
            "phone_number": 2221323232,
            "email": "nishant@gmail.com",
            "avatar_url": "nishant@gmail.com"
        });
        sharedBooks.saveBooks($params);
    }

});

myMarket_signup.factory('sharedBooks', ['$http', '$rootScope', function($http, $rootScope) {
    var books = [];

    return {
        saveBooks: function($params) {
            return $http({
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                url: 'http://localhost:8888/api/user/',
                method: "POST",
                data: $params,
            })
                .success(function(addData) {
                    books = addData;
                    $rootScope.$broadcast('handleSharedBooks',books);
                });
        }
    };
}]);

/*myMarket_signup.factory('formData', ['$http', function($http) {
    return $http.post('http://localhost:8888/api/user/')
        .success(function(data) {
            return data;
        })
        .error(function(err) {
            return err;
        });
}]);

/*
$(document).ready(function() {

// process the form
    $('form').submit(function(event) {

        // get the form data
        var formData = {
            'first_name' : $('#fName').val(),
            'last_name' : $('#lName').val(),
            'email' : 'abc@usc.edu',
            'phone_number' : $('#phone').val()
        };

        // process the form
        $.ajax({
            type        : 'POST',
            url         : 'http://localhost:8888/api/user/',
            data        : formData,
            dataType    : 'json',
            success     : function(data) {

                // log data to the console so we can see
                console.log(data);

                if ( ! data.success) {
                    console.log('Some error');
                } else {
                    console.log('Success');
                }
            }
        });

        // stop the form from submitting and refreshing
        event.preventDefault();
    });

});*/