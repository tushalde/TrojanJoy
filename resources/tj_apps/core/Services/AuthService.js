app.factory( 'AuthService', function() {
    var currentUser = {};

    return {
        //Not sure if we even need this
        login: function() {  },

        //post logout, clear current user data.
        logout: function() {  },

        //boolean
        isLoggedIn: function() {
            return  (currentUser.id && currentUser.id > 0);
        },

        //Post oauth login, call this service and store currently logged in user data
        currentUser: function() {
            debugger;
            currentUser['id'] = 1;
            return currentUser;
        },

        updateCurrentUser: function(userData) {
            //check this implementation
            for (var key in userData) {
                if (currentUser.hasOwnProperty(key) && userData.hasOwnProperty(key)){
                    currentUser[key] = userData[key];
                }
            }
        }
    };
});