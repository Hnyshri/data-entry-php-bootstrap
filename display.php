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
    <title>Display the Data</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="container-fluid">
        <div type="submit" class="btn btn-default" id="logout" name='submit'><a href="logout.php">Logout</a></div>
        <div type="submit" class="btn btn-default" id="logout" name='submit'><a href="index.php">Back</a></div>
        <center><h2><label><font color="black">Display the All Data</font></label></h2></center>           
    <?php 
        if(isset($_GET['display'])) 
        {
    ?> 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Annual Income</th>
                    <th>Education</th>
                    <th>Address</th>
                    <th>state</th>
                    <th>Job</th>                    
                </tr>
            </thead>
            <tbody>
        <?php
            include("database.php");
            $i=1;
            if(isset($_GET['display']))
            {
                $query = "Select * from user_data order by 1 DESC"; 
				$run = mysql_query($query);
				while( $row = mysql_fetch_array($run))
				{
					$id = $row['id'];					
                    $name = $row['name'];
                    $father = $row['father_name'];
                    $age = $row['age'];
                    $dob = $row['date_of_birth'];
                    $gender = $row['gender'];
                    $marital = $row['marital_status'];
                    $income = $row['annual_income'];
                    $education = $row['education'];
                    $address = substr($row['address'],0,30);
                    $state = $row['state'];
                    $job = $row['job'];                    
            ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $father;?></td>
                    <td><?php echo $age;?></td>
                    <td><?php echo $dob;?></td>
                    <td><?php echo $gender;?></td>
                    <td><?php echo $marital;?></td>
                    <td><?php echo $income;?></td>
                    <td><?php echo $education;?></td>
                    <td><?php echo $address;?></td>
                    <td><?php echo $state;?></td>
                    <td><?php echo $job;?></td>
                    
                   <td><button type="submit" class="btn btn-default" name='logout'><a href="edit.php?edit=<?php echo $id; ?>">Edit</a></button></td>
                   <td><button type="submit" class="btn btn-danger" name='logout'><a href="delete.php?del=<?php echo $id; ?>"><font color="white">Delete</font></a></button></td> 
                </tr>
            </tbody>            
        <?php } } } ?>
        </table>
</div>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>    
</body> 
</html>
<?php }?>