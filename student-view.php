<?php
session_start();
require "dbcon.php";
?>
<?php include("includes/header.php")?>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student View Details
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id'";
                            $query_ran = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_ran)> 0){
                                $student = mysqli_fetch_array($query_ran);                                
                                ?>

                    <div class="form-group mb-3">
                        <label for="name">Student Name</label>
                        <p class="form-control">
                            <?=$student['name'];?>
                        </p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Student Email</label>
                        <p class="form-control">
                            <?=$student['email'];?>
                        </p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="number">Student Phone</label>
                        <p class="form-control">
                            <?=$student['phone'];?>
                        </p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="course">Student Course</label>
                        <p class="form-control">
                            <?=$student['course'];?>
                        </p>
                    </div>
                    <?php
                            }
                            else{
                                echo "No such id found";
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>