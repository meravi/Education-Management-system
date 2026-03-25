<?php
$teacher_id = app_get_int('teacherid');
$edit_teacher_info = $teacher_id > 0 ? $ravi->edit_teacherid($teacher_id) : false;
$edit_teacher_display = $edit_teacher_info ? $edit_teacher_info->fetch_assoc() : null;

if (!$edit_teacher_display) {
    echo "<script>alert('Teacher not found.'); window.location='home.php?ravi=teacher-information';</script>";

    return;
}

if (isset($_POST['up_teacher'])) {
    $up_fullname = app_post('up_fullname');
    $up_address = app_post('up_address');
    $up_email = app_post('up_email');
    $up_father = app_post('up_father');
    $up_mother = app_post('up_mother');
    $up_dob = app_post('up_dob');
    $up_qualification = app_post('up_qualification');
    $up_contact = app_post('up_contact');
    $up_staff = app_post('up_staff');
    $up_gender = app_post('up_gender');

    if (
        $up_fullname === '' ||
        $up_address === '' ||
        $up_email === '' ||
        $up_father === '' ||
        $up_mother === '' ||
        $up_dob === '' ||
        $up_qualification === '' ||
        $up_contact === '' ||
        $up_staff === '' ||
        $up_gender === ''
    ) {
        echo "<script>alert('Please complete every teacher field before saving.');</script>";
    } elseif (!filter_var($up_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid teacher email address.');</script>";
    } else {
        $update_done = $ravi->update_teacher_info(
            $up_fullname,
            $up_address,
            $up_email,
            $up_father,
            $up_mother,
            $up_dob,
            $up_qualification,
            $up_contact,
            $up_staff,
            $up_gender,
            $teacher_id
        );

        if ($update_done === true) {
            echo "<script>window.location='home.php?ravi=teacher-information';</script>";
        } else {
            echo "<script>alert('Unable to update teacher information.');</script>";
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
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_fullname" value="<?php echo e($edit_teacher_display['t_fullname']); ?>"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_address" value="<?php echo e($edit_teacher_display['t_address']); ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_email" value="<?php echo e($edit_teacher_display['t_email']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Father</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_father" value="<?php echo e($edit_teacher_display['t_father']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Mother</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_mother" value="<?php echo e($edit_teacher_display['t_mother']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_dob" value="<?php echo e($edit_teacher_display['t_dob']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Qualification</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_qualification" value="<?php echo e($edit_teacher_display['t_qualification']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_contact" value="<?php echo e($edit_teacher_display['t_contact']); ?>"> </div>

					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Staff Type</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_staff" value="<?php echo e($edit_teacher_display['t_staff_type']); ?>"> </div>

					</div>
					<div class="form-group">


						<select id="selector1" class="form-control1" name="up_gender">
						   <option value="<?php echo e($edit_teacher_display['t_gender']); ?>">Select Gender</option>
							<option>Male</option>
						   <option>Female</option>
							</select>
					</div>


					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_teacher">Update Teacher Profile</button> </div>
				</form>
			</div>

		</div>


	</div>
