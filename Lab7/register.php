<?php
session_start();

try {
    $username = "root";
    $password = "";
    $host = "localhost";
    $dbname = "register";

    $servername = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $conn = new PDO(
        $servername,
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Database connection error : " . $e->getMessage();
    exit();
}

function Register($conn, $username , $first_name , $last_name , $password)   
{
    try {
        $sql = "INSERT INTO user (`username`, `first_name` , `last_name` , `password`) VALUES (:username, :first_name , :last_name , :password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            "username" => $username,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "password" => $password,
        ]);
    } catch (Exception $e) {
        echo "Add user error : " . $e->getMessage();
        exit();
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>

<body>

        <form action="" method="post">
            <fieldset>
                <div>
                    <label for="username">User name</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="first_name">first name</label>
                    <input type="text" name="first_name">
                </div>
                <div>
                    <label for="last_name">last name</label>
                    <input type="text" name="last_name">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                        <button type="submit">Register</button>
                    <a href="index.php">
                        <button type="button">Cancel</button>
                    </a>
                </div>

            </fieldset>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = $_POST['username'] ?? '';
                $first_name = $_POST['first_name'] ?? '';
                $last_name = $_POST['last_name'] ?? '';
                $password = $_POST['password'] ?? '';

                // ตรวจสอบว่าฟิลด์ทั้งหมดไม่ว่างเปล่า
                if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password)) {
                    Register($conn, $username, $first_name, $last_name, $password);
                    echo "User registered successfully!";
                } else {
                    echo "Please fill in all fields!";
                }
            }
        ?>



</body>

</html>