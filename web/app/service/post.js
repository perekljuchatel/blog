'use strict';

var services = angular.module('ninja.services', []);

services.factory('PostService', function ($resource, API) {
    return $resource(API + '/posts/:id', {id: '@id'}, {
        update:{
            method:'PUT'
        }
    });
});