user_profile_module.factory('UserService', ['$http', '$rootScope', function($http, $rootScope) {
    return {
        get : function(id) {
            return $http.get('http://localhost:8888/api/address/'+ id);
        },
        update: function($params) {
            return $http.put("http://localhost:8888/api/address/" +  $params.id, $params);
        }
    };
}]);