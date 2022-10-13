<?php
   include('data-con.php');
   error_reporting(5);
   ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Billing Report</title>
</head>
<body>
	<div class="container">
		<div class="row" style="text-align: center;">
<form method="post">
<div style="max-width: 400px;">
</div>
<div style="padding-bottom: 18px;font-size : 24px;">Invoice Payment</div>
<div style="padding-bottom: 18px;">Invoice #<span style="color: red;"> *</span><br/>
<input type="text" id="data_2" name="data_2" style="max-width : 250px;" class="form-control"/>
</div>

<div style="padding-bottom: 18px;">Name <span style="color: red;"> *</span><br/>
<input type="text" id="data_5" name="data_1" style="max-width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Email<br/>
<input type="text" id="data_6" name="data_2" style="max-width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Mobile<br/>
<input type="text" id="data_7" name="data_3" style="max-width : 250px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Gender<br/>
<input type="text" id="data_6" name="data_4" style="max-width : 450px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Doctor<br/>
<input type="text" id="data_7" name="data_5" style="max-width : 250px;" class="form-control"/>
</div>
<div style="padding-bottom: 18px;">Full Address<br/>
<textarea id="data_8" false name="data_6" style="max-width : 450px;" rows="6" class="form-control"></textarea>
</div>

<div style="padding-bottom: 18px;"><a href="billing.php"><button type="button" class="btn btn-primary" name="submit">Submit</button></a></div>
</div>
</form>
</div>
</div>
<?php
if (isset(_POST['submit'])) {
 	$t1=_POST['data_1'];
 	$t2=_POST['data_2'];
 	$t3=_POST['data_3'];
 	$t4=_POST['data_4'];
 	$t5=_POST['data_5'];
 	$t6=_POST['data_6'];
 	mysqli_query($cn,"insert into billing(Name,Email,Mobile,Gender,	Doctor,	Address")
 } 
?>
</body>
</html>