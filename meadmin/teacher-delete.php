<?php
$currentPage = app_title_label(app_get('ravi'));
?>

<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="home.php">Home</a></li>
			<li class="active">
				<?php echo e($currentPage); ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo e($currentPage); ?>
		</h2>

	
			<div class="tables">


				<table class="table table-bordered ">

					<thead>
						<tr>
							<th>#</th>
							<th>Photo</th>
							<th>F.Name</th>
							<th>Address</th>
							<th>Email</th>
							<th>U.Name</th>
							<th>Password</th>
							<th>Father</th>
							<th>Mother</th>
							<th>DOB</th>
							<th>Qualification</th>
							<th>Contact</th>
							<th>Gender</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $teacher_dis_admin = $ravi->teacher_info_display_admin();
													$t_sn = 1;
													while($teacher_info_admin =$teacher_dis_admin->fetch_assoc())					{
														
													
																		?>


						<tr>
							<th scope="row">
								<?php echo $t_sn; ?>
							</th>
							<th></th>
							<td>
								<?php echo e($teacher_info_admin['t_fullname']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_address']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_email']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_username']); ?>
							</td>
							<td>
								Protected
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_father']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_mother']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_dob']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_qualification']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_contact']); ?>
							</td>
							<td>
								<?php echo e($teacher_info_admin['t_gender']); ?>
							</td>
							<td>
								
				<a href="home.php?ravi=teacher-del&teacherid=<?php echo (int) $teacher_info_admin['t_id']; ?>" class="btn red" onclick="return confirm('Delete this teacher?');">Delete</a>
					</td>
						</tr>
						<?php $t_sn++; } ?>
					</tbody>

				</table>

			</div>
		</div>


	</div>
	<!--//graph-visual-->
