<?php include ('includes/header.php');
$uuid = Tools::generateUUID();
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">BILLING</a></li>
						<li class="breadcrumb-item active"><a href="#">View Payment Details</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Details of <strong><?= Tools::clientName($paymentDetails['clientid']) ?></strong></h4>
                            </div>
                            <div class="card-body">
                                <form id="needs-validation1" novalidate="" autocomplete="off">
                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Property</label>
                                            <p><?= strtoupper(Tools::propertyClient($paymentDetails['propertyid'])); ?></p>
                                        </div>
                                    </div> 
                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Amount Paid</label>
                                            <p><?= number_format($paymentDetails['amountPaid'],2); ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Bill Type</label>
                                            <p><?= $paymentDetails['billType'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Bill Date</label>
                                            <p><?= $paymentDetails['datePaid'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Payment Method</label>
                                            <p><?= $paymentDetails['paymentMethod'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Reference/Serial Number</label>
                                            <p><?= $paymentDetails['serialNumber'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Payment Status</label>
                                            <p><?= $paymentDetails['paymentStatus'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Payment Description</label>
                                            <p><?= $paymentDetails['paymentDescription'] ?></p>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-12">
                                            <label class="form-label">Receival</label>
                                            <p><?= $paymentDetails['receivedBy'] ?></p>
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

        if (textContent === 'BILLINGS') {
            console.log("Found BILLINGS:", item); 
            item.closest('li').classList.add('mm-active');
        }
    });

    $('#backList').click(function() {
        window.location.href = urlroot + '/pages/paymentHistory'
    })
</script>