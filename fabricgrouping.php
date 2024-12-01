<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$groupedData = [];

if (isset($_POST['filter'])) {
    $rangeInterval = (int)mysqli_real_escape_string($connection, $_POST['range_interval']);
    if ($rangeInterval <= 0) {
        echo "<script>alert('Please enter a valid interval greater than 0');</script>";
    } else {
        $rangeSql = "SELECT * FROM fabricitem";
        $rangeResult = mysqli_query($connection, $rangeSql);

        if (!$rangeResult) {
            die("Query Failed: " . mysqli_error($connection));
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($rangeResult)) {
            $data[] = $row;
        }

        $minWidth = min(array_column($data, 'width'));
        $maxWidth = max(array_column($data, 'width'));

        for ($start = $minWidth; $start <= $maxWidth; $start += $rangeInterval) {
            $end = $start + $rangeInterval;

            $filtered = array_filter($data, function ($item) use ($start, $end) {
                return $item['width'] >= $start && $item['width'] < $end;
            });

            $totalLength = array_sum(array_column($filtered, 'length'));
            $noOfRolls = count($filtered);

            if ($noOfRolls > 0) {
                $groupedData[] = [
                    'Range' => "$start-$end",
                    'no_of_rolls' => $noOfRolls,
                    'total_length' => $totalLength
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabric Item Grouping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Fabric Item Grouping by Width Range</h1>

        <form action="" method="post" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="range_interval" class="form-control" placeholder="Enter interval (e.g., 2)" required>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" name="filter">Filter</button>
                </div>
            </div>
        </form>

        <h2 class="mb-4">Range Summary</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Range (Width)</th>
                    <th>No of Rolls</th>
                    <th>Total Length</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($groupedData)) {
                    foreach ($groupedData as $row) {
                        echo "<tr>
                                <td>{$row['Range']}</td>
                                <td>{$row['no_of_rolls']}</td>
                                <td>{$row['total_length']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No matching records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
