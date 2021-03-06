var roiapp = angular.module('myCalcApp', ['ngAnimate']);
roiapp.controller("myCalcCtrl", function($scope) {
	$scope.months = 12;
	$scope.roicpa = 20;
	$scope.roimonthlysales = 150;
	$scope.roiaveordervalue = 65.78;
	$scope.roimonthlyadspend = 6000;		
	$scope.options = [
		{mod:'Correct Pixel Implementation',metric:'CPA',needed:false,best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
		{mod:'DPA (Dynamic Product Ads)',metric:'Sales',needed:false,best:20,expected:10,worst:5,timeframeb:6,timeframee:12,timeframew:18},
		{mod:'Naming Convention',metric:'CPA',needed:false,best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
		{mod:'Daily optimizations',metric:'Sales',needed:false,best:10,expected:5,worst:2,timeframeb:6,timeframee:12,timeframew:18},
		{mod:'Dedicated person running accounts',metric:'Sales',needed:false,best:30,expected:20,worst:10,timeframeb:6,timeframee:12,timeframew:18}
	];
	$scope.orig = angular.copy($scope.options);
	$scope.reset = function() {
		$scope.options = angular.copy($scope.orig);
	}
	
	$scope.CalculateROI = function() {
		$scope.optionsstr = JSON.stringify($scope.options);
	}
	
});

var cubeculator = angular.module('myCubaticaApp', ['ngAnimate']);
cubeculator.controller("myCubaticaCtrl", function($scope) {
	$scope.months = 12;
	$scope.roicpa = 20;
	$scope.roimonthlysales = 150;
	$scope.roiaveordervalue = 65.78;
	$scope.roimonthlyadspend = 6000;		
	$scope.options = [
		{id:0,title:'Does your website have pixels in place? Are they optimized?',info:'Pixels are a bit of code you insert into your website that helps you collect data about people who have interacted with your pages through the ads. To learn more about pixels, write to us at help@cubatica.com and let us know you\'d like to learn more about proper pixel set up.',mod:'Correct Pixel Implementation',metric:'CPA',needed:[{id:0,label:'Yes',answer:false},{id:1,label:'No',answer:false},{id:2,label:'Maybe',answer:false},{id:3,label:'What is a pixel',answer:false}],best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
		{id:1,title:'Are you using DPA(dynamic product ads)?',info:'Place text here for more information',mod:'DPA (Dynamic Product Ads)',metric:'Sales',needed:[{id:0,label:'Yes',answer:false},{id:1,label:'No',answer:false},{id:2,label:'Maybe',answer:false},{id:3,label:'I\'m not sure what that is',answer:false}],best:20,expected:10,worst:5,timeframeb:6,timeframee:12,timeframew:18},
		{id:2,title:'Did you organize your campaign with a Naming Convention?',info:'A naming convention is a way to organize your ads and ad sets by name, so you can quickly identify which ads are making you money, and which are draining your money.',mod:'Naming Convention',metric:'CPA',needed:[{id:0,label:'Yes',answer:false},{id:1,label:'No',answer:false},{id:2,label:'Maybe',answer:false},{id:3,label:'I call mine "Jim"',answer:false}],best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
		{id:3,title:'Are you observing and optimizing your ads daily?',info:'It\'s important to check your ad sets daily to see which ones are performing and which ones aren\'t.',mod:'Daily optimizations',metric:'Sales',needed:[{id:0,label:'Yes',answer:false},{id:1,label:'No',answer:false},{id:2,label:'Maybe',answer:false},{id:3,label:'I\'m supposed to optimize?',answer:false}],best:10,expected:5,worst:2,timeframeb:6,timeframee:12,timeframew:18},
		{id:4,title:'Dedicated Person Running Accounts',info:'Place text here for more information',mod:'Dedicated person running accounts',metric:'Sales',needed:[{id:0,label:'Yes',answer:false},{id:1,label:'No',answer:false},{id:2,label:'Maybe',answer:false},{id:3,label:'I\'m pretty dedicated',answer:false}],best:30,expected:20,worst:10,timeframeb:6,timeframee:12,timeframew:18}		

	];
	$scope.orig = angular.copy($scope.options);
	$scope.reset = function() {
		$scope.options = angular.copy($scope.orig);
	}
	
	$scope.CalculateROI = function() {
		$scope.optionsstr = JSON.stringify($scope.options);
	}
	
});

var app = angular.module('myApp', ['ngAnimate']);
	app.controller("myCtrl", function($scope) {
		$scope.options = [
			{mod:'Correct Pixel Implementation',metric:'CPA',needed:0,best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
			{mod:'DPA (Dynamic Product Ads)',metric:'Sales',needed:0,best:20,expected:10,worst:5,timeframeb:6,timeframee:12,timeframew:18},
			{mod:'Naming Convention',metric:'CPA',needed:0,best:-5,expected:-2,worst:-1,timeframeb:6,timeframee:12,timeframew:18},
			{mod:'Daily optimizations',metric:'Sales',needed:0,best:10,expected:5,worst:2,timeframeb:6,timeframee:12,timeframew:18},
			{mod:'Dedicated person running accounts',metric:'Sales',needed:0,best:30,expected:20,worst:10,timeframeb:6,timeframee:12,timeframew:18}		
		];
		$scope.orig = angular.copy($scope.options);
		$scope.visible = true;
		$scope.months = 12;
		$scope.cpa = 20;
		$scope.monthlysales = 150;
		$scope.aveordervalue = 65.78;
		$scope.monthlyadspend = 6000;
		$scope.estimatednewspend = function() { $scope.estimatedcurrentspend = $scope.cpa * $scope.monthlysales; return $scope.estimatedcurrentspend};
		$scope.newroa = function() { $scope.currentroa =  $scope.estimatedcurrentgross / $scope.monthlyadspend; return $scope.currentroa};
		$scope.estimatednewgross = function() { $scope.estimatedcurrentgross = $scope.monthlysales * $scope.aveordervalue; return $scope.estimatedcurrentgross};
		
		$scope.reset = function() {
			$scope.options = angular.copy($scope.orig);
			$scope.newoptions = [];
			$scope.newoptionssalesyes = [];
			$scope.newoptionssalesall = [];
			$scope.newoptionscpayes = [];
			$scope.newoptionscpaall = [];
			$scope.salesjson = [];
			$scope.salesbestjson = [];
			$scope.salesexpectedjson = [];
			$scope.salesworstjson = [];
			$scope.salesalljson = [];
			$scope.grossprofitjson = [];
			$scope.grossprofitbestjson = [];
			$scope.grossprofitexpectedjson = [];
			$scope.grossprofitworstjson = [];
			$scope.grossprofitalljson = [];
			$scope.roajson = [];
			$scope.roabestjson = [];
			$scope.roaexpectedjson = [];
			$scope.roaworstjson = [];
			$scope.roaalljson = [];
			$scope.cpajson = [];
			$scope.cpabestjson = [];
			$scope.cpaexpectedjson = [];
			$scope.cpaworstjson = [];
			$scope.cpaalljson = [];
			$scope.budgetjson = [];
			$scope.budgetbestjson = [];
			$scope.budgetexpectedjson = [];
			$scope.budgetworstjson = [];
			$scope.budgetalljson = [];
			$scope.visible = true;			
		};
		
 		$scope.update = function (){
			$scope.newoptions = [];
			$scope.newoptionssalesyes = [];
			$scope.newoptionssalesall = [];
			$scope.newoptionscpayes = [];
			$scope.newoptionscpaall = [];

			$scope.salesjson = [];
			$scope.salesbestjson = [];
			$scope.salesexpectedjson = [];
			$scope.salesworstjson = [];
			$scope.salesalljson = [];
			$scope.grossprofitjson = [];
			$scope.grossprofitbestjson = [];
			$scope.grossprofitexpectedjson = [];
			$scope.grossprofitworstjson = [];
			$scope.grossprofitalljson = [];
			$scope.roajson = [];
			$scope.roabestjson = [];
			$scope.roaexpectedjson = [];
			$scope.roaworstjson = [];
			$scope.roaalljson = [];
			$scope.cpajson = [];
			$scope.cpabestjson = [];
			$scope.cpaexpectedjson = [];
			$scope.cpaworstjson = [];
			$scope.cpaalljson = [];
			$scope.budgetjson = [];
			$scope.budgetbestjson = [];
			$scope.budgetexpectedjson = [];
			$scope.budgetworstjson = [];
			$scope.budgetalljson = [];			

			angular.forEach($scope.options, function (value, key) {
				if (value.metric=='Sales'){
					if (value.needed==1){
						$scope.newoptionssalesyes.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}
					$scope.newoptionssalesall.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
				} else if (value.metric=='CPA'){
					if (value.needed==1){
						$scope.newoptionscpayes.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}					
					$scope.newoptionscpaall.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
				}
				
                $scope.newoptions.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
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
			for (i = 0; i < $scope.months; i++){
				salesbestbase = salesbestbase + (salesbestbase * $scope.getSalesYesTotalBestFactor());
				$scope.salesbestjson.push(salesbestbase);
				salesbestbasetotal += salesbestbase;
				$scope.salesbeststr += ', "month' + (i+1).toString() + '":' + round(salesbestbase,0);
			}
			$scope.salesbeststr += ', "total":' + round((salesbestbasetotal),0) + '}';
			
			var salesexpectedbase = $scope.monthlysales;
			var salesexpectedbasetotal = 0;
			$scope.salesexpectedstr = '{' + '"name": "Sales Expected", "current":' + round(salesexpectedbase,0) + '';
			for (i = 0; i < $scope.months; i++){
				salesexpectedbase = salesexpectedbase + (salesexpectedbase * $scope.getSalesYesTotalExpectedFactor());
				$scope.salesexpectedjson.push(salesexpectedbase);
				salesexpectedbasetotal += salesexpectedbase;
				$scope.salesexpectedstr += ', "month' + (i+1).toString() + '":' + round(salesexpectedbase,0);
			}		
			$scope.salesexpectedstr += ', "total":' + round((salesexpectedbasetotal),0) + '}';
			
			var salesworstbase = $scope.monthlysales;
			var salesworstbasetotal = 0;
			$scope.salesworststr = '{' + '"name": "Sales Worst", "current":' + round(salesworstbase,0) + '';
			for (i = 0; i < $scope.months; i++){
				salesworstbase = salesworstbase + (salesworstbase * $scope.getSalesYesTotalWorstFactor());
				$scope.salesworstjson.push(salesworstbase);
				salesworstbasetotal += salesworstbase;
				$scope.salesworststr += ', "month' + (i+1).toString() + '":' + round(salesworstbase,0);
			}
			$scope.salesworststr += ', "total":' + round((salesworstbasetotal),0) + '}';
			
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
			
			$scope.salesjson = [];
			$scope.salesjson.push(JSON.parse($scope.salesbeststr));
			$scope.salesjson.push(JSON.parse($scope.salesexpectedstr));
			$scope.salesjson.push(JSON.parse($scope.salesworststr));
			$scope.salesjson.push(JSON.parse($scope.salesallstr));
			
			
			//Projected Numbers (Gross Profit)
			var grossprofitbestbase = 0;
			var grossprofitbestbasetotal = 0;
			var count = 0;
			$scope.grossprofitbeststr = '{' + '"name": "Gross Profit Best", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitbestbase = $scope.salesbestjson[i] * $scope.aveordervalue;
				grossprofitbestbasetotal += grossprofitbestbase;
				$scope.grossprofitbestjson.push(grossprofitbestbase);
				$scope.grossprofitbeststr += ', "month' + (i+1).toString() + '":' + round(grossprofitbestbase,2);
			}			
			$scope.grossprofitbeststr += ', "total":' + round((grossprofitbestbasetotal),2) + '}';
			
			var grossprofitexpectedbase = 0;
			var grossprofitexpectedbasetotal = 0;
			var count = 0;
			$scope.grossprofitexpectedstr = '{' + '"name": "Gross Profit Expected", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitexpectedbase = $scope.salesexpectedjson[i] * $scope.aveordervalue;
				grossprofitexpectedbasetotal += grossprofitexpectedbase;
				$scope.grossprofitexpectedjson.push(grossprofitexpectedbase);
				$scope.grossprofitexpectedstr += ', "month' + (i+1).toString() + '":' + round(grossprofitexpectedbase,2);
			}			
			$scope.grossprofitexpectedstr += ', "total":' + round((grossprofitexpectedbasetotal),2) + '}';

			var grossprofitworstbase = 0;
			var grossprofitworstbasetotal = 0;
			var count = 0;
			$scope.grossprofitworststr = '{' + '"name": "Gross Profit Worst", "current":' + round(($scope.monthlysales * $scope.aveordervalue),2) + '';
			for (i = 0; i < $scope.months; i++){
				grossprofitworstbase = $scope.salesworstjson[i] * $scope.aveordervalue;
				grossprofitworstbasetotal += grossprofitworstbase;
				$scope.grossprofitworstjson.push(grossprofitworstbase);
				$scope.grossprofitworststr += ', "month' + (i+1).toString() + '":' + round(grossprofitworstbase,2);
			}			
			$scope.grossprofitworststr += ', "total":' + round((grossprofitworstbasetotal),2) + '}';
			
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

			$scope.grossprofitjson = [];
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitbeststr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitexpectedstr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitworststr));
			$scope.grossprofitjson.push(JSON.parse($scope.grossprofitallstr));


			//Projected Numbers (ROA)
			var roabestbase = 0;
			var roabestbasetotal = 0;
			var count = 0;
			$scope.roabeststr = '{' + '"name": "ROA Best", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roabestbase = $scope.grossprofitbestjson[i] / $scope.monthlyadspend;
				roabestbasetotal += roabestbase;
				$scope.roabestjson.push(roabestbase);
				count += 1;
				$scope.roabeststr += ', "month' + (i+1).toString() + '":' + round((roabestbase*100),2);
			}			
			$scope.roabeststr += ', "total":' + round(((roabestbasetotal*100)/ count),2) + '}';
			
			var roaexpectedbase = 0;
			var roaexpectedbasetotal = 0;
			var count = 0;
			$scope.roaexpectedstr = '{' + '"name": "ROA Expected", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roaexpectedbase = $scope.grossprofitexpectedjson[i] / $scope.monthlyadspend;
				roaexpectedbasetotal += roaexpectedbase;
				$scope.roaexpectedjson.push(roaexpectedbase);
				count += 1;
				$scope.roaexpectedstr += ', "month' + (i+1).toString() + '":' + round((roaexpectedbase*100),2);
			}			
			$scope.roaexpectedstr += ', "total":' + round(((roaexpectedbasetotal*100)/ count),2) + '}';
			
			var roaworstbase = 0;
			var roaworstbasetotal = 0;
			var count = 0;
			$scope.roaworststr = '{' + '"name": "ROA Worst", "current":' + round((($scope.estimatedcurrentgross / $scope.monthlyadspend)*100),2) + '';
			for (i = 0; i < $scope.months; i++){
				roaworstbase = $scope.grossprofitworstjson[i] / $scope.monthlyadspend;
				roaworstbasetotal += roaworstbase;
				$scope.roaworstjson.push(roaworstbase);
				count += 1;
				$scope.roaworststr += ', "month' + (i+1).toString() + '":' + round((roaworstbase*100),2);
			}			
			$scope.roaworststr += ', "total":' + round(((roaworstbasetotal*100)/ count),2) + '}';
			
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

			$scope.roajson = [];
			$scope.roajson.push(JSON.parse($scope.roabeststr));
			$scope.roajson.push(JSON.parse($scope.roaexpectedstr));
			$scope.roajson.push(JSON.parse($scope.roaworststr));
			$scope.roajson.push(JSON.parse($scope.roaallstr));			
			
			//Projected Numbers (CPA)
			var cpabestbase = $scope.cpa;
			var cpabestbasetotal = 0;
			var count = 0;
			$scope.cpabeststr = '{' + '"name": "CPA Best", "current":' + round(cpabestbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpabestbase = cpabestbase + (cpabestbase * $scope.getCPAYesTotalBestFactor());
				$scope.cpabestjson.push((cpabestbase));
				cpabestbasetotal += cpabestbase;
				count += 1;
				$scope.cpabeststr += ', "month' + (i+1).toString() + '":' + round(cpabestbase,2);
			}
			$scope.cpabeststr += ', "total":' + round((cpabestbasetotal/count),2) + '}';
			
			var cpaexpectedbase = $scope.cpa;
			var cpaexpectedbasetotal = 0;
			var count = 0;
			$scope.cpaexpectedstr = '{' + '"name": "CPA Expected", "current":' + round(cpaexpectedbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpaexpectedbase = cpaexpectedbase + (cpaexpectedbase * $scope.getCPAYesTotalExpectedFactor());
				$scope.cpaexpectedjson.push((cpaexpectedbase));
				cpaexpectedbasetotal += cpaexpectedbase;
				count += 1;
				$scope.cpaexpectedstr += ', "month' + (i+1).toString() + '":' + round(cpaexpectedbase,2);
			}		
			$scope.cpaexpectedstr += ', "total":' + round((cpaexpectedbasetotal/count),2) + '}';
			
			var cpaworstbase = $scope.cpa;
			var cpaworstbasetotal = 0;
			var count = 0;
			$scope.cpaworststr = '{' + '"name": "CPA Worst", "current":' + round(cpaworstbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				cpaworstbase = cpaworstbase + (cpaworstbase * $scope.getCPAYesTotalWorstFactor());
				$scope.cpaworstjson.push((cpaworstbase));
				cpaworstbasetotal += cpaworstbase;
				count += 1;
				$scope.cpaworststr += ', "month' + (i+1).toString() + '":' + round(cpaworstbase,2);
			}
			$scope.cpaworststr += ', "total":' + round((cpaworstbasetotal/count),2) + '}';
			
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

			$scope.cpajson = [];
			$scope.cpajson.push(JSON.parse($scope.cpabeststr));
			$scope.cpajson.push(JSON.parse($scope.cpaexpectedstr));
			$scope.cpajson.push(JSON.parse($scope.cpaworststr));
			$scope.cpajson.push(JSON.parse($scope.cpaallstr));			

			
			//Projected Numbers (BUDGET)
			var budgetbestbase = $scope.monthlyadspend;
			var budgetbestbasetotal = 0;
			var count = 0;
			$scope.budgetbeststr = '{' + '"name": "Budget Best", "current":' + round(budgetbestbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetbestbase = $scope.salesbestjson[i] * $scope.cpabestjson[i];
				$scope.budgetbestjson.push((budgetbestbase));
				budgetbestbasetotal += budgetbestbase;
				count += 1;
				$scope.budgetbeststr += ', "month' + (i+1).toString() + '":' + round(budgetbestbase,2);
			}
			$scope.budgetbeststr += ', "total":' + round((budgetbestbasetotal/count),2) + '}';
			
			var budgetexpectedbase = $scope.monthlyadspend;
			var budgetexpectedbasetotal = 0;
			var count = 0;
			$scope.budgetexpectedstr = '{' + '"name": "Budget Expected", "current":' + round(budgetexpectedbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetexpectedbase = $scope.salesexpectedjson[i] * $scope.cpaexpectedjson[i];
				$scope.budgetexpectedjson.push((budgetexpectedbase));
				budgetexpectedbasetotal += budgetexpectedbase;
				count += 1;
				$scope.budgetexpectedstr += ', "month' + (i+1).toString() + '":' + round(budgetexpectedbase,2);
			}
			$scope.budgetexpectedstr += ', "total":' + round((budgetexpectedbasetotal/count),2) + '}';
			
			var budgetworstbase = $scope.monthlyadspend;
			var budgetworstbasetotal = 0;
			var count = 0;
			$scope.budgetworststr = '{' + '"name": "Budget Worst", "current":' + round(budgetworstbase,2) + '';
			for (i = 0; i < $scope.months; i++){
				budgetworstbase = $scope.salesworstjson[i] * $scope.cpaworstjson[i];
				$scope.budgetworstjson.push((budgetworstbase));
				budgetworstbasetotal += budgetworstbase;
				count += 1;
				$scope.budgetworststr += ', "month' + (i+1).toString() + '":' + round(budgetworstbase,2);
			}
			$scope.budgetworststr += ', "total":' + round((budgetworstbasetotal/count),2) + '}';
			
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
			
			$scope.budgetjson = [];
			$scope.budgetjson.push(JSON.parse($scope.budgetbeststr));
			$scope.budgetjson.push(JSON.parse($scope.budgetexpectedstr));
			$scope.budgetjson.push(JSON.parse($scope.budgetworststr));
			$scope.budgetjson.push(JSON.parse($scope.budgetallstr));

			$scope.visible = false;			
		}
	});

	app.filter('percentage', ['$filter', function ($filter) {
	  return function (input, decimals, postpend) {
		 if(postpend){
			return $filter('number')(input * 100, decimals) + postpend;
		 }else{
			 return $filter('number')(input * 100, decimals);
		 }
	  };
	}]);
	function round(value, precision) {
	  if (Number.isInteger(precision)) {
		var shift = Math.pow(10, precision);
		return Math.round(value * shift) / shift;
	  } else {
		return Math.round(value);
	  }
	}
	
/* 	webshims.setOptions('forms-ext', {
    replaceUI: 'auto',
    types: 'number'
	});
	webshims.polyfill('forms forms-ext'); */
	
$(function(){
    $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
		e.preventDefault()
		$('ul.nav li a[href="' + $(this).attr('href') + '"]').tab('show');
	})
 });
 
 $('.btn-option.open, .btn-close.open').click(function(){
   if($(this).text() == 'Hide Options'){
	   $('.showpanel').hide("slide", { direction: "right" }, 200);
	   $('.btn-option.open').text('More Options');
	   $('.btn-close.open').text('More Options');
   } else {
	   $('.showpanel').show("slide", { direction: "left" }, 200);
	   $('.btn-option.open').text('Hide Options');
	   $('.btn-close.open').text('Hide Options');	   
   }
});

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip(); 
});

$(document).ready(function(){ 
	var group = 1,current_group,next_group,groups;
	groups = $("div.result").length;
	
	$(".group-next").click(function(e){
		e.preventDefault();
		current_group = $(this).closest("div.result");
		next_group = $(this).closest("div.result").next();	
		next_group.show();
		current_group.hide();	
		$('html,body').animate({ scrollTop: 0 }, 400);
	});
	
	$(".group-previous").click(function(e){		
		e.preventDefault();
		current_group = $(this).closest("div.result");
		next_group = $(this).closest("div.result").prev();
		next_group.show();
		current_group.hide();
		$('html,body').animate({ scrollTop: 0 }, 400);
	});	
});

$(document).ready(function(){ 
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
		
	$(".next").click(function(){
		var form = $("#cube-culator");
		
		current_step = $(this).closest("fieldset");
		next_step = $(this).closest("fieldset").next();	
		
		form.validate({
			errorClass: "error_message_content",
			errorElement: "div",
			errorPlacement: function(error, element) {
				if($(element).attr('type') == 'radio'){
					error.appendTo( element.parent().parent().parent().find("div.option-header div.field_error div.error_message_outer") );
				} else{
					error.appendTo( element.parent("div.input-group").next("div.field_error") );
				}
			},
			rules: {
				fullname: "required",
				emailaddress: "required",
				cpa: "required",
				aveordervalue: "required",
				monthlysales: "required",
				monthlyadspend: "required",				
				response1: "required",
				response2: "required",
				response3: "required",
				response4: "required",
				response5: "required",
			},
			messages:{
				fullname: "This field is required. Please provide your full name",
				emailaddress: {
					required: "This field is required. Please provide your email address",
					email: "Please provide a valid email address (name@domain.com)",
				},
				cpa: "Please indicate your cost per acquisition",
				aveordervalue: "Please indicate your average order value",
				monthlysales: "Please indicate your monthly sales",
				monthlyadspend: "Please indicate your monthly ads spend",				
				response1: "Please answer this question...",
				response2: "Please answer this question...",
				response3: "Please answer this question...",
				response4: "Please answer this question...",
				response5: "Please answer this question...",
			},
			highlight: function(element, errorClass, validClass) {
				if($(element).attr('type') == 'radio'){
					$(element).closest('.radiogroup').addClass("has_error");
					$(element).closest('.option-item').addClass("invalid");
				} else{
					$(element).addClass('has_error');
					$(element).closest('.input-group').addClass("invalid");
				}
			},
			unhighlight: function(element, errorClass, validClass) {
				if($(element).attr('type') == 'radio'){
					$(element).closest('.radiogroup').removeClass("has_error");
					$(element).closest('.option-item').removeClass("invalid");
				} else{
					$(element).removeClass('has_error');
					$(element).closest('.input-group').removeClass("invalid");
				}
			},
			submitHandler: function(form) {
				form.submit();
			},		
		});
		
		if (form.valid() !== true){
			current_step.addClass("section_error");
			setInterval(function() {                
				 current_step.removeClass("section_error");
			}, 4000);
	
			if (current_step.attr('id') == 'contactdetail'){
				
			}else if (current_step.attr('id') == 'currentdata'){
				
			} else{
				
			}			
		} else {			
			next_step.show();
			current_step.hide();		
		}
	});
	
	$(".previous").click(function(){
		current_step = $(this).closest("fieldset");
		next_step = $(this).closest("fieldset").prev();
		next_step.show();
		current_step.hide();
	});
});