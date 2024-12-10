<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SETTINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Property Activities</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="activityFormDiv"></div>   
                <div id="activityTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/forms/propertyActivities", function(response) {
        $('#activityFormDiv').html(response);
     });

    loadPage("/tables/propertyActivities", function(response) {
        $('#activityTableDiv').html(response);
    });
</script>