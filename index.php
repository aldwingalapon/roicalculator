<!DOCTYPE html>
<html>

<body>

<div ng-app="myApp" ng-controller="myCtrl">

<h3>Current Situation Questions</h3>
<form>
<p>Cost Per Acquisition ($) <input type="number" ng-model="cpa"/></p>
<p>Monthly Sales <input type="number" ng-model="monthlysales"/></p>
<p>Average Order Value (AOV) ($) <input type="number" ng-model="aveordervalue"/></p>
<p>Monthly Ad Spend ($) <input type="number" ng-model="monthlyadspend"/></p>
<p>Current ROA (%) <span class="currentroa">{{newroa() | percentage:2}}</span><input type="number" ng-model="currentroa" bound-model="newroa()" disabled /></p>
<p>Current Gross ($) <span class="currentgross">{{newgross()}}</span><input type="number" ng-model="currentgross" bound-model="newgross()" disabled /></p>
</form>
<h3>Options</h3>
<table class="options">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in options">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input type="number" ng-model="x.best" step="0.01"/></td><td><input type="number" ng-model="x.expected" step="0.01"/></td><td><input type="number" ng-model="x.worst" step="0.01"/></td><td><input type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
<input type="button" id="btnsubmit" ng-click="update()" value="Update Options" />


<p>{{newoptions | json}}</p>
<p>{{newoptionssalesyes | json}}</p>
<p>{{newoptionssalesall | json}}</p>
<p>{{newoptionscpayes | json}}</p>
<p>{{newoptionscpaall | json}}</p>
<h3>Sales Data (Yes Only)</h3>
<table class="optionssalesonly">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionssalesyes">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
<h3>Sales Data (ALL)</h3>
<table class="optionssalesall">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionssalesall">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
<h3>CPA Data (Yes Only)</h3>
<table class="optionscpaonly">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionscpayes">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
<h3>CPA Data (ALL)</h3>
<table class="optionscpaall">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionscpaall">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
</div>

<script src="js/angular.min.js" type='text/javascript'></script>
<script src="js/jquery-1.12.4.min.js" type='text/javascript'></script>
<script src="js/bootstrap.min.js" type='text/javascript'></script>
<script type='text/javascript'>
	var app = angular.module('myApp', []);
	app.controller("myCtrl", function($scope) {
		$scope.options = [
			{mod:'Correct Pixel Implementation',metric:'CPA',needed:0,best:-0.05,expected:-0.02,worst:-0.01,timeframeb:12,timeframee:12,timeframew:12},
			{mod:'DPA (Dynamic Product Ads)',metric:'Sales',needed:0,best:0.2,expected:0.1,worst:0.05,timeframeb:12,timeframee:12,timeframew:12},
			{mod:'Naming Convention',metric:'CPA',needed:0,best:-0.05,expected:-0.02,worst:-0.01,timeframeb:12,timeframee:12,timeframew:12},
			{mod:'Daily optimizations',metric:'Sales',needed:0,best:0.1,expected:0.05,worst:0.02,timeframeb:12,timeframee:12,timeframew:12},
			{mod:'Dedicated person running accounts',metric:'Sales',needed:0,best:0.3,expected:0.2,worst:0.1,timeframeb:12,timeframee:12,timeframew:12}
		];
		
		$scope.cpa = 20;
		$scope.monthlysales = 150;
		$scope.aveordervalue = 65.78;
		$scope.monthlyadspend = 6000;
		$scope.newgross = function() { $scope.currentgross = $scope.cpa * $scope.monthlysales; return $scope.currentgross};
		$scope.newroa = function() { $scope.currentroa = $scope.monthlyadspend / $scope.currentgross; return $scope.currentroa};

 		$scope.update = function (){
			$scope.newoptions = [];
			$scope.newoptionssalesyes = [];
			$scope.newoptionssalesall = [];
			$scope.newoptionscpayes = [];
			$scope.newoptionscpaall = [];
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
		}
	});

	app.filter('percentage', ['$filter', function ($filter) {
	  return function (input, decimals) {
		return $filter('number')(input * 100, decimals);
	  };
	}]);
</script>
</body>
</html>