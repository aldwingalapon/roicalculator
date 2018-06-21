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
						<li><a data-toggle="tab" href="#sales">Projected Number Sales</a></li>
						<li><a data-toggle="tab" href="#profit">Gross Profit</a></li>
						<li><a data-toggle="tab" href="#roa">ROA</a></li>
						<li><a data-toggle="tab" href="#cpa">CPA</a></li>
						<li><a data-toggle="tab" href="#budget">Budget</a></li>
					</ul>
					<div class="col-md-12">				
						<div class="tab-content">
							<div id="current" class="tab-pane fade in active">
								<h3>Current</h3>
								<p>Some content.</p>
								
								<?php if($_POST['btnsubmit']){
									var_dump(json_decode($_POST['options']));
									//var_dump(json_decode($_POST['options'], true));									
								?>
									<input type="hidden" ng-model="cpa" value="<?php echo $_POST['cpa'];?>"/>
									<input type="hidden" ng-model="monthlysales" value="<?php echo $_POST['monthlysales'];?>"/>
									<input type="hidden" ng-model="aveordervalue" value="<?php echo $_POST['aveordervalue'];?>"/>
									<input type="hidden" ng-model="monthlyadspend" value="<?php echo $_POST['monthlyadspend'];?>"/>
									<input type="hidden" ng-model="options" value="<?php echo $_POST['options'];?>"/>
									
									<p>Estimated Current ROA (%) <span class="currentroa percentage">{{currentroa}}</span></p>
									<p>Estimated Current Spend <span class="estimatedcurrentspend currency">{{estimatedcurrentspend}}</span></p>
									<p>Estimated Current Gross <span class="estimatedcurrentgross currency">{{estimatedcurrentgross}}</span></p>
								<?php } else {?>
								<?php } ?>								
							</div>
							<div id="sales" class="tab-pane fade">
								<h3>Projected Number Sales</h3>
								<p>Some content in menu 1.</p>
							</div>
							<div id="profit" class="tab-pane fade">
								<h3>Gross Profit</h3>
								<p>Some content in menu 2.</p>
							</div>
							<div id="roa" class="tab-pane fade">
								<h3>ROA</h3>
								<p>Some content in menu 1.</p>
							</div>
							<div id="cpa" class="tab-pane fade">
								<h3>CPA</h3>
								<p>Some content in menu 1.</p>
							</div>
							<div id="budget" class="tab-pane fade">
								<h3>Budget</h3>
								<p>Some content in menu 1.</p>
							</div>
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>