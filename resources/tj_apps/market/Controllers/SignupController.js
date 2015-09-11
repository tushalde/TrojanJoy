
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
user_profile_module.controller('ProfileEditController', ['$scope', '$state', '$element','UserService', 'AuthService', function($scope, $state, $element, UserService, AuthService){

    var autocomplete;
    //Initializing google map address autocompelte
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    $scope.init = function() {
        //get the autocomplete address field
        var address_field = $($element).find('#autocompleteAddress')[0];
        // Create the autocomplete object, restricting the search
        // to geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(address_field),
            { types: ['geocode'] });
        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            $scope.fillInAddress();
        });


        /**
         * To fill the user form, prefetch user data
         * TODO: write a global handler for errors
         */
        UserService.get().then(function(response) {
            $scope.formData = response.data;

        });
    };

    $scope.fillInAddress = function() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        var address_field = $($element).find('#autocompleteAddress');
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                address_field.data(addressType, val);
                //$($element).find(addressType).value(val);
                //document.getElementById(addressType).value = val;
            }
        }
    };

    $scope.geolocate = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(
                    position.coords.latitude, position.coords.longitude);
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    };

    $scope.update = function(user) {
        //First save the user.
        var user_info = angular.copy(user);

        var current_user = AuthService.currentUser();
        user_info['id'] = current_user['id'];
        //save the user info
        var save_user = UserService.update(user_info);
        var save_user_address;

        save_user.then(function(response) {
            save_user_address
            $state.go('default');
        });

        //Now save the corresponding address.

    };


    //initialize the controller
    $scope.init();
}]);

