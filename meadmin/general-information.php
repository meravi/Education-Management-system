


<div class="forms-main">
	
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			
			
			<?php 

	$web_info_check = $ravi->general_setting_check();
			$check_we = $web_info_check->num_rows;
	  if($check_we>0)
	  {
		 echo "<script>alert('You Have Aleread Added Your Website Info ');</script>" ;
	  	echo "<script>window.location = 'home.php';</script>";
	  }		
			else
			{
 if(isset($_POST['add_general_setting']))
 {
	 // $web_name,$web_address,$web_phone1,$web_phone2,$web_email1,$web_email2,$web_start,$web_about
	 $web_name = $_POST['web_name'];
	 $web_address = $_POST['web_address'];
	 $web_phone1 = $_POST['web_phone1'];
	 $web_phone2 = $_POST['web_phone2'];
	 $web_email1 = $_POST['web_email1'];
	 $web_email2 = $_POST['web_email2'];
	 $web_start = $_POST['web_start'];
	 $web_about = $_POST['web_about'];
	 
	 	$web_info_success = $ravi->general_setting($web_name,$web_address,$web_phone1,$web_phone2,$web_email1,$web_email2,$web_start,$web_about);
	 if($web_info_success==true)
	 {
		 echo "<script>alert('Success Added Website Information Thank You.....');</script>";
		 echo "<script>window.location= 'home.php';</script>";
	 }
	 else
	 {
		 echo "<script>alert('Please contact with devloper for fixing this problem or try later');</script>";
	 }
	  

	 
	 
 }

			}
?>
			
			<form method="post">
					<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">Website Name</label>
					<input type="text" placeholder="Website Name" name="web_name">
				</div>
				<div class="vali-form">
				
					
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Address</label>
						<input type="text" placeholder="Address" name="web_address">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Primary Phone</label>
						<input type="text" placeholder="Primary Phone Number" name="web_phone1">
					</div>
			
					<div class="clearfix"> </div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Secondary Phone</label>
						<input type="text" placeholder="Secondary Phone" name="web_phone2">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Primary Email</label>
						<input type="text" placeholder="Primary Email" name="web_email1">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Secondary Email</label>
						<input type="text" placeholder="Secondary Email" name="web_email2">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Company Start From</label>
						<input type="text" placeholder="eg: 2018" required="" name="web_start">
					</div>
				
					<div class="col-md-12 form-group1 form-last">
						<label class="control-label">About Us</label>
							<textarea name="web_about" id="txtarea1" cols="50" rows="4" class="form-control1" data-gramm="true" data-txt_gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" data-gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: 19.4286px; font-size: 13.6px; transition: none; background: transparent !important;"></textarea>
					</div>
					
				</div>
					<div class="clearfix"> </div>
				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Update Website Info" name="add_general_setting">
				
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->