angular.module('app.controllers')
    .controller('ClientEditController',[
        '$scope',
        '$routeParams',
        '$location',
        'Client',
        function($scope, $routeParams, $location, Client) {

        $scope.client = Client.get({id: $routeParams.id});

        $scope.update = function(){
            if($scope.form.email.$valid){
                //aqui eu passo id do cliente, os dados e a messagem de sucesso
                Client.update({id: $scope.client.id}, $scope.client, function(){
                    $location.path('/clients');
                });

        }
        }
    }]);
