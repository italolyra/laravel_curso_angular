angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',[
        '$scope',
        '$routeParams',
        '$location',
        'Client',
        function($scope, $routeParams, $location, Client) {

            $scope.client = Client.get({id: $routeParams.id});

            $scope.remove = function(){
                //then se tiver sucesso faça
                $scope.client.$delete().then(function(){
                    $location.path('/clients');
                });
            }
        }]);

