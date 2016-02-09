MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

var observer = new MutationObserver(function(mutations, observer) {
    // fired when a mutation occurs
    $("#items").masonry('destroy').masonry({columnWidth: '.sizer',itemSelector: '.itemsCont',percentPosition: true});
	console.log('Change');
});

var app = angular.module("d2showcase", ["firebase"]);
var items = new Firebase("https://meqa-mule-manager.firebaseio.com/items");
var masonryInit = false;

app.controller("list", function($scope, $firebaseArray, orderByFilter, filterFilter) {
	
	
	$scope.items = [];
	$scope.items = $firebaseArray(items);
	
	
	$scope.itemParse = function(icid){
		return itemConv[icid];
	}


});

angular.bootstrap(document.body, ['d2showcase']);

$(document).ready(function(){
	$("#items").masonry({columnWidth: '.sizer',itemSelector: '.itemsCont',percentPosition: true});
	observer.observe(document.getElementById("items"), {childList: true});
});