<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
else{
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit the Data</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body id="app2">
<?php    
    include("database.php");
    $edit_id = @$_GET['edit'];
    $display = @$_GET['display'];
    $query = "select * from user_data where id= '$edit_id'";
    $run = mysql_query($query);
    while( $row = mysql_fetch_array($run))
	{   
            $edit_id1 = $row['id'];        	
            $name = $row['name'];
            $father = $row['father_name'];            
            $age = $row['age'];
            $dob = $row['date_of_birth'];            
            $gender = $row['gender'];
            $marital = $row['marital_status'];
            $income = $row['annual_income'];
            $education = $row['education'];
            $address = $row['address'];
            $state = $row['state'];
            $job = $row['job'];            
?>
<div class="login">
    <div class="login-form">        
        
        <form class="form-signin" action="edit.php?edit_form=<?php echo $edit_id1 ?>" method='post' enctype="multipart/form-data">
            <button type="submit"  id="logout" class="btn btn-default" name='logout'>Logout</button>            
            <button type="submit"  id="logout" class="btn btn-default" name='back'>Back</button>
            <center><h2><label><font color="black">Edit the Data</font></label></h2></center> 
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name ?>">
                </div>  
                <div class="form-group">
                    <label for="exampleInputName">Father's Name</label>
                    <input type="text" class="form-control" name="father" placeholder="Name" value="<?php echo $father ?>">
                </div>                
                <div class="form-group">
                    <label for="exampleInputAge">Age</label>
                    <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo $age ?>">
                </div>                
                <div class="form-group">
                    <label for="exampleInputDob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $dob ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputGender">Gender</label>
                    <select class="form-control" id="sel1" name="gender"><?php echo $gender ?>
                        <option >Please Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>                    
                </div>                      
                <div class="form-group">
                    <label for="exampleInputMarital">Marital Status</label>
                    <select class="form-control" id="sel1" name="marital"><?php echo $marital ?>
                        <option >Please Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Widow</option>
                        <option>Other</option>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="exampleInputIncome">Annual Income</label>
                    <input type="text" class="form-control" name="income" placeholder="Annual income" value="<?php echo $income ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEducation">Education</label>
                    <input type="text" class="form-control" name="education" placeholder="Annual income" value="<?php echo $education ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <textarea placeholder="Enter your current Address" class="form-control"  name="address"><?php echo $address ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputState">State</label>
                    <select class="form-control" id="sel1" name="state"><?php echo $state ?>
                            <?php 
                                 include("function.php");
                                 echo option('state','id','state_name');
                            ?>
                    </select>
                    
                </div>                
                <div class="form-group">
                    <label for="exampleInputJob">Job</label>
                    <select class="form-control" id="sel1" name="job">
                        <option>Please Select</option>
                        <option>Student</option>
                        <option>Private</option>
                        <option>Government</option>
                        <option>Other</option>
                    </select>
                </div>                
                <button type="submit" class="btn btn-lg btn-success btn-block" name='update'>Update</button>
    <?php } ?>                
        </form>        
    </div>    
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>    
</body> 
</html>
<?php 
        if(isset($_POST['update']))
        {
            $update_id = $_GET['edit_form'];
            $name = $_POST['name'];
            $father = $_POST['father'];
            $age = $_POST['age'];
            $date = $_POST['dob'];
            $gender = $_POST['gender'];    
            $marital = $_POST['marital'];
            $income = $_POST['income'];        
            $education = $_POST['education'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $job = $_POST['job'];        
            $update_query = " update user_data set name='$name',father_name='$father',age='$age',date_of_birth='$date',gender='$gender',marital_status='$marital',annual_income='$income',education='$education',address='$address' ,state='$state',job='$job'
                        where id ='$update_id'";
            if (mysql_query($update_query)) 
            {
                echo "<script>alert('Post has been updated')</script>";
                echo "<script>window.open('index.php?post=Data has been updated...','_self')</script>";
            } 

        }
?>
    <?php
    if(isset($_POST['logout']))
    {
        echo "<script>window.open('login.php','_self')</script>";
    }
    ?>
    <?php
        if(isset($_POST['back']))
        {
            echo "<script>window.open('display.php?display=you have display page...','_self')</script>";
        }
    ?>
<?php } ?>