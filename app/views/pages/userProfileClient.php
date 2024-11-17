<?php include ('includes/headerClient.php');
extract($data);
$uuid = $clientDetails['uuid'];
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">USER MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Update Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Profile</strong></h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    
                                    
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control-plaintext" value="<?= $clientDetails['fullName'] ?>" id="fullName" placeholder="Enter full name" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Contact Email</label>
                                        <input type="email" class="form-control-plaintext" value="<?= $clientDetails['emailAddress'] ?>" id="emailAddress" placeholder="Enter email address" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control-plaintext" value="<?= $clientDetails['phoneNumber'] ?>" id="phoneNumber" maxlength="10" onkeypress="return isNumber(event)" placeholder="Enter phone number" required>
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
                                        <button type="submit" id="updateProfileBtn" class="btn btn-warning next2 btn-sm">Update Profile</button>
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
        'uploadScript': '/forms/uploadSingleImg',
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

    //Client details
    $("#updateProfileBtn").on("click", function(event) {
        event.preventDefault(); 

        var clientData = {
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
            uuid: '<?php echo $uuid; ?>',
            selectedFile: $("#selected_file").val(),
            contractType: $("#contractType").val()
        };

        var url = urlroot + "/client/updateProfile";

        var successCallback = function(response) {
            if ($("#selected_file").val() === 'yes') {
                $('#uploadPic').uploadifive('upload');
            }

            $.notify("Profile Updated Successfully", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500);
           
        };

        var validateProfileForm = function(clientData) {
            var error = '';
           
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
        saveForm(clientData, url, successCallback, validateProfileForm);
    });


</script>