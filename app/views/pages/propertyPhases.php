<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SETTINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Property Phases</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="phaseFormDiv"></div>   
                <div id="phaseTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/forms/propertyPhases", function(response) {
        $('#phaseFormDiv').html(response);
     });

    loadPage("/tables/propertyPhases", function(response) {
        $('#phaseTableDiv').html(response);
    });
</script>