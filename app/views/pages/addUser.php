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
                                                        <label class="form-label required">Date of Birth</label>
                                                        <input type="text" name="dateBirth" class="form-control" placeholder="Select date" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Type</label>
                                                        <select name="propertyType" class="default-select form-control wide" required>
                                                            <option value="">Select Property Type</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="house">House</option>
                                                            <option value="commercial">Commercial</option>
                                                            <option value="land">Land</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Category</label>
                                                        <select name="propertyCategory" id="propertyCategory" class="form-control" required>
                                                            <option></option>
                                                            <?php foreach ($listPropertyCategory as $record): ?>
                                                                <option value="<?= $record->categoryId ?>"><?= $record->categoryName ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Address</label>
                                                        <textarea name="propertyAddress" class="form-control" placeholder="Full address including street, city, state, postal code, and country" rows="3" required></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Location</label>
                                                        <input type="text" name="location" class="form-control" placeholder="Location (e.g., city or neighborhood)" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Facilities</label>
                                                        <select name="facilities" class="form-control" id="facilities" multiple="multiple">
                                                            <option value="Swimming Pool">Swimming Pool</option>
                                                            <option value="Gym/Fitness Center">Gym/Fitness Center</option>
                                                            <option value="Parking Garage">Parking Garage</option>
                                                            <option value="Elevator">Elevator</option>
                                                            <option value="24/7 Security">24/7 Security</option>
                                                            <option value="Children's Playground">Children's Playground</option>
                                                            <option value="Clubhouse/Community Hall">Clubhouse/Community Hall</option>
                                                            <option value="Backup Power Generator">Backup Power Generator</option>
                                                            <option value="CCTV Surveillance">CCTV Surveillance</option>
                                                            <option value="On-site Laundry Facilities">On-site Laundry Facilities</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" placeholder="Brief description of the property" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Number of Units</label>
                                                        <input type="number" name="numberOfUnits" class="form-control" placeholder="e.g., 10" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Size</label>
                                                        <input type="text" name="propertySize" class="form-control" placeholder="e.g., 2000 sq ft or 0.5 acres" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Furnishing Status</label>
                                                        <select name="furnishingStatus" class="default-select form-control wide" required>
                                                            <option value="">Select Furnishing Status</option>
                                                            <option value="furnished">Furnished</option>
                                                            <option value="semi-furnished">Semi-Furnished</option>
                                                            <option value="unfurnished">Unfurnished</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Property Manager</label>
                                                        <input type="text" name="propertyManager" class="form-control" placeholder="Assign a property manager (optional)">
                                                    </div>
                                                    <div class="next-btn text-end col-sm-12">
                                                        <button type="submit" id="saveProperty" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
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
                                            <div class="wizard-step-3 d-none">
                                               <form class="row" id="needs-validation2" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Rent Amount</label>
                                                        <input type="number" class="form-control" id="rentAmount" placeholder="Enter rent amount" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Deposit Amount</label>
                                                        <input type="number" class="form-control" id="depositAmount" placeholder="Enter deposit amount">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Lease Period</label>
                                                        <input type="text" class="form-control" id="leasePeriod" placeholder="Enter lease period (e.g., 1 year)" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Availability Date</label>
                                                        <input type="date" class="form-control" placeholder="Select Date" id="availabilityDate" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Utilities Included</label>
                                                        <select class="default-select form-control wide" id="utilitiesIncluded">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Rent Payment Frequency</label>
                                                        <select class="default-select form-control wide" id="paymentFrequency" required>
                                                        <option value="">Select Payment Frequency</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quarterly">Quarterly</option>
                                                            <option value="yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev2 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveRentalInfo" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
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
    
       $("#availabilityDate").flatpickr();
       $('#facilities').SumoSelect({
            placeholder: 'Select options',
            selectAll: true,
            search: true,
            okCancelInMulti: true
        });

       $("#propertyCategory").select2({
            placeholder: "Select Category"
       });

       	$("#saveProperty").on("click", function() {
            event.preventDefault(); 

            var formData = {
                propertyName: $("input[name='propertyName']").val(),
                propertyType: $("select[name='propertyType']").val(),
                propertyCategory: $("#propertyCategory").val(),
                propertyAddress: $("textarea[name='propertyAddress']").val(),
                location: $("input[name='location']").val(),
                description: $("textarea[name='description']").val(),
                numberOfUnits: $("input[name='numberOfUnits']").val(),
                propertySize: $("input[name='propertySize']").val(),
                furnishingStatus: $("select[name='furnishingStatus']").val(),
                propertyManager: $("input[name='propertyManager']").val(),
                selectedFacilities: $('#facilities').val(),
                uuid: '<?php echo $uuid; ?>'
            };
            var url = urlroot + "/property/saveProperty";

            var successCallback = function(response) {
                response = JSON.parse(response);
                //alert(response);

                if (response == 1) {
                    $("#needs-validation").addClass("was-validated");  
                    $('.step-1').removeClass('active').addClass('disabled');
                    $('.step-2').addClass('active');
                    $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-1').removeClass('d-block').addClass('d-none');
                }
                else {
                    $.notify("Property already exists", {
                        position: "top center",
                        className: "error"
                    });
                }

            };

            var validateForm = function(formData) {
                var error = '';
                if (!formData.propertyName) {
                    error += 'Property Name is required\n';
                    $("input[name='propertyName']").focus();
                }
                if (!formData.propertyType) {
                    error += 'Property Type is required\n';
                    $("select[name='propertyType']").focus();
                }
                if (!formData.propertyCategory) {
                    error += 'Property Category is required\n';
                    $("input[name='propertyCategory']").focus();
                }
                if (!formData.propertyAddress) {
                    error += 'Property Address is required\n';
                    $("textarea[name='propertyAddress']").focus();
                }
                if (!formData.location) {
                    error += 'Location is required\n';
                    $("input[name='location']").focus();
                }
                if (!formData.numberOfUnits) {
                    error += 'Number of Units is required\n';
                    $("input[name='numberOfUnits']").focus();
                }
                if (!formData.propertySize) {
                    error += 'Property Size is required\n';
                    $("input[name='propertySize']").focus();
                }
                if (!formData.furnishingStatus) {
                    error += 'Furnishing Status is required\n';
                    $("select[name='furnishingStatus']").focus();
                }
                if (!formData.selectedFacilities || formData.selectedFacilities.length === 0) {
                    error += 'Facilities are required\n';
                    $('#facilities').focus();
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
            // Collect rental info data instead of owner data
                $("#needs-validation2").addClass("was-validated");
                $('.step-3').removeClass('active').addClass('disabled');
                $('.step-4').addClass('active');
                $('.wizard-step-4').addClass('d-block').removeClass('d-none');
                $('.wizard-step-3').removeClass('d-block').addClass('d-none');
        });


</script>