<?php include 'includes/headerClient.php';
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">COMPLAINTS</a></li>
						<li class="breadcrumb-item active"><a href="#">Log a Complaint</a></li>
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
                                        <label class="form-label required">Exact Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Location" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Complaint Type</label>
                                        <select class="form-control" id="complaintType" required>
                                            <option value="">Select Complaint Type</option>
                                            <option value="Service Issue">Service Issue</option>
                                            <option value="Product Issue">Product Issue</option>
                                            <option value="Billing Issue">Billing Issue</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">For Service-related Complaint</label>
                                        <select class="form-control" id="issueCategory" required>
                                            <option value="">Select Issue Category</option>
                                            <option value="Electrical Issues">Electrical Issues</option>
                                            <option value="Plumbing Issues">Plumbing Issues</option>
                                            <option value="Painting/Decorating">Painting/Decorating</option>
                                            <option value="HVAC (Heating, Ventilation, and Air Conditioning)">HVAC (Heating, Ventilation, and Air Conditioning)</option>
                                            <option value="Roofing Issues">Roofing Issues</option>
                                            <option value="Flooring Issues">Flooring Issues</option>
                                            <option value="Structural Issues">Structural Issues</option>
                                            <option value="Pest Control">Pest Control</option>
                                            <option value="Security Issues">Security Issues</option>
                                            <option value="Appliance Issues">Appliance Issues</option>
                                            <option value="Landscaping and Grounds Maintenance">Landscaping and Grounds Maintenance</option>
                                            <option value="Waste Management">Waste Management</option>
                                            <option value="Windows and Doors">Windows and Doors</option>
                                            <option value="Mold and Mildew">Mold and Mildew</option>
                                            <option value="Fire Safety">Fire Safety</option>
                                            <option value="Water Damage">Water Damage</option>
                                            <option value="Insulation Issues">Insulation Issues</option>
                                            <option value="Fencing and Gates">Fencing and Gates</option>
                                            <option value="Concrete/Driveway Issues">Concrete/Driveway Issues</option>
                                            <option value="Noise Complaints">Noise Complaints</option>
                                            <option value="Lighting and Electrical Fixtures">Lighting and Electrical Fixtures</option>
                                            <option value="Basement Issues">Basement Issues</option>
                                            <option value="Elevator Issues">Elevator Issues</option>
                                            <option value="Garage Issues">Garage Issues</option>
                                            <option value="Swimming Pool Issues">Swimming Pool Issues</option>
                                            <option value="Staircase and Railings">Staircase and Railings</option>
                                            <option value="Parking Issues">Parking Issues</option>
                                            <option value="Internet and Telecommunications">Internet and Telecommunications</option>
                                            <option value="Accessibility Issues">Accessibility Issues</option>
                                            <option value="General Maintenance">General Maintenance</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Expected Resolution Time</label>
                                        <select id="expectedResolutionTime" class="form-control">
                                            <option value=""></option>
                                            <option value="Within 24 hours">Within 24 hours</option>
                                            <option value="Within 2-3 days">Within 2-3 days</option>
                                            <option value="Within 1 week">Within 1 week</option>
                                            <option value="Within 2 weeks">Within 2 weeks</option>
                                            <option value="Within 1 month">Within 1 month</option>
                                            <option value="More than 1 month">More than 1 month</option>
                                            <option value="No specific time">No specific time</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Incident Severity</label>
                                        <select id="incidentSeverity" class="form-control">
                                            <option value="">Select Incident Severity</option>
                                            <option value="Minor">Minor</option>
                                            <option value="Moderate">Moderate</option>
                                            <option value="Major">Major</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Complaint Priority</label>
                                        <select class="form-control" id="complaintPriority" required>
                                            <option value="">Select Complaint Priority</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Contact Method Preference</label>
                                        <select class="form-control" id="contactMethod" required>
                                            <option value="">Select Contact Method Preference</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Email">Email</option>
                                            <option value="Chat">Chat</option>
                                            <option value="On-Site Meeting">On-Site Meeting</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Has this issue been reported before?</label>
                                        <textarea class="form-control" rows="10" id="previousComplaints" placeholder="Descripe issue details"></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Issue Description</label>
                                        <textarea class="form-control" rows="10" id="issueDescription" placeholder="Enter description" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Steps Already Taken to Resolve</label>
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

    $("#issueCategory").select2({
        placeholder:"Select Category"
    });

    $("#complaintType").select2({
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