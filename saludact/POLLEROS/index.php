<?php 
	$idno = 

	$idno = "";
	$familyname = "";
	$givenname = "";
	$mi = "";
	$course = "";
	$level = "";

	if(isset($_POST["update"])){

		$idno = trim($_POST["idno"]);
		$familyname = trim($_POST["familyName"]);
		$givenname = trim($_POST["givenName"]);
		$mi = trim($_POST["mi"]);
		$course = trim($_POST["course"]);
		$level = trim($_POST["yearLevel"]);

		if($idno !="" && $familyname != "" && $givenname != "" && $mi!= "" && $course!= "" && $level!= "" ){
			updateStudent($familyname,$givenname,$mi,$course,$level,$idno);
			header("location: index.php");
		}
		else{
			$message = "All fields are required!";
		}
	}

?>

<?php
	include('dbconn.php');
	$rows=getAllStudent();


	//ADD
	$idno = "";
	$familyname = "";
	$givenname = "";
	$mi = "";
	$course = "";
	$level = "";

	if(isset($_POST["submit"])){

		$idno = trim($_POST["idno"]);
		$familyname = trim($_POST["familyName"]);
		$givenname = trim($_POST["givenName"]);
		$mi = trim($_POST["mi"]);
		$course = trim($_POST["course"]);
		$level = trim($_POST["level"]);

		if($idno !="" && $familyname != "" && $givenname != "" && $mi!= "" && $course!= "" && $level!= "" ){
			addStudent($idno,$familyname,$givenname,$mi,$course,$level);
			header("location: index.php");
		}
		else{
			$message = "All fields are required!";
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
			<button class="w3-btn w3-blue" onclick="document.getElementById('studentmodal').style.display='block'">ADD</button>


			<!--  -->
			<input class="w3-right w3-content" type="text" padding="5px" id="myInput" onkeyup="myFunction()" placeholder="Search for ID numbers..">
			<table class="w3-table w3-striped w3-bordered" id="myTable">
				<tr>
					<th>IDNO</th>
					<th>FAMILYNAME</th>
					<th>GIVENNAME</th>
					<th>MIDDLENAME</th>
					<th>COURSE</th>
					<th>LEVEL</th>
					<th>ACTION</th>
				</tr>
				<?php if(count($rows)>0) :?>
			
				<?php foreach($rows as $st) :?>
					<tr>
						<td><?php echo htmlentities($st['idno']) ?></td>
						<td><?php echo htmlentities($st['familyName']) ?></td>
						<td><?php echo htmlentities($st['givenName']) ?></td>
						<td><?php echo htmlentities($st['mi']) ?></td>
						<td><?php echo htmlentities($st['course']) ?></td>
						<td><?php echo htmlentities($st['yearLevel']) ?></td>
						<td>
						<button class="w3-btn w3-blue">
						<a href="edit_student.php?edit_id= <?php echo $st['idno'];?>">EDIT</button></a>

						<a href="delete_student.php?delete_id=<?php echo $st['idno']; ?>" onclick="return confirm('Are your sure you want to delete <?php echo $st['idno'];?>?')">
						<button class="w3-btn w3-red">Delete</button></a></td>
					</tr>
				<?php endforeach?>
			
			<?php else :?>
				<div class="w3-panel w3-blue">
					No Entries Found
				</div>
			<?php endif?>
			</table>
			<!--modal here-->

			<!--ADD-->
			<div class="w3-modal" id="studentmodal">
				<div class="w3-modal-content w3-animate-top">
					<div class="w3-container w3-teal">
						<span onclick="document.getElementById('studentmodal').style.display='none'" class="w3-btn w3-display-topright">&times;</span>
						<h3>New Student</h3>
					</div>
					<div class="w3-container">
						<br/>
						<form method="post">
							<input type="number"  name="idno" placeholder="IDNO" class="w3-input" required ><br/>
							<input type="text" name="familyName" placeholder="FAMILYNAME" class="w3-input" required><br/>
							<input type="text" name="givenName" placeholder="GIVENAME" class="w3-input" required><br/>
							<input type="text" name="mi" placeholder="MIDDLENAME" class="w3-input" required><br/>
							<label>COURSE</label>
							<select class="w3-select" name="course" required>
								<option>---</option>
								<option>ACT</option>
								<option>BSIT</option>
							</select>
							<br/>
							<label>LEVEL</label>
							<select class="w3-select" name="level" required>
								<option>---</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
							<br/>
							<br/>
							<input type="submit" name="submit" class="w3-button w3-right w3-blue" />
						</form>
						<br/>
						<br/>
						
					</div>
				</div>
			</div>


			<!--EDIT-->
	<div class="w3-modal" id="editstudent">
				<div class="w3-modal-content w3-animate-top">
					<div class="w3-container w3-pink">
						<span onclick="document.getElementById('editstudent').style.display='none'" class="w3-btn w3-display-topright">&times;</span>
						<h3>EDIT STUDENT</h3>
					</div>
					<div class="w3-container">
						<br/>
						<form method="post">
							
							<input type="number" value="<?php echo $st['idno'];?>" name="idno" placeholder="IDNO" class="w3-input" required ><br/>
							<input type="text" value="<?php echo $st['familyName']; ?>" name="familyName" placeholder="FAMILYNAME" class="w3-input" required><br/>

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
							<input type="submit" name="update" class="w3-button w3-right w3-blue" value="UPDATE" />
						</form>
						<br/>
						<br/>
						
					</div>
				</div>
			</div>	



			
		</div>

		</div>

		<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i,th;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
	</body>
</html>