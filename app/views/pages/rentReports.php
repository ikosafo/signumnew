<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">RENT MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Rent Due Reports</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="rentInfoTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	

    loadPage("/tables/rentDueInfo", function(response) {
        $('#rentInfoTableDiv').html(response);
    });
</script>