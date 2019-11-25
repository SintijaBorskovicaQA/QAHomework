<?php

class TesterData extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    //TEST PERSON
    public static $customerData = [
        'firstName' => 'First Name',
        'lastName' => 'Last Name',
        'email' => 'test@test.com',
        'mobileNumber' => '12345678',
    ];
    public static $customerAddress = [
        'street' => 'Test Address 1',
        'city' => 'Rīga',
        'postcode' => '1122',
    ];

    public static $customerCardData = [
        'cardNumber' => '4035 5010 0000 0008',
        'expiryMonth' => '10',
        'expiryYear' => '20',
        'securityCode' => '737',
    ];
}