<?php include ('includes/headerClient.php');
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
                                <h4 class="card-title">Current Rent Information of <strong><?= Tools::clientName($rentInfo['clientid']) ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <form id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Property</label>
                                            <p><strong style="text-transform: uppercase;"><?= Tools::propertyClient($rentInfo['propertyid']) ?></strong></p>
                                        </div>
                                    </div> 
                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Monthly Rent Amount</label>
                                            <p><?= number_format($rentInfo['rentAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Security Deposit</label>
                                            <p><?= number_format($rentInfo['securityAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Late Payment Penalty</label>
                                            <p><?= number_format($rentInfo['penaltyAmount'], 2) ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Lease Start Date</label>
                                            <p><?= $rentInfo['startDate'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Lease End Date</label>
                                            <p><?= $rentInfo['endDate'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Lease Type</label>
                                            <p><?= $rentInfo['leaseType'] ?></p>
                                        </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Number of Bedrooms</label>
                                            <p><?= $rentInfo['numberRoom'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Lease Renewal Option</label>
                                            <p><?= $rentInfo['renewable'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Additional Description</label>
                                            <p><?= $rentInfo['description'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Additional Charges (eg. Utility Charge, Parking Fee, Maintenance Fee etc)</label>
                                            <p><?= number_format($rentInfo['addCharges'], 2) ?></p>
                                        </div>

                                    </div>
                                
                                    

                                </form>
                            </div>
                                
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Previous Rent Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" id="clientTable">
                                        <thead>
                                            <tr>
                                                <th width="10%">NO.-</th>
                                                <th width="15%">PROPERTY-</th>
                                                <th width="15%">RENT AMOUNT-</th>
                                                <th width="15%">SECURITY-</th>
                                                <th width="15%">PENALTY-</th>
                                                <th width="15%">TOTAL AMOUNT</th>
                                                <th width="15%">DURATION</th>
                                                <th width="15%">LEASE TYPE</th>
                                                <th width="15%">RENEWABLE</th>
                                                <th width="15%">ADDITIONAL CHARGES</th>
                                                <th width="15%">BEDROOMS</th>
                                                <th width="15%">DESCRIPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1; // Initialize a counter
                                            foreach ($previousRent as $result) { ?>
                                                <tr>
                                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                                    <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                                    <td><?= number_format($result->rentAmount,2) ?></td>
                                                    <td><?= number_format($result->securityAmount,2) ?></td>
                                                    <td><?= number_format($result->penaltyAmount,2) ?></td>
                                                    <td><?= number_format($result->securityAmount + $result->rentAmount + $result->penaltyAmount, 2) ?></td>
                                                    <td><?= $result->startDate . ' - <br>' . $result->endDate ?></td>
                                                    <td><?= $result->leaseType ?></td>
                                                    <td><?= $result->renewable ?></td>
                                                    <td><?= $result->addCharges ?></td>
                                                    <td><?= $result->numberRoom ?></td>
                                                    <td><?= $result->description ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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

</script>