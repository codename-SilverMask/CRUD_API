<?php
include 'header.php';
?>
<?php
include 'dbcon.php';
?>
<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        ADD STUDENTS
    </button>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM students";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $age = $row['age'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$first_name</td>";
                echo "<td>$last_name</td>";
                echo "<td>$age</td>";
                echo "<td><a href='update.php?id=$id' class='btn btn-primary'>Update</a></td>";
                echo "<td><a href='delete.php?id=$id' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="f_name">
                            First Name
                        </label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="l_name">
                            Last Name
                        </label>
                        <input type="text" name="l_name" class="form-control">
                    </div><div class="form-group">
                        <label for="f_name">
                            Age
                        </label>
                        <input type="text" name="age" class="form-control">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="add_students" value="ADD">
            </div>
        </div>
    </div>
</div>
</form>
<?php
include 'footer.php';
?>