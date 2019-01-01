var fetch = angular.module("myDataInfo", []);

fetch.controller("diCtrl", ["$scope", "$http", function ($scope, $http) {
$http({
 method: "get",
 url: "getinfo.php"
}).then(function successCallback(response) {
 // Store response data
 $scope.xusers = response.data;
});
}]);
