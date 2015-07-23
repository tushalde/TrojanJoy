myMarket_signup.factory('profileData', ['$http', '$rootScope', function($http, $rootScope) {
    var dataToAdd = [];

    return {
        saveFormData: function($params) {
            return $http({
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                url: 'http://localhost:8888/api/user/',
                method: "POST",
                data: $params,
            })
                .success(function(addData) {
                    dataToAdd = addData;
                    $rootScope.$broadcast('addedData',dataToAdd);
                });
        },
        get : function() {
            return $http.get('http://localhost:8888/api/user/8');
        },
        updateProfileInfo: function($params) {
            return $http.put("http://localhost:8888/api/user/8", { 'first_name': 'fName', 'last_name': 'lName', 'phone_number': '1221343456', 'avatar_url': 'abc_url_of_image', 'email': 'sample@usc.edu' })
                .success(function(result) {
                    console.log(result);
                    $scope.resultPut = result;
                })
                .error(function() {
                    console.log("error");
                });
        }

    };
}]);