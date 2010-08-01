<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 * 
 * @category   LiteCommerce
 * @package    XLite
 * @subpackage View
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\Module\DrupalConnector\View\ProductsList;

/**
 * Products list
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
abstract class AProductsList extends \XLite\View\ProductsList\AProductsList implements \XLite\Base\IDecorator
{
    /**
     * Input arguments (AJAX) 
     */
    const PARAM_BLOCK_DELTA = 'blockDelta';


    /**
     * Define widget parameters
     *
     * @return void
     * @access protected
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        if (\XLite\Module\DrupalConnector\Handler::getInstance()->checkCurrentCMS()) {

            // FIXME - define actual param type and value here
            $this->widgetParams += array(
                self::PARAM_BLOCK_DELTA => new \XLite\Model\WidgetParam\String(
                    'Block delta', ''
                ),
            );

            $this->requestParams[] = self::PARAM_BLOCK_DELTA;
        }
    }
}
