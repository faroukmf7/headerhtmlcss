<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "INSERT INTO profile_users (fname, sname, email, phonenumber) 
                VALUES (:fname, :sname, :email, :phonenumber)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':fname' => $_POST['fname'],
            ':sname' => $_POST['sname'],
            ':email' => $_POST['email'],
            ':phonenumber' => $_POST['phonenumber']
        ]);

        echo "<h1>User added successfully!</h1>"; 
    } catch (PDOException $e) {
        echo "<h1>Error: " . $e->getMessage()."</h1>";
    }
}
header("Location: thelist.php");
exit();

?>