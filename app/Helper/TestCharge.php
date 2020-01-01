<?php

namespace App\Helper;
use Twocheckout;
use Twocheckout_Charge;
use Twocheckout_Error;
//use App\Models\Quick

class TestCharge
{
    protected $token;
    protected $vallet;
    protected $orderId;
    protected $userId;
    const privateKey = "0DDED779-B154-494A-B8E4-EF2584DB773D";
    const sellerId = "901407885";


    public function __construct($token, $vallet = null, $orderId = null, $userId= null){
        $this->token = $token;
        $this->vallet = $vallet;
        $this->orderId = $orderId;
        $this->userId = $userId;

    }

    public function testChargeForm()
    {
        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01'
        );
        Twocheckout_Charge::form($params, "Click Here!");
    }

    public function testChargeFormAuto()
    {
        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01'
        );
        Twocheckout_Charge::form($params, 'auto');
    }

    public function testDirect()
    {
        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01',
            'card_holder_name' => 'Testing Tester',
            'email' => 'christensoncraig@gmail.com',
            'street_address' => '123 test st',
            'city' => 'Columbus',
            'state' => 'Ohio',
            'zip' => '43123',
            'country' => 'USA'
        );
        Twocheckout_Charge::direct($params, "Click Here!");
    }

    public function testDirectAuto()
    {
        Twocheckout::sandbox(true);
        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01',
            'card_holder_name' => 'Testing Tester',
            'email' => 'christensoncraig@gmail.com',
            'street_address' => '123 test st',
            'city' => 'Columbus',
            'state' => 'Ohio',
            'zip' => '43123',
            'country' => 'USA'
        );
        Twocheckout_Charge::direct($params, 'auto');
    }

    public function testChargeLink()
    {
        Twocheckout::sandbox(true);
        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01'
        );
        Twocheckout_Charge::link($params);
    }

    public function testChargeAuth()
    {
        Twocheckout::privateKey(self::privateKey);
        Twocheckout::sellerId(self::sellerId);
        Twocheckout::sandbox(true);
        $charge = array();
        
        try {

            if($this->orderId){
                $charge = Twocheckout_Charge::auth(array(
                    "sellerId" => self::sellerId,
                    "merchantOrderId" => $this->orderId,
                    "token" => $this->token,
                    "currency" => 'USD',
                    "total" => '10.00',
                    "billingAddr" => array(
                        "name" => 'Testing Tester',
                        "addrLine1" => '123 Test St',
                        "city" => 'karachi',
                        "state" => 'sindh',
                        "zipCode" => '75210',
                        "country" => 'PK',
                        "email" => 'testingtester@2co.com',
                        "phoneNumber" => '555-555-5555'
                    ),
                    "shippingAddr" => array(
                        "name" => 'Testing Tester',
                        "addrLine1" => '123 Test St',
                        "city" => 'karachi',
                        "state" => 'sindh',
                        "zipCode" => '75210',
                        "country" => 'PK',
                        "email" => 'testingtester@2co.com',
                        "phoneNumber" => '555-555-5555'
                    )
                ));
            }
            elseif ($this->vallet && $this->userId) {
                # code...
            }

        

            // print_r($charge);
            // die;
            return $charge['response']['responseCode'];
        } catch (Twocheckout_Error $e) {
            return $e->getMessage();
        }
    }
}