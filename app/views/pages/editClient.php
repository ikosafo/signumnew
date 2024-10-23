<?php include ('includes/header.php');
extract($data);
$uuid = $clientDetails['uuid'];
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">CLIENT MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Edit Client Details</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Details of <strong><?= $clientDetails['fullName'] ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Property</label>
                                        <select id="propertyName" class="default-select form-control wide" required>
                                            <option></option>
                                            <?php foreach ($listProperties as $record): ?>
                                                <option value="<?= $record->propertyId ?>" 
                                                    <?= ($record->propertyId == $clientDetails['propertyid']) ? 'selected' : '' ?>>
                                                    <?= $record->propertyName ?>
                                                </option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Client Type</label>
                                        <select class="default-select form-control wide" id="clientType" required>
                                            <option value="">Select Client Type</option>
                                            <option value="Property Owner" <?= (strpos($clientDetails['clientType'], 'Property Owner') !== false) ? 'selected' : '' ?>>Property Owner</option>
                                            <option value="Tenant" <?= (strpos($clientDetails['clientType'], 'Tenant') !== false) ? 'selected' : '' ?>>Tenant</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12" id="contractTypeDiv">
                                        <label class="form-label">Type of Contract</label>
                                        <select class="default-select form-control wide" id="contractType" required>
                                            <option value="">Select Type</option>
                                            <option value="For Rental" <?= (strpos($clientDetails['contractType'], 'For Rental') !== false) ? 'selected' : '' ?>>For Rental</option>
                                            <option value="For Management" <?= (strpos($clientDetails['contractType'], 'For Management') !== false) ? 'selected' : '' ?>>For Management</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Ownership Type</label>
                                        <select class="default-select form-control wide" id="ownershipType" required>
                                            <option value="">Select Ownership Type</option>
                                            <option value="Individual" <?= (strpos($clientDetails['ownershipType'], 'Individual') !== false) ? 'selected' : '' ?>>Individual</option>
                                            <option value="Company" <?= (strpos($clientDetails['ownershipType'], 'Company') !== false) ? 'selected' : '' ?>>Company</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Full Name</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['fullName'] ?>" id="fullName" placeholder="Enter full name" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Contact Email</label>
                                        <input type="email" class="form-control" value="<?= $clientDetails['emailAddress'] ?>" id="emailAddress" placeholder="Enter email address" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Phone Number</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['phoneNumber'] ?>" id="phoneNumber" maxlength="10" onkeypress="return isNumber(event)" placeholder="Enter phone number" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Alternative Phone Number</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['altPhoneNumber'] ?>" id="altPhoneNumber" maxlength="10" onkeypress="return isNumber(event)" placeholder="Alternative Phone Number">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Residential Address</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['residentialAddress'] ?>" id="residentialAddress" placeholder="Enter residential address" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Nationality</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['nationality'] ?>" id="nationality" placeholder="Enter nationality">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Date of Birth</label>
                                        <input type="date" class="form-control" value="<?= $clientDetails['birthDate'] ?>" id="birthDate" placeholder="Select Date" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Gender</label>
                                        <select id="gender" class="default-select form-control wide" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" <?= (strpos($clientDetails['gender'], 'Male') !== false) ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= (strpos($clientDetails['gender'], 'Female') !== false) ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Marital Status</label>
                                        <select name="maritalStatus" id="maritalStatus" class="default-select form-control wide" required>
                                            <option value="">Select Marital Status</option>
                                            <option value="Single" <?= (strpos($clientDetails['maritalStatus'], 'Single') !== false) ? 'selected' : '' ?>>Single</option>
                                            <option value="Married" <?= (strpos($clientDetails['maritalStatus'], 'Married') !== false) ? 'selected' : '' ?>>Married</option>
                                            <option value="Divorced" <?= (strpos($clientDetails['maritalStatus'], 'Divorced') !== false) ? 'selected' : '' ?>>Divorced</option>
                                            <option value="Separated" <?= (strpos($clientDetails['maritalStatus'], 'Separated') !== false) ? 'selected' : '' ?>>Separated</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Occupation</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['occupation'] ?>" id="occupation" placeholder="Occupation" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Employer's Name</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['employersName'] ?>" id="employerName" placeholder="Employer's Name">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Employer's Contact Number</label>
                                        <input type="text" class="form-control" id="employerContact" maxlength="10" 
                                            onkeypress="return isNumber(event)" value="<?= $clientDetails['employersPhone'] ?>" placeholder="Employer's Contact Number">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Emergency Contact Name</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['emergencyName'] ?>" id="emergencyName" placeholder="Emergency Contact Name">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Emergency Phone Number</label>
                                        <input type="text" class="form-control" value="<?= $clientDetails['emergencyPhone'] ?>" id="emergencyContact" maxlength="10" onkeypress="return isNumber(event)" placeholder="Emergency Phone Number">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Passport Picture</label>
                                        <input id="uploadPic" name="uploadPic" type="file" />
                                        <input type="hidden" id="selected_file" />
                                        <p class="my-3"><?= Tools::displayImages($clientDetails['uuid']) ?></p>
                                    </div>
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="submit" id="editClientDetails" class="btn btn-warning next2 btn-sm">Edit Details</button>
                                    </div>

                                </form>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>

    $(document).ready(function() {
        $('#clientType').change(function() {
            if ($(this).val() === 'Property Owner') {
                $('#contractTypeDiv').show();
               
            } else {
                $('#contractTypeDiv').hide();
            }
        });
    });

   // Select all elements with the class 'nav-text'
    var navItems = document.querySelectorAll('a span.nav-text');

    navItems.forEach(function(item) {
        var textContent = item.textContent.trim().replace(/\s+/g, ' ');
        console.log("Checking item:", textContent); 

        if (textContent === 'CLIENT MANAGEMENT') {
            console.log("Found CLIENT MANAGEMENT:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });



    $('#uploadPic').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': 'Replace picture',
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
            $.notify("Client added successfully", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500);
           
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

    $('#propertyName').select2({
        placeholder: 'Select Property'
    })

   
    //Client details
    $("#editClientDetails").on("click", function(event) {
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
            clientType: $("#clientType").val(),
            uuid: '<?php echo $uuid; ?>',
            selectedFile: $("#selected_file").val(),
            propertyName:  $("#propertyName").val(),
            contractType: $("#contractType").val()
        };

        var url = urlroot + "/property/saveClientDetails";

        var successCallback = function(response) {
            if ($("#selected_file").val() === 'yes') {
                $('#uploadPic').uploadifive('upload');
            }

            $.notify("Client details updated successfully", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500);

           
        };

        var validateClientForm = function(clientData) {
            var error = '';
            
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
            if (!clientData.clientType) {
                error += 'Client Type is required\n';
                $("#clientType").focus();
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
            if (!clientData.propertyName) {
                error += 'Property Name is required\n';
                $("#propertyName").focus();
            }
            if (clientData.clientType == "Property Owner" && !clientData.contractType) {
                error += 'Contract type is required\n';
            }
            if (clientData.clientType != "Property Owner" && clientData.contractType) {
                error += 'Contract type should not be selected\n';
            }


            return error;
        };
        saveForm(clientData, url, successCallback, validateClientForm);
    });


</script>