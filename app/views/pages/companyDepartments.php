<?php include ('includes/header.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">SETTINGS</a></li>
						<li class="breadcrumb-item active"><a href="#">Company Departments</a></li>
					</ol>
                </div>
                <!-- row -->
               
                <div id="departmentFormDiv"></div>   
                <div id="departmentTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	
    loadPage("/forms/companyDepartments", function(response) {
        $('#departmentFormDiv').html(response);
     });

    loadPage("/tables/companyDepartments", function(response) {
        $('#departmentTableDiv').html(response);
    });
</script>