<div class="row">
			<div class="col-xs-6 col-md-3">
				
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
<?php
$User_Id=$_SESSION['user_id'];
$tdate=date('Y-m-d');
$sql="SELECT sum(expense) as todaysexpense from expenses where expenseDate=CURRENT_DATE AND user_id=$User_Id";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_array($query);
//Today Expense
$sum_today_expense=$result['todaysexpense'];
 ?> 

						<h4>Today's Expense</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent"><?php if($sum_today_expense==""){
echo "0";
} else {
echo "$sum_today_expense";
}
?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Today's Income
$query1=mysqli_query($con,"SELECT sum(amount) as todaysincome from income where idate=CURRENT_DATE AND user_id=$User_Id;");
$result1=mysqli_fetch_array($query1);
$sum_todays_income=$result1['todaysincome'];
 ?> 
					<div class="panel-body easypiechart-panel">
						<h4>Today's Income</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_todays_income;?>" ><span class="percent"><?php if($sum_todays_income==""){
echo "0";
} else {
echo $sum_todays_income;
}

	?></span></div>
					</div>
				</div>
			</div>
	
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
					
//Monthly Expense
 $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(Expense)  as monthlyexpense from expenses where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (User_Id='$User_Id');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Monthly Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent"><?php if($sum_monthly_expense==""){
echo "0";
} else {
echo $sum_monthly_expense;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
			<?php
//monthly income
$monthincquery=mysqli_query($con,"select sum(amount) as monthlyincome from income where ((idate) between '$monthdate' and '$crrntdte') && (User_Id='$User_Id');");
$monthincresult=mysqli_fetch_array($monthincquery);
$sum_monthly_income=$monthincresult['monthlyincome'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Monthly Income</h4>
						<div class="easypiechart" id="easypiechart-green" data-percent="<?php echo $sum_monthly_income;?>" ><span class="percent"><?php if($sum_monthly_income==""){
echo "0";
} else {
echo $sum_monthly_income;
}

	?></span></div>
					</div>
				</div>
			</div>
			</div>

		

<div class="row">
		<div class="col-xs-6 mx-auto col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Expense
$query5=mysqli_query($con,"select sum(expense)  as totalexpense from expenses where User_Id='$User_Id';");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Expenses</h4>
						<div class="easypiechart" id="easypiechart-pink" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense==""){
echo "0";
} else {
echo $sum_total_expense;
}

	?></span></div>


					</div>
				
				</div>

			</div>
			
			<div class="col-xs-6 mx-auto col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Income
$query6=mysqli_query($con,"select sum(amount)  as totalincome from income where User_Id='$User_Id';");
$result6=mysqli_fetch_array($query6);
$sum_yearly_income=$result6['totalincome'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Income</h4>
						<div class="easypiechart" id="easypiechart-lime" data-percent="<?php echo $sum_yearly_income;?>" ><span class="percent"><?php if($sum_yearly_income==""){
echo "0";
} else {
echo $sum_yearly_income;
}

	?></span></div>


					</div>
				
				</div>

			</div>

<div class="col-xs-6 mx-auto col-md-3">
				<div class="panel panel-default">
					<?php
//current budget
$budget=$sum_yearly_income-$sum_total_expense;
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Current Budget</h4>
						<div class="easypiechart" id="easypiechart-brown" data-percent="<?php echo $budget;?>" ><span class="percent"><?php if($budget==""){
echo "0";
} else {
echo $budget;
}

	?></span></div>


					</div>
				
				</div>

			</div>
</div>