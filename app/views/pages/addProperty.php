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
                                                        <input type="text" name="propertyName" class="form-control" placeholder="Green Valley Apartments" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Type</label>
                                                        <select name="propertyType" class="default-select form-control wide" required>
                                                            <option value="">Select Property Type</option>
                                                            <option value="Apartment">Apartment</option>
                                                            <option value="House">House</option>
                                                            <option value="Commercial">Commercial</option>
                                                            <option value="Land">Land</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Facilities</label>
                                                        <select name="facilities" class="form-control" id="facilities" multiple="multiple">
                                                            <option value="Swimming Pool">Swimming Pool</option>
                                                            <option value="Gym/Fitness Center">Gym/Fitness Center</option>
                                                            <option value="Parking Garage">Parking Garage</option>
                                                            <option value="Elevator">Elevator</option>
                                                            <option value="24/7 Security">24/7 Security</option>
                                                            <option value="Childrens Playground">Children's Playground</option>
                                                            <option value="Clubhouse/Community Hall">Clubhouse/Community Hall</option>
                                                            <option value="Backup Power Generator">Backup Power Generator</option>
                                                            <option value="CCTV Surveillance">CCTV Surveillance</option>
                                                            <option value="On-site Laundry Facilities">On-site Laundry Facilities</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Category</label>
                                                        <select name="propertyCategory" id="propertyCategory" class="form-control" required>
                                                            <option>Select Category</option>
                                                            <?php foreach ($listPropertyCategory as $record): ?>
                                                                <option value="<?= $record->categoryId ?>"><?= $record->categoryName ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>  
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Property Manager(s)</label>
                                                        <select name="propertyManager" class="form-control" id="propertyManager" multiple="multiple">
                                                            <?php foreach ($listUsers as $record): ?>
                                                                <option value="<?= $record->userid ?>"><?= $record->firstName.'  '.$record->lastName?></option>
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
                                                        <label class="form-label">Description</label>
                                                        <textarea name="description" class="form-control" placeholder="Brief description of the property" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Number of Units</label>
                                                        <input type="text" name="numberOfUnits" class="form-control" onkeypress="return isNumber(event)" placeholder="e.g., 10" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Property Size</label>
                                                        <input type="text" name="propertySize" class="form-control" placeholder="e.g., 2000 sq ft or 0.5 acres" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Furnishing Status</label>
                                                        <select name="furnishingStatus" class="default-select form-control wide" required>
                                                            <option value="">Select Furnishing Status</option>
                                                            <option value="Furnished">Furnished</option>
                                                            <option value="Semi-Furnished">Semi-Furnished</option>
                                                            <option value="Unfurnished">Unfurnished</option>
                                                        </select>
                                                    </div>
                                                    <div class="next-btn text-end col-sm-12">
                                                        <button type="submit" id="saveProperty" class="btn btn-primary btn-sm">Next <i class="fas fa-arrow-right ms-2"></i></button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="wizard-step-2 d-none">
                                               <form class="row" id="needs-validation2" novalidate="" autocomplete="off">
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Number of bedroom(s)</label>
                                                        <select name="numberRooms" class="form-control" id="numberRooms" multiple="multiple">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Expected Rent Amount (Separate them with commas to match the number of rooms selected)</label>
                                                        <input type="text" class="form-control" id="rentAmount" placeholder="Eg. 3200.50,5400.00,9400.34" required onkeypress="allowNumbersCommasDecimals(event)">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Expected Deposit Amount</label>
                                                        <input type="number" class="form-control" id="depositAmount" placeholder="Enter deposit amount">
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Expected Lease Period</label>
                                                        <input type="text" class="form-control" id="leasePeriod" placeholder="Enter lease period (e.g., 1 year)" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Expected Availability Date</label>
                                                        <input type="date" class="form-control" placeholder="Select Date" id="availabilityDate" required>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label">Utilities Included</label>
                                                        <select class="default-select form-control wide" id="utilitiesIncluded">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label class="form-label required">Expected Rent Payment Frequency</label>
                                                        <select class="form-control" id="paymentFrequency" style="width: 100%;" required>
                                                            <option></option>    
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Quarterly">Quarterly</option>
                                                            <option value="Yearly  (1 year)">Yearly  (1 year)</option>
                                                            <option value="Biennially (2 years)">Biennially (2 years)</option>
                                                            <option value="Triennially (3 years)">Triennially (3 years)</option>
                                                            <option value="Quadrennially (4 years)">Quadrennially (4 years)</option>
                                                            <option value="Quinquennially (5 years)">Quinquennially (5 years)</option>
                                                        </select>
                                                    </div>
                                                    <div class="next-btn d-flex col-sm-12">
                                                        <button type="button" class="btn btn-default prev1 btn-sm"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                                                        <button type="submit" id="saveRentalInfo" class="btn btn-success btn-sm">Submit <i class="fas fa-arrow-right ms-2"></i></button>
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
    
    $('#numberRooms').SumoSelect({
        placeholder: 'Select number of rooms',
        search: true,
        okCancelInMulti: true
    });

    $("#propertyCategory").select2({
        placeholder: "Select Category"
    });

    $("#paymentFrequency").select2({
        placeholder: "Select Payment Frequency"
    });

    // Save Property
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
            uuid: '<?php echo $uuid; ?>',
            numberRooms: $("#numberRooms").val()
        };

        var url = urlroot + "/property/saveRentalDetails";

        var successCallback = function(response) {
            response = JSON.parse(response);
            $.notify("Property saved", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500); 
        };

        var validateRentalForm = function(rentData) {
            var error = '';

             // Ensure rentData.numberRooms and rentData.rentAmount are treated as strings
            var numberRoomsArr = rentData.numberRooms ? String(rentData.numberRooms).split(',') : [];
            var rentAmountsArr = rentData.rentAmount ? String(rentData.rentAmount).split(',') : [];

            var numberRoomsCount = numberRoomsArr.length;
            var rentAmountsCount = rentAmountsArr.length;

            // Validate that both fields are provided
            if (!rentData.numberRooms || numberRoomsCount === 0) {
                error += 'Number of bedrooms is required\n';
                $('#numberRooms').focus();
            }

            if (!rentData.rentAmount || rentAmountsCount === 0) {
                error += 'Rent Amount is required\n';
                $("#rentAmount").focus();
            }

            // Ensure the number of rooms matches the number of rent amounts
            if (numberRoomsCount !== rentAmountsCount) {
                error += `The number of rent amounts (${rentAmountsCount}) must match the number of bedrooms selected (${numberRoomsCount}).\n`;
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