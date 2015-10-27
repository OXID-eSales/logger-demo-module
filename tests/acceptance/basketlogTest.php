<?php

/**
 * Test class for checking if logger does not break basket functionality.
 */
class BasketLogTest extends oxAcceptanceTestCase
{
    /**
     * Activates module before testing.
     */
    public function addTestData($sTestSuitePath)
    {
        parent::addTestData($sTestSuitePath);

        $this->loginAdminForModule("Extensions", "Modules");

        $this->openListItem("OE Logger Demo");
        if ($this->isElementPresent('module_activate')) {
            $this->clickAndWait("module_activate");
        }
    }

    /**
     * Test adds item to basket and checks if it was added successfully.
     */
    public function testArticleAdditionToBasketWithLoggingOn()
    {
        // In case you want to use headless driver, uncomment following line.
        // $this->startMinkSession('goutte');

        $this->openShop();

        // Sleep was added for demonstration purposes.
        sleep(2);
        $this->addToBasket('f4f73033cf5045525644042325355732', 1, 'basket');

        // Sleep was added for demonstration purposes.
        sleep(2);
        $this->assertElementPresent('cartItem_1');
    }
}
