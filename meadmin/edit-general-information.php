


<div class="forms-main">
	
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			
			
			<?php 
	
			
 if(isset($_POST['update_general_setting']))
 {
	 // $web_name,$web_address,$web_phone1,$web_phone2,$web_email1,$web_email2,$web_start,$web_about
	 $upweb_name = $_POST['upweb_name'];
	 $upweb_address = $_POST['upweb_address'];
	 $upweb_phone1 = $_POST['upweb_phone1'];
	 $upweb_phone2 = $_POST['upweb_phone2'];
	 $upweb_email1 = $_POST['upweb_email1'];
	 $upweb_email2 = $_POST['upweb_email2'];
	 $upweb_start = $_POST['upweb_start'];
	 $upweb_about = $_POST['upweb_about'];
	 
	 	$upweb_info_success = $ravi->general_setting_update($upweb_name,$upweb_address,$upweb_phone1,$upweb_phone2,$upweb_email1,$upweb_email2,$upweb_start,$upweb_about);
	 if($upweb_info_success==true)
	 {
		 echo "<script>alert('Success Update Website Information Thank You.....');</script>";
		 echo "<script>window.location= 'home.php';</script>";
	 }
	 else
	 {
		 echo "<script>alert('Please contact with devloper for fixing this problem or try later');</script>";
	 }
	  

	 
	 
 }
	$dis_general_data = $ravi->general_setting_check();
			$display_general_setting = $dis_general_data->fetch_assoc();			
			
?>
			
			<form method="post">
					<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">Website Name</label>
					<input type="text" value="<?php echo $display_general_setting['website_name']; ?>" name="upweb_name">
				</div>
				<div class="vali-form">
				
					
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Address</label>
						<input type="text" value="<?php echo $display_general_setting['website_address']; ?>" name="upweb_address">
					</div>
					
						<div class="col-md-6 form-group1">
						<label class="control-label">Primary Phone</label>
						<input type="text" value="<?php echo $display_general_setting['website_phone1']; ?>" name="upweb_phone1">
					</div>
			
					<div class="clearfix"> </div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Secondary Phone</label>
						<input type="text" value="<?php echo $display_general_setting['website_phone2']; ?>" name="upweb_phone2">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Primary Email</label>
						<input type="text" value="<?php echo $display_general_setting['website_email1']; ?>" name="upweb_email1">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Secondary Email</label>
						<input type="text" value="<?php echo $display_general_setting['website_email2']; ?>" name="upweb_email2">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Company Start From</label>
						<input type="text" value="<?php echo $display_general_setting['website_start']; ?>" name="upweb_start">
					</div>
				
					<div class="col-md-12 form-group1 form-last">
						<label class="control-label">About Us</label>
							<textarea name="upweb_about" id="txtarea1" cols="50" rows="4" class="form-control1" data-gramm="true" data-txt_gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" data-gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: 19.4286px; font-size: 13.6px; transition: none; background: transparent !important;"><?php echo $display_general_setting['web_about']; ?></textarea>
					</div>
					
				</div>
					<div class="clearfix"> </div>
				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Update Website Info" name="update_general_setting">
				
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->