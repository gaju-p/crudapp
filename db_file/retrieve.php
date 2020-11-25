<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Display Data</title>
  <style>
    .down1{
      text-align: center;
      margin-top:20px;
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
  
    <form action="retrieve.php" method="POST">
      <div class="container">
        <div class="row">
          <ol class="col-12 breadcrumb down1">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Retrieve Existing Data</li>
            </ol>
            <div class="col-12 col-md-9">
              <div class="form-group">
                <label for="hdcnum" class="col-md-2 col-form-label">HDC Number:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Enter HDC No." name="hdc" id="hdc" Required >
                  </div>
              </div>
              <div class="form-group">
                <div class="offset-md-2 col-md-10"> 
                  <button type="submit" name="search" class="btn btn-primary">View Data</button>
                </div>
              </div>
            </div>
        </div>
      </div>
    </form><br>
    <hr/>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-dark table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>HDC No.</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Phone No.</th>
                <th>City Name</th>
              </tr>
              </thead><br>

              <?php 
                include_once 'database.php';

                if(isset($_POST['search']))
                {
                  $hdc_no = $_POST['hdc'];

                  $query = "SELECT * FROM cust1 where hdc_no='$hdc_no'";
                  $query_run = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_array($query_run))
                  {
                    ?>
                    <tbody>
                      <tr>
                        <td> <?php echo $row['hdc_no']; ?> </td>
                        <td> <?php echo $row['first_name']; ?> </td>
                        <td> <?php echo $row['middle_name']; ?> </td>
                        <td> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['phone_no']; ?> </td>
                        <td> <?php echo $row['city']; ?> </td>
                      </tr>
                    </tbody>
                   
                    <?php
                  }
                }
              ?>
            
          </table>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>