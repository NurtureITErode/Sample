<?php
// Database connection
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle search query
$searchQuery = "";
if (isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($connection, $_POST['search_term']);
    $searchQuery = "WHERE rollno LIKE '%$searchTerm%' OR shade LIKE '%$searchTerm%' OR length LIKE '%$searchTerm%' 
                    OR width LIKE '%$searchTerm%' OR shrinkage_Length LIKE '%$searchTerm%' OR shrinkage_Width LIKE '%$searchTerm%'";
}

// Fetch records
$sql = "SELECT * FROM fabricitem $searchQuery";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Fabric Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Search Fabric Items</h1>

        <!-- Search Form -->
        <form action="" method="post" class="mb-4">
            <div class="input-group">
                <input type="text" name="search_term" class="form-control" placeholder="Enter a search term (e.g., Roll No, Shade)" required>
                <button class="btn btn-primary" type="submit" name="search">Search</button>
            </div>
        </form>

        <!-- Table to Display Results -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Shade</th>
                    <th>Length</th>
                    <th>Width</th>
                    <th>Shrinkage Length</th>
                    <th>Shrinkage Width</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['rollno']}</td>
                            <td>{$row['shade']}</td>
                            <td>{$row['length']}</td>
                            <td>{$row['width']}</td>
                            <td>{$row['shrinkage_Length']}</td>
                            <td>{$row['shrinkage_Width']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No matching records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
