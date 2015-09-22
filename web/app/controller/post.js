'use strict';

var controllers = angular.module('ninja.controllers', []);

controllers.controller('PostListCtrl', function ($scope, PostService, toastr) {
    $scope.posts = PostService.query();

    $scope.delete = function (id) {
        PostService.delete({id: id})
        .$promise
        .then(function () {
            toastr.success('Post exlcuído com sucesso');
            
            $scope.posts = PostService.query();
        }, function () {
            toastr.error('Ocorreu um erro ao tentar excluir o post');
        });
    };
});

controllers.controller('PostCreateCtrl', function ($scope, $location, PostService, toastr) {
    $scope.save = function () {
        PostService.save($scope.post)
        .$promise
        .then(function () {
            toastr.success('Post salvo com sucesso');
            $location.path('#/');
        }, function () {
            toastr.error('Ocorreu um erro ao tentar salvar o post');
        });
    };
});

controllers.controller('PostDetailCtrl', function ($scope, $routeParams, PostService) {
   $scope.post = PostService.get({id: $routeParams.id});
});