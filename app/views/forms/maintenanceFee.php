<?php extract($data); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Maintenance Fee</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Property</label>
                    <select id="propertyName" class="default-select form-control wide" required>
                        <option></option>
                        <?php foreach ($listProperties as $record): ?>
                            <option value="<?= $record->propertyId ?>"><?= $record->propertyName ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Amount</label>
                    <input type="text" id="amount" class="form-control" onkeypress="allowTwoDecimalPlaces(event)" placeholder="Enter Amount" required>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="saveFee" class="btn btn-primary btn-sm">Add Fee</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>

    $("#propertyName").select2({
        placeholder: "Select Property"
    })

    $("#saveFee").on("click", function() {
        event.preventDefault(); 

        var formData = {
            propertyName: $("#propertyName").val(),
            amount: $("#amount").val()
        };
        var url = urlroot + "/property/saveMaintenanceFee";

        var successCallback = function(response) {
            if (response == 1) {
                $('html, body').animate({
                    scrollTop: $("#categoryTableDiv").offset().top
                }, 200);
                $.notify("Fee saved", {
                        position: "top center",
                        className: "success"
                });
                loadPage("/forms/maintenanceFee", function(response) {
                    $('#pageFormDiv').html(response);
                });

                loadPage("/tables/maintenanceFee", function(response) {
                    $('#pageTableDiv').html(response);
                });
            }
            else {
                $.notify("Property maintenance fee already exist", {
                        position: "top center",
                        className: "error"
                });
            }
            
        };

        var validateForm = function(formData) {
            var error = '';
            if (!formData.propertyName) {
                error += 'Property is required\n';
                $("#propertyName").focus();
            }
            if (!formData.amount) {
                error += 'Amount is required\n';
                $("#amount").focus();
            }
            
            return error;
        };

        saveForm(formData, url, successCallback, validateForm);
    });

</script>