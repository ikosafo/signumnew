<?php include 'includes/headerClient.php';
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">COMPLAINTS</a></li>
						<li class="breadcrumb-item active"><a href="#">View Complaint</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Complaint Details</h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Property</label>
                                        <p><?= Tools::propertyClient($complaintDetails['propertyid']) ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Unit/Apartment Number</label>
                                        <p><?= $complaintDetails['apartment'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Exact Location</label>
                                        <p><?= $complaintDetails['location'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Complaint Type</label>
                                        <p><?= $complaintDetails['complaintType'] ?></p>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">For Service-related Complaint</label>
                                        <p><?= $complaintDetails['issueCategory'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Expected Resolution Time</label>
                                        <p><?= $complaintDetails['resolutionTime'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Incident Severity</label>
                                        <p><?= $complaintDetails['incidentSeverity'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Complaint Priority</label>
                                        <p><?= $complaintDetails['compliantPriority'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Contact Method Preference</label>
                                        <p><?= $complaintDetails['contactMethod'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Has this issue been reported before?</label>
                                        <p><?= $complaintDetails['previousIssue'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Issue Description</label>
                                        <p><?= $complaintDetails['issueDescription'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Steps Already Taken to Resolve</label>
                                        <p><?= $complaintDetails['stepsTaken'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Additional Comments</label>
                                        <p><?= $complaintDetails['additionalComments'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Resolution Status</label>
                                        <p><?= Tools::resolutionStatus($complaintDetails['resolution']) ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Verification Resolution Status</label>
                                        <p><?= $complaintDetails['verifyRemarks'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Verification Resolution Feedback</label>
                                        <p><?= $complaintDetails['verifyFeedback'] ?></p>
                                    </div>
                                                      
                                    <div class="form-group col-md-8 col-sm-12">
                                            <label class="form-label">Attachments</label>
                                            <p><?= Tools::displayMedia($complaintDetails['uuid']) ?></p>
                                    </div>
                                
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="button" id="backList" class="btn btn-primary next2 btn-sm">Back to List</button>
                                        <?php
                                        if ($complaintDetails['resolution'] != "" && $complaintDetails['resolution'] != "Pending") {
                                            echo '<button type="button" id="verifyResolution" class="verifyResolution btn btn-warning next2 btn-sm" i_index="' . $complaintDetails['complaintid'] . '" style="margin-left:10px">Verify Resolution</button>';
                                        }
                                        ?>
      
                                    </div>

                                </form>
                            </div>
                            <div id="verifyIssue"></div>
                                
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

        if (textContent === 'COMPLAINTS') {
            console.log("Found COMPLAINTS:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });

    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/listComplaints'
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