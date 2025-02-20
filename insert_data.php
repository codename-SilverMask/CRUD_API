<?php
include "dbcon.php";
if (isset($_POST['add_students'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $query = "INSERT INTO students(first_name, last_name, age) VALUES('$f_name', '$l_name', '$age')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        header("Location: index.php");
    }
}


?>