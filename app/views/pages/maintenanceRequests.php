<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">MAINTENANCE</a></li>
						<li class="breadcrumb-item active"><a href="#">Log Maintenance Requests</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="maintenanceRequestTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	

    loadPage("/tables/maintenanceRequest", function(response) {
        $('#maintenanceRequestTableDiv').html(response);
    });
</script>