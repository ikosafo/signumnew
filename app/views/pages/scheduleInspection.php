<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SCHEDULE INSPECTION</a></li>
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
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Property</label>
                                        <select id="propertyName" class="default-select form-control wide" required>
                                            <option></option>
                                            <?php foreach ($listProperties as $record): ?>
                                                <option value="<?= $record->propertyId ?>"><?= $record->propertyName ?></option>
                                            <?php endforeach; ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Unit/Apartment Number</label>
                                        <input type="text" class="form-control" id="apartmentNumber" placeholder="Enter Unit/Apartment Number" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Type</label>
                                        <select class="default-select form-control wide" id="inspectionType" required>
                                            <option value="">Select Inspection Type</option>
                                            <option value="Routine Inspection">Routine Inspection</option>
                                            <option value="Move-In Inspection">Move-In Inspection</option>
                                            <option value="Move-Out Inspection">Move-Out Inspection</option>
                                            <option value="Maintenance Check">Maintenance Check</option>
                                            <option value="Safety/Compliance Inspection">Safety/Compliance Inspection</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Date</label>
                                        <input type="text" class="form-control" id="inspectionDate" placeholder="Select Date" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Duration</label>
                                        <input type="text" class="form-control" id="inspectionDuration" placeholder="Estimated time (e.g., 1 hour, 2 hours)" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Priority Level</label>
                                        <select class="form-control" id="priorityLevel" required>
                                            <option value="">Select Type</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Assigned Inspector</label>
                                        <select class="form-control" id="inspector" required>
                                            <option></option>
                                            <?php foreach ($listUsers as $record): ?>
                                                <option value="<?= $record->id ?>"><?= $record->firstName.' '.$record->lastName ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Recurrence Frequency</label>
                                        <select class="form-control" id="recurrenceFrequency" required>
                                            <option value="">Select Frequency</option>
                                            <option value="One-Time">One-Time</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Bi-Weekly">Bi-Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Semi-Annually">Semi-Annually</option>
                                            <option value="Annually">Annually</option>
                                            <option value="Every 2 Months">Every 2 Months</option>
                                            <option value="Every 3 Weeks">Every 3 Weeks</option>
                                            <option value="Custom">Custom</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Status</label>
                                        <select class="form-control" id="inspectionStatus" required>
                                            <option value="">Select Status</option>
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Pending Review">Pending Review</option>
                                            <option value="Failed">Failed</option>
                                            <option value="Rescheduled">Rescheduled</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="Awaiting Approval">Awaiting Approval</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Location Details (Optional)</label>
                                        <textarea class="form-control" id="inspectionDuration" placeholder="Estimated time (e.g., 1 hour, 2 hours)" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Description</label>
                                        <textarea class="form-control" id="inspectionDescription" placeholder="Enter description" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Attachments (Optional)</label>
                                            <input id="uploadPic" name="uploadPic" type="file" />
                                            <input type="hidden" id="selected_file" />
                                    </div>

                                   
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="submit" id="saveClientDetails" class="btn btn-primary next2 btn-sm">Save</button>
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

    $("#inspectionType").select2({
        placeholder:"Select Inspection Type"
    });

    $("#inspector").select2({
        placeholder:"Select Inspector"
    });   
    
    $("#priorityLevel").select2({
        placeholder:"Select Priority Level"
    });

    $("#inspectionDate").flatpickr();

    $("#inspectionStatus").select2({
        placeholder: "Select Status"
    });

    $("#recurrenceFrequency").select2({
        placeholder: "Select Frequency"
    })

    $(document).ready(function() {
        $('#clientType').change(function() {
            if ($(this).val() === 'Property Owner') {
                $('#contractTypeDiv').show();
               
            } else {
                $('#contractTypeDiv').hide();
            }
        });
    });

    $('#uploadPic').uploadifive({
        'auto': false,
        'method': 'post',
        'buttonText': 'Upload pictures or videos',
        'fileType': 'image/*',
        'multi': true,
        'width': 220,
        'formData': {
            'randno': '<?php echo $uuid ?>'
        },
        'dnd': false,
        'uploadScript': '/forms/uploadMultiImg',
        'onUploadComplete': function(file, data) {
            console.log(data);
            $.notify("Client added successfully", {
                position: "top center",
                className: "success"
            });

           /*  setTimeout(function() {
                location.reload();
            }, 500); */

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
    $("#saveClientDetails").on("click", function(event) {
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
            $('#uploadPic').uploadifive('upload');
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

            return error;
        };
        saveForm(clientData, url, successCallback, validateClientForm);
    });


</script>