<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">CLIENT MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">List Clients</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="clientTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	

    loadPage("/tables/clients", function(response) {
        $('#clientTableDiv').html(response);
    });
</script>