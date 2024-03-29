var myMarket = angular.module('myMarket', []);
myMarket.service('myService', function () { /* ... */ });
myMarket.controller('LoginController',['$scope',function ($scope){
    $scope.login = function(){
        var OAUTHURL    =   'https://accounts.google.com/o/oauth2/auth?';

        var SCOPE1       =   'https://www.googleapis.com/auth/userinfo.email';
        var CLIENTID    =   '886572792671-rp0rm9ehgs5rg2b32mcfp18f4ccrdctm.apps.googleusercontent.com';
        var REDIRECT    =   'http://localhost:8888/login';
        var TYPE        =   'token';
        var HD          =   'usc.edu';
        var _url        =   OAUTHURL + 'scope=' + SCOPE1 + '&client_id=' + CLIENTID + '&redirect_uri=' + REDIRECT + '&response_type=' + TYPE+'&hd='+HD;
        var acToken;
        var tokenType;
        var expiresIn;
        var user;
        var loggedIn    =   false;
        //function login(){
        var win         =   window.open(_url, "windowname1", 'width=800, height=600');

        var pollTimer   =   window.setInterval(function() {
            try {
                console.log(win.document.URL);
                if (win.document.URL.indexOf(REDIRECT) != -1) {
                    window.clearInterval(pollTimer);
                    var url =   win.document.URL;
                    acToken =   gup(url, 'access_token');
                    tokenType = gup(url, 'token_type');
                    expiresIn = gup(url, 'expires_in');
                    win.close();

                    url = url.replace("login#","login?");
                    window.location.href = url;
                }
            } catch(e) {
            }
        }, 500);

        function validateToken(token) {
            $.ajax({
                url: VALIDURL + token,
                data: null,
                success: function(responseText){
                    getUserInfo();
                    loggedIn = true;
                    $('#loginText').hide();
                    $('#logoutText').show();
                },
                dataType: "jsonp"
            });
        }

        //TODO: Remove this
        function getUserInfo() {
            $.ajax({
                url: 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' + acToken,
                data: null,
                success: function(resp) {
                    user    =   resp;
                    console.log(user);
                    $('#uName').text('Welcome ' + user.name);
                    $('#imgHolder').attr('src', user.picture);
                },
                dataType: "jsonp"
            });
        }

        //credits: http://www.netlobo.com/url_query_string_javascript.html
        function gup(url, name) {
            name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
            var regexS = "[\\#&]"+name+"=([^&#]*)";
            var regex = new RegExp( regexS );
            var results = regex.exec( url );
            if( results == null )
                return "";
            else
                return results[1];
        }
    };

}]);