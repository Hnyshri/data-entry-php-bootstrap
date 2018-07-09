<?php
session_start();
if(!isset($_SESSION['admin_name']))
{
    header("location:login.php");
}
else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add the Data</title>
    <meta name="author" content="shriyansh">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body id="app2">
<div class="login">
    <div class="login-form">
    <form class="form-signin" action='' method='post' enctype="multipart/form-data">
        <button type="submit"  id="logout" class="btn btn-default" name='logout'>Logout</button>
        <center><h2><label><font color="black">Insert the Data</font></label></h2></center> 
        
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>                
                <div class="form-group">
                    <label for="fatherName">Father's Name</label>
                    <input type="text" class="form-control" name="father" placeholder="Father's Name">
                </div>                
                <div class="form-group">
                    <label for="exampleInputAge">Age</label>
                    <input type="text" class="form-control" name="age" placeholder="Age">
                </div>                
                <div class="form-group">
                    <label for="exampleInputDob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob">
                </div>
                <div class="form-group col-md-12 col-sm-6">
                    <label class="col-md-3 col-sm-3" for="exampleInputGender">Gender</label>
                    <label class="radio-inline col-md-3 col-sm-3">
                        <input type="radio" name="gender" value="male">Male
                    </label>
                    <label class="radio-inline col-md-3 col-sm-3">
                        <input type="radio" name="gender" value="female">Female
                    </label>                   
                </div>                      
                <div class="form-group">
                    <label for="exampleInputMarital">Marital Status</label>
                    <select class="form-control" id="sel1" name="marital">
                        <option>Please Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Widow</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputIncome">Annual Income</label>
                    <input type="text" class="form-control" name="income" placeholder="Annual income">
                </div>
                <div class="form-group">
                    <label for="exampleInputEducation">Education</label>
                    <input type="text" class="form-control" name="education" placeholder="Annual income">
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <textarea placeholder="Enter your current Address" class="form-control"  name="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="sel1">State</label>
                    <select class="form-control" id="sel2" name="state">
                    <option value=0>Please select</option><option value='Andhra Pradesh'>Andhra Pradesh</option><option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                    <option value='Assam'>Assam</option><option value='Bihar'>Bihar</option><option value='Chhattisgarh'>Chhattisgarh</option><option value='Goa'>Goa</option><option value='Gujarat'>Gujarat</option><option value='Haryana'>Haryana</option><option value='Himachal Pradesh'>Himachal Pradesh</option>
                    <option value='Jammu & Kashmir'>Jammu & Kashmir</option><option value='Jharkhand'>Jharkhand</option><option value='Karnataka'>Karnataka</option><option value='Kerala'>Kerala</option><option value='Madhya Pradesh'>Madhya Pradesh</option>
                    <option value='Maharashtra'>Maharashtra</option><option value='Manipur'>Manipur</option><option value='Meghalaya'>Meghalaya</option><option value='Mizoram'>Mizoram</option><option value='Nagaland'>Nagaland</option>
                    <option value='Odisha'>Odisha</option><option value='Punjab'>Punjab</option><option value='Rajasthan'>Rajasthan</option><option value='Sikkim'>Sikkim</option><option value='Tamil Nadu'>Tamil Nadu</option>
                    <option value='Telangana'>Telangana</option><option value='Tripura'>Tripura</option><option value='Uttarakhand'>Uttarakhand</option><option value='Uttar Pradesh'>Uttar Pradesh</option><option value='West Bengal'>West Bengal</option>   
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
                <button type="submit" class="btn btn-lg btn-success btn-block" name='submit'>Add</button>
                <button type="submit" class="btn btn-lg btn-info btn-block" name='display'>Display</button>                                            
        </form>
    </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>    
</body> 
</html>
<?php
     include("database.php");
    //  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($_POST['submit']))
    {        
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
       
            if($name=='' or $father=='' or $age=='' or $date=='' or $gender=='' or $marital=='' or $income=='' or $education=='' or $address==''or $state=='' or $job=='')
            {
                echo "<script>alert('Any field is empty')</script>";
                exit();
            }
                     
            $query = " insert into user_data(name,father_name,age,date_of_birth,gender,marital_status,annual_income,education,address,state,job) values('$name','$father','$age','$date','$gender','$marital','$income','$education','$address','$state','$job')";
            if (mysql_query($query)) 
            {
                echo "<script>alert('your Data is inserted')</script>";
                echo "<script>window.open('index.php?published=Data has been Inserted..','_self')</script>";
                
            } 
    }
?>
<?php 
     include("database.php");
     if(isset($_POST['logout']))
     {
        echo "<script>window.open('logout.php','_self')</script>";
        
     }
?>
<?php 
     include("database.php");
     if(isset($_POST['display']))
     {
        echo "<script>window.open('display.php?display=your data is display','_self')</script>";
        
     }
?>
<?php } ?>