<?php
include 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $age = $row['age'];
    }
}

if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $query = "UPDATE students SET first_name = '$first_name', last_name = '$last_name', age = '$age' WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    } else {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Student</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
            </div>
            <input type="submit" name="update_student" class="btn btn-primary" value="Update">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>