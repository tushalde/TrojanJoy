//Main App module. Used to register core services, everything that uses it make it a dependency.
var app = angular.module('app', []);

// /signup app that handles user profile
var user_profile_module = angular.module('user_profile_module', ['ui.router', 'app']);
