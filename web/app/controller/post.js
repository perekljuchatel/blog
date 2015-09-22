'use strict';

var controllers = angular.module('ninja.controllers', []);

controllers.controller('PostListCtrl', function ($scope, PostService) {
    $scope.posts = PostService.query();
});

controllers.controller('PostCreateCtrl', function ($scope, PostService) {
    $scope.save = function () {
    	PostService.save($scope.post);
    	$scope.post = {};
    };
});

controllers.controller('PostDetailCtrl', function ($scope, $routeParams, PostService) {
   $scope.post = PostService.get({id: $routeParams.id});
});