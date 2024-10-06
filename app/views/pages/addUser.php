<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">USER MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Add User</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fill in the form below</h4>
                            </div>
                            <div class="card-body wizard-box">
								<div class="wizard-step-container">
                                        <ul class="wizard-steps">
                                            <li class="step-container step-1 active">
                                                <div class="media">
                                                    <div class="step-icon">
                                                        <i data-feather="check"></i>
                                                        <span>1</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5>Personal Information</h5>
                                                        <h6>Enter your personal details</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step-container step-2">
                                                <div class="media">
                                                    <div class="step-icon">
                                                        <i data-feather="check"></i>
                                                        <span>2</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5>Account Information</h5>
                                                        <h6>Set up your account credentials</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="step-container step-3">
                                                <div class="media">
                                                    <div class="step-icon">
                                                        <i data-feather="check"></i>
                                                        <span>3</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5>Permissions & Access Control</h5>
                                                        <h6>Manage user roles and access</h6>
                                                    </div>
                                                </div>
                                            </li>
                                           
                                        </ul>

										<div class="wizard-form-details log-in">
                                            <div class="wizard-step-1 d-block">
                                                <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">First Name</label>
                                                        <input type="text" name="firstName" class="form-control" placeholder="Enter first name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Last Name</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="Enter last name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Email Address</label>
                                                        <input type="text" name="emailAddress" class="form-control" placeholder="Enter email address" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" name="phoneNumber" class="form-control" placeholder="Enter phone number" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label">Alternative Phone Number</label>
                                                        <input type="text" name="altPhoneNumber" class="form-control" placeholder="Enter alternative phone number">
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Date of Birth</label>
                                                        <input type="text" name="dateBirth" id="dateBirth" readonly class="form-control" placeholder="Select date" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Job Title</label>
                                                        <input type="text" name="jobTitle" id="jobTitle" class="form-control" placeholder="Enter job title" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Department</label>
                                                        <select name="department" id="department" class="form-control" required>
                                                            <option></option>
                                                            <?php foreach ($listDepartment as $record): ?>
                                                                <option value="<?= $record->departmentId ?>"><?= $record->departmentName ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Address</label>
                                                        <textarea name="address" class="form-control" placeholder="Enter address" rows="3" required></textarea>
                                                    </div>
                                                    <div class="next-btn text-end col-sm-12">
                                                        <button type="submit" id="saveUser" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="wizard-step-2 d-none">
                                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Username</label>
                                                        <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Password</label>
                                                        <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Security Question</label><br>
                                                        <select class="form-control" id="securityQuestion" style="width: 100%;">
                                                            <option value="" disabled selected>Select a security question</option>
                                                            <option value="pet_name">What is the name of your first pet?</option>
                                                            <option value="birth_city">In what city were you born?</option>
                                                            <option value="mother_maiden_name">What is your mother's maiden name?</option>
                                                            <option value="first_school">What was the name of your first school?</option>
                                                            <option value="favorite_teacher">Who was your favorite teacher?</option>
                                                            <option value="childhood_nickname">What was your childhood nickname?</option>
                                                            <option value="favorite_food">What is your favorite food?</option>
                                                            <option value="father_middle_name">What is your father's middle name?</option>
                                                            <option value="first_car">What was the make and model of your first car?</option>
                                                            <option value="favorite_movie">What is your favorite movie?</option>
                                                            <option value="best_friend">What is the name of your best friend from childhood?</option>
                                                            <option value="street_grew_up">What street did you grow up on?</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Answer to Security Question</label>
                                                        <input type="text" class="form-control" id="securityAnswer" placeholder="Answer security question">
                                                    </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev1 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveUserAccount" class="btn btn-primary next2 btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>
  
                                            </div>
                                            <div class="wizard-step-3 d-none">
                                                <form class="row" id="needs-validation2" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">User Role</label><br>
                                                        <select class="default-select form-control wide" id="userRole">
                                                            <option value="" disabled selected>User Role</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Manager">Manager</option>
                                                            <option value="Viewer">Viewer</option>
                                                        </select>
                                                    </div>

                                      
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Permissions</label>

                                                        <div class="mb-3">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check1" value="Property Management">
                                                                <label class="form-check-label" for="check1">Property Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check2" value="Tenant Management">
                                                                <label class="form-check-label" for="check2">Tenant Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check3" value="Inspections">
                                                                <label class="form-check-label" for="check3">Inspections</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check4" value="Rent Collection">
                                                                <label class="form-check-label" for="check4">Rent Collection</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check5" value="Financials">
                                                                <label class="form-check-label" for="check5">Financials</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check6" value="Contracts">
                                                                <label class="form-check-label" for="check6">Contracts</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check7" value="Maintenance">
                                                                <label class="form-check-label" for="check7">Maintenance</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check8" value="Ticketing">
                                                                <label class="form-check-label" for="check8">Ticketing</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="check9" value="Reports">
                                                                <label class="form-check-label" for="check9">Reports</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev2 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveRole" class="btn btn-success btn-sm">Submit <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>
                                            </div>

                                           
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>
    
       $("#dateBirth").flatpickr();

       $('#permissions').SumoSelect({
            placeholder: 'Select options',
            selectAll: true,
            search: true,
            okCancelInMulti: true
        });

        $("#department").select2({
            placeholder: "Select Department"
       });   

       $("#securityQuestion").select2({
            placeholder: "Select Security Question"
       });
       

        $("#saveUser").on("click", function(event) {
            event.preventDefault(); 

            var formData = {
                firstName: $("input[name='firstName']").val(),
                lastName: $("input[name='lastName']").val(),
                emailAddress: $("input[name='emailAddress']").val(),
                phoneNumber: $("input[name='phoneNumber']").val(),
                altPhoneNumber: $("input[name='altPhoneNumber']").val(),
                dateBirth: $("input[name='dateBirth']").val(),
                jobTitle: $("input[name='jobTitle']").val(),
                department: $("select[name='department']").val(),
                address: $("textarea[name='address']").val(),
                uuid: '<?php echo $uuid; ?>'
            };
            var url = urlroot + "/user/saveUser";

            var successCallback = function(response) {
                response = JSON.parse(response);

                if (response == 1) {
                    $("#needs-validation").addClass("was-validated");
                    // Proceed to the next step or show success message
                    $('.step-1').removeClass('active').addClass('disabled');
                    $('.step-2').addClass('active');
                    $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-1').removeClass('d-block').addClass('d-none');
                } else {
                    $.notify("User already exists", {
                        position: "top center",
                        className: "error"
                    });
                }
            };

            var validateForm = function(formData) {
                var error = '';

                if (!formData.firstName) {
                    error += 'First Name is required\n';
                    $("input[name='firstName']").focus();
                }
                if (!formData.lastName) {
                    error += 'Last Name is required\n';
                    $("input[name='lastName']").focus();
                }
                if (!formData.emailAddress) {
                    error += 'Email Address is required\n';
                    $("input[name='emailAddress']").focus();
                } else {
                    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if (!emailPattern.test(formData.emailAddress)) {
                        error += 'Invalid Email Address format\n';
                        $("input[name='emailAddress']").focus();
                    }
                }
                if (!formData.phoneNumber) {
                    error += 'Phone Number is required\n';
                    $("input[name='phoneNumber']").focus();
                } else {
                    var phonePattern = /^[0-9]{10}$/;  // Regular expression for 10 digits only
                    if (!phonePattern.test(formData.phoneNumber)) {
                        error += 'Phone Number must be exactly 10 digits\n';
                        $("input[name='phoneNumber']").focus();
                    }
                }
                if (!formData.dateBirth) {
                    error += 'Date of Birth is required\n';
                    $("input[name='dateBirth']").focus();
                }
                if (!formData.jobTitle) {
                    error += 'Job Title is required\n';
                    $("input[name='jobTitle']").focus();
                }
                if (!formData.department) {
                    error += 'Department is required\n';
                    $("select[name='department']").focus();
                }
                if (!formData.address) {
                    error += 'Address is required\n';
                    $("textarea[name='address']").focus();
                }
                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });



        $("#saveUserAccount").on("click", function(event) {
            event.preventDefault();

            var accountData = {
                username: $("#username").val(),
                password: $("#password").val(),
                confirmPassword: $("#confirmPassword").val(),
                securityQuestion: $("#securityQuestion").val(),
                securityAnswer: $("#securityAnswer").val(),
                uuid: '<?php echo $uuid ?>'
            };

            var url = urlroot + "/user/saveUserAccount";

            var successCallback = function(response) {
                response = JSON.parse(response);
 
                if (response == 1) {
                    $("#needs-validation1").addClass("was-validated");
                    $('.step-2').removeClass('active').addClass('disabled');
                    $('.step-3').addClass('active');
                    $('.wizard-step-3').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-2').removeClass('d-block').addClass('d-none');
                } else {
                    $.notify("Username already exists", {
                        position: "top center",
                        className: "error"
                    });
                }

            };

            var validateAccountForm = function(accountData) {
                var error = '';

                if (!accountData.username) {
                    error += 'Username is required\n';
                    $("#username").focus();
                }

                if (!accountData.password) {
                    error += 'Password is required\n';
                    $("#password").focus();
                } else if (accountData.password.length < 6) {
                    error += 'Password must be at least 6 characters long\n';
                    $("#password").focus();
                }

                if (!accountData.confirmPassword) {
                    error += 'Confirm Password is required\n';
                    $("#confirmPassword").focus();
                } else if (accountData.confirmPassword !== accountData.password) {
                    error += 'Passwords do not match\n';
                    $("#confirmPassword").focus();
                }

                if (!accountData.securityQuestion) {
                    error += 'Security question is required\n';
                    $("#securityQuestion").focus();
                }

                if (!accountData.securityAnswer) {
                    error += 'Answer to security question is required\n';
                    $("#securityAnswer").focus();
                }
                return error;
            };

            saveForm(accountData, url, successCallback, validateAccountForm);
        });



        //Roles
        $("#saveRole").on("click", function(event) {
            event.preventDefault(); 

            var userData = {
                userRole: $("#userRole").val(),
                permissions: [],
                uuid: '<?php echo $uuid ?>'
            };

            $("input[type='checkbox']:checked").each(function() {
                userData.permissions.push($(this).val());
            });

            var url = urlroot + "/user/saveRole";

            var successCallback = function(response) {
                response = JSON.parse(response);
                $.notify("User saved", {
                    position: "top center",
                    className: "success"
                });

                // Delay the reload to allow the notification to be seen
                setTimeout(function() {
                    location.reload();
                }, 2000);  // 2-second delay
            };

            var validateUserAccount = function(userData) {
                var error = '';
                if (!userData.userRole) {
                    error += 'User Role is required\n';
                    $("#userRole").focus();
                }
                if (userData.permissions.length === 0) {
                    error += 'At least one permission must be selected\n';
                }

                return error;
            };

            saveForm(userData, url, successCallback, validateUserAccount);
        });


        // Rental info
        $("#savePermission").on("click", function(event) {
            // Collect rental info data instead of owner data
                $("#needs-validation2").addClass("was-validated");
                $('.step-3').removeClass('active').addClass('disabled');
                $('.step-4').addClass('active');
                $('.wizard-step-4').addClass('d-block').removeClass('d-none');
                $('.wizard-step-3').removeClass('d-block').addClass('d-none');
        });


</script>