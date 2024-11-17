<?php include ('includes/headerClient.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">COMPLAINTS</a></li>
						<li class="breadcrumb-item active"><a href="#">List Complaints</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="pageTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/tables/clientComplaints", function(response) {
        $('#pageTableDiv').html(response);
    });
</script>