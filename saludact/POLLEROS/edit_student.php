
<!--EDIT-->
<?php
include('dbconn.php');
$idno = "";
$familyname = "";
$givenname = "";
$mi = "";
$course = "";
$level = "";
if(isset($_POST['update']))
{
	$idno = trim($_POST["idno"]);
	$familyname = trim($_POST["familyName"]);
	$givenname = trim($_POST["givenName"]);
	$mi = trim($_POST["mi"]);
	$course = trim($_POST["course"]);
	$level = trim($_POST["yearLevel"]);
	
	if($idno != '' && $familyname != '' && $givenname !=''&& $mi !='' && $course !='' && $level !='')
	{
		updateStudent($id, $familyname,$givenname,$mi,$course,$level);
		$message = '<b class="text-info">Note has been successfully updated.</b>';
	}
	else
	{
		$message = '<b class="text-error">Please input title or notes.</b>';
	}
}
else 
{
	if($stud)
	{
		$title = $note['title'];
		$text = $note['text']; 
	}
	else
	{
		$message = '<b class="text-error">The specified note record cannot be found.</b>';
	}
}
?>
<!doctype html>
<html>
	<head>
		<link href="w3.css"  rel="stylesheet"/>
	</head>
	<body>
		<div class="w3-container">
		

	<div class="w3-container" ng-app="myapp" ng-controller="ctrl">
			<h3>STUDENT LIST</h3>
			<div class="w3-container">
						<br/>
						<form method="post">
							<input type="number" value="<?php echo $st['idno']; ?>" name="idno" placeholder="IDNO" class="w3-input" required ><br/>
							<input type="text" value="<?php echo $st['familyName'] ?>" name="familyName" placeholder="FAMILYNAME" class="w3-input" required><br/>

							<input type="text" value="<?php echo $st['givenName']; ?> " name="givenName" placeholder="GIVENAME" class="w3-input" required><br/>
							<input type="text" value="<?php echo $st['mi']; ?> " name="mi" placeholder="MIDDLENAME" class="w3-input" required><br/>
							<label>COURSE</label>
							<select class="w3-select" value="<?php echo $st['course']; ?>" name="course" required>
								<option>---</option>
								<option>ACT</option>
								<option>BSIT</option>
							</select>
							<br/>
							<label>LEVEL</label>
							<select class="w3-select" value="<?php echo $st['idno']; ?>"  name="level" required>
								<option>---</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
							<br/>
							<br/>
							<a href="index.php" class="w3-button w3-right w3-green">Back</a>
							<input type="submit" name="update" class="w3-button w3-right w3-blue" value="UPDATE" />
						</form>
						<br/>
						<br/>
						
					</div>
			
		</div>

		</div>
	</body>
</html>