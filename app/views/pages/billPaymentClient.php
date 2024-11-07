<?php include ('includes/headerClient.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">BILLINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Bill Payments</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="billPaymentTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	

    loadPage("/tables/billPaymentClient", function(response) {
        $('#billPaymentTableDiv').html(response);
    });
</script>