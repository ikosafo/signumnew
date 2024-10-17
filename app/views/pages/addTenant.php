<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">PROPERTY MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Add Property</a></li>
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
                                                        <h6>Fill in the tenant information</h6>
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
                                                        <h5>Property Details</h5>
                                                        <h6>Assign Tenant to property</h6>
                                                    </div>
                                                </div>
                                            </li>
                                           
                                        </ul>

										<div class="wizard-form-details log-in">
                                            <div class="wizard-step-1 d-block">

                                                <div class="basic-form py-3">
                                                    <form>
                                                        <div class="mb-3 mb-0">
                                                            <div class="form-check d-inline-block">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="ownerOption">
                                                                <label class="form-check-label" for="ownerOption">
                                                                    Home Owner
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-inline-block mx-5">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="tenantOption">
                                                                <label class="form-check-label" for="tenantOption">
                                                                    Tenant
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <hr>


                                                <form class="row tenant" id="needs-validation" novalidate="" autocomplete="off">
                                                    <div class="row">

                                                        <div class="mb-3 col-md-4 col-sm-12">
                                                            <label class="form-label required">Full Name</label>
                                                            <input type="text" id="fullName" class="form-control" placeholder="Full Name" required>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Date of Birth</label>
                                                            <input type="date" class="form-control" placeholder="Select Date" id="birthDate" required>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Gender</label>
                                                            <select id="gender" class="default-select form-control wide" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Email Address</label>
                                                            <input type="text" class="form-control" placeholder="Email Address" id="emailAddress" required>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Phone Number" id="phoneNumber" required>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Alternative Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Alternative Phone Number" id="altPhoneNumber">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Residential Address</label>
                                                            <input type="text" class="form-control" placeholder="Residential Address" id="residentialAddress">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Nationality</label>
                                                            <input type="text" class="form-control" placeholder="Nationality" id="nationality">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">National ID</label>
                                                            <input type="text" class="form-control" placeholder="National ID" id="nationalId">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Marital Status</label>
                                                            <select name="maritalStatus" id="maritalStatus" class="default-select form-control wide" required>
                                                                <option value="">Select Marital Status</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Separated">Separated</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Emergency Contact Name</label>
                                                            <input type="text" class="form-control" placeholder="Emergency Contact Name" id="emergencyName">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Emergency Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Emergency Phone Number" id="emergencyContact">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Occupation</label>
                                                            <input type="text" class="form-control" placeholder="Occupation" id="occupation">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Employer's Name</label>
                                                            <input type="text" class="form-control" placeholder="Employer's Name" id="employerName">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Employer's Contact Number</label>
                                                            <input type="text" class="form-control" placeholder="Employer's Contact Number" id="employerContact">
                                                        </div>
                                                        <div class="next-btn text-end col-sm-12">
                                                            <button type="submit" id="saveTenant" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                        </div>

                                                    </div>
                                                   
                                                </form>

                                                <form class="row homeOwner" id="needs-validation" novalidate="" autocomplete="off">
                                                    <div class="row">
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Property</label>
                                                            <select id="propertyName" class="default-select form-control wide" required>
                                                                <option>Select Property</option>
                                                                <?php foreach ($listProperties as $record): ?>
                                                                    <option value="<?= $record->propertyId ?>"><?= $record->propertyName ?></option>
                                                                <?php endforeach; ?>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Full Name</label>
                                                            <input type="text" class="form-control" placeholder="Full Name"
                                                             id="fullName" required readonly>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Date of Birth</label>
                                                            <input type="date" class="form-control" placeholder="Select Date" id="birthDate" required>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Gender</label>
                                                            <select id="gender" class="default-select form-control wide" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Alternative Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Alternative Phone Number" id="altPhoneNumber">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Residential Address</label>
                                                            <input type="text" class="form-control" placeholder="Residential Address" id="residentialAddress">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Nationality</label>
                                                            <input type="text" class="form-control" placeholder="Nationality" id="nationality">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">National ID</label>
                                                            <input type="text" class="form-control" placeholder="National ID" id="nationalId">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Marital Status</label>
                                                            <select name="maritalStatus" id="maritalStatus" class="default-select form-control wide" required>
                                                                <option value="">Select Marital Status</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Separated">Separated</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Emergency Contact Name</label>
                                                            <input type="text" class="form-control" placeholder="Emergency Contact Name" id="emergencyName">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Emergency Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="Emergency Phone Number" id="emergencyContact">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label required">Occupation</label>
                                                            <input type="text" class="form-control" placeholder="Occupation" id="occupation">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Employer's Name</label>
                                                            <input type="text" class="form-control" placeholder="Employer's Name" id="employerName">
                                                        </div>
                                                        <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Employer's Contact Number</label>
                                                            <input type="text" class="form-control" placeholder="Employer's Contact Number" id="employerContact">
                                                        </div>
                                                        
                                    
                                                        <div class="next-btn text-end col-sm-12">
                                                            <button type="submit" id="saveTenant" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>

                                            </div>
                                            <div class="wizard-step-2 d-none">
                                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Owner's Full Name</label>
                                                        <input type="text" class="form-control" id="ownerFullName" placeholder="Enter owner's full name" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Contact Email</label>
                                                        <input type="email" class="form-control" id="ownerEmail" placeholder="Enter owner's email address" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" class="form-control" id="ownerPhone" placeholder="Enter owner's phone number" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="ownerAddress" placeholder="Enter owner's address">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" id="ownerCity" placeholder="Enter owner's city">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Ownership Type</label>
                                                        <select class="default-select form-control wide" id="ownershipType" required>
                                                            <option value="">Select Ownership Type</option>
                                                            <option value="individual">Individual</option>
                                                            <option value="company">Company</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="form-label">Additional Comments</label>
                                                        <textarea class="form-control" id="ownerComments" rows="3" placeholder="Any additional details about the ownership"></textarea>
                                                    </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev1 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveOwnership" class="btn btn-primary next2 btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
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











        
        <div class="wizard-step-2 d-none">
                                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Ownership Type</label>
                                                        <select class="default-select form-control wide" id="ownershipType" required>
                                                            <option value="">Select Ownership Type</option>
                                                            <option value="individual">Individual</option>
                                                            <option value="company">Company</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Full Name</label>
                                                        <input type="text" class="form-control" id="fullName" placeholder="Enter full name" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Contact Email</label>
                                                        <input type="email" class="form-control" id="emailAddress" placeholder="Enter email address" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" class="form-control" id="phoneNumber" maxlength="10" onkeypress="return isNumber(event)" placeholder="Enter phone number" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Alternative Phone Number</label>
                                                        <input type="text" class="form-control" id="altPhoneNumber" maxlength="10" onkeypress="return isNumber(event)" placeholder="Alternative Phone Number">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Residential Address</label>
                                                        <input type="text" class="form-control" id="residentialAddress" placeholder="Enter residential address" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Nationality</label>
                                                        <input type="text" class="form-control" id="nationality" placeholder="Enter nationality">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Date of Birth</label>
                                                        <input type="date" class="form-control" id="birthDate" placeholder="Select Date" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Gender</label>
                                                        <select id="gender" class="default-select form-control wide" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Marital Status</label>
                                                        <select name="maritalStatus" id="maritalStatus" class="default-select form-control wide" required>
                                                            <option value="">Select Marital Status</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Divorced">Divorced</option>
                                                            <option value="Separated">Separated</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Occupation</label>
                                                        <input type="text" class="form-control" id="occupation" placeholder="Occupation" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Employer's Name</label>
                                                        <input type="text" class="form-control" id="employerName" placeholder="Employer's Name">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Employer's Contact Number</label>
                                                        <input type="text" class="form-control" id="employerContact" maxlength="10" 
                                                         onkeypress="return isNumber(event)" placeholder="Employer's Contact Number">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Emergency Contact Name</label>
                                                        <input type="text" class="form-control" id="emergencyName" placeholder="Emergency Contact Name">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Emergency Phone Number</label>
                                                        <input type="text" class="form-control" id="emergencyContact" maxlength="10" onkeypress="return isNumber(event)" placeholder="Emergency Phone Number">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                            <label class="form-label">Passport Picture</label>
                                                            <input id="uploadPic" name="uploadPic" type="file" />
                                                            <input type="hidden" id="selected_file" />
                                                        </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev1 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveOwnership" class="btn btn-primary next2 btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>

  
                                            </div>

<?php include ('includes/footer.php'); ?>

<script>

    $('#uploadPic').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': 'Upload picture',
        'fileType': 'image/*',
        'multi': false,
        'width': 180,
        'formData': {
            'randno': '<?php echo $uuid ?>'
        },
        'dnd': false,
        'uploadScript': '/forms/uploadPassport',
        'onUploadComplete': function(file, data) {
            console.log(data);
            //alert(data);
        },
        'onSelect': function(file) {
            // Update selected so we know they have selected a file
            $("#selected_file").val('yes');

        },
        'onCancel': function(file) {
            // Update selected so we know they have no file selected
            $("#selected_file").val('');
        }
    });

    $("#birthDate").flatpickr();

    
    //Client details
    $("#saveOwnership").on("click", function(event) {
        event.preventDefault(); 

        var clientData = {
            fullName: $("#fullName").val(),
            emailAddress: $("#emailAddress").val(),
            phoneNumber: $("#phoneNumber").val(),
            altPhoneNumber: $("#altPhoneNumber").val(),
            residentialAddress: $("#residentialAddress").val(),
            nationality: $("#nationality").val(),
            birthDate: $("#birthDate").val(),
            gender: $("#gender").val(),
            maritalStatus: $("#maritalStatus").val(),
            occupation: $("#occupation").val(),
            employerName: $("#employerName").val(),
            employerContact: $("#employerContact").val(),
            emergencyName: $("#emergencyName").val(),
            emergencyContact: $("#emergencyContact").val(),
            ownershipType: $("#ownershipType").val(),
            uuid: '<?php echo $uuid; ?>',
            selectedFile: $("#selected_file").val()
        };

        var url = urlroot + "/property/saveOwnerDetails";

        var successCallback = function(response) {
            $('#uploadPic').uploadifive('upload');
           /*  response = JSON.parse(response);
            $("#needs-validation1").addClass("was-validated");
            $('.step-2').removeClass('active').addClass('disabled');
            $('.step-3').addClass('active');
            $('.wizard-step-3').addClass('d-block').removeClass('d-none');
            $('.wizard-step-2').removeClass('d-block').addClass('d-none'); */
            
        };

        var validateClientForm = function(clientData) {
            var error = '';
            if (clientData.selectedFile != "yes") {
                error += 'Please upload passport picture\n';
            }
            if (!clientData.fullName) {
                error += 'Full Name is required\n';
                $("#fullName").focus();
            }
            if (!clientData.emailAddress) {
                error += 'Email Address is required\n';
                $("#emailAddress").focus();
            } else {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(clientData.emailAddress)) {
                    error += 'Invalid Email Address\n';
                    $("#emailAddress").focus();
                }
            }
            if (!clientData.phoneNumber) {
                error += 'Phone Number is required\n';
                $("#phoneNumber").focus();
            } else {
                var phoneRegex = /^[0-9]{10}$/;
                if (!phoneRegex.test(clientData.phoneNumber)) {
                    error += 'Phone number must be 10 digits long and contain only numbers\n';
                    $("#phoneNumber").focus();
                }
            }
            if (!clientData.ownershipType) {
                error += 'Ownership Type is required\n';
                $("#ownershipType").focus();
            }
            if (!clientData.residentialAddress) {
                error += 'Residential Address is required\n';
                $("#residentialAddress").focus();
            }
            if (!clientData.nationality) {
                error += 'Nationality is required\n';
                $("#nationality").focus();
            }
            if (!clientData.birthDate) {
                error += 'Date of Birth is required\n';
                $("#birthDate").focus();
            }
            if (!clientData.gender) {
                error += 'Gender is required\n';
                $("#gender").focus();
            }
            if (!clientData.maritalStatus) {
                error += 'Marital Status is required\n';
                $("#maritalStatus").focus();
            }
            if (!clientData.occupation) {
                error += 'Occupation is required\n';
                $("#occupation").focus();
            }
            if (!clientData.emergencyName) {
                error += 'Emergency Contact Name is required\n';
                $("#emergencyName").focus();
            }
            if (!clientData.emergencyContact) {
                error += 'Emergency Phone Number is required\n';
                $("#emergencyContact").focus();
            }

            return error;
        };
        saveForm(clientData, url, successCallback, validateClientForm);
    });





    $(document).ready(function(){
        $('#propertyName').change(function(){
            var propertyId = $(this).val(); // Get the selected property ID

            if (propertyId) {
                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '', // Same page
                    data: {propertyId: propertyId},
                    success: function(response) {
                        alert(response);
                        $('#fullName').val(response); // Set the full name
                    }
                });
            } else {
                $('#fullName').val(''); // Clear the full name if no property selected
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Initially hide both forms
        const tenantForm = document.querySelector('.tenant');
        const homeOwnerForm = document.querySelector('.homeOwner');
        
        tenantForm.style.display = 'none';
        homeOwnerForm.style.display = 'none';

        // Get radio buttons
        const tenantRadio = document.getElementById('tenantOption');
        const homeOwnerRadio = document.getElementById('ownerOption');

        // Add event listeners to radio buttons
        tenantRadio.addEventListener('change', function () {
            if (tenantRadio.checked) {
                tenantForm.style.display = 'block';    // Show tenant form
                homeOwnerForm.style.display = 'none';  // Hide homeowner form
            }
        });

        homeOwnerRadio.addEventListener('change', function () {
            if (homeOwnerRadio.checked) {
                homeOwnerForm.style.display = 'block'; // Show homeowner form
                tenantForm.style.display = 'none';     // Hide tenant form
            }
        });
    });


    $("#birthDate").flatpickr();
    $('#facilities').SumoSelect({
        placeholder: 'Select options',
        selectAll: true,
        search: true,
        okCancelInMulti: true
    });

    $('#propertyManager').SumoSelect({
        placeholder: 'Select options',
        search: true,
        okCancelInMulti: true
    });

    $("#propertyCategory").select2({
        placeholder: "Select Category"
    });


    $("#saveTenant").on("click", function(event) {
            event.preventDefault(); 

            var formData = {
                fullName: $("#fullName").val(),
                birthDate: $("#birthDate").val(),
                gender: $("#gender").val(),
                emailAddress: $("#emailAddress").val(),
                phoneNumber: $("#phoneNumber").val(),
                altPhoneNumber: $("#altPhoneNumber").val(),
                residentialAddress: $("#residentialAddress").val(),
                nationality: $("#nationality").val(),
                nationalId: $("#nationalId").val(),
                maritalStatus: $("#maritalStatus").val(),
                emergencyName: $("#emergencyName").val(),
                emergencyContact: $("#emergencyContact").val(),
                occupation: $("#occupation").val(),
                employerName: $("#employerName").val(),
                employerContact: $("#employerContact").val(),
                uuid: '<?php echo $uuid ?>'
            };
            
            var url = urlroot + "/tenant/saveTenant"; 

            var successCallback = function(response) {
                response = JSON.parse(response);

                if (response == 1) {
                    $("#needs-validation").addClass("was-validated");  
                    $('.step-1').removeClass('active').addClass('disabled');
                    $('.step-2').addClass('active');
                    $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-1').removeClass('d-block').addClass('d-none');
                }
                else {
                    $.notify("Tenant already exists", {
                        position: "top center",
                        className: "error"
                    });
                }
            };

            var validateForm = function(formData) {
                var error = '';

                if (!formData.fullName) {
                    error += 'Full Name is required\n';
                    $("#fullName").focus();
                }
                if (!formData.birthDate) {
                    error += 'Date of Birth is required\n';
                    $("#birthDate").focus();
                }
                if (!formData.gender) {
                    error += 'Gender is required\n';
                    $("#gender").focus();
                }
                if (!formData.emailAddress) {
                    error += 'Email Address is required\n';
                    $("#emailAddress").focus();
                }
                if (!formData.phoneNumber) {
                    error += 'Phone Number is required\n';
                    $("#phoneNumber").focus();
                } else {
                    var phoneRegex = /^[0-9]{10}$/;
                    if (!phoneRegex.test(formData.phoneNumber)) {
                        error += 'Phone number must be 10 digits long and contain only numbers\n';
                        $("#phoneNumber").focus();
                    }
                }
                if (!formData.residentialAddress) {
                    error += 'Residential Address is required\n';
                    $("#residentialAddress").focus();
                }
                if (!formData.nationality) {
                    error += 'Nationality is required\n';
                    $("#nationality").focus();
                }
                if (!formData.nationalId) {
                    error += 'National ID is required\n';
                    $("#nationalId").focus();
                }
                if (!formData.maritalStatus) {
                    error += 'Marital Status is required\n';
                    $("#maritalStatus").focus();
                }
                if (!formData.emergencyName) {
                    error += 'Emergency Contact Name is required\n';
                    $("#emergencyName").focus();
                }
                if (!formData.emergencyContact) {
                    error += 'Emergency Phone Number is required\n';
                    $("#emergencyContact").focus();
                }
                if (!formData.occupation) {
                    error += 'Occupation is required\n';
                    $("#occupation").focus();
                }

                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });



        //Ownership details
        $("#saveOwnership").on("click", function(event) {
            event.preventDefault(); 

            var ownerData = {
                ownerFullName: $("#ownerFullName").val(),
                ownerEmail: $("#ownerEmail").val(),
                ownerPhone: $("#ownerPhone").val(),
                ownerAddress: $("#ownerAddress").val(),
                ownerCity: $("#ownerCity").val(),
                ownershipType: $("#ownershipType").val(),
                ownerComments: $("#ownerComments").val(),
                uuid: '<?php echo $uuid; ?>'
            };

            var url = urlroot + "/property/saveOwnerDetails";

            var successCallback = function(response) {
                response = JSON.parse(response);
                $("#needs-validation1").addClass("was-validated");
                $('.step-2').removeClass('active').addClass('disabled');
                $('.step-3').addClass('active');
                $('.wizard-step-3').addClass('d-block').removeClass('d-none');
                $('.wizard-step-2').removeClass('d-block').addClass('d-none');
            };

            var validateOwnerForm = function(ownerData) {
                var error = '';
                if (!ownerData.ownerFullName) {
                    error += 'Owner Full Name is required\n';
                    $("#ownerFullName").focus();
                }
                if (!ownerData.ownerEmail) {
                    error += 'Owner Contact Email is required\n';
                    $("#ownerEmail").focus();
                } else {
                    // Email format validation
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(ownerData.ownerEmail)) {
                        error += 'Invalid Email Address\n';
                        $("#ownerEmail").focus();
                    }
                }
                if (!ownerData.ownerPhone) {
                    error += 'Owner Phone Number is required\n';
                    $("#ownerPhone").focus();
                } else {
                    var phoneRegex = /^[0-9]{10}$/;
                    if (!phoneRegex.test(ownerData.ownerPhone)) {
                        error += 'Phone number must be 10 digits long and contain only numbers\n';
                        $("#ownerPhone").focus();
                    }
                }
                if (!ownerData.ownershipType) {
                    error += 'Ownership Type is required\n';
                    $("#ownershipType").focus();
                }

                return error;
            };

            saveForm(ownerData, url, successCallback, validateOwnerForm);
        });


        // Rental info
        $("#saveRentalInfo").on("click", function(event) {
            event.preventDefault(); 

            var rentData = {
                rentAmount: $("#rentAmount").val(),
                depositAmount: $("#depositAmount").val(),
                leasePeriod: $("#leasePeriod").val(),
                availabilityDate: $("#availabilityDate").val(),
                utilitiesIncluded: $("#utilitiesIncluded").val(),
                paymentFrequency: $("#paymentFrequency").val(),
                uuid: '<?php echo $uuid; ?>'
            };

            var url = urlroot + "/property/saveRentalDetails";

            var successCallback = function(response) {
                response = JSON.parse(response);
                $.notify("Property saved", {
                    position: "top center",
                    className: "success"
                });

                // Delay the reload to allow the notification to be seen
                setTimeout(function() {
                    location.reload();
                }, 2000);  // 2-second delay
            };

            var validateRentalForm = function(rentData) {
                var error = '';
                if (!rentData.rentAmount) {
                    error += 'Rent Amount is required\n';
                    $("#rentAmount").focus();
                }
                if (!rentData.depositAmount) {
                    error += 'Deposit Amount is required\n';
                    $("#depositAmount").focus();
                }
                if (!rentData.leasePeriod) {
                    error += 'Lease Period is required\n';
                    $("#leasePeriod").focus();
                }
                if (!rentData.availabilityDate) {
                    error += 'Availability Date is required\n';
                    $("#availabilityDate").focus();
                }
                if (!rentData.utilitiesIncluded) {
                    error += 'Utilities status is required\n';
                    $("#utilitiesIncluded").focus();
                }
                if (!rentData.paymentFrequency) {
                    error += 'Payment Frequency is required\n';
                    $("#paymentFrequency").focus();
                }

                return error;
            };

            saveForm(rentData, url, successCallback, validateRentalForm);
               
        });


</script>