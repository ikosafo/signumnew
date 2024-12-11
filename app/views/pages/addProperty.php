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

                <div class="row">
					
					<div class="col-xl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Total Properties</h4>
								<h3><?= $getPropertyNumber ?></h3>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Property Types</h4>
                                <div class="row">
                                    <div class="col-md-6">Apartment: <strong><?= $getApartmentNumber ?></strong></div>
                                    <div class="col-md-6">House: <strong><?= $getHouseNumber ?></strong></div>
                                    <div class="col-md-6">Commercial: <strong><?= $getCommercialNumber ?></strong></div>
                                    <div class="col-md-6">Land: <strong><?= $getLandNumber ?></strong></div>
                                </div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-lg-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Furnishing Statuses</h4>
                                <div class="row">
                                    <div class="col-md-6">Furnished: <strong><?= $getFurnishedNumber ?></strong></div>
                                    <div class="col-md-6">Semi-Furnished: <strong><?= $getSemifurnishedNumber ?></strong></div>
                                    <div class="col-md-6">Unfurnished: <strong><?= $getUnfurnishedNumber ?></strong></div>
                                </div>
							</div>
						</div>
                    </div>					
					
                </div>





                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fill in the form below</h4>
                            </div>
                            <div class="card-body">
								<div class="wizard-step-container">
                                    <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label required">Property Name/Title</label>
                                            <input type="text" name="propertyName" class="form-control" placeholder="Green Valley Apartments" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Property Type</label>
                                            <select name="propertyType" id="propertyType" class="default-select form-control wide" required>
                                                <option value="">Select Property</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="House">House</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Land">Land</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Facilities</label>
                                            <select name="facilities" class="form-control" id="facilities" multiple="multiple">
                                                <option value="None">None</option>
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
                                            <select id="propertyCategory" class="default-select form-control wide" required>
                                                <option value="">Select Category</option>
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
                                            <label class="form-label required">Number of Tenants</label>
                                            <input type="text" name="numberOfTenants" class="form-control" onkeypress="return isNumber(event)" placeholder="e.g., 10" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Property Size</label>
                                            <input type="text" name="propertySize" class="form-control" placeholder="e.g., 2000 sq ft or 0.5 acres" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Furnishing Status</label>
                                            <select id="furnishingStatus" class="default-select form-control wide" required>
                                                <option value="">Select Furnishing Status</option>
                                                <option value="Furnished">Furnished</option>
                                                <option value="Semi-Furnished">Semi-Furnished</option>
                                                <option value="Unfurnished">Unfurnished</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="Location (e.g., city or neighborhood)" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Property Address</label>
                                            <textarea name="propertyAddress" class="form-control" placeholder="Full address including street, city, state, postal code, and country" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Brief description of the property" rows="3"></textarea>
                                        </div>
                                        <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                            <button type="submit" id="saveProperty" class="btn btn-primary next2 btn-sm">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>

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
    
    $("#utilitiesIncluded").select2({
        placeholder: "Select"
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
            numberOfTenants: $("input[name='numberOfTenants']").val(),
            propertySize: $("input[name='propertySize']").val(),
            furnishingStatus: $("#furnishingStatus").val(),
            propertyManager: $('#propertyManager').val(),
            selectedFacilities: $('#facilities').val(),
            uuid: '<?php echo $uuid; ?>'
        };
        var url = urlroot + "/property/saveProperty";

        var successCallback = function(response) {
            response = JSON.parse(response);
            //alert(response);

            if (response == 1) {
                $.notify("Property saved", {
                    position: "top center",
                    className: "success"
                });

                setTimeout(function() {
                    location.reload();
                }, 500); 
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
                $("#propertyCategory").focus();
            }
            if (!formData.propertyAddress) {
                error += 'Property Address is required\n';
                $("textarea[name='propertyAddress']").focus();
            }
            if (!formData.location) {
                error += 'Location is required\n';
                $("input[name='location']").focus();
            }
            if (!formData.numberOfTenants) {
                error += 'Number of Tenants is required\n';
                $("input[name='numberOfTenants']").focus();
            }
            if (!formData.propertySize) {
                error += 'Property Size is required\n';
                $("input[name='propertySize']").focus();
            }
            if (!formData.furnishingStatus) {
                error += 'Furnishing Status is required\n';
                $("#furnishingStatus").focus();
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



</script>