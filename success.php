<?php
require_once('formDetails.php');
require_once('database\database.php');
$connection = Database :: open();
    session_start();
    if (!isset($_SESSION['details'])) {
       header('location:index.php');
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
 <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="styles/styles.css">
    <title>Major/Minor</title>
</head>
<body>
    <section id="" class="main-content" >
        <div class="container form-container">
            <div class="title-section col-lg-12 text-center">
                <h2>  SP College Srinagar</h2>
            </div>
                <div class="mt-2 col-lg-12 box-container">
                    <?php
                         unset($_SESSION['details']);
                     ?>
                    <div class="box-heading  text-center">
                        You Have Successfully Selected Your Subjects
                    </div>

                    <div class="box-body ">
                        <div class="row mt-2 mx-1">
                            <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
                               <div class="form-group label mt-3 mb-0">
                               <!-- <label class="label mt-3 mb-0"> Mobile No.</label> -->
                               <!-- <input type="tel" name="std_no" class="input-style " required> -->
                               <button class="btn btn-primary" type="submit" name="submit-btn">
                                   <a style="text-decoration:none;color:white;" href="index.php">Go Back</a>
                               </button>
                               </div>
                            </div>

                    </div>
                </div>
        </div>
    </section>
</body>
</html>
