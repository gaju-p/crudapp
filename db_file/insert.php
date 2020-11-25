<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Insert Data</title>
    <style>
        .down1{
        margin-top: 20px;
        text-align: center;
    }
    .btn{
        margin-left:10px;
    }
    @media (max-width: 767.98px) { 

    /**insert data**/
    .down1{
        justify-content: center;
        text-align: center; 
    }
    }
        
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb down1">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Insert New Data</li>
            </ol>
            <div class="col-12 col-md-9">
            <form action="insert.php" method="POST">
                    <div class="form-group">
                        <label for="hdcnum" class="col-md-2 col-form-label">HDC Number:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter HDC No." name="hdc" id="hdc" Required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fname" class="col-md-2 col-form-label">First Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" id="first_name" Required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mname" class="col-md-2 col-form-label">Middle Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name" id="middle_name" Required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lname" class="col-md-2 col-form-label">Last Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" id="last_name" Required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-md-2 col-form-label">Phone No.:</label>
                        <div class="col-md-10">
                            <input type="tel" class="form-control" placeholder="Enter Phone No." name="phone" id="phone" Required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="place" class="col-md-2 col-form-label">City:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Enter City" name="place" id="place" Required>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="offset-md-2 col-md-10">
                            <button type="submit" name="save" class="btn btn-primary">Save Data</button> <br><br>  
                        </div>
                    </div>                
                </form>
            </div>
        </div>
    </div>
   </body>
</html>

<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
     $hdc = $_POST['hdc'];
     $first = $_POST['first_name'];
	 $middle = $_POST['middle_name'];
	 $last = $_POST['last_name'];
	 $phone_no = $_POST['phone'];
	 $city_name = $_POST['place'];

    $dup = mysqli_query($conn, "SELECT * from cust1 where hdc_no='$hdc' ");

    if(mysqli_num_rows($dup) > 0)
    {
        echo '<script type="text/javascript"> alert(" This HDC number already exists...") </script>';
    }
    else {

	 $sql = "INSERT INTO cust1 (hdc_no,first_name,middle_name,last_name,phone_no,city)

     VALUES ('$hdc','$first','$middle','$last','$phone_no','$city_name')";

     if (mysqli_query($conn, $sql)) 
     {
        echo '<script type="text/javascript"> alert("Data Saved") </script>';
     } 
     else 
     {
        echo '<script type="text/javascript"> alert("Data not Saved") </script>';
     }
    }
	 mysqli_close($conn);
}
?>