<?php extract($data); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Department</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label required">Department Name</label>
                    <input type="text" name="departmentName" class="form-control" value="<?= $departmentName ?>"
                    placeholder="Enter Department" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Brief description of the department" rows="3"><?= $description ?></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="updateDepartment" class="btn btn-warning btn-sm">Update Department</button>
                    <button type="type" id="cancelForm" class="btn btn-danger btn-sm">Cancel</button>   
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $("#updateDepartment").on("click", function() {
            event.preventDefault(); 

            var formData = {
                departmentName: $("input[name='departmentName']").val(),
                description: $("textarea[name='description']").val(),
                uuid: '<?php echo $uuid ?>'
            };
            var url = urlroot + "/company/saveDepartment";

            var successCallback = function(response) {
                //alert(response);
                if (response == 1 || response == 3) {
                    $('html, body').animate({
                        scrollTop: $("#departmentTableDiv").offset().top
                    }, 200);
                    $.notify("Department saved", {
                            position: "top center",
                            className: "success"
                    });
                    loadPage("/forms/companyDepartments", function(response) {
                        $('#departmentFormDiv').html(response);
                    });

                    loadPage("/tables/companyDepartments", function(response) {
                        $('#departmentTableDiv').html(response);
                    });
                }
                else {
                    $.notify("Department already exist", {
                            position: "top center",
                            className: "error"
                    });
                }
              
            };

            var validateForm = function(formData) {
                var error = '';
                if (!formData.departmentName) {
                    error += 'Department Name is required\n';
                    $("input[name='departmentName']").focus();
                }
                
                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });

        $('#cancelForm').on("click", function(e) { 
            e.preventDefault();
            loadPage("/forms/companyDepartments", function(response) {
                $('#departmentFormDiv').html(response);
            });
        });


</script>