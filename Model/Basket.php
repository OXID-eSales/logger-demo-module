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

namespace OxidEsales\LoggerDemo\Model;

use OxidEsales\EventLoggerDemo\BasketItemLogger;

/**
 * Class oeLoggerDemoOxBasket.
 * Extends oxBasket.
 *
 * @see \OxidEsales\Eshop\Application\Model\Basket
 */
class Basket extends Basket_parent
{
    /**
     * Method overrides eShop method and adds logging functionality.
     *
     * @param string      $sProductID
     * @param int         $dAmount
     * @param null|array  $aSel
     * @param null|array  $aPersParam
     * @param bool|false  $blOverride
     * @param bool|false  $blBundle
     * @param null|string $sOldBasketItemId
     *
     * @return oxBasketItem|null
     */
    public function addToBasket(
        $sProductID,
        $dAmount,
        $aSel = null,
        $aPersParam = null,
        $blOverride = false,
        $blBundle = false,
        $sOldBasketItemId = null
    ) {
        $basketItemLogger = new BasketItemLogger($this->getConfig()->getLogsDir());
        $basketItemLogger->logItemToBasket($sProductID);

        return parent::addToBasket($sProductID, $dAmount, $aSel, $aPersParam, $blOverride, $blBundle, $sOldBasketItemId);
    }
}
