<?php include ('includes/header.php');
extract($data);
$uuid = $rentInfo['uuid'];
$clientid = $rentInfo['clientid'];
$propertyid = $rentInfo['propertyid'];
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
                                <h4 class="card-title">Edit Rent Information of <strong><?= Tools::clientName($clientid) ?></strong></h4>
                            </div>
                            <div class="card-body">
                               <form id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Property</label>
                                            <input type="text" class="form-control" disabled value="<?= strtoupper(Tools::propertyClient($propertyid)); ?>">
                                        </div>
                                    </div> 
                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Monthly Rent Amount</label>
                                            <input type="text" class="form-control" value="<?= $rentInfo['rentAmount'] ?>" onkeypress="allowTwoDecimalPlaces(event)" id="rentAmount" placeholder="Enter Rent Amount" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Security Deposit</label>
                                            <input type="text" class="form-control" value="<?= $rentInfo['securityAmount'] ?>" onkeypress="allowTwoDecimalPlaces(event)" id="securityDeposit" placeholder="Enter Security Deposit" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Late Payment Penalty</label>
                                            <input type="text" class="form-control" value="<?= $rentInfo['penaltyAmount'] ?>" onkeypress="allowTwoDecimalPlaces(event)" id="penaltyAmount" placeholder="Enter Penalty Amount" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Start Date</label>
                                            <input type="text" class="form-control" id="startDate" value="<?= $rentInfo['startDate'] ?>" placeholder="Select date" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease End Date</label>
                                            <input type="text" class="form-control" id="endDate" value="<?= $rentInfo['endDate'] ?>" placeholder="Select date" required>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Type</label>
                                            <select id="leaseType" class="default-select form-control wide" required>
                                                <option value="">Select Type</option>
                                                <option value="Fixed" <?= ($rentInfo['leaseType'] == 'Fixed') ? 'selected' : '' ?>>Fixed</option>
                                                <option value="Month-to-month" <?= ($rentInfo['leaseType'] == 'Month-to-month') ? 'selected' : '' ?>>Month-to-month</option>3
                                            </select>
                                        </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Number of Bedrooms</label>
                                            <select id="bedroomNumber" class="default-select form-control wide" required>
                                                <option value="">Select Number</option>
                                                <option value="1" <?= ($rentInfo['numberRoom'] == '1') ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= ($rentInfo['numberRoom'] == '2') ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= ($rentInfo['numberRoom'] == '3') ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= ($rentInfo['numberRoom'] == '4') ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= ($rentInfo['numberRoom'] == '5') ? 'selected' : '' ?>>5</option>
                                                <option value="6" <?= ($rentInfo['numberRoom'] == '6') ? 'selected' : '' ?>>6</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Lease Renewal Option</label>
                                            <select id="leaseRenewable" class="default-select form-control wide" required>
                                                <option value=""></option>
                                                <option value="Yes" <?= ($rentInfo['renewable'] == 'Yes') ? 'selected' : '' ?>>Yes</option>
                                                <option value="No" <?= ($rentInfo['renewable'] == 'No') ? 'selected' : '' ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Additional Description</label>
                                            <textarea class="form-control" id="description" placeholder="Enter description"><?= $rentInfo['description'] ?></textarea>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label required">Additional Charges (eg. Utility Charge, Parking Fee, Maintenance Fee etc)</label>
                                            <input type="text" class="form-control" value="<?= $rentInfo['addCharges'] ?>" onkeypress="allowTwoDecimalPlaces(event)"  id="additionalCharges" placeholder="Enter fee">
                                        </div>
                                    
                                        <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                            <button type="submit" id="editRentDetails" class="btn btn-warning next2 btn-sm">Edit Rent Details</button>
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

    $("#startDate").flatpickr();
    $("#endDate").flatpickr();
    $("#bedroomNumber").select2({
        placeholder:"Select Number"
    });
    $("#leaseType").select2({
        placeholder:"Select Type"
    });
    $("#leaseRenewable").select2({
        placeholder:"Is Lease Renewable?"
    });

    $("#editRentDetails").on("click", function(event) {
        event.preventDefault(); 

        var rentData  = {
            rentAmount: $("#rentAmount").val(),
            securityDeposit: $("#securityDeposit").val(),
            penaltyAmount: $("#penaltyAmount").val(),
            startDate: $("#startDate").val(),
            endDate: $("#endDate").val(),
            leaseType: $("#leaseType").val(),
            bedroomNumber: $("#bedroomNumber").val(),
            leaseRenewable: $("#leaseRenewable").val(),
            additionalDescription: $("#description").val(),
            additionalCharges: $("#additionalCharges").val(),
            uuid: '<?php echo $uuid; ?>',
            propertyid: '<?php echo $propertyid ?>',
            clientid:  '<?php echo $clientid ?>'
        };

        var url = urlroot + "/property/saveRentInfo";

        var successCallback = function(response) {
            //alert(response);
            if (response == 1) {
                $.notify("Rent information added successfully", {
                    position: "top center",
                    className: "success"
                });

                setTimeout(function() {
                    location.reload();
                }, 500);
            }
            else {
                $.notify("Lease date is not due", {
                    position: "top center",
                    className: "error"
                });
            }
        };

        var validateRentForm = function(rentData) {
            var error = '';
            if (!rentData.rentAmount) {
                error += 'Monthly Rent Amount is required\n';
                $("#rentAmount").focus();
            }
            if (!rentData.securityDeposit) {
                error += 'Security Deposit is required\n';
                $("#securityDeposit").focus();
            }
            if (!rentData.penaltyAmount) {
                error += 'Late Payment Penalty is required\n';
                $("#penaltyAmount").focus();
            }
            if (!rentData.startDate) {
                error += 'Lease Start Date is required\n';
                $("#startDate").focus();
            }
            if (!rentData.endDate) {
                error += 'Lease End Date is required\n';
                $("#endDate").focus();
            }
            if (!rentData.leaseType) {
                error += 'Lease Type is required\n';
                $("#leaseType").focus();
            }
            if (!rentData.bedroomNumber) {
                error += 'Number of Bedrooms is required\n';
                $("#bedroomNumber").focus();
            }
            if (!rentData.leaseRenewable) {
                error += 'Lease Renewal Option is required\n';
                $("#leaseRenewable").focus();
            }


            return error;
        };
        saveForm(rentData, url, successCallback, validateRentForm);
    });
</script>