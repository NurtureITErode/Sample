<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,"dbcrud");
$edit = $_GET['edit'];

$sql = "select * from fabricitem where rollno = '$edit'";

$run = mysqli_query($connection,$sql);


while($row=mysqli_fetch_array($run))
{
    $rollno = $row['rollno'];
    $shade = $row['shade'];
    $length = $row['length'];
    $width = $row['width'];
    $shrinkage_Length  = $row['shrinkage_Length'];
    $shrinkage_Width  = $row['shrinkage_Width'];

}

?>

<?php
   $connection = mysqli_connect("localhost","root","");

    $db = mysqli_select_db($connection,"dbcrud");


    if(isset($_POST['submit']))
        {
          $edit = $_GET['edit'];  
          $shade = $_POST['shade'];
          $length = $_POST['length'];
          $width = $_POST['width']; 
          $shrinkage_Length  = $_POST['shrinkage_Length'];
          $shrinkage_Width  = $_POST['Shrinkage_Width'];

           $sql = "update fabricitem set shade= '$shade',length= '$length',width='$width','$shrinkage_Length','$shrinkage_Width' where RollNo =  '$edit'";

           if(mysqli_query($connection,$sql))
           {

            echo '<script> location.replace("index.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fabric item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h1> fabricitem </h1>
                    </div>
                    <div class="card-body">

                    <form action="add.php" method="post">
                        <div class="form-group">
                        <label>Roll No</label>
                            <input type="text" roll no="rollno" class="form-control"  placeholder="Enter rollno"> 
                        </div>

                        <div class="form-group">
                            <label>Shade</label>
                            <input type="text" shade="shade" class="form-control"  placeholder="Enter shade"> 
                        </div>

                        <div class="form-group">
                            <label>Length</label>
                            <input type="text"  length="length" class="form-control"  placeholder="Enter length"> 
                        </div>
                        <div class="form-group">
                            <label>Width</label>
                            <input type="text"  width="width" class="form-control"  placeholder="Enter width"> 
                        </div>
                        <div class="form-group">
                            <label>Shrinkage_Length</label>
                            <input type="text"  shrinkage_Length="shrinkage_Length" class="form-control"  placeholder="shrinkage_Length"> 
                        </div>
                        <div class="form-group">
                            <label>Shrinkage_Width</label>
                            <input type="text"  shrinkage_width="shrinkage_Width" class="form-control"  placeholder="shrinkage_Width"> 
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                    </div>

                </div>
            
            </div>
        </div>

</body>
</html>