<?php $uuid = Tools::generateUUID(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label required">Category Name</label>
                    <input type="text" name="categoryName" class="form-control" 
                    placeholder="Enter Category" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Brief description of the category" rows="3"></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="saveCategory" class="btn btn-primary btn-sm">Add Category</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $("#saveCategory").on("click", function() {
            event.preventDefault(); 

            var formData = {
                categoryName: $("input[name='categoryName']").val(),
                description: $("textarea[name='description']").val(),
                uuid: '<?php echo $uuid ?>'
            };
            var url = urlroot + "/property/saveCategory";

            var successCallback = function(response) {
                if (response == 1) {
                    $('html, body').animate({
                        scrollTop: $("#categoryTableDiv").offset().top
                    }, 200);
                    $.notify("Category saved", {
                            position: "top center",
                            className: "success"
                    });
                    loadPage("/forms/propertyCategories", function(response) {
                        $('#categoryFormDiv').html(response);
                    });

                    loadPage("/tables/propertyCategories", function(response) {
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

</script>