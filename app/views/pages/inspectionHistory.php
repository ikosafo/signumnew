<?php include ('includes/headerInspector.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">INSPECTIONS</a></li>
						<li class="breadcrumb-item active"><a href="#">Inspection History</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="pageTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/tables/inspectionHistory", function(response) {
        $('#pageTableDiv').html(response);
    });
</script>