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
	<?php echo form_open('Welcome/adminSignIn',['class'=>'form-horizontal']); ?>
	<h3 class="mt-4 text-warning display-4">Admin Login</h3>
	<hr>
	
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
				<label class="control-label col-md-3">Password:</label>
				<div class="col-md-9" ><?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password']); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('password','<div class="text-danger">','</div>'); ?>
		</div>
	</div>
	
    <button type="submit" class="btn btn-primary">Login</button> 
    <?php echo anchor("Welcome","Back",['class'=>'btn btn-primary']); ?>
	<?php echo form_close(); ?>
</div> 
<?php include("inc/footer.php"); ?>