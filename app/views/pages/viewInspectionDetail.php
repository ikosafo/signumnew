<?php include 'includes/headerInspector.php';
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">INSPECTIONS</a></li>
						<li class="breadcrumb-item active"><a href="#">Inspection History</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Inspection Details</h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Property</label>
                                        <p><?= Tools::propertyClient($inspectionDetails['propertyid']) ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Inspection Date</label>
                                        <p><?= $inspectionDetails['inspectionDate'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Duration of time used (in hours)</label>
                                        <p><?= $inspectionDetails['timeUsed'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Unit/Apartment Number</label>
                                        <p><?= $inspectionDetails['unitNumber'] ?></p>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Phase</label>
                                        <p><?= $inspectionDetails['phase'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Inspection Type</label>
                                        <p><?= $inspectionDetails['inspectionType'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Locations Inspected</label>
                                        <p><?= $inspectionDetails['locationsInspected'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">General Condition</label>
                                        <p><?= $inspectionDetails['generalCondition'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Safety and Compliance</label>
                                        <p><?= $inspectionDetails['safetyCompliance'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Issues and Repairs</label>
                                        <p><?= $inspectionDetails['issuesRepairs'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Recommendations</label>
                                        <p><?= $inspectionDetails['recommendations'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Additional Comments</label>
                                        <p><?= $inspectionDetails['additionalComments'] ?></p>
                                    </div>
                                                      
                                    <div class="form-group col-md-8 col-sm-12">
                                            <label class="form-label">Attachments</label>
                                            <p><?= Tools::displayMedia($inspectionDetails['uuid']) ?></p>
                                    </div>
                                
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="button" id="backList" class="btn btn-primary next2 btn-sm">Back to List</button>
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
    var navItems = document.querySelectorAll('a span.nav-text');

    navItems.forEach(function(item) {
        var textContent = item.textContent.trim().replace(/\s+/g, ' ');
        console.log("Checking item:", textContent); 

        if (textContent === 'INSPECTIONS') {
            console.log("Found INSPECTIONS:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });

    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/inspectionHistory'
    });


    $(document).on('click', '.verifyResolution', function() {
        var idIndex = $(this).attr('i_index');
        //alert(idIndex);
        
        $('html, body').animate({
                scrollTop: $("#verifyIssue").offset().top
        }, 2000);

        var formData = {
            id_index: idIndex
        };
        var url = "/forms/verifyResolution";
        var successCallback = function(response) {
            $('#verifyIssue').html(response);
        };
        saveForm(formData, url, successCallback);
       
    });


</script>