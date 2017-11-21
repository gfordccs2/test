<?php
	///// database abstraction
	function conn(){
		$host='127.0.0.1';
		$user='root';
		$pass='';
		$database='my_student';
		try{
			$conn=new PDO("mysql:host=$host;dbname=$database",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo 'Connection Error:'.$e->getMessage();
		}
		return $conn;
	}
	/////ADD STUDENT
	function addStudent($idno,$familyname,$givenname,$mi,$course,$level){
		$conn=conn();
		$sql="INSERT INTO tbl_student(idno,familyName,givenName,mi,course,yearLevel) VALUES(?,?,?,?,?,?)";
		$st=$conn->prepare($sql);
		$st->execute(array($idno,$familyname,$givenname,$mi,$course,$level));
		$conn=null;
	}
	/////UPDATE
	function updateStudent($idno,$familyname,$givenname,$mi,$course,$level){
		$conn=conn();
		$sql="UPDATE tbl_student SET familyName=?,givenName=?,mi=?,course=?,yearLevel=? WHERE idno=?";
		$st=$conn->prepare($sql);
		$st->execute(array($familyname,$givenname,$mi,$course,$level,$idno));
		$conn=null;
	}


	/////
	function getStudent($idno){
		$conn=conn();
		$sql="SELECT * FROM tbl_student WHERE idno=?";
		$st=$conn->prepare($sql);
		$st->execute(array($idno));
		$row=$st->fetch();
		$conn=null;
		return $row;
	}
	/////READ
	function getAllStudent(){
		$conn=conn();
		$sql="SELECT * FROM tbl_student ";
		$st=$conn->prepare($sql);
		$st->execute();
		$row=$st->fetchAll();
		$conn=null;
		return $row;
	}
	/////DELETE
	function deleteStudent($idno){
		$conn=conn();
		$sql="DELETE FROM tbl_student WHERE idno=?";
		$st=$conn->prepare($sql);
		$st->execute(array($idno));		
		$conn=null;		
	}

	function search($search){
	$conn=conn();
	$sql = "SELECT 	* 
			FROM  	tbl_student 
			WHERE 	(familyName LIKE '%".$search."%')";
	$st = $db->query($sql)->fetchAll();
	$db = null;
	return $s;
}


?>