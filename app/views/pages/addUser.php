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
                                            <!-- <li class="step-container step-2">
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
                                            </li> -->
                                            <li class="step-container step-2">
                                                <div class="media">
                                                    <div class="step-icon">
                                                        <i data-feather="check"></i>
                                                        <span>2</span>
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
                                                        <input type="text" id="firstName" class="form-control" placeholder="Enter first name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Last Name (s)</label>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Enter last name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Email Address</label>
                                                        <input type="text" id="emailAddress" class="form-control" placeholder="Enter email address" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" id="phoneNumber" class="form-control" placeholder="Enter phone number" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label">Alternative Phone Number</label>
                                                        <input type="text" id="altPhoneNumber" class="form-control" placeholder="Enter alternative phone number">
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Date of Birth</label>
                                                        <input type="text" id="dateBirth" readonly class="form-control" placeholder="Select date" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Job Title</label>
                                                        <input type="text" id="jobTitle" class="form-control" placeholder="Enter job title" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Department</label>
                                                        <select id="department" class="form-control" required>
                                                            <option></option>
                                                            <?php foreach ($listDepartment as $record): ?>
                                                                <option value="<?= $record->departmentId ?>"><?= $record->departmentName ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Address</label>
                                                        <textarea id="address" class="form-control" placeholder="Enter address" rows="3" required></textarea>
                                                    </div>
                                                    <div class="next-btn text-end col-sm-12">
                                                        <button type="submit" id="saveUser" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>

                                            </div>
                                            <!-- <div class="wizard-step-2 d-none">
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
  
                                            </div> -->
                                            <div class="wizard-step-2 d-none">
                                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">User Role</label><br>
                                                        <select class="default-select form-control wide" id="userRole">
                                                            <option value="" disabled selected>Select User Role</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Administrator">Administrator</option>
                                                            <option value="Super Administrator">Super Administrator</option>
                                                            <option value="Field Worker">Field Worker</option>
                                                            <option value="Site Inspector">Site Inspector</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Permissions</label>
                                                        <div class="mb-3">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check1" value="Property Management">
                                                                <label class="form-check-label" for="permission_check1">Property Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check2" value="Client Management">
                                                                <label class="form-check-label" for="permission_check2">Client Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check3" value="Inspections">
                                                                <label class="form-check-label" for="permission_check3">Inspections</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check4" value="Rent Management">
                                                                <label class="form-check-label" for="permission_check4">Rent Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check5" value="Financials">
                                                                <label class="form-check-label" for="permission_check5">Financials</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check6" value="Billings">
                                                                <label class="form-check-label" for="permission_check6">Billings</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check7" value="Contracts">
                                                                <label class="form-check-label" for="permission_check7">Contracts</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check8" value="Maintenance">
                                                                <label class="form-check-label" for="permission_check8">Maintenance</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check9" value="Ticketing">
                                                                <label class="form-check-label" for="permission_check9">Ticketing</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check10" value="Reports">
                                                                <label class="form-check-label" for="permission_check10">Reports</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check11" value="All Permissions">
                                                                <label class="form-check-label" for="permission_check11">All Permissions</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="permission_check12" value="No Permission">
                                                                <label class="form-check-label" for="permission_check12">No Permission</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <!--  <div class="form-group col-md-4 col-sm-12" id="serviceComplaintGroup">
                                                        <label class="form-label required">Assign Service-related Complaint</label>
                                                        <div class="mb-3">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint30" value="No Assignment">
                                                                <label class="form-check-label" for="complaint30">No Assignment</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint1" value="Electrical Issues">
                                                                <label class="form-check-label" for="complaint1">Electrical Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint2" value="Plumbing Issues">
                                                                <label class="form-check-label" for="complaint2">Plumbing Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint3" value="Painting/Decorating">
                                                                <label class="form-check-label" for="complaint3">Painting/Decorating</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint4" value="HVAC">
                                                                <label class="form-check-label" for="complaint4">HVAC (Heating, Ventilation, and Air Conditioning)</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint5" value="Roofing Issues">
                                                                <label class="form-check-label" for="complaint5">Roofing Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint6" value="Flooring Issues">
                                                                <label class="form-check-label" for="complaint6">Flooring Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint7" value="Structural Issues">
                                                                <label class="form-check-label" for="complaint7">Structural Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint8" value="Pest Control">
                                                                <label class="form-check-label" for="complaint8">Pest Control</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint9" value="Security Issues">
                                                                <label class="form-check-label" for="complaint9">Security Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint10" value="Appliance Issues">
                                                                <label class="form-check-label" for="complaint10">Appliance Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint11" value="Landscaping and Grounds Maintenance">
                                                                <label class="form-check-label" for="complaint11">Landscaping and Grounds Maintenance</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint12" value="Waste Management">
                                                                <label class="form-check-label" for="complaint12">Waste Management</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint13" value="Windows and Doors">
                                                                <label class="form-check-label" for="complaint13">Windows and Doors</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint14" value="Mold and Mildew">
                                                                <label class="form-check-label" for="complaint14">Mold and Mildew</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint15" value="Fire Safety">
                                                                <label class="form-check-label" for="complaint15">Fire Safety</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint16" value="Water Damage">
                                                                <label class="form-check-label" for="complaint16">Water Damage</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint17" value="Insulation Issues">
                                                                <label class="form-check-label" for="complaint17">Insulation Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint18" value="Fencing and Gates">
                                                                <label class="form-check-label" for="complaint18">Fencing and Gates</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint19" value="Concrete/Driveway Issues">
                                                                <label class="form-check-label" for="complaint19">Concrete/Driveway Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint20" value="Noise Complaints">
                                                                <label class="form-check-label" for="complaint20">Noise Complaints</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint21" value="Lighting and Electrical Fixtures">
                                                                <label class="form-check-label" for="complaint21">Lighting and Electrical Fixtures</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint22" value="Basement Issues">
                                                                <label class="form-check-label" for="complaint22">Basement Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint23" value="Elevator Issues">
                                                                <label class="form-check-label" for="complaint23">Elevator Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint24" value="Garage Issues">
                                                                <label class="form-check-label" for="complaint24">Garage Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint25" value="Swimming Pool Issues">
                                                                <label class="form-check-label" for="complaint25">Swimming Pool Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint26" value="Staircase and Railings">
                                                                <label class="form-check-label" for="complaint26">Staircase and Railings</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint27" value="Parking Issues">
                                                                <label class="form-check-label" for="complaint27">Parking Issues</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint28" value="Internet and Telecommunications">
                                                                <label class="form-check-label" for="complaint28">Internet and Telecommunications</label>
                                                            </div>
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input" id="complaint29" value="Accessibility Issues">
                                                                <label class="form-check-label" for="complaint29">Accessibility Issues</label>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group col-md-4 col-sm-12" id="serviceComplaintGroup2">
                                                        <label class="form-label required">Assign Service-related Complaint</label>
                                                        <div class="mb-3">
                                                            <?php foreach ($listServiceIssues as $issue): ?>
                                                                <div class="form-check mb-2">
                                                                    <input 
                                                                        type="checkbox" 
                                                                        class="form-check-input" 
                                                                        id="complaint<?= htmlspecialchars($issue->categoryId) ?>" 
                                                                        value="<?= htmlspecialchars($issue->categoryName) ?>">
                                                                    <label 
                                                                        class="form-check-label" 
                                                                        for="complaint<?= htmlspecialchars($issue->categoryId) ?>">
                                                                        <?= htmlspecialchars($issue->categoryName) ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                 

                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev1 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
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

    $(document).ready(function() {
        $("#phoneNumber, #altPhoneNumber").on("keypress", function(e) {
            return isNumber(e);
        });
    });

    function isNumber(evt) {
        evt = evt || window.event;
        var charCode = evt.which || evt.keyCode;

        var inputField = evt.target;
        if (inputField.value.length >= 10 && (charCode >= 48 && charCode <= 57)) {
            return false; 
        }
        if (charCode == 8 || charCode == 46 || charCode == 9 || (charCode >= 37 && charCode <= 40)) {
            return true;
        }
        if (charCode < 48 || charCode > 57) {
            return false;
        }

        return true;
    }

    $("#dateBirth").flatpickr({
        maxDate: "today"
    });

    $("#department").select2({
        placeholder: "Select Department"
    });   

   /*  $("#securityQuestion").select2({
        placeholder: "Select Security Question"
    });
     */

    $("#saveUser").on("click", function(event) {
        event.preventDefault(); 

        var formData = {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            emailAddress: $("#emailAddress").val(),
            phoneNumber: $("#phoneNumber").val(),
            altPhoneNumber: $("#altPhoneNumber").val(),
            dateBirth: $("#dateBirth").val(),
            jobTitle: $("#jobTitle").val(),
            department: $("#department").val(),
            address: $("#address").val(),
            uuid: '<?php echo $uuid; ?>'
        };

        var url = urlroot + "/user/saveUser";

        var successCallback = function(response) {
            response = JSON.parse(response);
            //alert(response);

            if (response == 1) {
                $.notify("User saved successfully", {
                    position: "top center",
                    className: "success"
                });
                $("#needs-validation").addClass("was-validated");
                $('.step-1').removeClass('active').addClass('disabled');
                $('.step-2').addClass('active');
                $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                $('.wizard-step-1').removeClass('d-block').addClass('d-none');
            } else if (response == 2) {
                $.notify("User already exists", {
                    position: "top center",
                    className: "error"
                });
            } else {
                $.notify("Error sending mail", {
                    position: "top center",
                    className: "error"
                });
                $("#needs-validation").addClass("was-validated");
                $('.step-1').removeClass('active').addClass('disabled');
                $('.step-2').addClass('active');
                $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                $('.wizard-step-1').removeClass('d-block').addClass('d-none');
            }
        };

        var validateForm = function(formData) {
            var error = '';

            if (!formData.firstName) {
                error += 'First Name is required\n';
                $("#firstName").focus();
            }
            if (!formData.lastName) {
                error += 'Last Name is required\n';
                $("#lastName").focus();
            }
            if (!formData.emailAddress) {
                error += 'Email Address is required\n';
                $("#emailAddress").focus();
            } else {
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(formData.emailAddress)) {
                    error += 'Invalid Email Address format\n';
                    $("#emailAddress").focus();
                }
            }
            if (!formData.phoneNumber) {
                error += 'Phone Number is required\n';
                $("#phoneNumber").focus();
            } else {
                var phonePattern = /^[0-9]{10}$/; // Regular expression for 10 digits only
                if (!phonePattern.test(formData.phoneNumber)) {
                    error += 'Phone Number must be exactly 10 digits\n';
                    $("#phoneNumber").focus();
                }
            }
            if (formData.altPhoneNumber) {
                var altPhonePattern = /^[0-9]{10}$/; // Regular expression for 10 digits only
                if (!altPhonePattern.test(formData.altPhoneNumber)) {
                    error += 'Alternative Phone Number must be exactly 10 digits\n';
                    $("#altPhoneNumber").focus();
                }
            }
            if (!formData.dateBirth) {
                error += 'Date of Birth is required\n';
                $("#dateBirth").focus();
            }
            if (!formData.jobTitle) {
                error += 'Job Title is required\n';
                $("#jobTitle").focus();
            }
            if (!formData.department) {
                error += 'Department is required\n';
                $("#department").focus();
            }
            if (!formData.address) {
                error += 'Address is required\n';
                $("#address").focus();
            }
            return error;
        };

        saveForm(formData, url, successCallback, validateForm);
    });


    /* $("#saveUserAccount").on("click", function(event) {
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
    }); */


    //Roles
    $("#saveRole").on("click", function (event) {
        event.preventDefault();

        var userData = {
            userRole: $("#userRole").val(),
            permissions: [],
            complaints: [],
            uuid: '<?php echo $uuid ?>'
        };

        $("input[type='checkbox'][id^='permission_check']:checked").each(function () {
            userData.permissions.push($(this).val());
        });

        $("input[type='checkbox'][id^='complaint']:checked").each(function () {
            userData.complaints.push($(this).val());
        });

        // Ensure complaints are in array format
        userData.complaints = userData.complaints;

        console.log("User Data before submission:", userData);

        var url = urlroot + "/user/saveRole";

        var successCallback = function (response) {
            response = JSON.parse(response);
            console.log("Response from server:", response);

            $.notify("User saved", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 1000);
        };

        var validateUserAccount = function (userData) {
            var error = "";

            if (!userData.userRole) {
                error += "User Role is required\n";
                $("#userRole").focus();
            }

            if (userData.permissions.length === 0) {
                error += "At least one permission must be selected\n";
            }

            if (userData.userRole === "Field Worker") {
                if (userData.complaints.length === 0) {
                    error += "At least one service-related complaint must be selected for Field Worker\n";
                }
            } else {
                if (userData.complaints.length > 0) {
                    error += "Service-related complaints should not be selected unless the User Role is Field Worker\n";
                } else {
                    userData.complaints = []; // Ensure complaints is empty for non-Field Worker
                }
            }

            return error;
        };

        saveForm(userData, url, successCallback, validateUserAccount);
    });



   /*  document.getElementById('userRole').addEventListener('change', function () {
        const serviceComplaintGroup = document.getElementById('serviceComplaintGroup');
        if (this.value === 'Field Worker') {
            serviceComplaintGroup.style.display = 'block';
        } else {
            serviceComplaintGroup.style.display = 'none';
        }
    });
 */

</script>