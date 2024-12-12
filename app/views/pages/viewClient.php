<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">CLIENT MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">View Client Details</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Details of <strong><?= $clientDetails['fullName'] ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Property</label>
                                        <p><?= $propertyName ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Phase</label>
                                        <p><?= Tools::propertyPhase($phaseid) ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Client Type</label>
                                        <p><?= $clientDetails['clientType'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Ownership Type</label>
                                        <p><?= $clientDetails['ownershipType'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Full Name</label>
                                        <p><?= $clientDetails['fullName'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Contact Email</label>
                                        <p><?= $clientDetails['emailAddress'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Phone Number</label>
                                        <p><?= $clientDetails['phoneNumber'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Alternative Phone Number</label>
                                        <p><?= $clientDetails['altPhoneNumber'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Residential Address</label>
                                        <p><?= $clientDetails['residentialAddress'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Nationality</label>
                                        <p><?= $clientDetails['nationality'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Date of Birth</label>
                                        <p><?= $clientDetails['birthDate'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Gender</label>
                                        <p><?= $clientDetails['gender'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Marital Status</label>
                                        <p><?= $clientDetails['maritalStatus'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Occupation</label>
                                        <p><?= $clientDetails['occupation'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Employer's Name</label>
                                        <p><?= $clientDetails['employersName'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Employer's Phone</label>
                                        <p><?= $clientDetails['employersPhone'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Emergency Contact Name</label>
                                        <p><?= $clientDetails['emergencyName'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Emergency Phone Number</label>
                                        <p><?= $clientDetails['emergencyPhone'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Passport Picture</label>
                                        <p><?= Tools::displayImages($clientDetails['uuid']) ?></p>
                                    </div>
                                  
                                </form>
                            </div>
                                
                        </div>
                    </div>
                </div>

                <!-- Payment History -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payment History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" id="clientTable">
                                        <thead>
                                            <tr>
                                                <th width="10%">NO.</th>
                                                <th width="15%">AMOUNT</th>
                                                <th width="15%">BILL TYPE</th>
                                                <th width="15%">PAYMENT METHOD</th>
                                                <th width="15%">SERIAL NUMBER</th>
                                                <th width="15%">STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1; // Initialize a counter
                                            foreach ($clientPaymentHistoy as $result) { ?>
                                                <tr>
                                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                                    <td><?= $result->amountPaid ?></td>
                                                    <td><?= $result->billType ?></td>
                                                    <td><?= $result->paymentMethod ?></td>
                                                    <td><?= $result->serialNumber ?></td>
                                                    <td><?= $result->paymentStatus ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>

                  <!-- Issue Resolution -->
                  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Issues</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" id="complaintTable">
                                        <thead>
                                            <tr>
                                                <th width="10%">NO.</th>
                                                <th width="20%">PROPERTY NAME</th>
                                                <th width="20%">COMPLAINT TYPE</th>
                                                <th width="20%">CATEGORY</th>
                                                <th width="20%">LOCATION</th>
                                                <th width="20%">RESOLUTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1; // Initialize a counter
                                            foreach ($listClientComplaints as $result) { ?>
                                                <tr>
                                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                                    <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                                    <td><?= $result->complaintType ?></td>
                                                    <td><?= $result->issueCategory ?></td>
                                                    <td><?= $result->location ?></td>
                                                    <td><?= $result->resolution ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>

                <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                    <button type="button" id="backList" class="btn btn-primary next2 btn-sm">Back to List</button>
                </div>

            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>
    var navItems = document.querySelectorAll('a span.nav-text');

    navItems.forEach(function(item) {
        var textContent = item.textContent.trim().replace(/\s+/g, ' ');
        console.log("Checking item:", textContent); 

        if (textContent === 'CLIENT MANAGEMENT') {
            console.log("Found CLIENT MANAGEMENT:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });

    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/listClients'
    })
</script>