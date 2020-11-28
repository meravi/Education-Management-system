<?php 
 if(isset($_POST['add_table']))
 {

 	$Nepdev_table_Name = $_POST['Nepdev_table_Name'];
 	$Nepdev_student_name = $_POST['student_name'];
 	$Nepdev_student_grade = $_POST['grade'];
 	$Nepdev_subject1 = $_POST['subject1'];
 	if($Nepdev_subject1=="")
 	{
 		$Nepdev_subject1 = " tt";
 	}
 	$Nepdev_subject2 = $_POST['subject2'];
 	$Nepdev_subject3 = $_POST['subject3'];
 	$Nepdev_subject4 = $_POST['subject4'];
 	$Nepdev_subject5 = $_POST['subject5'];
 	$Nepdev_subject6 = $_POST['subject6'];
 	$Nepdev_subject7 = $_POST['subject7'];
 	$Nepdev_subject8 = $_POST['subject8'];
 	$Nepdev_subject9 = $_POST['subject9'];
 	$Nepdev_subject10 =$_POST['subject10'];
 	$Nepdev_subject11 =$_POST['subject11'];
 	$Nepdev_add_table_success = $ravi->meravi_add_table($Nepdev_table_Name,$Nepdev_student_name,$Nepdev_student_grade,$Nepdev_subject1,$Nepdev_subject2,$Nepdev_subject3,$Nepdev_subject4,$Nepdev_subject5,$Nepdev_subject6,$Nepdev_subject7,$Nepdev_subject8,$Nepdev_subject9,$Nepdev_subject10,$Nepdev_subject11);
 	if($Nepdev_add_table_success==true)
 	{
 		echo "<script>alert('Success Added $Nepdev_table_Name'); window.location='http://localhost/projects/project2/meadmin/home.php?ravi=add-table';</script>";
 	}
 	else
 	{
 		echo "<script>alert('Cant Added $Nepdev_table_Name'); window.location='http://localhost/projects/project2/meadmin/home.php?ravi=add-table';</script>";
 	}
}
if(isset($_POST['add_exam_term']))
{
	$Nepdev_exam_term = $_POST['Nepdev_exam_term'];
	$Nepdev_success_term = $ravi->Nepdev_Exam_Term($Nepdev_exam_term);
	if(!$Nepdev_success_term)
	{
		echo "<script>alert('Cant Added $Nepdev_exam_term');</script>";
	}
	
}
?>
<div class="forms-main">
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			
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