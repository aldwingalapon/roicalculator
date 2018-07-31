<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<html>
<head>
	<title>Cube-culator for Ad Optimization | Cubatica</title>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="layout.css" />
	<link rel="shortcut icon" href="images/logo.ico" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="noimageindex, noodp, noydir" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />	
</head>
<body>
	<header id="main-header">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-md-4">
					<a href="http://cubatica.com/" title="Cubatica" class="header-logo" target="_blank"><img class="main-logo lazyload" src="images/header-logo@3x.png" alt="Cubatica" title="Cubatica" /></a>
				</div>
				<div class="col-md-8 header-title">
					<span class="title">The Cube-culator for Ad Optimization</span>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</header>	

	<div ng-app="myOptimizationApp" ng-controller="myOptimizationCtrl">
		<div class="main-content optimization">
			<div id="group_container">
				<div class="result">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="group-title"><button class="btn group-next">Show me Optimized</button>Here's your current roi trajectory: <span class="description">This projected ROI path is based on your answers.</span></h2>
								<p class="hide">{{newoptions | json}}</p>
								<p>{{newoptionssalesyes | json}}</p>
								<p>{{newoptionssalesall | json}}</p>
								<p>{{newoptionscpayes | json}}</p>
								<p>{{newoptionscpaall | json}}</p>							
							</div>
							<div class="clearfix"></div>							
						</div>
						<div class="clearfix"></div>							
					</div>
					<div class="clearfix"></div>							
					<div class="group-info">
						<div class="container">
							<div class="row">	
								<div class="col-md-12">
									<h3 class="message"><span>Now, let's see what your chart looks</span> <span>like when everything is optimized</span></h3><button class="btn group-next">Show me Optimized</button>
								</div>
								<div class="clearfix"></div>							
							</div>
							<div class="clearfix"></div>							
						</div>						
					</div>
				</div>
				<div class="result">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="group-title title-list">Your ads optimized! <span class="description">Now thats looking good. you can see here here the nice bump up when your ads are optimized.<br />This takes into consideration having everything in your account run at peak performance.</span></h2>
								<a href="#" class="group-previous">Previous</a> <a href="#" class="group-next">Compare The Difference</a>
							</div>
							<div class="clearfix"></div>							
						</div>
						<div class="clearfix"></div>							
					</div>	
					<div class="clearfix"></div>							
					<div class="group-info">
						<div class="container">
							<div class="row">	
								<div class="col-md-12">
									<h3 class="message"><span>Let's take a closer look</span></h3><button class="btn group-next">Compare the Difference</button>
								</div>
								<div class="clearfix"></div>							
							</div>
							<div class="clearfix"></div>							
						</div>	
					</div>					
				</div>
				<div class="result">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="group-title">See the Difference <span class="description">With your ads optimized, you're getting a much higher ROI, and faster scaling. <br><br> Based on these calculations...</span></h2>
								<h3 class="group-optimized">Your ROI could be lifted by : xx%    Your sales Could be increased by : xx%</h3>
								<a href="#" class="group-previous">Previous</a>
							</div>
							<div class="clearfix"></div>							
						</div>
						<div class="clearfix"></div>							
					</div>
					<div class="clearfix"></div>							
					<div class="group-info">
						<div class="container">
							<div class="row">	
								<div class="col-md-8">
									<h3 class="message roi"><span class="title">Want that ROI lift?</span> <span>Let us help.  We have a team campaign managers ready to</span> <span>review your site with a free customized optimization plan.</span></h3><button class="btn btn-optimize">Optimize my Campaign</button>
								</div>
								<div class="col-md-4">

								</div>								
								<div class="clearfix"></div>							
							</div>
							<div class="clearfix"></div>							
						</div>						
					</div>					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>	

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p class="terms">Note: How are we collecting and storing data here? <a href="#" title="How are we collecting and storing data here?">Click here</a></p>
					</div>
					<div class="col-md-6">
						<p class="copyright">Cube-culator for Ad Optimization <span>|</span> Cubatica 2018</p>
					</div>				
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>			
		</footer>			
	</div>
	
	<script src="js/angular.min.js" type='text/javascript'></script>
	<script src="js/angular-animate.js" type='text/javascript'></script>
	<script src="js/jquery-1.12.4.min.js" type='text/javascript'></script>
	<script src="js/jquery-ui.min.js" type='text/javascript'></script>
	<script src="js/bootstrap.min.js" type='text/javascript'></script>
	<script src="script/scripts.js" type='text/javascript'></script>
	<script type='text/javascript'>
		var optimizeapp = angular.module('myOptimizationApp', ['ngAnimate']);	
		optimizeapp.controller("myOptimizationCtrl", function($scope) {
			$scope.months = 12;
			$scope.fullname = <?php echo '"'.$_POST['fullname'].'"';?>;
			$scope.emailaddress = <?php echo '"'.$_POST['emailaddress'].'"';?>;
			$scope.cpa = <?php echo $_POST['cpa'];?>;
			$scope.monthlysales = <?php echo $_POST['monthlysales'];?>;
			$scope.aveordervalue = <?php echo $_POST['aveordervalue'];?>;
			$scope.monthlyadspend = <?php echo $_POST['monthlyadspend'];?>;	
			$scope.newoptions = <?php echo ($_POST['options']);?>;		
			$scope.estimatedcurrentspend = $scope.cpa * $scope.monthlysales;
			$scope.estimatedcurrentgross = $scope.monthlysales * $scope.aveordervalue;
			$scope.currentroa =  $scope.estimatedcurrentgross / $scope.monthlyadspend;

			$scope.newoptionssalesyes = [];
			$scope.newoptionssalesall = [];
			$scope.newoptionscpayes = [];
			$scope.newoptionscpaall = [];

			$scope.salesjson = [];
			$scope.salesbestjson = [];
			$scope.salesexpectedjson = [];
			$scope.salesworstjson = [];
			$scope.salesalljson = [];
			$scope.salesbestjsonchart = [];
			$scope.salesexpectedjsonchart = [];
			$scope.salesworstjsonchart = [];
			$scope.salesalljsonchart = [];
			
			$scope.grossprofitjson = [];
			$scope.grossprofitbestjson = [];
			$scope.grossprofitexpectedjson = [];
			$scope.grossprofitworstjson = [];
			$scope.grossprofitalljson = [];
			$scope.grossprofitbestjsonchart = [];
			$scope.grossprofitexpectedjsonchart = [];
			$scope.grossprofitworstjsonchart = [];
			$scope.grossprofitalljsonchart = [];
			
			$scope.roajson = [];
			$scope.roabestjson = [];
			$scope.roaexpectedjson = [];
			$scope.roaworstjson = [];
			$scope.roaalljson = [];
			$scope.roabestjsonchart = [];
			$scope.roaexpectedjsonchart = [];
			$scope.roaworstjsonchart = [];
			$scope.roaalljsonchart = [];
			
			$scope.cpajson = [];
			$scope.cpabestjson = [];
			$scope.cpaexpectedjson = [];
			$scope.cpaworstjson = [];
			$scope.cpaalljson = [];
			$scope.cpabestjsonchart = [];
			$scope.cpaexpectedjsonchart = [];
			$scope.cpaworstjsonchart = [];
			$scope.cpaalljsonchart = [];
			
			$scope.budgetjson = [];
			$scope.budgetbestjson = [];
			$scope.budgetexpectedjson = [];
			$scope.budgetworstjson = [];
			$scope.budgetalljson = [];			
			$scope.budgetbestjsonchart = [];
			$scope.budgetexpectedjsonchart = [];
			$scope.budgetworstjsonchart = [];
			$scope.budgetalljsonchart = [];		
			
			angular.forEach($scope.newoptions, function (value, key) {
				if (value.metric=='Sales'){
					if (value.needed[0].answer){
						$scope.newoptionssalesyes.push({ mod: value.mod, metric: value.metric, needed: value.needed[0].answer, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}
					$scope.newoptionssalesall.push({ mod: value.mod, metric: value.metric, needed: value.needed[0].answer, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
				} else if (value.metric=='CPA'){
					if (value.needed[0].answer){
						$scope.newoptionscpayes.push({ mod: value.mod, metric: value.metric, needed: value.needed[0].answer, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}					
					$scope.newoptionscpaall.push({ mod: value.mod, metric: value.metric, needed: value.needed[0].answer, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
				}				
			});	

			$scope.getSalesYesTotalBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.best);
				}
				return total.toFixed(2);
			}
			$scope.getSalesYesTotalExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.expected);
				}
				return total.toFixed(2);
			}
			$scope.getSalesYesTotalWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.worst);
				}
				return total.toFixed(2);
			}
			$scope.getSalesYesTotalTFBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.timeframeb);
				}

				return total.toFixed(0);
			}
			$scope.getSalesYesTotalTFExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.timeframee);
				}

				return total.toFixed(0);
			}
			$scope.getSalesYesTotalTFWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesyes.length; i++){
					var x = $scope.newoptionssalesyes[i];
					total += (x.timeframew);
				}

				return total.toFixed(0);
			}

			
			$scope.getSalesAllBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.best);
				}
				return total.toFixed(2);
			}
			$scope.getSalesAllExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.expected);
				}
				return total.toFixed(2);
			}
			$scope.getSalesAllWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.worst);
				}
				return total.toFixed(2);
			}
			$scope.getSalesAllTFBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.timeframeb);
				}
				return total.toFixed(0);
			}
			$scope.getSalesAllTFExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.timeframee);
				}
				return total.toFixed(0);
			}
			$scope.getSalesAllTFWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionssalesall.length; i++){
					var x = $scope.newoptionssalesall[i];
					total += (x.timeframew);
				}
				return total.toFixed(0);
			}		

			$scope.getCPAYesTotalBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.best);
				}
				return total.toFixed(2);
			}
			$scope.getCPAYesTotalExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.expected);
				}
				return total.toFixed(2);
			}
			$scope.getCPAYesTotalWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.worst);
				}
				return total.toFixed(2);
			}
			$scope.getCPAYesTotalTFBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.timeframeb);
				}

				return total.toFixed(0);
			}
			$scope.getCPAYesTotalTFExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.timeframee);
				}

				return total.toFixed(0);
			}
			$scope.getCPAYesTotalTFWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpayes.length; i++){
					var x = $scope.newoptionscpayes[i];
					total += (x.timeframew);
				}

				return total.toFixed(0);
			}

			$scope.getCPAAllBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.best);
				}
				return total.toFixed(2);
			}
			$scope.getCPAAllExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.expected);
				}
				return total.toFixed(2);
			}
			$scope.getCPAAllWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.worst);
				}
				return total.toFixed(2);
			}
			$scope.getCPAAllTFBest = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.timeframeb);
				}
				return total.toFixed(0);
			}
			$scope.getCPAAllTFExpected = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.timeframee);
				}
				return total.toFixed(0);
			}
			$scope.getCPAAllTFWorst = function(){
				var total = 0;
				for(var i = 0; i < $scope.newoptionscpaall.length; i++){
					var x = $scope.newoptionscpaall[i];
					total += (x.timeframew);
				}
				return total.toFixed(0);
			}  

			$scope.getSalesYesTotalBestFactor = function(){
				var factor = ($scope.getSalesYesTotalBest()/100) / $scope.getSalesYesTotalTFBest();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;
			}
			$scope.getSalesYesTotalExpectedFactor = function(){
				var factor = ($scope.getSalesYesTotalExpected()/100) / $scope.getSalesYesTotalTFExpected();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			$scope.getSalesYesTotalWorstFactor = function(){
				var factor = ($scope.getSalesYesTotalWorst()/100) / $scope.getSalesYesTotalTFWorst();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			
			$scope.getSalesAllBestFactor = function(){
				var factor = ($scope.getSalesAllBest()/100) / $scope.getSalesAllTFBest();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;
			}
			$scope.getSalesAllExpectedFactor = function(){
				var factor = ($scope.getSalesAllExpected()/100) / $scope.getSalesAllTFExpected();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			$scope.getSalesAllWorstFactor = function(){
				var factor = ($scope.getSalesAllWorst()/100) / $scope.getSalesAllTFWorst();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			
			$scope.getCPAYesTotalBestFactor = function(){
				var factor = ($scope.getCPAYesTotalBest()/100) / $scope.getCPAYesTotalTFBest();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;
			}
			$scope.getCPAYesTotalExpectedFactor = function(){
				var factor = ($scope.getCPAYesTotalExpected()/100) / $scope.getCPAYesTotalTFExpected();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			$scope.getCPAYesTotalWorstFactor = function(){
				var factor = ($scope.getCPAYesTotalWorst()/100) / $scope.getCPAYesTotalTFWorst();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}

			$scope.getCPAAllBestFactor = function(){
				var factor = ($scope.getCPAAllBest()/100) / $scope.getCPAAllTFBest();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;
			}
			$scope.getCPAAllExpectedFactor = function(){
				var factor = ($scope.getCPAAllExpected()/100) / $scope.getCPAAllTFExpected();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}
			$scope.getCPAAllWorstFactor = function(){
				var factor = ($scope.getCPAAllWorst()/100) / $scope.getCPAAllTFWorst();
				if (typeof factor === 'number' && isNaN(factor)) {
					return (0).toFixed(2);
				}
				return factor;				
			}		

			//Projected Numbers (SALES)
			var salesbestbase = $scope.monthlysales;
			var salesbestbasetotal = 0;
			$scope.salesbeststr = '{' + '"name": "Sales Best", "current":' + round(salesbestbase,0) + '';
			$scope.salesbestjsonchart.push(round(($scope.monthlysales),2));
			for (i = 0; i < $scope.months; i++){
				salesbestbase = salesbestbase + (salesbestbase * $scope.getSalesYesTotalBestFactor());
				$scope.salesbestjson.push(salesbestbase);
				$scope.salesbestjsonchart.push(round((salesbestbase),2));
				salesbestbasetotal += salesbestbase;
				$scope.salesbeststr += ', "month' + (i+1).toString() + '":' + round(salesbestbase,0);
			}
			$scope.salesbeststr += ', "total":' + round((salesbestbasetotal),0) + '}';
			$scope.salesbesttotal = round((salesbestbasetotal),0);
			
			var salesexpectedbase = $scope.monthlysales;
			var salesexpectedbasetotal = 0;
			$scope.salesexpectedstr = '{' + '"name": "Sales Expected", "current":' + round(salesexpectedbase,0) + '';
			$scope.salesexpectedjsonchart.push(round(($scope.monthlysales),2));
			for (i = 0; i < $scope.months; i++){
				salesexpectedbase = salesexpectedbase + (salesexpectedbase * $scope.getSalesYesTotalExpectedFactor());
				$scope.salesexpectedjson.push(salesexpectedbase);
				$scope.salesexpectedjsonchart.push(round((salesexpectedbase),2));
				salesexpectedbasetotal += salesexpectedbase;
				$scope.salesexpectedstr += ', "month' + (i+1).toString() + '":' + round(salesexpectedbase,0);
			}		
			$scope.salesexpectedstr += ', "total":' + round((salesexpectedbasetotal),0) + '}';
			$scope.salesexpectedtotal = round((salesexpectedbasetotal),0);
			
			var salesworstbase = $scope.monthlysales;
			var salesworstbasetotal = 0;
			$scope.salesworststr = '{' + '"name": "Sales Worst", "current":' + round(salesworstbase,0) + '';
			$scope.salesworstjsonchart.push(round(($scope.monthlysales),2));
			for (i = 0; i < $scope.months; i++){
				salesworstbase = salesworstbase + (salesworstbase * $scope.getSalesYesTotalWorstFactor());
				$scope.salesworstjson.push(salesworstbase);
				$scope.salesworstjsonchart.push(round((salesworstbase),2));
				salesworstbasetotal += salesworstbase;
				$scope.salesworststr += ', "month' + (i+1).toString() + '":' + round(salesworstbase,0);
			}
			$scope.salesworststr += ', "total":' + round((salesworstbasetotal),0) + '}';
			$scope.salesworsttotal = round((salesworstbasetotal),0);
			
			var salesallbase = $scope.monthlysales;
			var salesallbasetotal = 0;
			$scope.salesallstr = '{' + '"name": "Sales All Options", "current":' + round(salesallbase,0) + '';
			for (i = 0; i < $scope.months; i++){
				salesallbase = salesallbase + (salesallbase * $scope.getSalesAllBestFactor());
				$scope.salesalljson.push(salesallbase);
				salesallbasetotal += salesallbase;
				$scope.salesallstr += ', "month' + (i+1).toString() + '":' + round(salesallbase,0);
			}		
			$scope.salesallstr += ', "total":' + round((salesallbasetotal),0) + '}';
			$scope.salesalltotal = round((salesallbasetotal),0);
			
			$scope.salesjson = [];
			$scope.salesjson.push(JSON.parse($scope.salesbeststr));
			$scope.salesjson.push(JSON.parse($scope.salesexpectedstr));
			$scope.salesjson.push(JSON.parse($scope.salesworststr));
			$scope.salesjson.push(JSON.parse($scope.salesallstr));	
			
			//Projected Numbers (Gross Profit)
			var grossprofitbestbase = 0;
			var grossprofitbestbasetotal = 0;
			$scope.grossprofitbestjsonchart.push(round(($scope.monthlysales * $scope.aveordervalue),2));
			var count = 0;
			$scope.grossprofitbeststr = '{' + '"name": "Gross Profit Best", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitbestbase = $scope.salesbestjson[i] * $scope.aveordervalue;
				$scope.grossprofitbestjsonchart.push(round(grossprofitbestbase,2));
				grossprofitbestbasetotal += grossprofitbestbase;
				$scope.grossprofitbestjson.push(grossprofitbestbase);
				$scope.grossprofitbeststr += ', "month' + (i+1).toString() + '":' + round(grossprofitbestbase,2);
			}			
			$scope.grossprofitbeststr += ', "total":' + round((grossprofitbestbasetotal),2) + '}';
			$scope.grossprofitbesttotal = round((grossprofitbestbasetotal),2);
			
			var grossprofitexpectedbase = 0;
			var grossprofitexpectedbasetotal = 0;
			$scope.grossprofitexpectedjsonchart.push(round(($scope.monthlysales * $scope.aveordervalue),2));
			var count = 0;
			$scope.grossprofitexpectedstr = '{' + '"name": "Gross Profit Expected", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitexpectedbase = $scope.salesexpectedjson[i] * $scope.aveordervalue;
				$scope.grossprofitexpectedjsonchart.push(round(grossprofitexpectedbase,2));
				grossprofitexpectedbasetotal += grossprofitexpectedbase;
				$scope.grossprofitexpectedjson.push(grossprofitexpectedbase);
				$scope.grossprofitexpectedstr += ', "month' + (i+1).toString() + '":' + round(grossprofitexpectedbase,2);
			}			
			$scope.grossprofitexpectedstr += ', "total":' + round((grossprofitexpectedbasetotal),2) + '}';
			$scope.grossprofitexpectedtotal = round((grossprofitexpectedbasetotal),2);
			
			var grossprofitworstbase = 0;
			var grossprofitworstbasetotal = 0;
			$scope.grossprofitworstjsonchart.push(round(($scope.monthlysales * $scope.aveordervalue),2));
			var count = 0;
			$scope.grossprofitworststr = '{' + '"name": "Gross Profit Worst", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitworstbase = $scope.salesworstjson[i] * $scope.aveordervalue;
				$scope.grossprofitworstjsonchart.push(round(grossprofitworstbase,2));
				grossprofitworstbasetotal += grossprofitworstbase;
				$scope.grossprofitworstjson.push(grossprofitworstbase);
				$scope.grossprofitworststr += ', "month' + (i+1).toString() + '":' + round(grossprofitworstbase,2);
			}			
			$scope.grossprofitworststr += ', "total":' + round((grossprofitworstbasetotal),2) + '}';
			$scope.grossprofitworsttotal = round((grossprofitworstbasetotal),2);
			
			var grossprofitallbase = 0;
			var grossprofitallbasetotal = 0;
			var count = 0;
			$scope.grossprofitallstr = '{' + '"name": "Gross Profit All Options", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitallbase = $scope.salesalljson[i] * $scope.aveordervalue;
				grossprofitallbasetotal += grossprofitallbase;
				$scope.grossprofitalljson.push(grossprofitallbase);
				$scope.grossprofitallstr += ', "month' + (i+1).toString() + '":' + round(grossprofitallbase,2);
			}			
			$scope.grossprofitallstr += ', "total":' + round((grossprofitallbasetotal),2) + '}';
			$scope.grossprofitalltotal = round((grossprofitallbasetotal),2);

			$scope.grossprofitjson = [];
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitbeststr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitexpectedstr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitworststr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitallstr));


			//Projected Numbers (ROA)
			var roabestbase = 0;
			var roabestbasetotal = 0;
			$scope.roabestjsonchart.push(round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2));
			var count = 0;
			$scope.roabeststr = '{' + '"name": "ROA Best", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roabestbase = $scope.grossprofitbestjson[i] / $scope.monthlyadspend;
				$scope.roabestjsonchart.push(round((roabestbase*100),2));
				roabestbasetotal += roabestbase;
				$scope.roabestjson.push(roabestbase);
				count += 1;
				$scope.roabeststr += ', "month' + (i+1).toString() + '":' + round((roabestbase*100),2);
			}			
			$scope.roabeststr += ', "total":' + round(((roabestbasetotal*100)/ count),2) + '}';
			$scope.roabesttotal = round(((roabestbasetotal*100)/ count),2);
			
			var roaexpectedbase = 0;
			var roaexpectedbasetotal = 0;
			$scope.roaexpectedjsonchart.push(round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2));
			var count = 0;
			$scope.roaexpectedstr = '{' + '"name": "ROA Expected", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roaexpectedbase = $scope.grossprofitexpectedjson[i] / $scope.monthlyadspend;
				$scope.roaexpectedjsonchart.push(round((roaexpectedbase*100),2));
				roaexpectedbasetotal += roaexpectedbase;
				$scope.roaexpectedjson.push(roaexpectedbase);
				count += 1;
				$scope.roaexpectedstr += ', "month' + (i+1).toString() + '":' + round((roaexpectedbase*100),2);
			}			
			$scope.roaexpectedstr += ', "total":' + round(((roaexpectedbasetotal*100)/ count),2) + '}';
			$scope.roaexpectedtotal = round(((roaexpectedbasetotal*100)/ count),2);
			
			var roaworstbase = 0;
			var roaworstbasetotal = 0;
			$scope.roaworstjsonchart.push(round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2));
			var count = 0;
			$scope.roaworststr = '{' + '"name": "ROA Worst", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roaworstbase = $scope.grossprofitworstjson[i] / $scope.monthlyadspend;
				$scope.roaworstjsonchart.push(round((roaworstbase*100),2));
				roaworstbasetotal += roaworstbase;
				$scope.roaworstjson.push(roaworstbase);
				count += 1;
				$scope.roaworststr += ', "month' + (i+1).toString() + '":' + round((roaworstbase*100),2);
			}			
			$scope.roaworststr += ', "total":' + round(((roaworstbasetotal*100)/ count),2) + '}';
			$scope.roaworsttotal = round(((roaworstbasetotal*100)/ count),2);
			
			var roaallbase = 0;
			var roaallbasetotal = 0;
			var count = 0;
			$scope.roaallstr = '{' + '"name": "ROA All Options", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roaallbase = $scope.grossprofitalljson[i] / $scope.monthlyadspend;
				roaallbasetotal += roaallbase;
				$scope.roaalljson.push(roaallbase);
				count += 1;
				$scope.roaallstr += ', "month' + (i+1).toString() + '":' + round((roaallbase*100),2);
			}			
			$scope.roaallstr += ', "total":' + round(((roaallbasetotal*100)/ count),2) + '}';
			$scope.roaalltotal = round(((roaallbasetotal*100)/ count),2);

			$scope.roajson = [];
			$scope.roajson.push(JSON.parse($scope.roabeststr));
			$scope.roajson.push(JSON.parse($scope.roaexpectedstr));
			$scope.roajson.push(JSON.parse($scope.roaworststr));
			$scope.roajson.push(JSON.parse($scope.roaallstr));			
			
			//Projected Numbers (CPA)
			var cpabestbase = $scope.cpa;
			var cpabestbasetotal = 0;
			$scope.cpabestjsonchart.push(round($scope.cpa,2));
			var count = 0;
			$scope.cpabeststr = '{' + '"name": "CPA Best", "current":' + round(cpabestbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpabestbase = cpabestbase + (cpabestbase * $scope.getCPAYesTotalBestFactor());
				$scope.cpabestjsonchart.push(round(cpabestbase,2));
				$scope.cpabestjson.push((cpabestbase));
				cpabestbasetotal += cpabestbase;
				count += 1;
				$scope.cpabeststr += ', "month' + (i+1).toString() + '":' + round(cpabestbase,2);
			}
			$scope.cpabeststr += ', "total":' + round((cpabestbasetotal/count),2) + '}';
			$scope.cpabesttotal = round((cpabestbasetotal/count),2);
			
			var cpaexpectedbase = $scope.cpa;
			var cpaexpectedbasetotal = 0;
			$scope.cpaexpectedjsonchart.push(round((cpaexpectedbase),2));
			var count = 0;
			$scope.cpaexpectedstr = '{' + '"name": "CPA Expected", "current":' + round(cpaexpectedbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpaexpectedbase = cpaexpectedbase + (cpaexpectedbase * $scope.getCPAYesTotalExpectedFactor());
				$scope.cpaexpectedjsonchart.push(round((cpaexpectedbase),2));
				$scope.cpaexpectedjson.push((cpaexpectedbase));
				cpaexpectedbasetotal += cpaexpectedbase;
				count += 1;
				$scope.cpaexpectedstr += ', "month' + (i+1).toString() + '":' + round(cpaexpectedbase,2);
			}		
			$scope.cpaexpectedstr += ', "total":' + round((cpaexpectedbasetotal/count),2) + '}';
			$scope.cpaexpectedtotal = round((cpaexpectedbasetotal/count),2);
			
			var cpaworstbase = $scope.cpa;
			var cpaworstbasetotal = 0;
			$scope.cpaworstjsonchart.push(round(cpaworstbase,2));
			var count = 0;
			$scope.cpaworststr = '{' + '"name": "CPA Worst", "current":' + round(cpaworstbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpaworstbase = cpaworstbase + (cpaworstbase * $scope.getCPAYesTotalWorstFactor());
				$scope.cpaworstjsonchart.push(round(cpaworstbase,2));
				$scope.cpaworstjson.push((cpaworstbase));
				cpaworstbasetotal += cpaworstbase;
				count += 1;
				$scope.cpaworststr += ', "month' + (i+1).toString() + '":' + round(cpaworstbase,2);
			}
			$scope.cpaworststr += ', "total":' + round((cpaworstbasetotal/count),2) + '}';
			$scope.cpaworsttotal = round((cpaworstbasetotal/count),2);
			
			var cpaallbase = $scope.cpa;
			var cpaallbasetotal = 0;
			var count = 0;
			$scope.cpaallstr = '{' + '"name": "CPA All Options", "current":' + round(cpaallbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpaallbase = cpaallbase + (cpaallbase * $scope.getCPAAllBestFactor());
				$scope.cpaalljson.push((cpaallbase));
				cpaallbasetotal += cpaallbase;
				count += 1;
				$scope.cpaallstr += ', "month' + (i+1).toString() + '":' + round(cpaallbase,2);
			}		
			$scope.cpaallstr += ', "total":' + round((cpaallbasetotal/count),2) + '}';
			$scope.cpaalltotal = round((cpaallbasetotal/count),2);

			$scope.cpajson = [];
			$scope.cpajson.push(JSON.parse($scope.cpabeststr));
			$scope.cpajson.push(JSON.parse($scope.cpaexpectedstr));
			$scope.cpajson.push(JSON.parse($scope.cpaworststr));
			$scope.cpajson.push(JSON.parse($scope.cpaallstr));			

			
			//Projected Numbers (BUDGET)
			var budgetbestbase = $scope.monthlyadspend;
			var budgetbestbasetotal = 0;
			$scope.budgetbestjsonchart.push(round($scope.monthlyadspend,2));
			var count = 0;
			$scope.budgetbeststr = '{' + '"name": "Budget Best", "current":' + round(budgetbestbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetbestbase = $scope.salesbestjson[i] * $scope.cpabestjson[i];
				$scope.budgetbestjson.push((budgetbestbase));
				$scope.budgetbestjsonchart.push(round(budgetbestbase,2));
				budgetbestbasetotal += budgetbestbase;
				count += 1;
				$scope.budgetbeststr += ', "month' + (i+1).toString() + '":' + round(budgetbestbase,2);
			}
			$scope.budgetbeststr += ', "total":' + round((budgetbestbasetotal/count),2) + '}';
			$scope.budgetbesttotal = round((budgetbestbasetotal/count),2);
			
			var budgetexpectedbase = $scope.monthlyadspend;
			var budgetexpectedbasetotal = 0;
			$scope.budgetexpectedjsonchart.push(round($scope.monthlyadspend,2));
			var count = 0;
			$scope.budgetexpectedstr = '{' + '"name": "Budget Expected", "current":' + round(budgetexpectedbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetexpectedbase = $scope.salesexpectedjson[i] * $scope.cpaexpectedjson[i];
				$scope.budgetexpectedjson.push((budgetexpectedbase));
				$scope.budgetexpectedjsonchart.push(round(budgetexpectedbase,2));
				budgetexpectedbasetotal += budgetexpectedbase;
				count += 1;
				$scope.budgetexpectedstr += ', "month' + (i+1).toString() + '":' + round(budgetexpectedbase,2);
			}
			$scope.budgetexpectedstr += ', "total":' + round((budgetexpectedbasetotal/count),2) + '}';
			$scope.budgetexpectedtotal = round((budgetexpectedbasetotal/count),2);
			
			var budgetworstbase = $scope.monthlyadspend;
			var budgetworstbasetotal = 0;
			$scope.budgetworstjsonchart.push(round($scope.monthlyadspend,2));
			var count = 0;
			$scope.budgetworststr = '{' + '"name": "Budget Worst", "current":' + round(budgetworstbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetworstbase = $scope.salesworstjson[i] * $scope.cpaworstjson[i];
				$scope.budgetworstjson.push((budgetworstbase));
				$scope.budgetworstjsonchart.push(round(budgetworstbase,2));
				budgetworstbasetotal += budgetworstbase;
				count += 1;
				$scope.budgetworststr += ', "month' + (i+1).toString() + '":' + round(budgetworstbase,2);
			}
			$scope.budgetworststr += ', "total":' + round((budgetworstbasetotal/count),2) + '}';
			$scope.budgetworsttotal = round((budgetworstbasetotal/count),2);
			
			var budgetallbase = $scope.monthlyadspend;
			var budgetallbasetotal = 0;
			var count = 0;
			$scope.budgetallstr = '{' + '"name": "Budget All Options", "current":' + round(budgetallbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetallbase = $scope.salesalljson[i] * $scope.cpaalljson[i];
				$scope.budgetalljson.push((budgetallbase));
				budgetallbasetotal += budgetallbase;
				count += 1;
				$scope.budgetallstr += ', "month' + (i+1).toString() + '":' + round(budgetallbase,2);
			}
			$scope.budgetallstr += ', "total":' + round((budgetallbasetotal/count),2) + '}';
			$scope.budgetalltotal = round((budgetallbasetotal/count),2);
			
			$scope.budgetjson = [];
			$scope.budgetjson.push(JSON.parse($scope.budgetbeststr));
			$scope.budgetjson.push(JSON.parse($scope.budgetexpectedstr));
			$scope.budgetjson.push(JSON.parse($scope.budgetworststr));
			$scope.budgetjson.push(JSON.parse($scope.budgetallstr));			
		});
		
		optimizeapp.filter('percentage', ['$filter', function ($filter) {
		  return function (input, decimals, postpend) {
			 if(postpend){
				return $filter('number')(input * 100, decimals) + postpend;
			 }else{
				 return $filter('number')(input * 100, decimals);
			 }
		  };
		}]);	
	</script>		
</body>
</html>	