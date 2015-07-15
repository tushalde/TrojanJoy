var myMarket_profile = angular.module('myMarket_profile', []);
myMarket_profile.service('myService', function () { /* ... */ });
myMarket_profile.controller('ProfileController', ['$scope','profileData',function($scope, profileData){
    profileData.success(function(data) {
        $scope.profileContent = data;
    });


}]);
myMarket_profile.factory('profileData', ['$http', function($http) {
    return $http.get('http://localhost:8888/api/user/2')
        .success(function(data) {
            return data;
        })
        .error(function(err) {
            return err;
        });
}]);