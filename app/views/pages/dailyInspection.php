<?php include 'includes/headerInspector.php';
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">INSPECTIONS</a></li>
						<li class="breadcrumb-item active"><a href="#">Daily Inspection</a></li>
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
                                        <label class="form-label required">Inspection Date </label>
                                        <input type="text" class="form-control" id="apartmentNumber" placeholder="Enter Unit/Apartment Number" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Inspection Date</label>
                                        <input type="text" class="form-control" id="apartmentNumber" placeholder="Enter Unit/Apartment Number" required>
                                    </div>
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
                                        <label class="form-label required">Phase</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Location" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                    <label class="form-label required">Select Inspection Type</label>
                                    <select class="form-control" id="inspectionType" required>
                                        <option></option>
                                        <option value="Routine Inspection">Routine Inspection</option>
                                        <option value="Move-In Inspection">Move-In Inspection</option>
                                        <option value="Move-Out Inspection">Move-Out Inspection</option>
                                        <option value="Emergency Inspection">Emergency Inspection</option>
                                        <option value="Pre-Renovation Inspection">Pre-Renovation Inspection</option>
                                        <option value="Post-Renovation Inspection">Post-Renovation Inspection</option>
                                        <option value="Tenant Complaint Inspection">Tenant Complaint Inspection</option>
                                       
                                    </select>
                                </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Locations inspected</label>
                                        <textarea class="form-control" rows="10" id="previousComplaints" placeholder="Descripe issue details"></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">General Condition</label>
                                        <textarea class="form-control" rows="10" id="previousComplaints" placeholder="Descripe issue details"></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Safety and Compliance</label>
                                        <textarea class="form-control" rows="10" id="issueDescription" placeholder="Enter description" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Issues and Repairs</label>
                                        <textarea class="form-control" rows="10" id="stepsTaken" placeholder="Enter Steps taken" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Recommendations</label>
                                        <textarea class="form-control" rows="10" id="stepsTaken" placeholder="Enter Steps taken" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Additional Comments</label>
                                        <textarea class="form-control" rows="10" id="additionalComments" placeholder="Enter Comments"></textarea>
                                    </div>
                                                      
                                    <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Attachments (Optional)</label>
                                            <input id="uploadVid" type="file"  name="uploadVid[]" multiple/>
                                            <input type="hidden" id="selected_file" />
                                    </div>
                                
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="submit" id="saveComplaintDetails" class="btn btn-primary next2 btn-sm">Save</button>
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
        placeholder:"Select Type"
    });   
    
    $("#priorityLevel").select2({
        placeholder:"Select Priority Level"
    });

    $("#occurenceDate").flatpickr();

    $("#complaintPriority").select2({
        placeholder: "Select Priority"
    });

    $("#contactMethod").select2({
        placeholder: "Select Method"
    });

    $("#expectedResolutionTime").select2({
        placeholder: "Select Period"
    });

    $("#incidentSeverity").select2({
        placeholder: "Select Severity"
    });


    $('#uploadVid').uploadifive({
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
            
            setTimeout(function() {
                location.reload();
            }, 1500);
        },
        'onSelect': function(file) {
            $("#selected_file").val('yes');

        },
        'onCancel': function(file) {
            $("#selected_file").val('');
        }
    });

    
    $('#propertyName').select2({
        placeholder: 'Select Property'
    })

   
    //Log Complaint details
    $("#saveComplaintDetails").on("click", function(event) {
        event.preventDefault(); 

        var clientData = {
            propertyName: $("#propertyName").val(),
            apartmentNumber: $("#apartmentNumber").val(),
            location: $("#location").val(),
            complaintType: $("#complaintType").val(),
            issueCategory: $("#issueCategory").val(),
            expectedResolutionTime: $("#expectedResolutionTime").val(),
            incidentSeverity: $("#incidentSeverity").val(),
            complaintPriority: $("#complaintPriority").val(),
            contactMethod: $("#contactMethod").val(),
            previousComplaints: $("#previousComplaints").val(),
            issueDescription: $("#issueDescription").val(),
            stepsTaken: $("#stepsTaken").val(),
            additionalComments: $("#additionalComments").val(),
            selectedFile: $("#selected_file").val(),
            uuid: '<?php echo $uuid; ?>',
            clientid: '<?php echo $clientid ?>'
        };
        //alert(clientData.clientid);

        var url = urlroot + "/client/saveComplaintDetails";

        var successCallback = function(response) {
            // Check if a file is selected before uploading
            if (clientData.selectedFile) {
                $.notify("Complaint details submitted successfully!", {
                    position: "top center",
                    className: "success"
                });

                $('#uploadVid').uploadifive('upload');                
            }

            $.notify("Complaint details submitted successfully!", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500);
        };

        var validateComplaintForm = function(clientData) {
            var error = '';
            if (!clientData.propertyName) {
                error += 'Property is required\n';
                $("#propertyName").focus();
            }
            if (!clientData.apartmentNumber) {
                error += 'Unit/Apartment Number is required\n';
                $("#apartmentNumber").focus();
            }
            if (!clientData.location) {
                error += 'Exact Location is required\n';
                $("#location").focus();
            }
            if (!clientData.complaintType) {
                error += 'Complaint Type is required\n';
                $("#complaintType").focus();
            }
            if (!clientData.issueCategory) {
                error += 'Issue Category is required\n';
                $("#issueCategory").focus();
            }
            if (!clientData.issueDescription) {
                error += 'Issue Description is required\n';
                $("#issueDescription").focus();
            }
            if (!clientData.stepsTaken) {
                error += 'Steps Already Taken to Resolve is required\n';
                $("#stepsTaken").focus();
            }
            if (!clientData.incidentSeverity) {
                error += 'Incident Severity is required\n';
                $("#incidentSeverity").focus();
            }
            if (!clientData.complaintPriority) {
                error += 'Complaint Priority is required\n';
                $("#complaintPriority").focus();
            }
            if (!clientData.previousComplaints) {
                error += 'Previous Compliant indication is required\n';
                $("#previousComplaints").focus();
            }
            if (!clientData.contactMethod) {
                error += 'Contact Method Preference is required\n';
                $("#contactMethod").focus();
            }
            return error;
        };

        saveForm(clientData, url, successCallback, validateComplaintForm);
    });



</script>