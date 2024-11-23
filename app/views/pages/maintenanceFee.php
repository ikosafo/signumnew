<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SETTINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Maintenance Fee</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="pageFormDiv"></div>   
                <div id="pageTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/forms/maintenanceFee", function(response) {
        $('#pageFormDiv').html(response);
     });

    loadPage("/tables/maintenanceFee", function(response) {
        $('#pageTableDiv').html(response);
    });
</script>