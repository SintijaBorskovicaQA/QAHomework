<?php 

class PurchaseCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('purchase running jacket');

        # Open product web page
        $I->amOnPage('/asics-long-sleeve-winter-jacket-ladies-456005');

        # Close pop-up ad
        $I->waitForElementVisible('.advertPopup .close');
        $I->click('.advertPopup .close');

        # Set product preferences and to basket
        $I->click('.sizeButtonli[data-text="10 (S)"]');
        $I->click('.s-basket-plus-button');
        $I->click('.addToBagInner');

        # Open basket and remove one product and proceed with purchase
        $I->click('#bagQuantity');
        $I->click('.s-basket-minus-button');
        $I->click('.newBasketSummary .ContinueOn');

        # Sign up as new user
        $I->fillField('.newCustomer input[type="email"]', TesterData::$customerData['email']);
        $I->click('.newCustomer .NewCustWrap');

        # Fill all necessary delivery information fields and continue
        $I->fillField('input[placeholder="Enter First Name"]', TesterData::$customerData['firstName']);
        $I->fillField('input[placeholder="Enter Last Name"]', TesterData::$customerData['lastName']);
        $I->click('.manuallyAddAddress');
        $I->fillField('.txtAddress1', TesterData::$customerAddress['street']);
        $I->fillField('input[placeholder="Enter Town or City"]', TesterData::$customerAddress['city']);
        $I->fillField('input[placeholder="Enter Postcode/Zip"]', TesterData::$customerAddress['postcode']);
        $I->fillField('input[placeholder="Enter Mobile Number"]', TesterData::$customerData['mobileNumber']);
        $I->click('.ProgressButContainTop .ContinueOn');

        # Select standard delivery
        $I->click('.DeliveryOptionsItem_EUR');
        $I->click('.CheckoutLeft .AddressContainBut .ContinueOn');

        # Select Pay with card and enter card data
        $I->click('.CardsIcons');
        $I->switchToIFrame('CardCaptureFrame');
        $I->fillField('#card_number', TesterData::$customerCardData['cardNumber']);
        $I->fillField('.expireMonth', TesterData::$customerCardData['expiryMonth']);
        $I->fillField('.expireYear', TesterData::$customerCardData['expiryYear']);
        $I->fillField('#cv2_number', TesterData::$customerCardData['securityCode']);
        $I->click('.ContinueOn');

        # Pay Now
        $I->switchToIFrame();
        $I->waitForElement('.ContinueButtonWrapperTop');
        $I->click('.ContinueButtonWrapperTop');

        # Wait for payment error
        $I->waitForElementVisible('.alert-block');

    }
}
