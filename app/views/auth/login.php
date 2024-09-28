<?php include ('includes/authheader.php'); ?>

    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <a href="<?php echo URLROOT ?>/auth/login">
									<img class="logo-auth" style="width: 60px;height:60px" 
									src="<?php echo URLROOT ?>/assets/images/signum_logo.png" alt="">
								</a>
                            </div>
                            <h4 class="text-center mb-4">Sign in your account</h4>
                            <form>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter username" id="username">
                                </div>
                               <div class="form-group mb-3 mb-sm-4">
									<label for="password" class="form-label">Password</label>
									<div class="position-relative">
										<input type="password" id="password" class="form-control" placeholder="Enter password">
										<span class="show-pass eye" id="togglePassword">
											<i class="fa fa-eye-slash" id="eyeClosed"></i>
											<i class="fa fa-eye" id="eyeOpen"></i>
										</span>
									</div>
								</div>
                                <div class="form-row d-flex flex-wrap justify-content-between align-items-baseline mb-2">
                                    <div class="form-group mb-sm-4 mb-1"></div>
                                    <div class="form-group ms-2">
                                        <a href="#">Forgot Password?</a>
										
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" id="loginBtn" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('includes/authfooter.php'); ?>
