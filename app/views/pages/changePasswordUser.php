<?php include ('includes/header.php');
extract($data);
?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">USER MANAGEMENT</a></li>
						<li class="breadcrumb-item active"><a href="#">Change Password</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fill in the form below</h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="needs-validation1" novalidate="" autocomplete="off">
                                   
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Current Password</label>
                                        <input type="password" class="form-control" id="currentPassword" placeholder="Enter Current Password" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">New Password</label>
                                        <input type="password" class="form-control" id="newPassword" placeholder="Enter New Password" required>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12">
                                        <label class="form-label required">Confirm New Password </label>
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required>
                                    </div>
                                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                                        <button type="submit" id="savePassword" class="btn btn-primary next2 btn-sm">Save</button>
                                    </div>

                                </form>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>
   
    //Change Password
    $("#savePassword").on("click", function(event) {
        event.preventDefault(); 

        var formData = {
            currentPassword: $("#currentPassword").val(),
            newPassword: $("#newPassword").val(),
            confirmPassword: $("#confirmPassword").val(),
            uid: '<?php echo $uid ?>',
            uuid: '<?php echo $uuid ?>'
        };

        var url = urlroot + "/user/savePassword";

        var successCallback = function(response) {
            //alert(response);
            if (response == 2) {
                $.notify("Current Password error", {
                    position: "top center",
                    className: "error"
                });

            }
            else {
                $.notify("Password Changed", {
                    position: "top center",
                    className: "success"
                });

                setTimeout(function() {
                    location.reload();
                }, 500); 
            }
        };

        var validatePasswordForm = function(formData) {
            var error = '';
           
            if (!formData.currentPassword) {
                error += 'Current Password is required\n';
                $("#currentPassword").focus();
            }
            if (!formData.newPassword) {
                error += 'New Password is required\n';
                $("#newPassword").focus();
            }
            if (formData.newPassword && formData.newPassword.length < 6) {
                error += 'New Password should not be less than 6 characters \n';
                $("#newPassword").focus();
            }
            if (!formData.confirmPassword) {
                error += 'Confirm New Password\n';
                $("#confirmPassword").focus();
            }
            if (formData.newPassword && formData.confirmPassword && (formData.newPassword != formData.confirmPassword)) {
                error += 'Passwords do not match \n';
                $("#confirmPassword").focus();
            }
        
            return error;
        };
        saveForm(formData, url, successCallback, validatePasswordForm);
    });


</script>