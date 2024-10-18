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
                                        <label class="form-label required">Client Type</label>
                                        <p><?= $clientDetails['clientType'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Ownership Type</label>
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
                                        <label class="form-label required">Emergency Contact Name</label>
                                        <p><?= $clientDetails['emergencyName'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Emergency Phone Number</label>
                                        <p><?= $clientDetails['emergencyPhone'] ?></p>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label">Passport Picture</label>
                                        <p><?= Tools::displayImages($clientDetails['uuid']) ?></p>
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
    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/listClients'
    })
</script>