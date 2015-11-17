angular.module('app.controllers')
    .controller('ProjectNoteEditController',[
        '$scope',
        '$routeParams',
        '$location',
        'ProjectNote',
        function($scope, $routeParams, $location, ProjectNote) {
        $scope.projectNote = ProjectNote.get({
            id: $routeParams.id,
            idNote: $routeParams.idNote
        });
//console.log($scope.projectNote);
        $scope.save = function(){
                //aqui eu passo id do cliente, os dados e a messagem de sucesso
            if($scope.form.$valid){

                ProjectNote.update({id: null, idNote: $scope.projectNote.id}, $scope.projectNote, function(){
                    $location.path('/project/'+ $routeParams.id +'/notes');
                });
            }
        }
    }]);
