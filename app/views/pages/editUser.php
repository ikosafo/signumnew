<?php include ('includes/header.php');
extract($data);
$uuid = $userDetails['uuid'];

?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">USER MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Edit User</a></li>
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
                                                        <input type="text" id="firstName" class="form-control" value="<?= $userDetails['firstName'] ?>" placeholder="Enter first name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Last Name (s)</label>
                                                        <input type="text" id="lastName" class="form-control" value="<?= $userDetails['lastName'] ?>" 
                                                        placeholder="Enter last name" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Email Address</label>
                                                        <input type="text" id="emailAddress" class="form-control" value="<?= $userDetails['emailAddress'] ?>"
                                                        placeholder="Enter email address" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" id="phoneNumber" class="form-control" value="<?= $userDetails['phoneNumber'] ?>"
                                                        placeholder="Enter phone number" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label">Alternative Phone Number</label>
                                                        <input type="text" id="altPhoneNumber" class="form-control" value="<?= $userDetails['altPhoneNumber'] ?>"
                                                        placeholder="Enter alternative phone number">
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Date of Birth</label>
                                                        <input type="text" id="dateBirth" readonly class="form-control" value="<?= $userDetails['dateBirth'] ?>"
                                                         placeholder="Select date" required>
                                                    </div>
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Job Title</label>
                                                        <input type="text" id="jobTitle" class="form-control" value="<?= $userDetails['jobtitle'] ?>"
                                                        placeholder="Enter job title" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Department</label>
                                                        <select id="department" class="form-control" required>
                                                            <option></option>
                                                            <?php foreach ($listDepartment as $record): ?>
                                                                <option value="<?= $record->departmentId ?>" 
                                                                    <?= ($record->departmentId == $userDetails['department']) ? 'selected' : '' ?>>
                                                                    <?= $record->departmentName ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Address</label>
                                                        <textarea id="address" class="form-control" placeholder="Enter address" rows="3" required><?= $userDetails['address'] ?></textarea>
                                                    </div>
                                                    <div class="next-btn text-end col-sm-12">
                                                        <button type="submit" id="editUser" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="wizard-step-2 d-none">
                                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">User Role</label><br>
                                                        <select class="default-select form-control wide" id="userRole">
                                                            <option value="" disabled selected>Select User Role</option>
                                                             <option value="Normal" <?= ($userDetails['accessLevel'] == 'Normal') ? 'selected' : '' ?>>Normal</option>
                                                            <option value="Administrator" <?= ($userDetails['accessLevel'] == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
                                                            <option value="Super Administrator" <?= ($userDetails['accessLevel'] == 'Super Administrator') ? 'selected' : '' ?>>Super Administrator</option>
                                                            <option value="Field Worker" <?= ($userDetails['accessLevel'] == 'Field Worker') ? 'selected' : '' ?>>Field Worker</option>
                                                            <option value="Site Inspector" <?= ($userDetails['accessLevel'] == 'Site Inspector') ? 'selected' : '' ?>>Site Inspector</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Assign Service-related Complaint</label>
                                                        <div class="mb-3">
                                                            <?php
                                                            $complaints = [
                                                                "No Assignment", "Electrical Issues", "Plumbing Issues", "Painting/Decorating", "HVAC",
                                                                "Roofing Issues", "Flooring Issues", "Structural Issues", "Pest Control", "Security Issues",
                                                                "Appliance Issues", "Landscaping and Grounds Maintenance", "Waste Management",
                                                                "Windows and Doors", "Mold and Mildew", "Fire Safety", "Water Damage", "Insulation Issues",
                                                                "Fencing and Gates", "Concrete/Driveway Issues", "Noise Complaints",
                                                                "Lighting and Electrical Fixtures", "Basement Issues", "Elevator Issues",
                                                                "Garage Issues", "Swimming Pool Issues", "Staircase and Railings",
                                                                "Parking Issues", "Internet and Telecommunications", "Accessibility Issues"
                                                            ];
                                                            foreach ($complaints as $complaint) {
                                                                $isChecked = in_array($complaint, $userComplaints) ? 'checked' : '';
                                                                echo <<<HTML
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" id="complaint_{$complaint}" value="{$complaint}" {$isChecked}>
                                                                    <label class="form-check-label" for="complaint_{$complaint}">{$complaint}</label>
                                                                </div>
                                                                HTML;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Permissions</label>
                                                        <div class="mb-3">
                                                            <?php
                                                            $permissions = [
                                                                "Property Management", "Client Management", "Inspections",
                                                                "Rent Management", "Financials", "Billings", "Contracts",
                                                                "Maintenance", "Ticketing", "Reports", "All Permissions", "No Permission"
                                                            ];
                                                            foreach ($permissions as $permission) {
                                                                $isChecked = in_array($permission, $userPermissions) ? 'checked' : '';
                                                                echo <<<HTML
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" id="permission_check_{$permission}" value="{$permission}" {$isChecked}>
                                                                    <label class="form-check-label" for="permission_check_{$permission}">{$permission}</label>
                                                                </div>
                                                                HTML;
                                                            }
                                                            ?>
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

var navItems = document.querySelectorAll('a span.nav-text');

navItems.forEach(function(item) {
    var textContent = item.textContent.trim().replace(/\s+/g, ' ');
    console.log("Checking item:", textContent); 

    if (textContent === 'USER MANAGEMENT') {
        console.log("Found USER MANAGEMENT:", item); 
        item.closest('li').classList.add('mm-active');
    }
});

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


    $("#editUser").on("click", function(event) {
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

            if (response == 1) {
                $("#needs-validation").addClass("was-validated");
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


    //Roles
    $("#saveRole").on("click", function(event) {
        event.preventDefault(); 

        var userData = {
            userRole: $("#userRole").val(),
            permissions: [],
            complaints: [],
            uuid: '<?php echo $uuid ?>'
        };

        $("input[type='checkbox'][id^='permission_check']:checked").each(function() {
            userData.permissions.push($(this).val());
        });
        $("input[type='checkbox'][id^='complaint']:checked").each(function() {
            userData.complaints.push($(this).val());
        });

        var url = urlroot + "/user/saveRole";


        var successCallback = function(response) {
            response = JSON.parse(response);
            //alert(response);
            $.notify("User saved", {
                position: "top center",
                className: "success"
            });

            // Delay the reload to allow the notification to be seen
            setTimeout(function() {
                location.reload();
            }, 500); 
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
            if (userData.complaints.length === 0) {
                error += 'At least one assignment must be selected\n';
            }

            if (userData.userRole === 'Field Worker') {
                if (userData.complaints.includes('No Assignment')) {
                    error += "'No Assignment' cannot be selected for Field Worker\n";
                }

                if (userData.complaints.length === 0) {
                    error += 'At least one service-related complaint must be selected for Field Worker\n';
                }
            } else {
                if (!userData.complaints.includes('No Assignment')) {
                    error += "'No Assignment' should be selected for non-Field Worker roles\n";
                }
            }

            return error;
        };


        saveForm(userData, url, successCallback, validateUserAccount);
    });




    /* document.getElementById('userRole').addEventListener('change', function () {
        const serviceComplaintGroup = document.getElementById('serviceComplaintGroup');
        if (this.value === 'Field Worker') {
            serviceComplaintGroup.style.display = 'block';
        } else {
            serviceComplaintGroup.style.display = 'none';
        }
    }); */


</script>