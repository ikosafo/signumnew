<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">RENT MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">View Rental Details</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rent Information of <strong><?= Tools::clientName($rentInfo['clientid']) ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <form id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Property</label>
                                            <p><strong style="text-transform: uppercase;"><?= Tools::propertyClient($rentInfo['propertyid']) ?></strong></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Phase</label>
                                            <p><strong style="text-transform: uppercase;"><?= strtoupper(Tools::propertyPhase($rentInfo['phaseid'])); ?></strong></p>
                                        </div>
                                    </div> 
                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Monthly Rent Amount</label>
                                            <p><?= number_format($rentInfo['rentAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Security Deposit</label>
                                            <p><?= number_format($rentInfo['securityAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Late Payment Penalty</label>
                                            <p><?= number_format($rentInfo['penaltyAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Start Date</label>
                                            <p><?= $rentInfo['startDate'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease End Date</label>
                                            <p><?= $rentInfo['endDate'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Type</label>
                                            <p><?= $rentInfo['leaseType'] ?></p>
                                        </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Number of Bedrooms</label>
                                            <p><?= $rentInfo['numberRoom'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Renewal Option</label>
                                            <p><?= $rentInfo['renewable'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Additional Description</label>
                                            <p><?= $rentInfo['description'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Additional Charges (eg. Utility Charge, Parking Fee, Maintenance Fee etc)</label>
                                            <p><?= number_format($rentInfo['addCharges'], 2) ?></p>
                                        </div>
                                    
                                        <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                            <button type="button" id="backList" class="btn btn-primary next2 btn-sm">Back to List</button>
                                        </div>
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

        if (textContent === 'RENT MANAGEMENT') {
            console.log("Found RENT MANAGEMENT:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });

    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/listRentInformation'
    })
</script>