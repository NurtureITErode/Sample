<?php
// Database connection
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['submit'])) {
    $roll_No = $_POST['roll_no'];
    $shade = $_POST['shade'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $shrinkageLength = $_POST['shrinkage_Length'];
    $shrinkageWidth = $_POST['shrinkage_Width'];

    // Insert query
    $sql = "INSERT INTO fabricitem (rollno, shade, length, width, shrinkage_Length, shrinkage_Width) 
            VALUES ('$roll_No', '$shade', '$length', '$width', '$shrinkageLength', '$shrinkageWidth')";

    if (mysqli_query($connection, $sql)) {
        echo '<script>alert("Record added successfully!");</script>';
        echo '<script> location.replace("index.php")</script>'; 
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabric Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Fabric Item</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Roll No</label>
                                <input type="text" name="roll_no" class="form-control" placeholder="Enter roll no" required>
                            </div>
                            <div class="form-group">
                                <label>Shade</label>
                                <input type="text" name="shade" class="form-control" placeholder="Enter shade" required>
                            </div>
                            <div class="form-group">
                                <label>Length</label>
                                <input type="text" name="length" class="form-control" placeholder="Enter length" required>
                            </div>
                            <div class="form-group">
                                <label>Width</label>
                                <input type="text" name="width" class="form-control" placeholder="Enter width" required>
                            </div>
                            <div class="form-group">
                                <label>Shrinkage Length</label>
                                <input type="text" name="shrinkage_Length" class="form-control" placeholder="Enter shrinkage length" required>
                            </div>
                            <div class="form-group">
                                <label>Shrinkage Width</label>
                                <input type="text" name="shrinkage_Width" class="form-control" placeholder="Enter shrinkage width" required>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-primary" name="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
