<?php
require_once('formDetails.php');
require_once('database\database.php');
$connection = Database :: open();

    session_start();
    if (!isset($_SESSION['details'])) {
       header('location:index.php');
   }else{
       $details = $_SESSION['details'];
       $major_subject = $details->getMajorSubject();
       $minor_subject = $details->getMinorSubject();
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
                    <div class="text-center bg-danger my-2 text-white col-lg-12 box-mandatory" id="msg">
                        Feilds marked with * are mandatory!
                        <?php

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $details = $_SESSION['details'];
                                if (!array_key_exists("multidisciplinary_subject",$_POST)){
                                    echo "<br> Multidisciplinary Subject Missing";
                                }elseif(!array_key_exists("skill_subject",$_POST)){
                                    echo "<br> Skill Subject Missing";
                                }else{
                                    $details->setMulSub($_POST['multidisciplinary_subject']);
                                    $details->setSkillSub($_POST['skill_subject']);
                                    // header("Location:form3.php");
                                    $details->addDetails($connection);
                                    // $query2 = $connection->prepare("SELECT count FROM multidisciplinary_subjects WHERE subject_name = :mulSub");
                                    // $query2->bindParam(':mulSub', $_POST['multidisciplinary_subject']);
                                    // $query2->execute();
                                    // $result11=$query2->fetchAll();
                                    // $count = $result11[0]['count'];
                                    // echo $count = $count+1;
                                }
                            }
                        ?>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-heading  text-center">
                        Select Multidisciplinary and Skill Subject
                    </div>
                    <div class="box-body ">
                        <div class="row mt-2 mx-1">
                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                                <div class="form-group">
                                <label class="label mt-2 mb-0"> Multidisciplinary Subject <span class="text-danger">*</span> </label>
                                <select name="multidisciplinary_subject" tabindex="-1" class="input-style   select-container" required>
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php
                                       require_once('database\database.php');
                                       $connection = Database :: open();
                                       $query1 = $connection->prepare("SELECT subject_name FROM multidisciplinary_subjects WHERE count < 80 ");
                                       $query1->execute();
                                       $result = $query1->fetchAll();
                                       foreach ($result as $subject) {
                                           if($subject['subject_name']  == "Math"){
                                               if($major_subject == "Information Technology" || $major_subject == "Physics" ||            $major_subject=="Electronics" || $minor_subject == "Information Technology" || $minor_subject == "Physics" || $minor_subject=="Electronics" || $minor_subject=="Mathematics"){
                                                   continue;
                                               }else{
                                                   ?>
                                                   <option value="<?php echo $subject['subject_name']; ?>"> <?php echo $subject['subject_name']; ?> </option>

                                                   <?php
                                               }
                                           }else{

                                     ?>

                                    <option value="<?php echo $subject['subject_name']; ?>"> <?php echo $subject['subject_name']; ?> </option>
                                    <?php
                                     }
                                        }
                                        ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                                <div class="form-group">
                                    <?php

                                    // var_dump($result)
                                     ?>
                                <label class="label mt-3 mb-0"> Skill Subject <span class="text-danger">*</span> </label>
                                <select name="skill_subject" tabindex="-1" class="input-style   select-container" required>
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <?php
                                    $query1 = $connection->prepare("SELECT category from major_subjects Where subject_name = :major_subject");
                                    $query1->bindParam(':major_subject', $major_subject);
                                    $query1->execute();
                                    $result1=$query1->fetchAll();
                                    $category = $result1[0]['category'];

                                    $query2 = $connection->prepare("SELECT subject_name,parent_department FROM skill_subjects WHERE  count < 40 AND (category = :category OR category = '0') ");
                                    $query2->bindParam(':category', $category);
                                    $query2->execute();
                                    $result = $query2->fetchAll();
                                       foreach ($result as $subject) {
                                     ?>
                                    <option value="<?php echo $subject['subject_name']; ?>"> <?php echo $subject['parent_department']; echo " - "; echo $subject['subject_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                                </select>
                                </div>
                            </div>
                             <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
                                <div class="form-group label mt-3 mb-0">
                                <!-- <label class="label mt-3 mb-0"> Mobile No.</label> -->
                                <!-- <input type="tel" name="std_no" class="input-style " required> -->
                                <button class="btn btn-primary" type="submit" name="submit-btn">Submit</button>
                                </div>
                             </div>
                        </div>

                    </div>
                </div>
         </form>
        </div>
    </section>
</body>
</html>
