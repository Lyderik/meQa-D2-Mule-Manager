<!DOCTYPE html>
<html ng-app="d2showcase">
<head>
	<title>meQa D2 Items Showcase</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-resource.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.min.js"></script>
	<script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
	<script src="https://cdn.firebase.com/libs/angularfire/1.1.3/angularfire.min.js"></script>
	<script src="js/inc.js"></script>
	<script src="js/js.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>
<body>
	<div class="container" style="margin-top: 30px;">
		<div class="jumbotron">
			<h1>meQa Dibablo 2 Item Showcase</h1>
  			<p>See all our items from diablo 2!</p>
		</div>
		<div class="panel panel-default" ng-controller="list">
			<div class="panel-heading">Seach for item:</div>
			<div class="panel-body">
				<div class="row" style="margin-bottom: 15px;">
					<div class="col-lg-6">
						<div class="input-group">
						  	<span class="input-group-addon" id="name">Name</span>
						  	<span class="input-group-addon" style="border-right: 0;">
        						<input type="checkbox" aria-label="...">
   							</span>
						  	<input type="text" ng-model="search" class="form-control" placeholder="part of or full name" aria-describedby="name">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="input-group">
						<span class="input-group-addon" id="quality">Quality</span>
							<span class="input-group-addon" style="border-right: 0;">
        						<input type="checkbox" aria-label="...">
   							</span>
							<input type="text" id="dd1" class="form-control" aria-label="..." readonly>
						    <div class="input-group-btn">
						        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
						        <ul class="dropdown-menu dropdown-menu-right">
						        	<li><a onclick="$('#dd1').val('Low Quality');" href="#">Low Quality</a></li>
						         	<li><a onclick="$('#dd1').val('Normal');" href="#">Normal</a></li>
						         	<li><a onclick="$('#dd1').val('Rune Words');" href="#">Rune Words</a></li>
						         	<li><a onclick="$('#dd1').val('Superior');" href="#">Superior</a></li>
						          	<li><a onclick="$('#dd1').val('Magic');" href="#">Magic</a></li>
						          	<li><a onclick="$('#dd1').val('Rare');" href="#">Rare</a></li>
						        	<li><a onclick="$('#dd1').val('Unique');" href="#">Unique</a></li>
						        	<li><a onclick="$('#dd1').val('Set');" href="#">Set</a></li>
						        	<li><a onclick="$('#dd1').val('Crafted');" href="#">Crafted</a></li>
						        </ul>
						    </div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="input-group">
						<span class="input-group-addon" id="quality">Base</span>
							<span class="input-group-addon" style="border-right: 0;">
        						<input type="checkbox" aria-label="...">
   							</span>
							<input type="text" id="dd2" class="form-control" aria-label="..." readonly>
						    <div class="input-group-btn">
						        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
						        <ul class="dropdown-menu dropdown-menu-right">
						         	<li><a onclick="$('#dd2').val('Axe');" href="#">Axe</a></li>
						          	<li><a onclick="$('#dd2').val('Rune');" href="#">Rune</a></li>
						          	<li><a onclick="$('#dd2').val('Quest');" href="#">Quest</a></li>
						        	<li><a onclick="$('#dd2').val('Charm');" href="#">Charm</a></li>
						        	<li><a onclick="$('#dd2').val('Gem');" href="#">Gem</a></li>
						        </ul>
						    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="input-group">
						  	<span class="input-group-addon" id="name">Attribute</span>
						  	<span class="input-group-addon" style="border-right: 0;">
						  	
        						<input type="checkbox" aria-label="...">
   							</span>
						  	<input type="text" class="form-control" placeholder="part of or full name of attribute" aria-describedby="name">
						</div>
					</div>
				</div>
				<h2>Items</h2>
				<div id="items" masonry="true">
					<div class="sizer"></div>
		    		<div class="itemsCont" ng-model="viewer" ng-repeat="item in items | orderBy:'itemName' | filter:search">
		    			<div>
			    			<div class="itemsImage">
			    				<img src="img/skins/{{itemParse(item.itemImage)}}.jpg">
			    			</div>
			    			  <div class="itemsDesc">
			    				{{item.itemName}}
			    				<ul>
			    					<li ng-repeat="attr in item.attr">{{attr}}</li>
			    				</ul>
			    			</div>
		    			</div>
		    		</div>
	    		</div>
	    	</div>
	    </div>
    </div>
    
	<script src="js/bootstrap.min.js"></script>
</body>
</html>