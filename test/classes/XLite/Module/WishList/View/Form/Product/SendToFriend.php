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

/**
 * Send to friend product to cart form
 * 
 * @package    XLite
 * @subpackage View
 * @since      3.0.0
 */
class XLite_Module_WishList_View_Form_Product_SendToFriend extends XLite_View_Form_Product_Abstract
{
    /**
     * Current form name
     *
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getFormName()
    {
        return 'send_to_friend';
    }

    /**
     * initView 
     * 
     * @return void
     * @access protected
     * @since  3.0.0
     */
    protected function initView()
    {
        parent::initView();

        $this->widgetParams[self::PARAM_FORM_PARAMS]->appendValue($this->getFormDefaultParams());
    }

    /**
     * getFormDefaultParams 
     * 
     * @return array
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getFormDefaultParams()
    {
        return array(
            'product_id'  => $this->getProduct()->get('product_id'),
        );
    }

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

        $this->widgetParams[self::PARAM_FORM_TARGET]->setValue('send_friend');
        $this->widgetParams[self::PARAM_FORM_ACTION]->setValue('send_friend');
    }
}
