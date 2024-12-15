<?php
extract($data);
?>
<div class="row">
    <div class="col-12">
            
        <div class="card-body">
            <form id="needs-validation1" novalidate="" autocomplete="off">
                <div class="row">
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label class="form-label required">Resolution Status</label>
                        <select id="resolutionStatus" class="form-control" required>
                            <option value=""></option>
                            <option value="Resolved">Resolved</option>
                            <option value="Unresolved">Unresolved</option>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Escalated">Escalated</option>
                            <option value="Closed">Closed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6 col-sm-12">
                        <label class="form-label">Remarks</label>
                        <textarea class="form-control" rows="10" id="updateRemarks" placeholder="Enter description"></textarea>
                    </div>
                    
                    
                    <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                        <button type="submit" id="saveUpdate" class="btn btn-primary next2 btn-sm">Save</button>
                    </div>
                </div>
                
                

            </form>
        </div>
          
    </div>
</div>

<script>

    $("#resolutionStatus").select2({
        placeholder:"Select Status"
    });

    $("#saveUpdate").on("click", function(event) {
        event.preventDefault(); 

        var formData  = {
            resolutionStatus: $("#resolutionStatus").val(),
            updateRemarks: $("#updateRemarks").val(),
            idIndex: '<?php echo $id_index; ?>'
        };

        var url = urlroot + "/client/saveUpdate";

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
            if (!formData.resolutionStatus) {
                error += 'Remarks is required\n';
                $("#resolutionStatus").focus();
            }

            return error;
        };
        saveForm(formData, url, successCallback, validateRentForm);
    });
    
</script>
