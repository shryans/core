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
 * @subpackage Model
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * e-check payment method
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Model_PaymentMethod_Echeck extends XLite_Model_PaymentMethod
{
    /**
     * Form template 
     * 
     * @var    string
     * @access public
     * @see    ____var_see____
     * @since  3.0.0
     */
    public $formTemplate = "checkout/echeck.tpl";

    /**
     * Use secure site part
     * 
     * @var    boolean
     * @access public
     * @see    ____var_see____
     * @since  3.0.0
     */
    public $secure = true;

    /**
     * Form fields list
     * 
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $formFields = array(
        'ch_routing_number' => 'ABA routing number',
        'ch_acct_number'    => 'Bank Account Number',
        'ch_type'           => 'Type of Account',
        'ch_bank_name'      => 'Bank name',
        'ch_acct_name'      => 'Account name',
        'ch_number'         => 'Check number',
    );

    /**
     * Process cart
     * 
     * @param XLite_Model_Cart $cart Cart
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function process(XLite_Model_Cart $cart)
    {
        $cart->setDetailLabels($this->formFields);

        $data = XLite_Core_Request::getInstance()->ch_info;
        foreach ($this->formFields as $key => $name) {
            if (isset($data[$key])) {
                $cart->setDetail($key, $data[$key]);
            }
        }

        $cart->set('status', 'Q');
        $cart->update();
    }

    /**
     * Handle request 
     * 
     * @param XLite_Model_Cart $cart Cart
     *  
     * @return integer Operation status
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function handleRequest(XLite_Model_Cart $cart)
    {
        if ($this->checkRequest()) {
            $this->process($cart);

        } else {
            $cart->set('status', 'F');
            $cart->update();
        }

        return in_array($cart->get('status'), array('Q', 'P'))
            ? self::PAYMENT_SUCCESS
            : self::PAYMENT_FAILURE;
    }

    /**
     * Check request 
     * 
     * @return boolean
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function checkRequest()
    {
        $data = XLite_Core_Request::getInstance()->ch_info;

        $result = true;

        if (!is_array($data)) {

            XLite_Core_TopMessage::getInstance()->add('Check data is required', XLite_Core_TopMessage::ERROR);
            $result = false;

        } else {

            $fields = $this->formFields;
            unset($fields['ch_number']);

            foreach ($fields as $key => $name) {
                if (!isset($data[$key]) || empty($data[$key])) {
                    XLite_Core_TopMessage::getInstance()->add($name . ' is required', XLite_Core_TopMessage::ERROR);
                    $result = false;
                }
            }
        }

        return $result;
    }
}