<?php
	include 'includes/header.php';
?>

<div ng-app="myCalcApp" ng-controller="myCalcCtrl">
	<div class="main-content">
		<div id="optionsidebar" class="showpanel">
			<div class="wrapper">
				<h2 class="sidebar-title">Options</h2>
				<div class="options-list">
					<div ng-repeat="x in options">
						<div class="option-item">
							<div class="option-header"><label for="needed{{$index + 1}}" class="label">{{x.mod}}</label><label for="needed{{$index + 1}}" class="switch"><input id="needed{{$index + 1}}" name="needed{{$index + 1}}" type="checkbox" ng-model="x.needed" data-toggle="collapse" data-target="#collapse{{$index + 1}}"  /><span class="slider"></span></label></div>
							<div class="option-body collapse" id="collapse{{$index + 1}}">
								<div class="option-row">
									<label for="best{{$index + 1}}">Best</label><div class="input-group"><input class="percentage" name="best{{$index + 1}}" id="best{{$index + 1}}" type="number" ng-model="x.best" step="1"/><span class="input-group-addon">%</span></div> <label for="expected{{$index + 1}}">Expected</label><div class="input-group"><input class="percentage" name="expected{{$index + 1}}" id="expected{{$index + 1}}" type="number" ng-model="x.expected" step="1"/><span class="input-group-addon">%</span></div> <label for="worst{{$index + 1}}">Worst</label><div class="input-group"><input class="percentage" name="worst{{$index + 1}}" id="worst{{$index + 1}}" type="number" ng-model="x.worst" step="1"/><span class="input-group-addon">%</span></div>
								</div>
								<div class="option-row">
									<div class="option-row-group">
										<h3 class="group-title">Timeframe (In Months)</h3>
										<label for="timeframeb{{$index + 1}}">Best</label><div class="input-group"><input class="month" name="timeframeb{{$index + 1}}" id="timeframeb{{$index + 1}}" type="number" ng-model="x.timeframeb" step="1"/></div> <label for="timeframee{{$index + 1}}">Expected</label><div class="input-group"><input class="month" name="timeframee{{$index + 1}}" id="timeframee{{$index + 1}}" type="number" ng-model="x.timeframee" step="1"/></div> <label for="timeframew{{$index + 1}}">Worst</label><div class="input-group"><input class="month" name="timeframew{{$index + 1}}" id="timeframew{{$index + 1}}" type="number" ng-model="x.timeframew" step="1"/></div>
									</div>
									<h3 class="metric">Metric<span>{{x.metric}}</span></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<p><input type="button" id="btnreset" ng-click="reset()" value="Reset Default Settings" /></p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form id="initial-form" action="result.php" method="post">
						<h1 class="main-title">Calculate Your<span>Return of Investment</span></h1>
						<div class="form-row"><div class="form-column"><label for="cpa">Cost Per Acquisition</label><div class="input-group"><span class="input-group-addon">$</span><input data-number-to-fixed="2" data-number-stepfactor="100" step="0.01" class="currency" type="number" ng-model="roicpa" id="cpa" name="cpa" style="width:220px;" /></div></div><div class="form-column"><label for="monthlysales">Monthly Sales</label><div class="input-group"><span class="input-group-addon">$</span><input data-number-to-fixed="2" data-number-stepfactor="100" step="0.01" class="currency" type="number" ng-model="roimonthlysales" id="monthlysales" name="monthlysales"/></div></div></div>
						<div class="form-row"><div class="form-column"><label for="aveordervalue">Average Order Value (AOV)</label><div class="input-group"><span class="input-group-addon">$</span><input data-number-to-fixed="2" data-number-stepfactor="100" step="0.01" class="currency" type="number" ng-model="roiaveordervalue" id="aveordervalue" name="aveordervalue"/></div></div><div class="form-column"><label for="monthlyadspend">Monthly Ad Spend</label><div class="input-group"><span class="input-group-addon">$</span><input data-number-to-fixed="2" data-number-stepfactor="100" step="0.01" class="currency" type="number" ng-model="roimonthlyadspend" id="monthlyadspend" name="monthlyadspend"/></div></div></div>
						<div class="form-row"><input type="text" ng-model="optionsstr" id="options" name="options" style="display:none;"/><div class="form-column"><input type="submit" name="btnsubmit" id="btnsubmit" ng-click="CalculateROI()" value="Calculate ROI" title="Calculate ROI" /><a class="btn-option open">More Options</a></div></div>
					</form>	

					<div class="table-responsive" style="display:none;">
					<table class="options">
					<tr><th>#</th><th>Mod</th><th>Needed</th><th>Best (%)</th><th>Expected (%)</th><th>Worst (%)</th><th>Time Frame <br/>(BEST)</th><th>Time Frame <br/>(EXPECTED)</th><th>Time Frame <br/>(WORST)</th><th>Metric</th></tr>
					  <tr ng-repeat="x in options">
					  <td>{{$index + 1}}</td><td>{{x.mod}}</td><td><select ng-model="x.needed" ng-options="entry.k as entry.l for entry in [{k:false, l:'N'}, {k:true, l:'Y'}]">
						</select></td><td><input type="number" ng-model="x.best" step="0.01"/></td><td><input type="number" ng-model="x.expected" step="0.01"/></td><td><input type="number" ng-model="x.worst" step="0.01"/></td><td><input type="number" ng-model="x.timeframeb" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframee" min="3" max="24" /></td><td><input type="number" ng-model="x.timeframew" min="3" max="24" /></td><td>{{x.metric}}</td></tr>
					</table>
					</div>					
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>