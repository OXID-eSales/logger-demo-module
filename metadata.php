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

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'oeloggerdemo',
    'title'       => array(
        'de' => '[TR - OE Logger Demo]',
        'en' => 'OE Logger Demo',
    ),
    'description' => array(
        'de' => '[TR - OE Logger Demo Module]',
        'en' => 'OE Logger Demo Module',
    ),
    'thumbnail'   => 'out/pictures/picture.png',
    'version'     => '1.0.0',
    'author'      => 'OXID eSales AG',
    'url'         => 'http://www.oxid-esales.com/en/',
    'email'       => 'mantas.vaitkunas@oxid-eslaes.com',
    'extend'      => array(
        'oxbasket' => 'oe/loggerdemo/models/oeloggerdemooxbasket',
            ),
    'files'       => array(
        'oeloggerdemomodule' => 'oe/loggerdemo/core/oeloggerdemomodule.php',
),
    'templates'   => array(
),
    'blocks'      => array(
            ),
    'settings'    => array(
        ),
    'events'      => array(
        'onActivate'   => 'oeLoggerDemoModule::onActivate',
        'onDeactivate' => 'oeLoggerDemoModule::onDeactivate',
    ),
);