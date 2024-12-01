<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabric Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                        <button class="btn btn-success">
                            <a href="add.php" class="text-light">Add New</a>
                            
                        </button>
                        <button class="btn btn-success">
                            <a href="search.php" class="text-light">Search</a>
                        </button>
                        <button class="btn btn-success">
                            <a href="fabricgrouping.php" class="text-light">fabricgrouping</a>
                        </button>
                        <button class="btn btn-success">
                            <a href="fabric.php" class="text-light">fabric</a>
                        </button>
                        
                        
                        <br/>
                        <br/>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Shade</th>
                                    <th scope="col">Length</th>
                                    <th scope="col">Width</th>
                                    <th scope="col">Shrinkage Length</th>
                                    <th scope="col">Shrinkage Width</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Database connection
                                $connection = mysqli_connect("localhost", "root", "", "dbcrud");
                                if (!$connection) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Query to fetch data
                                $sql = "SELECT rollno, shade, length, width, shrinkage_Length, shrinkage_Width FROM fabricitem";
                                $run = mysqli_query($connection, $sql);

                                if (!$run) {
                                    die("Query failed: " . mysqli_error($connection));
                                }

                                // Check if data exists
                                if (mysqli_num_rows($run) > 0) {
                                    while ($row = mysqli_fetch_array($run)) {
                                        $rollno = $row['rollno'];
                                        $shade = $row['shade'];
                                        $length = $row['length'];
                                        $width = $row['width'];
                                        $shrinkage_Length = $row['shrinkage_Length'];
                                        $shrinkage_Width = $row['shrinkage_Width'];
                                        ?>
                                        <tr>
                                            <td><?php echo $rollno; ?></td>
                                            <td><?php echo $shade; ?></td>
                                            <td><?php echo $length; ?></td>
                                            <td><?php echo $width; ?></td>
                                            <td><?php echo $shrinkage_Length; ?></td>
                                            <td><?php echo $shrinkage_Width; ?></td>
                                            <td>
                                                <button class="btn btn-success">
                                                    <a href='edit.php?edit=<?php echo $rollno; ?>' class="text-light">Edit</a>
                                                </button>
                                                <button class="btn btn-danger">
                                                    <a href='delete.php?del=<?php echo $rollno; ?>' class="text-light">Delete</a>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No data found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
