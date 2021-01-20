<?php include("inc/header.php"); ?>
<h1 class="text-info font-weight-bold text-center"><?php echo $this->session->flashdata('get_role_error');?></h1>
 <?php if ($msg=$this->session->flashdata('message')): ?>
  <div class="row">
  	<div class="col">
  		<div class="alert alert-success alert-dismissible">
  			<h1 class="text-info font-weight-bold text-center"><?php echo $msg;?></h1>
  		</div>
  		
  	</div>
  </div>

 <?php endif; ?>
<!-- <h1 class="text-info font-weight-bold text-center"><?php echo $this->session->flashdata('message');?></h1> -->
<div class="container" >
	<?php echo form_open('Welcome/adminSignup',['class'=>'form-horizontal']); ?>
	<h3 class="mt-4 text-warning display-4">Admin Registration</h3>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"> User Name:</label>
				<div class="col-md-9" ><?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'username','value'=>set_value('username')]); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('username','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"> Email:</label>
				<div class="col-md-9" ><?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'email','value'=>set_value('email')]); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('email','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3"> Gender:</label>
				<select class="col-md-9" name="gender">
					<option value="">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('gender','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Role:</label>
				<select class="col-md-9" name="role_id">
					<option value="">Select</option>

					<?php if(count($roles)): ?>

					<?php foreach ($roles as $key=> $role):?>
					<option value=<?php echo $role->role_id;?>><?php echo $role->role_name;?></option>
					
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('role_id','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Password:</label>
				<div class="col-md-9" ><?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password']); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('password','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Password Again:</label>
				<div class="col-md-9" ><?php echo form_password(['name'=>'confpass','class'=>'form-control','placeholder'=>'password again']); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('confpass','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
    <button type="submit" class="btn btn-primary">Register</button> 
    <?php echo anchor("Welcome","Back",['class'=>'btn btn-primary']); ?>
	<?php echo form_close(); ?>
</div> 
<?php include("inc/footer.php"); ?>