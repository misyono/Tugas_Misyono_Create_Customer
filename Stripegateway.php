<?php

include("./vendor/autoload.php");

class Stripegateway{
    public function __construct(){
        $stripe = array(
            "secret_key" => "sk_test_CBFvkkQu0Xss39Xj941UIzik",
            "public_key" => "pk_test_7afel6DrxmhjkVIPBhrvVbEA"
        );
        \Stripe\Stripe::setApiKey($stripe["secret_key"]); 
    }
    public function checkout($data){
        $message = "";
        try{
            $mychard = array('number' => $data['number'],
                                                'exp_month' => $data['exp_month'],
                                                'exp_year' => $data['exp_year']);
            $charge = \Stripe\Charge::create(array('card' => $mychard,
                                                    'amount' => $data['amount'],
                                                    'currency' => 'usd'));
            $message = $charge->status;
        }catch (Exception $e ){
            $message = $e->getMessage();
        }
        return $message;
    }
    public function retrieve_customer($data){
        $message = "";
        try{
            $cu = \Stripe\Customer::retrieve($data["ID"]);
        $message = $cu->retrieve();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
    public function update_customer($data){
        $message = "";
        try{
            $cu = \Stripe\Customer::retrieve($data["ID"]);
            $cu->email = $data["email"];
            $cu->description = $data["description"];
            $message = $cu->save();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
    public function delete_customer($data){
        $message = "";
        try{
            $cu = \Stripe\Customer::retrieve($data["ID"]);
        $message = $cu->delete();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
    public function customer_list($data){
        $message = "";
        try{
            $cu = \Stripe\Customer::retrieve($data["ID"]);
        $message = $cu->list();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
}