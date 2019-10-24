<?php
session_start();
//to get username and password of student if they forgotten 
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
  
  
} 
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$id=$_POST["time"];
//check whether inserted id  has applied or not
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$id);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row==1){
	//note there sr from database if inserted id is of student 1 from database
$stmt=$conn->prepare("select sr from 2ndyearcheck where id1=?");
$stmt->bind_param("i",$id);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row==0){
	//note there sr from database if inserted id is of student 2 from database
            	$stmt=$conn->prepare("select sr from 2ndyearcheck where id2=?");
                 $stmt->bind_param("i",$id);
            		$stmt->execute();
            		$re=$stmt->get_result();
                   $row=mysqli_num_rows($re);
				if($row==0){
	//note there sr from database if inserted id is of student 3 from database
                            			$stmt=$conn->prepare("select sr from 2ndyearcheck where id3=?");
                                        $stmt->bind_param("i",$id);
                                        		$stmt->execute();
                                        		$re=$stmt->get_result();
                                        $row=mysqli_num_rows($re);
									if($row==0){
										
 									}else{$row=mysqli_fetch_assoc($re);
											$sr=$row["sr"];}

				}else{$row=mysqli_fetch_assoc($re);
				   $sr=$row["sr"]; }
	
}else{$row=mysqli_fetch_assoc($re);
	$sr=$row["sr"];}
	//display all  student id with there username and password when there sr is matched
$stmt=$conn->prepare("select id1,id2,id3 from 2ndyearcheck where sr=?");
$stmt->bind_param("i",$sr);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
$stud=mysqli_fetch_assoc($re);
//delete whole entry when pressed delete button
$stmt=$conn->prepare("delete from 2ndyearcheck where sr=?");
$stmt->bind_param("i",$sr);
		$stmt->execute();
		//delete student id 1 from applied database
$stmt=$conn->prepare("delete from applied where id=?");
$stmt->bind_param("i",$stud["id1"]);
		$stmt->execute();
		//delete student id 2 from applied database
$stmt=$conn->prepare("delete from applied where id=?");
$stmt->bind_param("i",$stud["id2"]);
		$stmt->execute();
//delete student id 3 from applied database
$stmt=$conn->prepare("delete from 2ndyearcheck where sr=?");
$stmt->bind_param("i",$stud["id3"]);
		$stmt->execute();
echo "response deleted";

}
else{echo "student not found";}

?>