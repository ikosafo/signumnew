<?php include ('includes/header.php');
extract($data);
$uuid = $userDetails['uuid'];
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">USER MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">User Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Profile</strong></h4>
                            </div>
                            <div class="card-body">
                                    <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">First Name</label>
                                            <input type="text" id="firstName" readonly class="form-control-plaintext" value="<?= $userDetails['firstName'] ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Last Name (s)</label>
                                            <input type="text" id="lastName" readonly class="form-control-plaintext" value="<?= $userDetails['lastName'] ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Email Address</label>
                                            <input type="text" id="emailAddress" readonly class="form-control-plaintext" value="<?= $userDetails['emailaddress'] ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" id="phoneNumber" readonly class="form-control-plaintext" value="<?= $userDetails['phoneNumber'] ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Alternative Phone Number</label>
                                            <input type="text" id="altPhoneNumber" readonly class="form-control-plaintext" value="<?= $userDetails['altPhoneNumber'] ?>" >
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="text" id="dateBirth" readonly class="form-control-plaintext" value="<?= $userDetails['dateBirth'] ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-4 col-sm-12">
                                            <label class="form-label">Job Title</label>
                                            <input type="text" id="jobTitle" readonly class="form-control-plaintext" value="<?= $userDetails['jobtitle'] ?>" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Department</label>
                                            <input type="text" id="department" readonly class="form-control-plaintext" value="<?= Tools::getDepartment($userDetails['department']) ?>" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" id="address" readonly class="form-control-plaintext" value="<?= $userDetails['address'] ?>" required>
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