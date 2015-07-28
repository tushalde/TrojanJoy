
angular.module('user_profile_module').config(['$stateProvider', '$urlRouterProvider',
   function($stateProvider, $urlRouterProvider) {

       //default state
       $urlRouterProvider.otherwise('/profile');

       //defining states for ui
       var default_view = {
           name: 'default',
           url: '/profile',
           templateUrl: 'tj_apps/market/templates/profile_view.html',
           controller: 'ProfileViewController'

       };

       var edit_view = {
           name: 'edit',
           url: '/profile/edit/:id',
           templateUrl: 'tj_apps/market/templates/profile_edit.html',
           controller: 'ProfileEditController'
       };

       //attaching the state
       $stateProvider
           .state(default_view)
           .state(edit_view);
   }
]).run(function($state) {
    $state.go('default');
});


//Profile View Controller
user_profile_module.controller('ProfileViewController', function($scope, UserService) {
    UserService.get().success(function(response) {
        $scope.profile = response.data;
    }).error(function(err) {
        console.log(err);
    })
});



//Profile Edit Controller
user_profile_module.controller('ProfileEditController', ['$scope', '$state', 'UserService', 'AuthService', function($scope, $state, UserService, AuthService){
    $scope.update = function(user) {
        var user_info = angular.copy(user);

        var current_user = AuthService.currentUser();
        user_info['id'] = current_user['id'];
        //save the user info
        UserService.update(user_info).success(function(response) {
            $state.go('default');
        });
    };
}]);

