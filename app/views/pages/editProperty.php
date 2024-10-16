<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
$uuid = $propertyDetails['uuid'];
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">PROPERTY MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Edit Property</a></li>
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
                                                        <h5>Property Details</h5>
                                                        <h6>Get started with the property</h6>
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
                                                        <h5>Ownership Information</h5>
                                                        <h6>Provide ownership details</h6>
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
                                                        <h5>Rental Information</h5>
                                                        <h6>Enter rental details</h6>
                                                    </div>
                                                </div>
                                            </li>
                                           
                                        </ul>

										<div class="wizard-form-details log-in">
                                            <div class="wizard-step-1 d-block">
                                                <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                                                    <div class="mb-3 col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Name/Title</label>
                                                        <input type="text" name="propertyName" class="form-control" value="<?= $propertyDetails['propertyName'] ?>" placeholder="Green Valley Apartments" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Type</label>
                                                        <select name="propertyType" class="default-select form-control wide" required>
                                                             <option value="" disabled>Select Property Type</option>
                                                            <option value="Apartment" <?= ($propertyDetails['propertyType'] == 'Apartment') ? 'selected' : '' ?>>Apartment</option>
                                                            <option value="House" <?= ($propertyDetails['propertyType'] == 'House') ? 'selected' : '' ?>>House</option>
                                                            <option value="Commercial" <?= ($propertyDetails['propertyType'] == 'Commercial') ? 'selected' : '' ?>>Commercial</option>
                                                            <option value="Land" <?= ($propertyDetails['propertyType'] == 'Land') ? 'selected' : '' ?>>Land</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Facilities</label>
                                                        <select name="facilities[]" class="form-control" id="facilities" multiple="multiple">
                                                            <option value="Swimming Pool" <?= (strpos($propertyDetails['facilities'], 'Swimming Pool') !== false) ? 'selected' : '' ?>>Swimming Pool</option>
                                                            <option value="Gym/Fitness Center" <?= (strpos($propertyDetails['facilities'], 'Gym/Fitness Center') !== false) ? 'selected' : '' ?>>Gym/Fitness Center</option>
                                                            <option value="Parking Garage" <?= (strpos($propertyDetails['facilities'], 'Parking Garage') !== false) ? 'selected' : '' ?>>Parking Garage</option>
                                                            <option value="Elevator" <?= (strpos($propertyDetails['facilities'], 'Elevator') !== false) ? 'selected' : '' ?>>Elevator</option>
                                                            <option value="24/7 Security" <?= (strpos($propertyDetails['facilities'], '24/7 Security') !== false) ? 'selected' : '' ?>>24/7 Security</option>
                                                            <option value="Childrens Playground" <?= (strpos($propertyDetails['facilities'], "Childrens Playground") !== false) ? 'selected' : '' ?>>Children's Playground</option>
                                                            <option value="Clubhouse/Community Hall" <?= (strpos($propertyDetails['facilities'], 'Clubhouse/Community Hall') !== false) ? 'selected' : '' ?>>Clubhouse/Community Hall</option>
                                                            <option value="Backup Power Generator" <?= (strpos($propertyDetails['facilities'], 'Backup Power Generator') !== false) ? 'selected' : '' ?>>Backup Power Generator</option>
                                                            <option value="CCTV Surveillance" <?= (strpos($propertyDetails['facilities'], 'CCTV Surveillance') !== false) ? 'selected' : '' ?>>CCTV Surveillance</option>
                                                            <option value="On-site Laundry Facilities" <?= (strpos($propertyDetails['facilities'], 'On-site Laundry Facilities') !== false) ? 'selected' : '' ?>>On-site Laundry Facilities</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Category</label>
                                                        <select name="propertyCategory" id="propertyCategory" class="form-control" required>
                                                            <option disabled>Select Category</option>
                                                            <?php foreach ($listPropertyCategory as $record): ?>
                                                                <option value="<?= $record->categoryId ?>" 
                                                                    <?= ($record->categoryId == $propertyDetails['propertyCategory']) ? 'selected' : '' ?>>
                                                                    <?= $record->categoryName ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>  
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Property Manager(s)</label>
                                                        <?php $selectedManagers = explode(',', $propertyDetails['propertyManager']); ?>
                                                        <select name="propertyManager[]" class="form-control" id="propertyManager" multiple="multiple">
                                                            <?php foreach ($listUsers as $record): ?>
                                                                <option value="<?= $record->userid ?>" 
                                                                    <?= in_array($record->userid, $selectedManagers) ? 'selected' : '' ?>>
                                                                    <?= $record->firstName.'  '.$record->lastName ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Address</label>
                                                        <textarea name="propertyAddress" class="form-control" placeholder="Full address including street, city, state, postal code, and country" rows="3" required><?= $propertyDetails['propertyAddress'] ?></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Location</label>
                                                        <input type="text" name="location" class="form-control" value="<?= $propertyDetails['location'] ?>" placeholder="Location (e.g., city or neighborhood)" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" placeholder="Brief description of the property" rows="3"><?= $propertyDetails['description'] ?></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Number of Units</label>
                                                        <input type="number" name="numberOfUnits" class="form-control" value="<?= $propertyDetails['numberOfUnits'] ?>" placeholder="e.g., 10" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Size</label>
                                                        <input type="text" name="propertySize" class="form-control" value="<?= $propertyDetails['propertySize'] ?>" placeholder="e.g., 2000 sq ft or 0.5 acres" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Furnishing Status</label>
                                                        <select name="furnishingStatus" class="default-select form-control wide" required>
                                                            <option value="" disabled>Select Furnishing Status</option>
                                                            <option value="Furnished" <?= (strpos($propertyDetails['furnishingStatus'], 'Furnished') !== false) ? 'selected' : '' ?>>Furnished</option>
                                                            <option value="Semi-Furnished" <?= (strpos($propertyDetails['furnishingStatus'], 'Semi-Furnished') !== false) ? 'selected' : '' ?>>Semi-Furnished</option>
                                                            <option value="Unfurnished" <?= (strpos($propertyDetails['furnishingStatus'], 'Unfurnished') !== false) ? 'selected' : '' ?>>Unfurnished</option>
                                                        </select>
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
                                                        <input type="text" class="form-control" id="ownerFullName" placeholder="Enter owner's full name" value="<?= $propertyDetails['ownerFullName'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Contact Email</label>
                                                        <input type="email" class="form-control" id="ownerEmail" placeholder="Enter owner's email address" value="<?= $propertyDetails['ownerEmail'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Phone Number</label>
                                                        <input type="text" class="form-control" id="ownerPhone" placeholder="Enter owner's phone number"  value="<?= $propertyDetails['ownerPhone'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="ownerAddress" placeholder="Enter owner's address" value="<?= $propertyDetails['ownerAddress'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" id="ownerCity" placeholder="Enter owner's city" value="<?= $propertyDetails['ownerCity'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Ownership Type</label>
                                                        <select class="default-select form-control wide" id="ownershipType" required>
                                                            <option value="" disabled>Select Ownership Type</option>
                                                            <option value="Individual" <?= (strpos($propertyDetails['ownershipType'], 'Individual') !== false) ? 'selected' : '' ?>>Individual</option>
                                                            <option value="Company" <?= (strpos($propertyDetails['ownershipType'], 'Company') !== false) ? 'selected' : '' ?>>Company</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="form-label">Additional Comments</label>
                                                        <textarea class="form-control" id="ownerComments" rows="3" placeholder="Any additional details about the ownership"><?= $propertyDetails['ownerComments'] ?></textarea>
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
                                                        <input type="number" class="form-control" id="rentAmount" placeholder="Enter rent amount" value="<?= $propertyDetails['rentAmount'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Deposit Amount</label>
                                                        <input type="number" class="form-control" id="depositAmount" placeholder="Enter deposit amount" value="<?= $propertyDetails['depositAmount'] ?>">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Lease Period</label>
                                                        <input type="text" class="form-control" id="leasePeriod" placeholder="Enter lease period (e.g., 1 year)" value="<?= $propertyDetails['leasePeriod'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Availability Date</label>
                                                        <input type="date" class="form-control" placeholder="Select Date" id="availabilityDate" value="<?= $propertyDetails['availabilityDate'] ?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Utilities Included</label>
                                                        <select class="default-select form-control wide" id="utilitiesIncluded">
                                                            <option value="" disabled>Select</option>
                                                            <option value="Yes" <?= (strpos($propertyDetails['utilitiesIncluded'], 'Yes') !== false) ? 'selected' : '' ?>>Yes</option>
                                                            <option value="No" <?= (strpos($propertyDetails['utilitiesIncluded'], 'No') !== false) ? 'selected' : '' ?>>No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Rent Payment Frequency</label>
                                                        <select class="default-select form-control wide" id="paymentFrequency" required>
                                                        <option value="" disabled>Select Payment Frequency</option>
                                                            <option value="Monthly" <?= (strpos($propertyDetails['paymentFrequency'], 'Monthly') !== false) ? 'selected' : '' ?>>Monthly</option>
                                                            <option value="Quarterly" <?= (strpos($propertyDetails['paymentFrequency'], 'Quarterly') !== false) ? 'selected' : '' ?>>Quarterly</option>
                                                            <option value="Yearly" <?= (strpos($propertyDetails['paymentFrequency'], 'Yearly') !== false) ? 'selected' : '' ?>>Yearly</option>
                                                        </select>
                                                    </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev2 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveRentalInfo" class="btn btn-success btn-sm">Update <i class="fas fa-arrow-right ms-2"></i></button>
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

        $('#propertyManager').SumoSelect({
            placeholder: 'Select options',
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
                propertyManager: $('#propertyManager').val(),
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
                if (!formData.propertyManager || formData.propertyManager.length === 0) {
                    error += 'Manager is required\n';
                    $('#propertyManager').focus();
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