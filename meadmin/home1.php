		
		<div class="outter-wp">
		<!--/tabs-->
		<div class="tab-main">
		<!--/tabs-inner-->
		<div class="tab-inner">
		<div id="tabs" class="tabs">
		<h2 class="inner-tittle">Welcome, <?php echo $info_display['t_fullname']; ?>  </h2>
		<div class="graph">
		<nav>
		<ul>
		<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Information</span></a></li>

		<li><a href="#section-3" class="icon-food"><i class="fa fa-cutlery"></i> <span>Teachers</span></a></li>
		<li><a href="#section-4" class="icon-lab"><i class="fa fa-flask"></i> <span>Subject</span></a></li>
		<li><a href="#section-5" class="icon-truck"><i class="fa fa-truck"></i> <span>Change Admin Info</span></a></li>
		</ul>
		</nav>
		<div class="content tab">
		<section id="section-1">
		<div class="mediabox">
		<strong>Personal Information</strong>
		<p>	<strong>Welcome,</strong>
		<?php echo $info_display['t_fullname']; ?>
		</p>
		<p>	<strong>Qualification:</strong>
		<?php echo $info_display['t_qualification']; ?>
		</p>
		<p>	<strong>Username:</strong>
		<?php echo $info_display['t_username']; ?>
		</p>
		<p>	<strong>Gender:</strong>
		<?php echo $info_display['t_gender']; ?>
		</p>
		<p>	<strong>DOB:</strong>
		<?php echo $info_display['t_dob']; ?>
		</p>
		</div>
		<div class="mediabox">
		<strong>Contact Details</strong>
		<p>	<strong>Phone:</strong>
		<?php echo $info_display['t_contact']; ?>
		</p>
		<p>	<strong>Email:</strong>
		<?php echo $info_display['t_email']; ?>
		</p>
		<p>	<strong>Address:</strong>
		<?php echo $info_display['t_address']; ?>
		</p>	

		</div>
		<div class="mediabox">
		<strong>Parents Detail</strong>

		<p>	<strong>Father:</strong>
		<?php echo $info_display['t_father']; ?>
		</p>
		<p>	<strong>Mother:</strong>
		<?php echo $info_display['t_mother']; ?>
		</p>
		</div>
		</section>
		<section id="section-3">

		<div class="tables">

		<table class="table table-hover"> 
			<thead>
				<tr>
					<th>#</th>
					<th>Photo</th> 
					<th>F.Name</th> 
					<th>Address</th>
					<th>Email</th>
					<th>U.Name</th>
					<th>Pass</th>
					<th>Father</th>
					<th>Mother</th>
					<th>DOB</th>
					<th>Qualification</th>
					<th>Contact</th>
					<th>Gender</th>
				</tr>
			</thead>
			<tbody> 
				
		<?php $teacher_dis_admin = $ravi->teacher_info_display_admin();
		$t_sn = 1;
		while($teacher_info_admin =$teacher_dis_admin->fetch_assoc())					{


				?>						

				
				<tr>
					<th scope="row"><?php echo $t_sn; ?></th>
					<th></th>
					<td><?php echo $teacher_info_admin['t_fullname']; ?></td>
					<td><?php echo $teacher_info_admin['t_address']; ?></td>
					<td><?php echo $teacher_info_admin['t_email']; ?></td>
				<td><?php echo $teacher_info_admin['t_username']; ?></td>
					<td><?php echo $teacher_info_admin['t_pass']; ?></td>
					<td><?php echo $teacher_info_admin['t_father']; ?></td>
					<td><?php echo $teacher_info_admin['t_mother']; ?></td>
					<td><?php echo $teacher_info_admin['t_dob']; ?></td>
					<td><?php echo $teacher_info_admin['t_qualification']; ?></td>
					<td><?php echo $teacher_info_admin['t_contact']; ?></td>
					<td><?php echo $teacher_info_admin['t_gender']; ?></td>
				
				</tr>
		<?php $t_sn++; } ?>
			</tbody> 
		</table>
		</div>

		</section>
		<section id="section-4">

		<div class="graph">
		<div class="tables">

		<table class="table table-hover"> 
			<thead> 
				<tr> 
					<th>#</th> 
					<th>Subject</th> 
					<th>Teacher</th> 
					<th>Time</th>
				</tr> 
			</thead> 
			<tbody> 
					<?php 

		$subject_info_admins = $ravi->subject_info();
				$sub_sn = 1;
		while($display_subject_admin = $subject_info_admins->fetch_assoc())
		{
		?>					<tr> 
					<th scope="row"><?php echo $sub_sn; ?></th> 
					<td><?php echo ucfirst($display_subject_admin['subject_name']); ?></td> 
					<td><?php echo $display_subject_admin['t_fullname']; ?></td> 
					<td><?php echo $display_subject_admin['time']; ?></td> 
				</tr>
				<?php
		$sub_sn++;	}


		?>

			</tbody> 
		</table>
		</div>

		</div>


		</section>
		<section id="section-5">
		<div class="">
		<div class="">
			<div class="form-body text-center">
				<form class="form-horizontal text-center" method="post">
					<div class="col-sm-6"> 
						<div class="form-group"> <input type="text" class="form-control" id="" name="current_username" placeholder="Current UserName" required> </div>
					</div>
					<div class="col-sm-6"> 
						<div class="form-group"> <input type="text" class="form-control" id="" name="new_username" placeholder="New UserName" required> </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group"> <input type="text" class="form-control" id="" name="current_password" placeholder="Current Password" required> </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group"> <input type="text" class="form-control" id="" name="new_password" placeholder="New Password" required> </div>
					</div>
			
			


					<div class="text-center"> 
						<input type="submit" class="btn btn-default" name="update_admin_info" value ="Update Admin Info">
						</div>
				</form>
			</div>

		</div>
		</div>
		<?php 
	if(isset($_POST['update_admin_info'])){
		$new_username = $_POST['new_username'];
		$current_username = $_POST['current_username'];
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$checkmatch = $ravi->meadmin_check($current_username,$current_password);
		if($checkmatch){
			$success = $ravi->meadmin_updatepassword($new_password,$new_username);
			if($success){
			echo "<script>alert('update success');</script>";
			echo "<script>window.location='logouts.php';</script>";
			}
			
		}
		else{
			echo "<script>alert('Not matched Current Username or Password');</script>";
		}
	}
	?>
		</section>
		</div>
		<!-- /content -->
		</div>
		<!-- /tabs -->

		</div>
		<script src="js/cbpFWTabs.js"></script>
		<script>
		new CBPFWTabs(document.getElementById('tabs'));
		</script>
		<div class="clearfix"> </div>
		</div>
		</div>
		<!--//tabs-inner-->


		<!--custom-widgets-->
		<div class="custom-widgets">
		<div class="row-one">
		<div class="col-md-6 widget">
		<div class="stats-left ">
		<h5>Total</h5>
		<h4> Students</h4>
		</div>
		<div class="stats-right">
		<label><?php $count_student_count=  $ravi->student_count(); 
		if(!empty($count_student_count)){
		echo $count_student_count->num_rows;
	}
		 ?></label>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="col-md-6 widget states-mdl">
		<div class="stats-left">
		<h5>Total</h5>
		<h4>Teachers</h4>
		</div>
		<div class="stats-right">
		<label><?php 
		$count_teacher_size=  $ravi->teacher_info_display_admin(); 
		if(!empty($count_teacher_size)){
		echo $count_teacher_size->num_rows;
	}
		?></label>
		</div>
		<div class="clearfix"> </div>
		</div>
	
		</div>
		</div>
		<!--//custom-widgets-->

		<!--/charts-->
		<div class="charts">
		<div class="chrt-inner">
		<!--//weather-charts-->
		<div class="graph-visualization">

		<div class="col-md-6 map-2">
		<div class="profile-nav alt">
		<section class="panel">
		<div class="user-heading alt clock-row terques-bg">
		</div>
		<ul id="clock">
		<li id="sec"></li>
		<li id="hour"></li>
		<li id="min"></li>
		</ul>
		</section>

		</div>
		</div>
		<div class="clearfix"> </div>
		</div>
		</div>
		<!--/charts-inner-->
		</div>
		<!--//outer-wp-->
		</div>
