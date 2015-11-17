angular.module('app.controllers')
    .controller('ProjecNoteListController',['$scope','$routeParams', 'ProjectNote', function($scope,$routeParams, ProjectNote){
        $scope.projectNotes = ProjectNote.query({id: $routeParams.id});

    }]);
