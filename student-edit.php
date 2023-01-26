<?php
session_start();
require "dbcon.php";
?>
<?php include("includes/header.php")?>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
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
                        <form action="code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?= $student['id'];?>">
                            <div class="form-group mb-3">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Student Email</label>
                                <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="number">Student Phone</label>
                                <input type="number" name="number" value="<?=$student['phone'];?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="course">Student Course</label>
                                <input type="text" name="course" value="<?=$student['course'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                              <button type="submit" name="update_student" class="btn btn-primary">
                                Update Student
                            </button>
                            </div>
                        </form>
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