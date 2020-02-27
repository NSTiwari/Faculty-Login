<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("faculty");
if($_SESSION["username"]==true)
{
  echo "Welcome"." ".$_SESSION["username"];
}
else
{
  header('location:index.php');
}
?>

<a href="logout.php">Logout</a>

<?php
$username=$_SESSION["username"];


$query1=mysql_query("select * from users where username='$username'");
$rowcount1=mysql_fetch_array($query1);
$user_id=$rowcount1["user_id"];

$query2=mysql_query("select * from personal_details where user_id='$user_id'");
$rowcount2=mysql_num_rows($query2);




//fetch values from personal details table
for($i=1;$i<=$rowcount2;$i++)
{
	$fetch2=mysql_fetch_array($query2);
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 15px;
  }
  p{
  	font-size: 18px;
  }

  </style>
	<title>Profile</title>
</head>
<body>

<div class="col-md-10 col-md-offset-1" style="border: 1px solid #9bba6e;border-radius: 20px;padding-top: 20px;">
            <div class="col-md-12">
                <div class="col-md-3">
                    <img src="images/<?php echo $fetch2["image"]?>"/></div>
                <div class="col-md-8"> <br/> <br/>
                    <b>Name : <?php echo $fetch2["faculty_name"]?> <br/>Qualification : <?php echo $fetch2["faculty_qualification"]?> <br/>Designation : <?php echo $fetch2["faculty_designation"]?><br/>Email id : <?php echo $fetch2["faculty_email"]?><br/>Contact : <?php echo $fetch2["faculty_contact"]?><br/>Date of joining : <?php echo $fetch2["faculty_doj"]?></b><br/>					                    <button class="btn btn-default btn-yellow" data-toggle="modal" data-target="#myModal">Bio-Data</button>
					                </div>

					                <div class="container">
  <ul class="nav nav-tabs">
  	<br>
  	<br><br>
    <li class="active"><a data-toggle="tab" href="#home">Areas of Specialization</a></li>
    <li><a data-toggle="tab" href="#menu1">Subjects Taught</a></li>
    <li><a data-toggle="tab" href="#menu2">Papers Presented</a></li>
    <li><a data-toggle="tab" href="#menu3">Research Projects</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
      <p><?php echo $fetch2["faculty_specialization"]?></p>
    </div>
    <div id="menu1" class="tab-pane fade">
    	<br>
      <table border="1">
	<tr>
		<th>Sr. No</th>
		<th>Subject</th>
		<th>Semester</th>
	</tr>

 <?php
 $query1=mysql_query("select * from users where username='$username'");
	$rowcount1=mysql_fetch_array($query1);
	$user_id=$rowcount1["user_id"];


 $query3=mysql_query("select * from subject where user_id='$user_id'");
	$rowcount3=mysql_num_rows($query3);
 for($i=1; $i<=$rowcount3;$i++)
 {
 	$row=mysql_fetch_array($query3);

 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["sub_name"] ?></td>
		<td><?php echo $row["sem"] ?></td>
	</tr>
	<?php
}
	?>
</table>
    </div>




    <div id="menu2" class="tab-pane fade">
    	<br>
      <table border="1">
	<tr>
		<th>Sr. No</th>
		<th>Title</th>
		<th>Description</th>
	</tr>

 <?php
 $query1=mysql_query("select * from users where username='$username'");
	$rowcount1=mysql_fetch_array($query1);
	$user_id=$rowcount1["user_id"];


 $query4=mysql_query("select * from papers_presented where user_id='$user_id'");
	$rowcount4=mysql_num_rows($query4);
 for($i=1; $i<=$rowcount4;$i++)
 {
 	$row4=mysql_fetch_array($query4);

 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row4["paper_title"] ?></td>
		<td><?php echo $row4["paper_description"] ?></td>
	</tr>
	<?php
}
	?>
</table>
    </div>

    <div id="menu3" class="tab-pane fade">
    	<br>
     <table border="1">
	<tr>
		<th>Sr. No</th>
		<th>Name of Research Project</th>
		<th>Type of Grant</th>
		<th>Name of Funding Organization</th>
		<th>Amount (Rs.)</th>
		<th>Duration</th>
	</tr>

 <?php
 $query1=mysql_query("select * from users where username='$username'");
	$rowcount1=mysql_fetch_array($query1);
	$user_id=$rowcount1["user_id"];


 $query5=mysql_query("select * from research_projects where user_id='$user_id'");
	$rowcount5=mysql_num_rows($query5);
 for($i=1; $i<=$rowcount5;$i++)
 {
 	$row5=mysql_fetch_array($query5);

 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row5["research_project_name"] ?></td>
		<td><?php echo $row5["grant_type"] ?></td>
		<td><?php echo $row5["funding_organization"] ?></td>
		<td><?php echo $row5["amount"] ?></td>
		<td><?php echo $row5["duration"] ?></td>
	</tr>
	<?php
}
	?>
</table>
    </div>
  </div>
</div>



<br>

<br>
<a href="edit.php">Update Profile</a><br>
</body>
</html>





