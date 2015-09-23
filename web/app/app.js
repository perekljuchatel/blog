'use strict';

var app = angular.module('ninja', ['ngRoute', 'ngResource', 'ngAnimate', 'ninja.services', 'ninja.controllers', 'toastr']);

app.constant('API', 'api.php');

app.config(function ($routeProvider) {
    $routeProvider.when('/', {
        controller: 'BlogListCtrl', 
        templateUrl: 'view/blog/list.html'
    });

    $routeProvider.when('/detail/:id', {
        controller: 'BlogDetailCtrl', 
        templateUrl: 'view/blog/detail.html'
    });

    $routeProvider.when('/list', {
        controller: 'PostListCtrl', 
        templateUrl: 'view/post/list.html'
    });

    $routeProvider.when('/add', {
        controller: 'PostCreateCtrl', 
        templateUrl: 'view/post/add.html'
    });

    $routeProvider.when('/edit/:id', {
        controller: 'PostEditCtrl', 
        templateUrl: 'view/post/add.html'
    });

    $routeProvider.otherwise({
        redirectTo: '/'
    });
});
