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
	$scope.namecb = false;
	$scope.nametf = "";
	$scope.qualcb = false;
	$scope.qualtf = "Normal";
	$scope.attrcb = false;
	$scope.attrtf = "";
	
	$scope.items = [];
	$scope.items = $firebaseArray(items);
	
	
	$scope.itemParse = function(icid){
		return itemConv[icid];
	}


});
app.filter('itemFilter', function() {

	  // Create the return function and set the required parameter name to **input**
	  return function(input, namecb, nametf, qualcb, qualtf, attrcb, attrtf) {
	    var out = [];
	    nametf = nametf.toLowerCase();
	    qualtf = qualtf.toLowerCase();
	    attrtf = attrtf.toLowerCase();
	    // Using the angular.forEach method, go through the array of data and perform the operation of figuring out if the language is statically or dynamically typed.
	    angular.forEach(input, function(item) {
		    push = true;
		    
		    if(namecb)if(item.itemName.toLowerCase().indexOf(nametf) === -1)push = false;
		    if(qualcb)if(item.itemQuality != qualtf)push = false;
		    if(attrcb){
	    		if(item.attr != null){
			    	match = false;
			    	for(i = 0; i < item.attr.length; i++){
			    		if(item.attr[i].toLowerCase().indexOf(attrtf) > -1)match = true;
			    		console.log(item.attr[i]);
			    	}
			    	if(!match)push = false;
		    	}else{push = false;}
		    }
		    if (push) {
		    	out.push(item)
		    }
	    });
	    return out;
	  }
});
angular.bootstrap(document.body, ['d2showcase']);

$(document).ready(function(){
	$("#items").masonry({columnWidth: '.sizer',itemSelector: '.itemsCont',percentPosition: true});
	observer.observe(document.getElementById("items"), {childList: true});
	
	$("#items").imagesLoaded().progress( function() {
		$("#items").masonry('layout');
	});
});
