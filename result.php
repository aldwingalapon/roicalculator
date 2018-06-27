<?php
	include 'includes/header.php';
?>

<div ng-app="myROIApp" ng-controller="myROICtrl">
	<div class="main-content result">
		<div class="content">
			<div class="sidebar">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a data-toggle="tab" href="#current">Current</a></li>
					<li><a data-toggle="tab" href="#sales">Projected Number Sales</a></li>
					<li><a data-toggle="tab" href="#profit">Gross Profit</a></li>
					<li><a data-toggle="tab" href="#roa">ROA</a></li>
					<li><a data-toggle="tab" href="#cpa">CPA</a></li>
					<li><a data-toggle="tab" href="#budget">Budget</a></li>
				</ul>
				
				<p class="btncalc"><a class="btn btn-reset" href="calculator.php" title="Calculate Again">Calculate Again</a></p>
			</div>
			<div class="main-view">
				<div class="row-fluid">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#current">Current</a></li>
						<li><a data-toggle="tab" href="#sales">Sales</a></li>
						<li><a data-toggle="tab" href="#profit">Gross Profit</a></li>
						<li><a data-toggle="tab" href="#roa">ROA</a></li>
						<li><a data-toggle="tab" href="#cpa">CPA</a></li>
						<li><a data-toggle="tab" href="#budget">Budget</a></li>
					</ul>
					<div class="col-md-12">				
						<div class="tab-content">
							<div id="current" class="tab-pane fade in active">
								<ul class="tab-content-header">
									<li class="gross"><span class="title">Estimated Current Gross</span><span class="value">{{estimatedcurrentgross | currency}}</span></li>
									<li class="spend"><span class="title">Estimated Current Spend</span><span class="value">{{estimatedcurrentspend | currency}}</span></li>
									<li class="roa"><span class="title">Estimated Current ROA</span><span class="value">{{currentroa | percentage:2:'%'}}</span></li>
								</ul>
							
							
								<h3>Current</h3>
								<div class="row-fluid">
									<div class="col-md-8">	
										<canvas id="myCurrentChart"></canvas>
									</div>
									<div class="col-md-4">	
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">
									<p><input type="number" ng-model="cpa" value="<?php echo $_POST['cpa'];?>"/><br>
									<input type="number" ng-model="monthlysales" value="<?php echo $_POST['monthlysales'];?>"/><br>
									<input type="number" ng-model="aveordervalue" value="<?php echo $_POST['aveordervalue'];?>"/><br>
									<input type="number" ng-model="monthlyadspend" value="<?php echo $_POST['monthlyadspend'];?>"/><br>
									<input type="hidden" ng-model="options" value="<?php echo $_POST['options'];?>"/><br>
									{{newoptions | json}}</p>

									<p>Estimated Current ROA (%) <span class="currentroa percentage">{{currentroa | percentage:2:'%'}}</span></p>
									<p>Estimated Current Spend <span class="estimatedcurrentspend currency">{{estimatedcurrentspend | currency}}</span></p>
									<p>Estimated Current Gross <span class="estimatedcurrentgross currency">{{estimatedcurrentgross | currency}}</span></p>
									
									<p>{{newoptionssalesyes | json}}</p>
									<p>{{newoptionssalesall | json}}</p>
									<p>{{newoptionscpayes | json}}</p>
									<p>{{newoptionscpaall | json}}</p>

									<h3>Sales Data (Yes Only)</h3>
									<div class="table-responsive">
									<table class="optionssalesonly">
									<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
									  <tr ng-repeat="x in newoptionssalesyes">
									  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:false, l:'N'}, {k:true, l:'Y'}]">
										</select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
										<tr><td colspan="3">TOTALS</td><td ng-model="SalesYesTotalBest">{{getSalesYesTotalBest()}}</td><td ng-model="SalesYesTotalExpected">{{getSalesYesTotalExpected()}}</td><td ng-model="SalesYesTotalWorst">{{getSalesYesTotalWorst()}}</td><td ng-model="SalesYesTotalTFBest">{{getSalesYesTotalTFBest()}}</td><td ng-model="SalesYesTotalTFExpected">{{getSalesYesTotalTFExpected()}}</td><td ng-model="SalesYesTotalTFWorst">{{getSalesYesTotalTFWorst()}}</td><td></td></tr>
										<tr class=""><td colspan="3">Factor</td><td ng-model="SalesYesTotalBestFactor">{{getSalesYesTotalBestFactor()}}</td><td ng-model="SalesYesTotalExpectedFactor">{{getSalesYesTotalExpectedFactor()}}</td><td ng-model="SalesYesTotalWorstFactor">{{getSalesYesTotalWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>
									</table>
									</div>

									<h3>Sales Data (ALL)</h3>
									<div class="table-responsive">
									<table class="optionssalesall">
									<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
									  <tr ng-repeat="x in newoptionssalesall">
									  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:false, l:'N'}, {k:true, l:'Y'}]">
										</select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
										<tr><td colspan="3">TOTALS</td><td ng-model="SalesAllBest">{{getSalesAllBest()}}</td><td ng-model="SalesAllExpected">{{getSalesAllExpected()}}</td><td ng-model="SalesAllWorst">{{getSalesAllWorst()}}</td><td ng-model="SalesAllTFBest">{{getSalesAllTFBest()}}</td><td ng-model="SalesAllTFExpected">{{getSalesAllTFExpected()}}</td><td ng-model="SalesAllTFWorst">{{getSalesAllTFWorst()}}</td><td></td></tr>
										<tr class=""><td colspan="3">Factor</td><td ng-model="SalesAllBestFactor">{{getSalesAllBestFactor()}}</td><td ng-model="SalesAllExpectedFactor">{{getSalesAllExpectedFactor()}}</td><td ng-model="SalesAllWorstFactor">{{getSalesAllWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>	
									</table>
									</div>
									<h3>CPA Data (Yes Only)</h3>
									<div class="table-responsive">
									<table class="optionscpaonly">
									<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
									  <tr ng-repeat="x in newoptionscpayes">
									  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:false, l:'N'}, {k:true, l:'Y'}]">
										</select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
										<tr><td colspan="3">TOTALS</td><td ng-model="CPAYesTotalBest">{{getCPAYesTotalBest()}}</td><td ng-model="CPAYesTotalExpected">{{getCPAYesTotalExpected()}}</td><td ng-model="CPAYesTotalWorst">{{getCPAYesTotalWorst()}}</td><td ng-model="CPAYesTotalTFBest">{{getCPAYesTotalTFBest()}}</td><td ng-model="CPAYesTotalTFExpected">{{getCPAYesTotalTFExpected()}}</td><td ng-model="CPAYesTotalTFWorst">{{getCPAYesTotalTFWorst()}}</td><td></td></tr>
										<tr class=""><td colspan="3">Factor</td><td ng-model="CPAYesTotalBestFactor">{{getCPAYesTotalBestFactor()}}</td><td ng-model="CPAYesTotalExpectedFactor">{{getCPAYesTotalExpectedFactor()}}</td><td ng-model="CPAYesTotalWorstFactor">{{getCPAYesTotalWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>	
									</table>
									</div>
									<h3>CPA Data (ALL)</h3>
									<div class="table-responsive">
									<table class="optionscpaall">
									<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best</th><th>Expected</th><th>Worst</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
									  <tr ng-repeat="x in newoptionscpaall">
									  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select disabled ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:false, l:'N'}, {k:true, l:'Y'}]">
										</select></td><td><input disabled type="number" ng-model="x.best" step="0.01"/></td><td><input disabled type="number" ng-model="x.expected" step="0.01"/></td><td><input disabled type="number" ng-model="x.worst" step="0.01"/></td><td><input disabled type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input disabled type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
										<tr><td colspan="3">TOTALS</td><td ng-model="CPAAllBest">{{getCPAAllBest()}}</td><td ng-model="CPAAllExpected">{{getCPAAllExpected()}}</td><td ng-model="CPAAllWorst">{{getCPAAllWorst()}}</td><td ng-model="CPAAllTFBest">{{getCPAAllTFBest()}}</td><td ng-model="CPAAllTFExpected">{{getCPAAllTFExpected()}}</td><td ng-model="CPAAllTFWorst">{{getCPAAllTFWorst()}}</td><td></td></tr>
										<tr class=""><td colspan="3">Factor</td><td ng-model="CPAAllBestFactor">{{getCPAAllBestFactor()}}</td><td ng-model="CPAAllExpectedFactor">{{getCPAAllExpectedFactor()}}</td><td ng-model="CPAAllWorstFactor">{{getCPAAllWorstFactor()}}</td><td></td><td></td><td></td><td></td></tr>		
									</table>
									</div>								
								</div>								
							</div>
							<div id="sales" class="tab-pane fade">
								<ul class="tab-content-header">
									<li class="best"><span class="title">Total Sales Best</span><span class="value">{{salesbesttotal | currency}}</span></li>
									<li class="expected"><span class="title">Total Sales Expected</span><span class="value">{{salesexpectedtotal | currency}}</span></li>
									<li class="worst"><span class="title">Total Sales Worst</span><span class="value">{{salesworsttotal | currency}}</span></li>
									<li class="all"><span class="title">Total Sales All Options</span><span class="value">{{salesalltotal | currency}}</span></li>
								</ul>		

								<h3>Projected Number Sales</h3>
								<div class="row-fluid">
									<div class="col-md-12">	
										<canvas id="mySalesChart"></canvas>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">
									<p>{{salesbestjson | json}}</p>
									<p>{{salesbestjsonchart | json}}</p>
									<p>{{salesexpectedjson | json}}</p>
									<p>{{salesexpectedjsonchart | json}}</p>
									<p>{{salesworstjson | json}}</p>
									<p>{{salesworstjsonchart | json}}</p>
									<p>{{salesalljson | json}}</p>
									<h4>Sales String</h4>
									<p>{{salesbeststr}}</p>
									<p>{{salesexpectedstr}}</p>
									<p>{{salesworststr}}</p>
									<p>{{salesallstr}}</p>
									<h4>Sales (Merged String to JSON)</h4>
									<p><small>{{salesjson | json}}</small></p>
									<div class="table-responsive">
									<table class="salesjson">
										<tr>
											<th>#</th><th>Name</th><th>Current</th><th>Month 1</th><th>Month 2</th><th>Month 3</th><th>Month 4</th><th>Month 5</th><th>Month 6</th><th>Month 7</th><th>Month 8</th><th>Month 9</th><th>Month 10</th><th>Month 11</th><th>Month 12</th><th>Total</th>
										</tr>
										<tr ng-repeat="x in salesjson">
											<td>{{$index + 1}}</td><td>{{x.name}}</td><td>{{x.current | currency}}</td><td>{{x.month1 | currency}}</td><td>{{x.month2 | currency}}</td><td>{{x.month3 | currency}}</td><td>{{x.month4 | currency}}</td><td>{{x.month5 | currency}}</td><td>{{x.month6 | currency}}</td><td>{{x.month7 | currency}}</td><td>{{x.month8 | currency}}</td><td>{{x.month9 | currency}}</td><td>{{x.month10 | currency}}</td><td>{{x.month11 | currency}}</td><td>{{x.month12 | currency}}</td><td>{{x.total | currency}}</td>
										</tr>
									</table>
									</div>		
								</div>									
							</div>
							<div id="profit" class="tab-pane fade">
								<ul class="tab-content-header">
									<li class="best"><span class="title">Gross Profit Best</span><span class="value">{{grossprofitbesttotal | currency}}</span></li>
									<li class="expected"><span class="title">Gross Profit Expected</span><span class="value">{{grossprofitexpectedtotal | currency}}</span></li>
									<li class="worst"><span class="title">Gross Profit Worst</span><span class="value">{{grossprofitworsttotal | currency}}</span></li>
									<li class="all"><span class="title">Gross Profit All Options</span><span class="value">{{grossprofitalltotal | currency}}</span></li>
								</ul>
								
								<h3>Gross Profit</h3>
								<div class="row-fluid">
									<div class="col-md-12">	
										<canvas id="myGrossProfitChart"></canvas>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">								
									<p>{{grossprofitbestjson | json}}</p>
									<p>{{grossprofitbestjsonchart | json}}</p>
									<p>{{grossprofitexpectedjson | json}}</p>
									<p>{{grossprofitexpectedjsonchart | json}}</p>
									<p>{{grossprofitworstjson | json}}</p>
									<p>{{grossprofitworstjsonchart | json}}</p>
									<p>{{grossprofitalljson | json}}</p>
									<h4>Gross Profit String</h4>
									<p>{{grossprofitbeststr}}</p>
									<p>{{grossprofitexpectedstr}}</p>
									<p>{{grossprofitworststr}}</p>
									<p>{{grossprofitallstr}}</p>
									<h4>Gross Profit (Merged String to JSON)</h4>
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
								</div>
							</div>
							<div id="roa" class="tab-pane fade">
								<ul class="tab-content-header">
									<li class="best"><span class="title">Ave. ROA Best</span><span class="value">{{roabesttotal/100 | percentage:2:'%'}}</span></li>
									<li class="expected"><span class="title">Ave. ROA Expected</span><span class="value">{{roaexpectedtotal/100 | percentage:2:'%'}}</span></li>
									<li class="worst"><span class="title">Ave. ROA Worst</span><span class="value">{{roaworsttotal/100 | percentage:2:'%'}}</span></li>
									<li class="all"><span class="title">Ave. ROA All Options</span><span class="value">{{roaalltotal/100 | percentage:2:'%'}}</span></li>
								</ul>
								
								<h3>ROA</h3>
								<div class="row-fluid">
									<div class="col-md-12">	
										<canvas id="myROAChart"></canvas>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">								
									<p>{{roabestjson | json}}</p>
									<p>{{roabestjsonchart | json}}</p>
									<p>{{roaexpectedjson | json}}</p>
									<p>{{roaexpectedjsonchart | json}}</p>
									<p>{{roaworstjson | json}}</p>
									<p>{{roaworstjsonchart | json}}</p>
									<p>{{roaalljson | json}}</p>
									<h4>ROA String</h4>
									<p>{{roabeststr}}</p>
									<p>{{roaexpectedstr}}</p>
									<p>{{roaworststr}}</p>
									<p>{{roaallstr}}</p>
									<h4>ROA (Merged String to JSON)</h4>
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
								</div>
							</div>
							<div id="cpa" class="tab-pane fade">
								<ul class="tab-content-header">
									<li class="best"><span class="title">Ave. CPA Best</span><span class="value">{{cpabesttotal | currency}}</span></li>
									<li class="expected"><span class="title">Ave. CPA Expected</span><span class="value">{{cpaexpectedtotal | currency}}</span></li>
									<li class="worst"><span class="title">Ave. CPA Worst</span><span class="value">{{cpaworsttotal | currency}}</span></li>
									<li class="all"><span class="title">Ave. CPA All Options</span><span class="value">{{cpaalltotal | currency}}</span></li>
								</ul>
								
								<h3>CPA</h3>
								<div class="row-fluid">
									<div class="col-md-12">	
										<canvas id="myCPAChart"></canvas>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">								
									<p>{{cpabestjson | json}}</p>
									<p>{{cpabestjsonchart | json}}</p>
									<p>{{cpaexpectedjson | json}}</p>
									<p>{{cpaexpectedjsonchart | json}}</p>
									<p>{{cpaworstjson | json}}</p>
									<p>{{cpaworstjsonchart | json}}</p>
									<p>{{cpaalljson | json}}</p>
									<h4>CPA String</h4>
									<p>{{cpabeststr}}</p>
									<p>{{cpaexpectedstr}}</p>
									<p>{{cpaworststr}}</p>
									<p>{{cpaallstr}}</p>
									<h4>CPA (Merged String to JSON)</h4>
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
								</div>
							</div>
							<div id="budget" class="tab-pane fade">
								<ul class="tab-content-header">
									<li class="best"><span class="title">Ave. Budget Best</span><span class="value">{{budgetbesttotal | currency}}</span></li>
									<li class="expected"><span class="title">Ave. Budget Expected</span><span class="value">{{budgetexpectedtotal | currency}}</span></li>
									<li class="worst"><span class="title">Ave. Budget Worst</span><span class="value">{{budgetworsttotal | currency}}</span></li>
									<li class="all"><span class="title">Ave. Budget All Options</span><span class="value">{{budgetalltotal | currency}}</span></li>
								</ul>
								
								<h3>Budget</h3>
								<div class="row-fluid">
									<div class="col-md-12">	
										<canvas id="myBudgetChart"></canvas>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								
								<div class="hide">								
									<p>{{budgetbestjson | json}}</p>
									<p>{{budgetbestjsonchart | json}}</p>
									<p>{{budgetexpectedjson | json}}</p>
									<p>{{budgetexpectedjsonchart | json}}</p>
									<p>{{budgetworstjson | json}}</p>
									<p>{{budgetworstjsonchart | json}}</p>
									<p>{{budgetalljson | json}}</p>
									<h4>Budget String</h4>
									<p>{{budgetbeststr}}</p>
									<p>{{budgetexpectedstr}}</p>
									<p>{{budgetworststr}}</p>
									<p>{{budgetallstr}}</p>
									<h4>Budget (Merged String to JSON)</h4>
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
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>

	<script src="js/angular.min.js" type='text/javascript'></script>
	<script src="js/angular-animate.js" type='text/javascript'></script>
	<script src="js/jquery-1.12.4.min.js" type='text/javascript'></script>
	<script src="js/jquery-ui.min.js" type='text/javascript'></script>
	<script src="js/bootstrap.min.js" type='text/javascript'></script>
	<script src="js/chart.min.js" type='text/javascript'></script>
	<script src="script/scripts.js" type='text/javascript'></script>
	<script type='text/javascript'>
		var roiapp = angular.module('myROIApp', ['ngAnimate']);
		roiapp.controller("myROICtrl", function($scope) {
			$scope.months = 12;
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
					if (value.needed){
						$scope.newoptionssalesyes.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}
					$scope.newoptionssalesall.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
				} else if (value.metric=='CPA'){
					if (value.needed){
						$scope.newoptionscpayes.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
					}					
					$scope.newoptionscpaall.push({ mod: value.mod, metric: value.metric, needed: value.needed, best: value.best, expected: value.expected, worst: value.worst, timeframeb: value.timeframeb, timeframee: value.timeframee, timeframew: value.timeframew  });
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
			
			var currentctx = document.getElementById('myCurrentChart').getContext('2d');
			var green_blue_gradient = currentctx.createLinearGradient(0, 0, 0, 300);
				green_blue_gradient.addColorStop(0, 'rgb(114,254,58)');
				green_blue_gradient.addColorStop(1, 'rgb(45,169,224)');
			var pink_blue_gradient = currentctx.createLinearGradient(0, 0, 0, 200);
				pink_blue_gradient.addColorStop(0, 'rgb(252,109,110)');
				pink_blue_gradient.addColorStop(1, 'rgb(141,192,252)');
			var currentchart = new Chart(currentctx, {
				type: 'bar',
				data: {
					labels: ["ESTIMATED \nCURRENT GROSS", "ESTIMATED \nCURRENT SPEND"],
					datasets: [{
						backgroundColor: [green_blue_gradient, pink_blue_gradient],
						hoverBackgroundColor: [green_blue_gradient, pink_blue_gradient],
						data: [$scope.estimatedcurrentgross, $scope.estimatedcurrentspend],						
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								zeroLineColor: 'rgb(173,207,220)',
								display: false,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:true,
								callback: function(value, index, values) {return '$' + value;},		
								stepSize: 2000,
							},
							gridLines: {
								zeroLineColor: 'rgb(173,207,220)',
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]				
			});			

			var salesctx = document.getElementById('mySalesChart').getContext('2d');
			var saleschart = new Chart(salesctx, {
				type: 'line',
				data: {
					labels: ["Current", "Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6", "Month 7", "Month 8", "Month 9", "Month 10", "Month 11", "Month 12"],
					datasets: [{
						backgroundColor: '#33C853',
						borderColor: '#33C853',						
						data: $scope.salesbestjsonchart,	
						fill: false,
					},
					{
						backgroundColor: '#2DA9E0',
						borderColor: '#2DA9E0',									
						data: $scope.salesexpectedjsonchart,						
						fill: false,
					},
					{
						backgroundColor: '#DD4F81',
						borderColor: '#DD4F81',									
						data: $scope.salesworstjsonchart,						
						fill: false,
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								borderDash: [8, 4],
								color: "#92C0D8",
								display: true,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:true,
								callback: function(value, index, values) {return '$' + value;},		
							},
							gridLines: {
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]			
			});			

			var grossprofitctx = document.getElementById('myGrossProfitChart').getContext('2d');
			var grossprofitchart = new Chart(grossprofitctx, {
				type: 'line',
				data: {
					labels: ["Current", "Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6", "Month 7", "Month 8", "Month 9", "Month 10", "Month 11", "Month 12"],
					datasets: [{
						backgroundColor: '#33C853',
						borderColor: '#33C853',						
						data: $scope.grossprofitbestjsonchart,	
						fill: false,
					},
					{
						backgroundColor: '#2DA9E0',
						borderColor: '#2DA9E0',									
						data: $scope.grossprofitexpectedjsonchart,						
						fill: false,
					},
					{
						backgroundColor: '#DD4F81',
						borderColor: '#DD4F81',									
						data: $scope.grossprofitworstjsonchart,						
						fill: false,
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								borderDash: [8, 4],
								color: "#92C0D8",
								display: true,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:true,
								callback: function(value, index, values) {return '$' + value;},		
							},
							gridLines: {
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]			
			});	

			var roactx = document.getElementById('myROAChart').getContext('2d');
			var roachart = new Chart(roactx, {
				type: 'line',
				data: {
					labels: ["Current", "Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6", "Month 7", "Month 8", "Month 9", "Month 10", "Month 11", "Month 12"],
					datasets: [{
						backgroundColor: '#33C853',
						borderColor: '#33C853',						
						data: $scope.roabestjsonchart,	
						fill: false,
					},
					{
						backgroundColor: '#2DA9E0',
						borderColor: '#2DA9E0',									
						data: $scope.roaexpectedjsonchart,						
						fill: false,
					},
					{
						backgroundColor: '#DD4F81',
						borderColor: '#DD4F81',									
						data: $scope.roaworstjsonchart,						
						fill: false,
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								borderDash: [8, 4],
								color: "#92C0D8",
								display: true,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:true,
								callback: function(value, index, values) {return value + '%';},		
							},
							gridLines: {
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]			
			});	

			var cpactx = document.getElementById('myCPAChart').getContext('2d');
			var cpachart = new Chart(cpactx, {
				type: 'line',
				data: {
					labels: ["Current", "Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6", "Month 7", "Month 8", "Month 9", "Month 10", "Month 11", "Month 12"],
					datasets: [{
						backgroundColor: '#33C853',
						borderColor: '#33C853',						
						data: $scope.cpabestjsonchart,	
						fill: false,
					},
					{
						backgroundColor: '#2DA9E0',
						borderColor: '#2DA9E0',									
						data: $scope.cpaexpectedjsonchart,						
						fill: false,
					},
					{
						backgroundColor: '#DD4F81',
						borderColor: '#DD4F81',									
						data: $scope.cpaworstjsonchart,						
						fill: false,
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								borderDash: [8, 4],
								color: "#92C0D8",
								display: true,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:false,
								max: (Math.ceil($scope.cpaworsttotal / 10) * 10) + 4,
								min: (Math.ceil($scope.cpabesttotal / 10) * 10) - 10,
								callback: function(value, index, values) {return '$' + value;},		
							},
							gridLines: {
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]			
			});				
			
			var budgetctx = document.getElementById('myBudgetChart').getContext('2d');
			var budgetchart = new Chart(budgetctx, {
				type: 'line',
				data: {
					labels: ["Current", "Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6", "Month 7", "Month 8", "Month 9", "Month 10", "Month 11", "Month 12"],
					datasets: [{
						backgroundColor: '#33C853',
						borderColor: '#33C853',						
						data: $scope.budgetbestjsonchart,	
						fill: false,
					},
					{
						backgroundColor: '#2DA9E0',
						borderColor: '#2DA9E0',									
						data: $scope.budgetexpectedjsonchart,						
						fill: false,
					},
					{
						backgroundColor: '#DD4F81',
						borderColor: '#DD4F81',									
						data: $scope.budgetworstjsonchart,						
						fill: false,
					}]
				},
				options: {
					legend: {
								display: false,
							},
					scales: {
						xAxes: [{
							ticks:{
								fontFamily: 'Montserrat',
								fontSize: 12,
							},
							barPercentage: 0.5,
							categoryPercentage: 0.5,
							gridLines: {
								borderDash: [8, 4],
								color: "#92C0D8",
								display: true,
							},
						}],
						yAxes: [{
							ticks: {
								fontFamily: 'Montserrat',
								beginAtZero:true,
								callback: function(value, index, values) {return '$' + value;},		
							},
							gridLines: {
								display: false,
							},
						}]
					}
				},
				plugins: [{
					beforeInit: function (chart) {
						chart.data.labels.forEach(function (e, i, a) {
							if (/\n/.test(e)) {
							a[i] = e.split(/\n/)
							}
						})
					}
				}]			
			});			
		});

			
		
		roiapp.filter('percentage', ['$filter', function ($filter) {
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