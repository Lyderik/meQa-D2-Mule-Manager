var app = angular.module("d2showcase", ["firebase"]);
var items = new Firebase("https://meqa-mule-manager.firebaseio.com/items");
app.controller("list", function($scope, $firebaseArray, orderByFilter, filterFilter) {
	
	
	$scope.items = [];
	$scope.items = $firebaseArray(items);
	
	
	$scope.itemParse = function(icid){
		return itemConv[icid];
	}
	
	// putting a console.log here won't work, see below
	/*$scope.fireitems.$on("change", function() {
	 	  var keys  = $scope.fireitems.$getIndex(),
	 	  tempArray = [];
	 	  
			keys.forEach(function(key, i) {
			  tempArray[key] = $scope.fireitems[key];
			});
			$scope.items = tempArray;
		});*/
});