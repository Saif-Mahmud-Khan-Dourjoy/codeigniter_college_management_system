<?php include ("inc/header.php") ?>
  <div class="container">
  	<div class="jumbotron">
  		<h2 class="text-center display-3 text-info">Admin & Co Admin Login</h2>
  	    <hr>
  		<div class="my-4">
  			<div class="row">
          <?php if(($chkAdminExist)>0): ?>
  				
          <?php else: ?>
           <div class="col-lg-4">
            <?php echo anchor("Welcome/adminRegister","Admin Registration",['class'=>'btn btn-primary']);?>
          </div>
           <?php endif; ?> 
  				<div class="col-lg-4">
  					<?php echo anchor("Welcome/adminLogin","Admin Login",['class'=>'btn btn-info']); ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

<?php include ("inc/footer.php") ?>

