'use strict';

var app = angular.module('ninja', ['ngRoute', 'ngResource', 'ngAnimate', 'ninja.services', 'ninja.controllers', 'toastr']);

app.constant('API', 'api.php');

app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        controller: 'PostListCtrl', 
        templateUrl: 'view/post/list.html'
    });

    $routeProvider.when('/add', {
        controller: 'PostCreateCtrl', 
        templateUrl: 'view/post/add.html'
    });

    $routeProvider.when('/view/:id', {
        controller: 'PostDetailCtrl', 
        templateUrl: 'view/post/detail.html'
    });

    $routeProvider.otherwise({
        redirectTo: '/'
    });
});
