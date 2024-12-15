<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">MAINTENANCE</a></li>
						<li class="breadcrumb-item active"><a href="#">Maintenance Tasks</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="pageTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/tables/maintenanceTasks", function(response) {
        $('#pageTableDiv').html(response);
    });
</script>