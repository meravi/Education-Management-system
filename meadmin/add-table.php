<?php
if (isset($_POST['add_table'])) {
	$Nepdev_table_Name = app_post('Nepdev_table_Name');
	$Nepdev_student_name = app_post('student_name');
	$Nepdev_student_grade = app_post('grade');
	$Nepdev_subject1 = app_post('subject1', 'subject_1');
	$Nepdev_subject2 = app_post('subject2');
	$Nepdev_subject3 = app_post('subject3');
	$Nepdev_subject4 = app_post('subject4');
	$Nepdev_subject5 = app_post('subject5');
	$Nepdev_subject6 = app_post('subject6');
	$Nepdev_subject7 = app_post('subject7');
	$Nepdev_subject8 = app_post('subject8');
	$Nepdev_subject9 = app_post('subject9');
	$Nepdev_subject10 = app_post('subject10');
	$Nepdev_subject11 = app_post('subject11');
	$Nepdev_add_table_success = $ravi->meravi_add_table($Nepdev_table_Name,$Nepdev_student_name,$Nepdev_student_grade,$Nepdev_subject1,$Nepdev_subject2,$Nepdev_subject3,$Nepdev_subject4,$Nepdev_subject5,$Nepdev_subject6,$Nepdev_subject7,$Nepdev_subject8,$Nepdev_subject9,$Nepdev_subject10,$Nepdev_subject11);
	if($Nepdev_add_table_success==true)
	{
		echo "<script>alert('Result table created successfully.'); window.location='home.php?ravi=add-table';</script>";
	}
	else
	{
		echo "<script>alert('Unable to create that result table. Use unique column names and try again.'); window.location='home.php?ravi=add-table';</script>";
	}
}
if(isset($_POST['add_exam_term']))
{
	$Nepdev_exam_term = app_post('Nepdev_exam_term');
	$Nepdev_success_term = $ravi->Nepdev_Exam_Term($Nepdev_exam_term);
	if($Nepdev_success_term)
	{
		echo "<script>alert('Exam term added successfully.');</script>";
	}
	else
	{
		echo "<script>alert('Unable to add that exam term. It may already exist.');</script>";
	}
	
}
?>
<div class="forms-main">
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo e(app_title_label(app_get('ravi'))); ?></h2>
			
<form method="post">
	<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">Add Exam Term</label>
					<input type="text" placeholder="first_term" required="" name="Nepdev_exam_term">
				</div>

				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Add Exam Term" name="add_exam_term">
					
				</div>
</form>
			<form method="post">
					<div class="col-md-6 form-group1 group-mail">
					<label class="control-label">Table Name</label>
					<input type="text" placeholder="Table Name eg: Class 1" required="" name="Nepdev_table_Name">
				</div>
				<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Grade</label>
						<input type="text" value="student_grade" name="grade" readonly="">
					</div>
				<div class="clearfix"> </div>
				<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Student Name</label>
						<input type="text" value="student_name" name="student_name" readonly="">
					</div>
			
						<div class="col-md-6 form-group1">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject1" value="english">
					</div>
					<div class="clearfix"> </div>
							<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject2" value="english2">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">SUbject Name</label>
						<input type="text"  name="subject3" value="math">
					</div>
						<div class="clearfix"> </div>
								<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject4" value="math2">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Subject Name</label>
						<input type="text"  name="subject5" value="Social">
					</div>
						<div class="clearfix"> </div>
								<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject6" value="Health">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Subject Name</label>
						<input type="text"  name="subject7" value="GK">
					</div>
						<div class="clearfix"> </div>
									<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject8" value="Computer">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Subject Name</label>
						<input type="text"  name="subject9" value="Science">
					</div>
						<div class="clearfix"> </div>
							<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Subject Name</label>
						<input type="text" name="subject10" value="Nepali">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Exam Term</label>
						<input type="text"  name="subject11" value="first_term">
					</div>
						<div class="clearfix"> </div>
				
				
				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Add Table & Field" name="add_table">
					
				</div>
			</form>
<br><br><br>
			<!---->
		</div>

	</div>
</div>
