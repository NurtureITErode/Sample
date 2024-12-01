<?php
// Define the fabric items as an associative array
$fabricItems = [
    [
        'Roll No' => 1,
        'Shade' => 'A',
        'Length' => 456,
        'Width' => 52,
        'Sh Length' => 5,
        'Sh Width' => 5
    ],
    [
        'Roll No' => 45,
        'Shade' => 'A',
        'Length' => 54,
        'Width' => 60,
        'Sh Length' => 3,
        'Sh Width' => 5
    ],
    [
        'Roll No' => 72,
        'Shade' => 'B',
        'Length' => 200,
        'Width' => 52,
        'Sh Length' => 0,
        'Sh Width' => 0
    ],
    [
        'Roll No' => 65,
        'Shade' => 'C',
        'Length' => 300,
        'Width' => 53,
        'Sh Length' => 2,
        'Sh Width' => 3
    ],
    [
        'Roll No' => 87,
        'Shade' => 'A',
        'Length' => 100,
        'Width' => 55,
        'Sh Length' => 0,
        'Sh Width' => 0
    ]
];

// Loop through the fabric items and display them in an HTML table
echo "<table border='1'>
        <tr>
            <th>Roll No</th>
            <th>Shade</th>
            <th>Length</th>
            <th>Width</th>
            <th>Sh Length</th>
            <th>Sh Width</th>
        </tr>";

foreach ($fabricItems as $item) {
    echo "<tr>
            <td>{$item['Roll No']}</td>
            <td>{$item['Shade']}</td>
            <td>{$item['Length']}</td>
            <td>{$item['Width']}</td>
            <td>{$item['Sh Length']}</td>
            <td>{$item['Sh Width']}</td>
          </tr>";
}

echo "</table>";
?>
