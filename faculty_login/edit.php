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

<?php
$username=$_SESSION["username"];
$query=mysql_query("select * from users where username='$username'");
$row=mysql_fetch_array($query);
$user_id=$row["user_id"];

$query2=mysql_query("select * from personal_details where user_id='$user_id'");
$rowcount2=mysql_num_rows($query2);


$query3=mysql_query("select * from subject where user_id='$user_id'");
$rowcount3=mysql_num_rows($query3);

for($i=1;$i<=$rowcount2;$i++)
{
	$fetch2=mysql_fetch_array($query2);
}
//$user_image=$fetch2['image'];


//fetch values from subject table
for($i=1;$i<=$rowcount3;$i++)
{
	$fetch3=mysql_fetch_array($query3);
}
?>






<a href="logout.php">Logout</a>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
  <script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  
    <title>Profile</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                  <![endif]-->
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    

</head>
<body>
    <div class="container">
        <div class="page-header">
            <p class="lead text-center">
                Update Profile
            </p>
        </div>
        <form class="form-horizontal col-xs-4 col-xs-offset-4" role="form" method="post" enctype="multipart/form-data">
          <!-- Name -->
            <div class="form-group">
                <label>Full Name</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input name="name" type="text" class="form-control" placeholder="Full Name" value="<?php echo $fetch2['faculty_name']?>">
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email Address</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <input name="email" type="email" class="form-control" placeholder="Email Address" data-validation="email" data-validation-error-msg-container="#ErrorEmail" value="<?php echo $fetch2['faculty_email']?>">
                </div>
                <span id="ErrorEmail"></span>
            </div>

            <!-- Contact -->
            <div class="form-group">
                <label>Contact</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input name="contact" type="number" class="form-control" placeholder="Contact Number" value="<?php echo $fetch2['faculty_contact']?>">
                </div>
            </div>


          <!--DOJ-->
            <div class="form-group">
                <label>Date of Joining</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                    </div>
                    <input name="doj" type="text" class="form-control" id="DOB" placeholder="Date of Joining" data-validation="date" data-validation-format="dd/mm/yyyy" data-validation-error-msg-container="#ErrorDOB" value="<?php echo $fetch2['faculty_doj']?>">
                </div>
                <span id="ErrorDOB"></span>
            </div>

            <!--Qualification-->
            <div class="form-group">
                <label>Qualification</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input name="qualification" type="text" class="form-control" placeholder="Qualification" value="<?php echo $fetch2['faculty_qualification']?>">
                </div>
            </div>


            <!--Designation-->
            <div class="form-group">
                <label>Designation</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input name="designation" type="text" class="form-control" placeholder="Designation" value="<?php echo $fetch2['faculty_designation']?>">
                </div>
            </div>

            <div class="form-group">
                <label><b>Area of Specialization</b></label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <input name="specialization" type="text" class="form-control" placeholder="Area of Specialization" value="<?php echo $fetch2['faculty_specialization']?>">
                </div>
            </div>



               <!--Subjects Taught-->
            <div class="form-group">
              <label><b>Subjects Taught</b></label>
              <div class="table-responsive">  
               <table class="table table-bordered" id="dynamic_field">  
                  <tr>  
                  <input type="text" name="sub[]" placeholder="Subject" class="form-control name_list" /><br></tr>  
                   <tr><input type="text" name="sem[]" placeholder="Semester" class="form-control name_list" /><br></tr> 
                 <tr><button type="button" name="add" id="add" class="btn btn-success">Add More</button><br></tr>  
                </tr>  
               </table>  
             </div>  
           </div>


           <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="sub[]" placeholder="Subject" class="form-control name_list" /><td><input type="text" name="sem[]" placeholder="Semester" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
 });  
 </script>




           <!--Papers Presented-->
            <div class="form-group">
              <label><b>Papers Presented</b></label>
              <div class="table-responsive">  
               <table class="table table-bordered" id="dynamic_field-2">  
                  <tr>  
                  <textarea type="text" name="title[]" placeholder="Title" class="form-control name_list"></textarea><br></tr>  
                   <tr><textarea type="text" name="description[]" placeholder="Description" class="form-control name_list"></textarea><br></tr> 
                 <tr><button type="button" name="add-2" id="add-2" class="btn btn-success">Add More</button><br></tr>  
                </tr>  
               </table>  
             </div>  
           </div>


           <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add-2').click(function(){  
           i++;  
           $('#dynamic_field-2').append('<tr id="row'+i+'"><td><textarea type="text" name="title[]" placeholder="Title" class="form-control name_list"></textarea><td><textarea type="text" name="description[]" placeholder="Description" class="form-control name_list"></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
 });  
 </script>



             <!--Research Projects-->
            <div class="form-group">
              <label><b>Research Projects</b></label>
              <div class="table-responsive">  
               <table class="table table-bordered" id="dynamic_field-3">  
                  <tr>  
                  <input type="text" name="project_name[]" placeholder="Research Project Name" class="form-control name_list"/></tr><br>

                   <tr><input type="text" name="grant_type[]" placeholder="Grant Type" class="form-control name_list"/></tr><br>

                   <tr><input type="text" name="funding_organization[]" placeholder="Funding Orgranization" class="form-control name_list"/></tr><br> 

                   <tr><input type="text" name="amount[]" placeholder="Amount (Rs.) " class="form-control name_list"/></tr><br> 

                   <tr><input type="text" name="duration[]" placeholder="Duration" class="form-control name_list"/></tr><br> 

                 <tr><button type="button" name="add-3" id="add-3" class="btn btn-success">Add More</button></tr>  

               </table>  
             </div>  
           </div>


           <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add-3').click(function(){  
           i++;  
           $('#dynamic_field-3').append('<tr id="row'+i+'"><td><input type="text" name="project_name[]" placeholder="Research Project Name" class="form-control name_list"/></td><br><td><input type="text" name="grant_type[]" placeholder="Grant Type" class="form-control name_list"/></td><br><td><input type="text" name="funding_organization[]" placeholder="Name of Funding Orgranization" class="form-control name_list"/></td><br><td><input type="text" name="amount[]" placeholder="Amount (Rs.)" class="form-control name_list"/></td><br><td><input type="text" name="duration[]" placeholder="Duration" class="form-control name_list"/></td><br><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></tr></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
 });  
 </script>






            <br>
            <div class="form-group">
                <label for="UploadAvatar">Upload Avatar:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-camera"></i>
                    </div>
                    <input type="file" name="image" class="form-control" value="<?php echo $fetch2['image']?>">
                </div>
                <span id="ErrorPic"></span>
            </div>
           
            <br>
            <div class="form-group">
                <input name="submit" type="submit" class="form-control btn btn-primary" value="Submit">
            </div>
            
        </form>
    </div>
    <!-- Container -->



   

<a href="post.php">View Profile</a><br>
<a href="edit.php">Update Profile</a><br>




</body>


</html>
<?php
$username=$_SESSION["username"];
$query=mysql_query("select * from users where username='$username'");
$row=mysql_fetch_array($query);
$user_id=$row["user_id"];

if(isset($_REQUEST["submit"]))
{
  $name=$_REQUEST["name"];
  $qualification=$_REQUEST["qualification"];
  $designation=$_REQUEST["designation"];
  $contact=$_REQUEST["contact"];
  $email=$_REQUEST["email"];
  $doj=$_REQUEST["doj"];
  $specialization=$_REQUEST["specialization"];
 
  $image=$_FILES["image"]["name"];
  $tmp_name=$_FILES["image"]["tmp_name"];
  $path="images/".$image;
  move_uploaded_file($tmp_name, $path);

//subjects taught details
//    $sub=$_REQUEST["sub"];
//   $sem=$_REQUEST["sem"];

// //papers presented details
//   $title=$_REQUEST["title"];
//   $description=$_REQUEST["description"];

// //research project details
//   $project_name=$_REQUEST["project_name"];
//   $grant_type=$_REQUEST["grant_type"];
//   $funding_organization=$_REQUEST["funding_organization"];
//   $amount=$_REQUEST["amount"];
//   $duration=$_REQUEST["duration"];


  mysql_query("update personal_details set faculty_name='$name', faculty_qualification='$qualification', faculty_designation='$designation', faculty_contact='$contact', faculty_email='$email', faculty_doj='$doj', image='$image', faculty_specialization='$specialization' where user_id='$user_id'");


//   mysql_query("update subject set sub_name='$sub', sem='$sem' where user_id='$user_id'");

//   mysql_query("update papers_presented set paper_title='$title', paper_description='$description' where user_id='$user_id'");

//   mysql_query("update research_projects set research_project_name='$project_name', grant_type='$grant_type', funding_organization='$funding_organization', amount='$amount', duration='$duration' where user_id='$user_id'");

  $n1=count($_REQUEST["sub"]);
  for($i=0; $i<$n1; $i++)
  {
      $sub[$i]=$_REQUEST["sub"][$i];
      $sem[$i]=$_REQUEST["sem"][$i];
  mysql_query("insert into subject(user_id,sub_name,sem)values('$user_id','$sub[$i]','$sem[$i]')");
  }

  $n2=count($_REQUEST["title"]);
  for($j=0; $j<$n2; $j++)
  {
      $title[$j]=$_REQUEST["title"][$j];
      $description[$j]=$_REQUEST["description"][$j];
  mysql_query("insert into papers_presented(user_id, paper_title, paper_description)values('$user_id','$title[$j]','$description[$j]')");
  } 

 $n3=count($_REQUEST["project_name"]);
  for($k=0; $k<$n3; $k++)
  {
      $project_name[$k]=$_REQUEST["project_name"][$k];
      $grant_type[$k]=$_REQUEST["grant_type"][$k];
      $funding_organization[$k]=$_REQUEST["funding_organization"][$k];
      $amount[$k]=$_REQUEST["amount"][$k];
      $duration[$k]=$_REQUEST["duration"][$k];

  mysql_query("insert into research_projects(user_id, research_project_name, grant_type, funding_organization, amount, duration)values('$user_id','$project_name[$k]','$grant_type[$k]','$funding_organization[$k]', '$amount[$k]', '$duration[$k]')");
  }
}



?>



