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
                                <form class="row" id="dailyInspectionForm" novalidate="" autocomplete="off">
                                    <!-- Property Information -->
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
                                        <label class="form-label required">Inspection Date</label>
                                        <input type="date" class="form-control" id="inspectionDate" placeholder="Select inspection date" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Duration of time used (in hours)</label>
                                        <input type="number" class="form-control" id="timeUsed" placeholder="Enter duration in hours" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Unit/Apartment Number</label>
                                        <input type="text" class="form-control" id="unitNumber" placeholder="Enter unit/apartment number" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Phase</label>
                                        <input type="text" class="form-control" id="phase" placeholder="Enter phase/location" required>
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

                                    <!-- Inspection Details -->
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Locations Inspected</label>
                                        <textarea class="form-control" rows="10" id="locationsInspected" placeholder="Describe inspected locations"></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">General Condition</label>
                                        <textarea class="form-control" rows="10" id="generalCondition" placeholder="Describe general condition"></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Safety and Compliance</label>
                                        <textarea class="form-control" rows="10" id="safetyCompliance" placeholder="Describe safety and compliance findings" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Issues and Repairs</label>
                                        <textarea class="form-control" rows="10" id="issuesRepairs" placeholder="Describe issues and repairs" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Recommendations</label>
                                        <textarea class="form-control" rows="10" id="recommendations" placeholder="Enter recommendations" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Additional Comments</label>
                                        <textarea class="form-control" rows="10" id="additionalComments" placeholder="Enter additional comments"></textarea>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Attachments</label>
                                        <input id="uploadVid" type="file"  name="uploadVid[]" multiple/>
                                        <input type="hidden" id="selected_file" />
                                    </div>

                                    <!-- Submit -->
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="submit" id="saveInspection" class="btn btn-primary btn-sm">Save</button>
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

    $('#propertyName').select2({
        placeholder: 'Select Property'
    })

    $("#inspectionDate").flatpickr();

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

   
    $("#saveInspection").on("click", function(event) {
        event.preventDefault();

        var inspectionData = {
            propertyName: $("#propertyName").val(),
            inspectionDate: $("#inspectionDate").val(),
            timeUsed: $("#timeUsed").val(),
            unitNumber: $("#unitNumber").val(),
            phase: $("#phase").val(),
            inspectionType: $("#inspectionType").val(),
            locationsInspected: $("#locationsInspected").val(),
            generalCondition: $("#generalCondition").val(),
            safetyCompliance: $("#safetyCompliance").val(),
            issuesRepairs: $("#issuesRepairs").val(),
            recommendations: $("#recommendations").val(),
            additionalComments: $("#additionalComments").val(),
            selectedFile: $("#selected_file").val(),
            uuid: '<?php echo $uuid; ?>',
        };

        var url = urlroot + "/inspection/saveInspectionDetails";

        var successCallback = function(response) {
            if (inspectionData.selectedFile) {
                $.notify("Inspection details submitted successfully!", {
                    position: "top center",
                    className: "success"
                });

                $('#uploadVid').uploadifive('upload');
            }

            $.notify("Inspection details submitted successfully!", {
                position: "top center",
                className: "success"
            });

            setTimeout(function() {
                location.reload();
            }, 500);
        };

        var validateInspectionForm = function(inspectionData) {
            var error = '';
            if (!inspectionData.propertyName) {
                error += 'Property is required\n';
                $("#propertyName").focus();
            }
            if (!inspectionData.inspectionDate) {
                error += 'Inspection Date is required\n';
                $("#inspectionDate").focus();
            }
            if (!inspectionData.timeUsed) {
                error += 'Duration of time used is required\n';
                $("#timeUsed").focus();
            }
            if (!inspectionData.unitNumber) {
                error += 'Unit/Apartment Number is required\n';
                $("#unitNumber").focus();
            }
            if (!inspectionData.phase) {
                error += 'Phase is required\n';
                $("#phase").focus();
            }
            if (!inspectionData.inspectionType) {
                error += 'Inspection Type is required\n';
                $("#inspectionType").focus();
            }
            if (!inspectionData.locationsInspected) {
                error += 'Locations Inspected is required\n';
                $("#locationsInspected").focus();
            }
            if (!inspectionData.generalCondition) {
                error += 'General Condition is required\n';
                $("#generalCondition").focus();
            }
            if (!inspectionData.safetyCompliance) {
                error += 'Safety and Compliance is required\n';
                $("#safetyCompliance").focus();
            }
            if (!inspectionData.issuesRepairs) {
                error += 'Issues and Repairs is required\n';
                $("#issuesRepairs").focus();
            }
            if (!inspectionData.recommendations) {
                error += 'Recommendations are required\n';
                $("#recommendations").focus();
            }
            return error;
        };

        saveForm(inspectionData, url, successCallback, validateInspectionForm);
    });




</script>