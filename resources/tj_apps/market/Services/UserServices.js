user_profile_module.factory('UserService', ['$http', '$rootScope', function($http, $rootScope) {
    return {
        get : function() {
            return $http.get('http://localhost:8888/api/user/1');
        },
        update: function($params) {
            return $http.put("http://localhost:8888/api/user/" +  $params.id, $params);
        }
    };
}]);