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
        }

    };
}]);