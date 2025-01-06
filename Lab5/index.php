<?php

try {
    $username = "root";
    $password = "";
    $servername = "mysql:host=localhost;dbname=restaurant;charset=utf8";
    $conn = new PDO(
        $servername,
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Database connection error : ". $e->getMessage();
    exit();
}

$name = isset($_GET['name']) ?$_GET['name']: '%';
$stm = $conn->prepare('SELECT * FROM customers');
$stm->execute();


?>

<!DOCTYPE html>
<html>
<head>
    <title>รายชื่อลูกค้า</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #0f0f0f;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>รายชื่อลูกค้า</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>เมือง</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
