<?php
include('Stripegateway.php');
//retrieve customer
$myStripe = new Stripegateway();
    $ID = ["ID"=> "cus_DskQvTN930VpuQ"];
        $result = $myStripe->retrieve_customer($ID);    
        echo "<pre>"; print_r($result);

$myStripe = new Stripegateway();

//contoh panggil edit
$data=["ID"=> "cus_DqsrFBrzhRBAsT",
        "email"=> "misyono1010@yahoo.com",
        "description"=> "Belanja Tablet PC"];
    $result = $myStripe->update_customer($data);
    echo "<pre>"; print_r($result);

//contoh deleted customer
$myStripe = new Stripegateway();
    $ID = ["ID"=> "cus_DsiWf61EJezrzV"];
        $result = $myStripe->delete_customer($ID);    
        echo "<pre>"; print_r($result);

//contoh list all
$myStripe = new Stripegateway();
$ID = ["ID"=> "cus_DqsrFBrzhRBAsT"];
    $result = $myStripe->customer_list($ID);    
    echo "<pre>"; print_r($result);
?>