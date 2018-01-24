<?php
/**
 * This file is part of OXID eShop Logger Demo module.
 * Logger Demo module is free software:
 * you can redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation,
 * either version 3 of the License, or (at your option) any later version.
 *
 * Logger Demo module is distributed in
 * the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Logger Demo module.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @category      module
 * @package       loggerdemo
 * @author        OXID eSales AG
 * @link          http://www.oxid-esales.com/en/
 * @copyright (C) OXID e-Sales, 2003-2015
 */

use OxidEsales\Eshop\Application\Component\BasketComponent;
use OxidEsales\EventLoggerDemo\BasketItemLogger;

/**
 * Test class for checking if logger correctly integrates with shop via bridge.
 */
class LogAddToBasketTest extends  OxidEsales\TestingLibrary\UnitTestCase
{
    /**
     * Test creates virtual directory and checks if required information was logged.
     */
    public function testLoggingWhenCustomerAddsToBasket()
    {
        $rootPath = $this->mockFileSystemForShop();

        $productId = 'testArticleId';

        $this->addProductToBasket($productId);

        $fileContents = $this->getLogFileContent($rootPath);

        $this->assertLogContentCorrect($fileContents, $productId);
    }

    /**
     * @param string $fileContents
     * @param string $productId
     */
    private function assertLogContentCorrect($fileContents, $productId)
    {
        $this->assertTrue((bool)strpos($fileContents, $productId), "Product id does not exist in log file.");
    }

    /**
     * @param string $productId
     */
    private function addProductToBasket($productId)
    {
        /** @var BasketComponent $basketComponent */
        $basketComponent = oxNew(BasketComponent::class);
        $this->setRequestParameter('aid', $productId);
        $basketComponent->tobasket();
    }

    /**
     * @param $rootPath
     *
     * @return bool|string
     */
    private function getLogFileContent($rootPath)
    {
        $fakeBasketLogFile = $rootPath . 'log' . DIRECTORY_SEPARATOR . BasketItemLogger::FILE_NAME;
        $fileContents = file_get_contents($fakeBasketLogFile);

        return $fileContents;
    }

    /**
     * Use VfsStream to not write to file system.
     *
     * @return string path to root directory.
     */
    private function mockFileSystemForShop()
    {
        $vfsStreamWrapper = $this->getVfsStreamWrapper();
        $vfsStreamWrapper->createStructure(array('log' => array()));
        $this->getConfig()->setConfigParam('sShopDir', $vfsStreamWrapper->getRootPath());
        $rootPath = $vfsStreamWrapper->getRootPath();

        return $rootPath;
    }
}
