<?php
extract($data);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rent Information of <strong><?= $fullName ?></strong></h4>
            </div>
            <div class="card-body">
                <form id="needs-validation1" novalidate="" autocomplete="off">
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label">Property</label>
                            <input type="text" class="form-control" disabled value="<?= strtoupper(Tools::propertyClient($propertyid)); ?>">
                        </div>
                    </div> 
                    <hr>

                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Monthly Rent Amount</label>
                            <input type="text" class="form-control" id="rentAmount" placeholder="Enter Rent Amount" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Security Deposit</label>
                            <input type="text" class="form-control" id="securityDeposit" placeholder="Enter Security Deposit" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Late Payment Penalty</label>
                            <input type="text" class="form-control" id="penaltyAmount" placeholder="Enter Penalty Amount" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Lease Start Date</label>
                            <input type="text" class="form-control" id="startDate" placeholder="Select date" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Lease End Date</label>
                            <input type="text" class="form-control" id="endDate" placeholder="Select date" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Lease Type</label>
                            <select id="gender" class="default-select form-control wide" required>
                                <option value="">Select Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Momth-to-month">Momth-to-month</option>3
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Additional Charges (eg. Utility Charge, Parking Fee, Maintenance Fee etc)</label>
                            <input type="text" class="form-control" id="additionalCharges" placeholder="Enter fee">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label required">Number of Bedrooms</label>
                            <select id="bedroomNumber" class="default-select form-control wide" required>
                                <option value="">Select Number</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                       
                        <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                            <button type="submit" id="saveClientDetails" class="btn btn-primary next2 btn-sm">Save</button>
                        </div>
                    </div>
                   
                    

                </form>
            </div>
                
        </div>
    </div>
</div>
