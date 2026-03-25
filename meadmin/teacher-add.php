<?php
if (isset($_POST['add_teacher_info'])) {
    $add_t_fullname = app_post('add_t_fullname');
    $add_t_address = app_post('add_t_address');
    $add_t_email = app_post('add_t_email');
    $add_t_username = app_post('add_t_username');
    $add_t_pass = app_post('add_t_pass');
    $add_t_father = app_post('add_t_father');
    $add_t_mother = app_post('add_t_mother');
    $add_t_dob = app_post('add_t_dob');
    $add_t_qualification = app_post('add_t_qualification');
    $add_t_contact = app_post('add_t_contact');
    $add_t_staff = app_post('add_t_staff');
    $add_t_gender = app_post('add_t_gender');

    if (
        $add_t_fullname === '' ||
        $add_t_address === '' ||
        $add_t_email === '' ||
        $add_t_username === '' ||
        $add_t_pass === '' ||
        $add_t_father === '' ||
        $add_t_mother === '' ||
        $add_t_dob === '' ||
        $add_t_qualification === '' ||
        $add_t_contact === '' ||
        $add_t_staff === '' ||
        $add_t_gender === '' ||
        $add_t_gender === 'Select Gender'
    ) {
        echo "<script>alert('Please complete every teacher field.');</script>";
    } elseif (!filter_var($add_t_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid teacher email address.');</script>";
    } elseif (strlen($add_t_pass) < 8) {
        echo "<script>alert('Teacher password must be at least 8 characters long.');</script>";
    } else {
        $add_done = $ravi->add_teacher(
            $add_t_fullname,
            $add_t_address,
            $add_t_email,
            $add_t_username,
            $add_t_pass,
            $add_t_father,
            $add_t_mother,
            $add_t_dob,
            $add_t_qualification,
            $add_t_contact,
            $add_t_staff,
            $add_t_gender
        );

        if ($add_done === true) {
            echo "<script>window.location='home.php?ravi=teacher-information';</script>";
        } else {
            echo "<script>alert('Unable to add the teacher. Check for duplicate usernames and try again.');</script>";
        }
    }
}
?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="home.php">Home</a></li>
			<li class="active">
				<?php echo e(app_title_label(app_get('ravi'))); ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo e(app_title_label(app_get('ravi'))); ?>
		</h2>

		<div class="grid-1">
			<div class="form-body">
				<form class="form-horizontal" method="post">
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="add_t_fullname" placeholder="Full Name"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="add_t_address" placeholder="Teacher Current Address"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_email" placeholder="Email"> </div>

					</div>
				<div class="form-group"> <label for="address" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_username" placeholder="Username"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-9"> <input type="password" class="form-control" name="add_t_pass" placeholder="Password"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Father</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_father" placeholder="Father Name"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Mother</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_mother" placeholder="Mother Name"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_dob" placeholder="Date Of Birth"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Qualification</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_qualification" placeholder="Qualification"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_contact" Placeholder="Contact Number"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Staff Type</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="add_t_staff" placeholder="Staff Type"> </div>

					</div>
					<div class="form-group">


						<select id="selector1" class="form-control1" name="add_t_gender">
						   <option>Select Gender</option>
							<option value="Male">Male</option>
						   <option value="Female">Female</option>
							</select>
					</div>


					<div class="col-sm-offset-2"> 
						<input type="submit" class="btn btn-default" name="add_teacher_info" value ="Add Teacher Info">
						</div>
				</form>
			</div>

		</div>


	</div>
