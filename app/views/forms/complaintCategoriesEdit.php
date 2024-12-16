<?php extract($data); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Category</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label required">Category Name</label>
                    <input type="text" name="categoryName" class="form-control" value="<?= $categoryName ?>"
                    placeholder="Enter Category" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Brief description of the complaint" rows="3"><?= $description ?></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="updateCategory" class="btn btn-warning btn-sm">Update Category</button>
                    <button type="type" id="cancelForm" class="btn btn-danger btn-sm">Cancel</button>   
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $("#updateCategory").on("click", function() {
            event.preventDefault(); 

            var formData = {
                categoryName: $("input[name='categoryName']").val(),
                description: $("textarea[name='description']").val(),
                uuid: '<?php echo $uuid ?>'
            };
            var url = urlroot + "/complaint/saveCategory";

            var successCallback = function(response) {
                //alert(response);
                if (response == 1 || response == 3) {
                    $('html, body').animate({
                        scrollTop: $("#categoryTableDiv").offset().top
                    }, 200);
                    $.notify("Category updated", {
                            position: "top center",
                            className: "success"
                    });
                    loadPage("/forms/complaintCategories", function(response) {
                        $('#categoryFormDiv').html(response);
                    });

                    loadPage("/tables/complaintCategories", function(response) {
                        $('#categoryTableDiv').html(response);
                    });
                }
                else {
                    $.notify("Category already exist", {
                            position: "top center",
                            className: "error"
                    });
                }
              
            };

            var validateForm = function(formData) {
                var error = '';
                if (!formData.categoryName) {
                    error += 'Category Name is required\n';
                    $("input[name='categoryName']").focus();
                }
                
                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });

        $('#cancelForm').on("click", function(e) { 
            e.preventDefault();
            loadPage("/forms/complaintCategories", function(response) {
                $('#categoryFormDiv').html(response);
            });
        });


</script>