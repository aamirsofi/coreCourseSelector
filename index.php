<?php
require_once('formDetails.php');
require_once('database\database.php');
$connection = Database::open();
session_start();
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
	<title>Document</title>
</head>

<body>
	<section id="" class="main-content">
		<div class="container form-container">
			<div class="title-section col-lg-12 text-center">
				<h2> SP College Srinagar</h2>
			</div>



			<div class="mt-2 col-lg-12 box-container">
				<div class="text-center bg-danger my-2 text-white col-lg-12 box-mandatory" id="msg">
					Feilds marked with * are mandatory!
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						//opening connection to database
						$details = new stdDetails();
						$_SESSION['details'] = $details;
						$details->setStdName($_POST['std_name']);
						$details->setStdFormNo($_POST['std_form_no'], $connection);
						$details->setStdPhone($_POST['std_number']);
						$details->setStdEmail($_POST['std_email']);
						// $_SESSION['details'];
						// $details->getStdName();
						if (!$details->error) {
							header("Location:form2.php");
						}
					}
					?>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="box-heading  text-center">
						Enter Your Details
					</div>
					<div class="box-body ">
						<div class="row mt-2 mx-1">
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="form-group">
									<label class="label mt-2 mb-0"> Student Name <span class="text-danger">*</span> </label>
									<input type="text" name="std_name" class="input-style " required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="form-group">
									<label class="label mt-3 mb-0"> University Form Number <span class="text-danger">*</span> </label>
									<input oninput="this.value = this.value.toUpperCase()" type="text" name="std_form_no" class="input-style " id="std_form_no" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="form-group">
									<label class="label mt-2 mb-0"> Mobile No. (Without Country Code) <span class="text-danger">*</span></label>
									<input type="tel" name="std_number" class="input-style " pattern="[6789][0-9]{9}" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="form-group">
									<label class="label mt-3 mb-0"> Email <span class="text-danger">*</span></label>
									<input type="email" name="std_email" class="input-style " required>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
								<div class="form-group label mt-3 mb-0">
									<button class="btn btn-primary" type="submit" name="submit-btn">Submit</button>
								</div>
							</div>
						</div>

					</div>


			</div>
			</form>
		</div>
	</section>
	<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $("#std_form_no").blur(function(){
        let std_form_no = $(this).val();
        $.ajax({
            url: 'validation.php',
            method: "POST",
            data: {
                 std_form_no: std_form_no
             },
             success: function(data) {
                    if (data != '0') {
                        $("#msg").text("You have already selected your subjects");
                    } else {
                        console.log("yOU CAN CONTINUE");
                    }
                }
        });
      });
    </script> -->
</body>

</html>