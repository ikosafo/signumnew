<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SETTINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Property Categories</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="categoryFormDiv"></div>   
                <div id="categoryTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/forms/propertyCategories", function(response) {
        $('#categoryFormDiv').html(response);
     });

    loadPage("/tables/propertyCategories", function(response) {
        $('#categoryTableDiv').html(response);
    });
</script>