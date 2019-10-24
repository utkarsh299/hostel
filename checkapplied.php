<?php 
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$id=$_GET["count"];
//check whether student id is already applied or not
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$id);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row==1){
	//if already applied
$stmt=$conn->prepare("select sr from 2ndyearcheck where id1=?");
$stmt->bind_param("i",$id);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row==0){//check sr of the entry
            	$stmt=$conn->prepare("select sr from 2ndyearcheck where id2=?");
                 $stmt->bind_param("i",$id);
            		$stmt->execute();
            		$re=$stmt->get_result();
                   $row=mysqli_num_rows($re);
				if($row==0){//check sr of the entry
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
	//select information of student and display
$stmt=$conn->prepare("select id1,id2,id3,username,password from 2ndyearcheck where sr=?");
                                        $stmt->bind_param("i",$sr);
                                        		$stmt->execute();
                                        		$re=$stmt->get_result();
$stud=mysqli_fetch_assoc($re);


echo "student 1:".$stud["id1"]."<br>"."student 2: ".$stud["id2"]."<br>"."student 3: ".$stud["id3"]."<br>"."username: ".$stud["username"]."<br>"."password: ".$stud["password"];

}else{echo "not applied";}

?>
