<?php
session_start();
require'dbcon.php';
?>
<?php include("includes/header.php")?>
<div class="container mt-3">
    <?php include "message.php"?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details
                        <a href="student-create.php" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body" ;>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Cours</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                            $query = "SELECT * FROM students";
                            $query_ran = mysqli_query($conn, $query);
                            
                            foreach($query_ran as $student)
                            {
                             //echo $student['name'];
                             ?>
                            <tr>
                                <td><?= $student['id'];?></td>
                                <td><?= $student['name'];?></td>
                                <td><?= $student['email'];?></td>
                                <td><?= $student['phone'];?></td>
                                <td><?= $student['course'];?></td>
                                <td>
                                    <a href="student-view.php?id=<?=$student['id'];?>"
                                        class="btn btn-info btn-md">View</a>
                                    <a href="student-edit.php?id=<?=$student['id'];?>"
                                        class="btn btn-success btn-md">Edit</a>
                                    <form action="code.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_student" value="<?= $student['id'];?>"
                                            class="btn btn-danger btn-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>