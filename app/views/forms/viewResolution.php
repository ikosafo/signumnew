<?php
extract($data);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <form id="needs-validation1" novalidate="" autocomplete="off">
                    <div class="row">
                       
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label">Remarks</label>
                            <p><?= $complaintDetails['verifyRemarks'] ?></p>
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label">Feedback</label>
                            <p><?= $complaintDetails['verifyFeedback'] ?></p>
                        </div>
                       
                    </div>
                   
                    

                </form>
            </div>
                
        </div>
    </div>
</div>

<script>

    $("#verifyRemarks").select2({
        placeholder:"Select Remark"
    });

    $("#saveVerification").on("click", function(event) {
        event.preventDefault(); 

        var formData  = {
            verifyRemarks: $("#verifyRemarks").val(),
            verifyFeedback: $("#verifyFeedback").val(),
            idIndex: '<?php echo $id_index; ?>'
        };

        var url = urlroot + "/client/saveVerification";

        var successCallback = function(response) {
            //alert(response);
             $.notify("Form submitted successfully", {
                    position: "top center",
                    className: "success"
                });

            setTimeout(function() {
                location.reload();
            }, 500);
        };

        var validateRentForm = function(formData) {
            var error = '';
            if (!formData.verifyRemarks) {
                error += 'Remarks is required\n';
                $("#verifyRemarks").focus();
            }

            return error;
        };
        saveForm(formData, url, successCallback, validateRentForm);
    });
    
</script>
