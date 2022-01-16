

<?php $__env->startSection('pageTitle', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<style>
.parsley-required
{
	color:red;
}
.required
{
	color:red;
}
</style>
    <div class="container-fluid login-page">
      <div class="row justify-content-center">
	  <div class="login-box">
	   <div class="login-logo mb-4">
            <a href=<?php echo e(url('login')); ?>><img src="img/formee_logo_dark.svg" alt="" class=""></a>
       </div>
	   <div class="card">
	    <p class="login-box-msg pt-4 pb-1">Welcome to Formee Express</p>
        <div class="card-body login-card-body">
                <form method="POST" action="<?php echo e(url('login_check')); ?>" class="login_form">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3 login-email">
						 <div class="col-12 px-0">  
						 <label>Email</label>
                        <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
                        
                    </div>
					
					<div class="input-group mb-3 login-password">
						 <div class="col-12 px-0">  
						 <label>Password</label> 
                        <input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" name="password" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($emessage); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
					<div class="row">
					
										 <div class="col-12  mb-5 forgot-pwd">
                    <p class="mb-1">
						<a href="<?php echo e(route('password.request')); ?>" class="btn btn-link px-0"><?php echo e(__('I forgot my password')); ?></a>
                    </p>
					</div>
					</div>
					
					<div class="row">
						<div class="col-12 pb-4">
                        <div class="col-6 submit-btn mx-auto">
							<button class="btn btn-primary btn-block btn-flat login" type="button" ><?php echo e(__('Sign In')); ?></button>
                        </div>
						</div>
                    </div>
                  
                   
            <!--<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <?php if(Route::has('password.request')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary active mt-3"><?php echo e(__('Register')); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>-->
        </div>
		</div>
		
		
		
		</div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<!-- Optional theme -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script  src="js/parsley.min.js" defer></script>
<script  src="js/parsley.js" defer></script>
<script  src="js/jquery.min.js"></script>
	<script>
$( document ).ready(function() {
	
	 $(".login").click(function(e)	{		
        e.preventDefault();
        var email = $('.email').val();
		var formdata = $(".login_form").serialize();
		var form = $(".login_form");
		form.parsley().validate();
		if(form.parsley().isValid())
		{
			var save_url ="<?php echo e(url('login_check')); ?>";
			
				$.ajax({
				   type:'POST',
				   url:save_url,
				   data:formdata,
				   success:function(data)
				   {
					var response = JSON.parse(data);
					if(response.status_code =='200')
					{
						var url ="<?php echo e(url('home')); ?>";
						window.location.href=url;
						/*
						swal({
							title: "",
							text: response.message,
							type: "success"
						   });
						   setTimeout(function(){ 
							var url ="<?php echo e(url('home')); ?>";
							window.location.href=url;
						   }, 2000);
						   */
					}
					else
					{
						//alert(response.message);
						
						swal({
							title: "",
							text: response.message,
							type: "error"
						   });					   
					}

				   }

				});	
		}
				
		});
		
		
});
</script>
<?php echo $__env->make('layouts.authApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\formeeexpress\Formee_Admin\resources\views/auth/login.blade.php ENDPATH**/ ?>