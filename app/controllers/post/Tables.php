
<?php

class Tables extends PostController
{
    public function maintenanceBilling() {
        $billid = $_POST['billid'];
        $clientid = Tools::getClientfromBilling($billid);
        $maintenanceBilling = Billings::maintenanceBilling($billid);
        $this->view("tables/maintenanceBilling",
            [
                'maintenanceBilling' => $maintenanceBilling,
                'clientid' => $clientid
            ]
        ); 
    }
}



