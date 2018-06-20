<!DOCTYPE html>
<html>
<head>
<title>ROI Calculator</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700,800" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
</head>

<body>

<div ng-app="myApp" ng-controller="myCtrl">

<h3>Current Situation Questions</h3>
<form>
<p>Cost Per Acquisition ($) <input type="number" ng-model="cpa"/></p>
<p>Monthly Sales <input type="number" ng-model="monthlysales"/></p>
<p>Average Order Value (AOV) ($) <input type="number" ng-model="aveordervalue"/></p>
<p>Monthly Ad Spend ($) <input type="number" ng-model="monthlyadspend"/></p>
<p>Estimated Current ROA (%) <span class="currentroa percentage">{{newroa() | percentage:2:'%'}}</span><input type="number" ng-model="currentroa" bound-model="newroa()" disabled /></p>
<p>Estimated Current Spend <span class="estimatedcurrentspend currency">{{estimatednewspend() | currency}}</span><input type="number" ng-model="estimatedcurrentspend" bound-model="estimatednewspend()" disabled /></p>
<p>Estimated Current Gross <span class="estimatedcurrentgross currency">{{estimatednewgross() | currency}}</span><input type="number" ng-model="estimatedcurrentgross" bound-model="estimatednewgross()" disabled /></p>
</form>
<h3>Options</h3>
<div class="table-responsive">
<table class="options">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in options">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input type="number" ng-model="x.best" step="0.01"/></td><td><input type="number" ng-model="x.expected" step="0.01"/></td><td><input type="number" ng-model="x.worst" step="0.01"/></td><td><input type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
</table>
</div>
<p><input type="button" id="btnreset" ng-click="reset()" value="Reset Options" /><input type="button" id="btnsubmit" ng-click="update()" value="Update Options" /></p>

<div ng-hide="visible">
<div class="hide">
<p>{{newoptions | json}}</p>
<p>{{newoptionssalesyes | json}}</p>
<p>{{newoptionssalesall | json}}</p>
<p>{{newoptionscpayes | json}}</p>
<p>{{newoptionscpaall | json}}</p>
</div>
<h3>Sales Data (Yes Only)</h3>
<div class="table-responsive">
<table class="optionssalesonly">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionssalesyes">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
	<tr><td colspan="3">TOTALS</td><td ng-model="SalesYesTotalBest">{{getSalesYesTotalBest()}}</td><td ng-model="SalesYesTotalExpected">{{getSalesYesTotalExpected()}}</td><td ng-model="SalesYesTotalWorst">{{getSalesYesTotalWorst()}}</td><td ng-model="SalesYesTotalTFBest">{{getSalesYesTotalTFBest()}}</td><td ng-model="SalesYesTotalTFExpected">{{getSalesYesTotalTFExpected()}}</td><td ng-model="SalesYesTotalTFWorst">{{getSalesYesTotalTFWorst()}}</td><td></td></tr>
	<tr class="hide"><td colspan="3">Factor</td><td ng-model="SalesYesTotalBestFactor">{{getSalesYesTotalBestFactor()}}</td><td ng-model="SalesYesTotalExpectedFactor">{{getSalesYesTotalExpectedFactor()}}</td><td ng-model="SalesYesTotalWorstFactor">{{getSalesYesTotalWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>
</table>
</div>

<h3>Sales Data (ALL)</h3>
<div class="table-responsive">
<table class="optionssalesall">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionssalesall">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
	<tr><td colspan="3">TOTALS</td><td ng-model="SalesAllBest">{{getSalesAllBest()}}</td><td ng-model="SalesAllExpected">{{getSalesAllExpected()}}</td><td ng-model="SalesAllWorst">{{getSalesAllWorst()}}</td><td ng-model="SalesAllTFBest">{{getSalesAllTFBest()}}</td><td ng-model="SalesAllTFExpected">{{getSalesAllTFExpected()}}</td><td ng-model="SalesAllTFWorst">{{getSalesAllTFWorst()}}</td><td></td></tr>
	<tr class="hide"><td colspan="3">Factor</td><td ng-model="SalesAllBestFactor">{{getSalesAllBestFactor()}}</td><td ng-model="SalesAllExpectedFactor">{{getSalesAllExpectedFactor()}}</td><td ng-model="SalesAllWorstFactor">{{getSalesAllWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>	
</table>
</div>
<h3>CPA Data (Yes Only)</h3>
<div class="table-responsive">
<table class="optionscpaonly">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionscpayes">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
	<tr><td colspan="3">TOTALS</td><td ng-model="CPAYesTotalBest">{{getCPAYesTotalBest()}}</td><td ng-model="CPAYesTotalExpected">{{getCPAYesTotalExpected()}}</td><td ng-model="CPAYesTotalWorst">{{getCPAYesTotalWorst()}}</td><td ng-model="CPAYesTotalTFBest">{{getCPAYesTotalTFBest()}}</td><td ng-model="CPAYesTotalTFExpected">{{getCPAYesTotalTFExpected()}}</td><td ng-model="CPAYesTotalTFWorst">{{getCPAYesTotalTFWorst()}}</td><td></td></tr>
	<tr class="hide"><td colspan="3">Factor</td><td ng-model="CPAYesTotalBestFactor">{{getCPAYesTotalBestFactor()}}</td><td ng-model="CPAYesTotalExpectedFactor">{{getCPAYesTotalExpectedFactor()}}</td><td ng-model="CPAYesTotalWorstFactor">{{getCPAYesTotalWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>	
</table>
</div>
<h3>CPA Data (ALL)</h3>
<div class="table-responsive">
<table class="optionscpaall">
<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
  <tr ng-repeat="x in newoptionscpaall">
  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:0, l:'N'}, {k:1,l:'Y'}]">
    </select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
	<tr><td colspan="3">TOTALS</td><td ng-model="CPAAllBest">{{getCPAAllBest()}}</td><td ng-model="CPAAllExpected">{{getCPAAllExpected()}}</td><td ng-model="CPAAllWorst">{{getCPAAllWorst()}}</td><td ng-model="CPAAllTFBest">{{getCPAAllTFBest()}}</td><td ng-model="CPAAllTFExpected">{{getCPAAllTFExpected()}}</td><td ng-model="CPAAllTFWorst">{{getCPAAllTFWorst()}}</td><td></td></tr>
	<tr class="hide"><td colspan="3">Factor</td><td ng-model="CPAAllBestFactor">{{getCPAAllBestFactor()}}</td><td ng-model="CPAAllExpectedFactor">{{getCPAAllExpectedFactor()}}</td><td ng-model="CPAAllWorstFactor">{{getCPAAllWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>		
</table>
</div>
<h3>Projected Numbers</h3>
<div>
<h4>Sales</h4>
<div class="hide">
<p>{{salesbestjson | json}}</p>
<p>{{salesexpectedjson | json}}</p>
<p>{{salesworstjson | json}}</p>
<p>{{salesalljson | json}}</p>
<h4>Sales String</h4>
<p>{{salesbeststr}}</p>
<p>{{salesexpectedstr}}</p>
<p>{{salesworststr}}</p>
<p>{{salesallstr}}</p>
<h4>Sales (Merged String to JSON)</h4>
</div>
<p><small>{{salesjson | json}}</small></p>
<div class="table-responsive">
<table class="salesjson">
	<tr>
		<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
	</tr>
	<tr ng-repeat="x in salesjson">
		<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current}}</td><td>{{x.month1}}</td><td>{{x.month2}}</td><td>{{x.month3}}</td><td>{{x.month4}}</td><td>{{x.month5}}</td><td>{{x.month6}}</td><td>{{x.month7}}</td><td>{{x.month8}}</td><td>{{x.month9}}</td><td>{{x.month10}}</td><td>{{x.month11}}</td><td>{{x.month12}}</td><td>{{x.total | number}}</td>
	</tr>
</table>
</div>
<h4>Gross Profit</h4>
<div class="hide">
<p>{{grossprofitbestjson | json}}</p>
<p>{{grossprofitexpectedjson | json}}</p>
<p>{{grossprofitworstjson | json}}</p>
<p>{{grossprofitalljson | json}}</p>
<h4>Gross Profit String</h4>
<p>{{grossprofitbeststr}}</p>
<p>{{grossprofitexpectedstr}}</p>
<p>{{grossprofitworststr}}</p>
<p>{{grossprofitallstr}}</p>
<h4>Gross Profit (Merged String to JSON)</h4>
</div>
<p><small>{{grossprofitjson | json}}</small></p>
<div class="table-responsive">
<table class="grossprofitjson">
	<tr>
		<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
	</tr>
	<tr ng-repeat="x in grossprofitjson">
		<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current | currency}}</td><td>{{x.month1 | currency}}</td><td>{{x.month2 | currency}}</td><td>{{x.month3 | currency}}</td><td>{{x.month4 | currency}}</td><td>{{x.month5 | currency}}</td><td>{{x.month6 | currency}}</td><td>{{x.month7 | currency}}</td><td>{{x.month8 | currency}}</td><td>{{x.month9 | currency}}</td><td>{{x.month10 | currency}}</td><td>{{x.month11 | currency}}</td><td>{{x.month12 | currency}}</td><td>{{x.total | currency}}</td>
	</tr>
</table>
</div>
<h4>ROA</h4>
<div class="hide">
<p>{{roabestjson | json}}</p>
<p>{{roaexpectedjson | json}}</p>
<p>{{roaworstjson | json}}</p>
<p>{{roaalljson | json}}</p>
<h4>ROA String</h4>
<p>{{roabeststr}}</p>
<p>{{roaexpectedstr}}</p>
<p>{{roaworststr}}</p>
<p>{{roaallstr}}</p>
<h4>ROA (Merged String to JSON)</h4>
</div>
<p><small>{{roajson | json}}</small></p>
<div class="table-responsive">
<table class="roajson">
	<tr>
		<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
	</tr>
	<tr ng-repeat="x in roajson">
		<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current/100 | percentage:2:'%'}}</td><td>{{x.month1/100 | percentage:2:'%'}}</td><td>{{x.month2/100 | percentage:2:'%'}}</td><td>{{x.month3/100 | percentage:2:'%'}}</td><td>{{x.month4/100 | percentage:2:'%'}}</td><td>{{x.month5/100 | percentage:2:'%'}}</td><td>{{x.month6/100 | percentage:2:'%'}}</td><td>{{x.month7/100 | percentage:2:'%'}}</td><td>{{x.month8/100 | percentage:2:'%'}}</td><td>{{x.month9/100 | percentage:2:'%'}}</td><td>{{x.month10/100 | percentage:2:'%'}}</td><td>{{x.month11/100 | percentage:2:'%'}}</td><td>{{x.month12/100 | percentage:2:'%'}}</td><td>{{x.total/100 | percentage:2:'%'}}</td>
	</tr>
</table>
</div>
<h4>CPA</h4>
<div class="hide">
<p>{{cpabestjson | json}}</p>
<p>{{cpaexpectedjson | json}}</p>
<p>{{cpaworstjson | json}}</p>
<p>{{cpaalljson | json}}</p>
<h4>CPA String</h4>
<p>{{cpabeststr}}</p>
<p>{{cpaexpectedstr}}</p>
<p>{{cpaworststr}}</p>
<p>{{cpaallstr}}</p>
<h4>CPA (Merged String to JSON)</h4>
</div>
<p><small>{{cpajson | json}}</small></p>
<div class="table-responsive">
<table class="cpajson">
	<tr>
		<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
	</tr>
	<tr ng-repeat="x in cpajson">
		<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current | currency}}</td><td>{{x.month1 | currency}}</td><td>{{x.month2 | currency}}</td><td>{{x.month3 | currency}}</td><td>{{x.month4 | currency}}</td><td>{{x.month5 | currency}}</td><td>{{x.month6 | currency}}</td><td>{{x.month7 | currency}}</td><td>{{x.month8 | currency}}</td><td>{{x.month9 | currency}}</td><td>{{x.month10 | currency}}</td><td>{{x.month11 | currency}}</td><td>{{x.month12 | currency}}</td><td>{{x.total | currency}}</td>
	</tr>
</table>
</div>
<h4>Budget</h4>
<div class="hide">
<p>{{budgetbestjson | json}}</p>
<p>{{budgetexpectedjson | json}}</p>
<p>{{budgetworstjson | json}}</p>
<p>{{budgetalljson | json}}</p>
<h4>Budget String</h4>
<p>{{budgetbeststr}}</p>
<p>{{budgetexpectedstr}}</p>
<p>{{budgetworststr}}</p>
<p>{{budgetallstr}}</p>
<h4>Budget (Merged String to JSON)</h4>
</div>
<p><small>{{budgetjson | json}}</small></p>
<div class="table-responsive">
<table class="budgetjson">
	<tr>
		<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
	</tr>
	<tr ng-repeat="x in budgetjson">
		<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current | currency}}</td><td>{{x.month1 | currency}}</td><td>{{x.month2 | currency}}</td><td>{{x.month3 | currency}}</td><td>{{x.month4 | currency}}</td><td>{{x.month5 | currency}}</td><td>{{x.month6 | currency}}</td><td>{{x.month7 | currency}}</td><td>{{x.month8 | currency}}</td><td>{{x.month9 | currency}}</td><td>{{x.month10 | currency}}</td><td>{{x.month11 | currency}}</td><td>{{x.month12 | currency}}</td><td>{{x.total | currency}}</td>
	</tr>
</table>
</div>
</div>
</div>
</div>

<script src="js/angular.min.js" type='text/javascript'></script>
<script src="js/angular-animate.js" type='text/javascript'></script>
<script src="js/jquery-1.12.4.min.js" type='text/javascript'></script>
<script src="js/bootstrap.min.js" type='text/javascript'></script>
<script src="script/scripts.js" type='text/javascript'></script>
<script type='text/javascript'>
	
</script>
</body>
</html>