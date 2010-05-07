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
 * X-Payments connector module
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Module_XPaymentsConnector_Main extends XLite_Module_Abstract
{
    /**
     * Module type
     *
     * @return int
     * @access public
     * @since  3.0.0
     */
    public static function getType()
    {
        return self::MODULE_GENERAL;
    }

    /**
     * Module version
     *
     * @return string
     * @access public
     * @since  3.0.0
     */
    public static function getVersion()
    {
        return '1.0';
    }

    /**
     * Module description
     *
     * @return string
     * @access public
     * @since  3.0.0
     */
    public static function getDescription()
    {
        return 'X-Payments connector';
    }    

    /**
     * Determines if we need to show settings form link
     *
     * @return bool
     * @access public
     * @since  3.0.0
     */
    public static function showSettingsForm()
    {
        return true;
    }

    /**
     * Perform some actions at startup
     *
     * @return void
     * @access public
     * @since  3.0.0
     */
    public function init()
    {
        parent::init();

        $conf = new XLite_Module_XPaymentsConnector_Model_Configuration();
        foreach ($conf->findAll() as $c) {
            $this->registerPaymentMethod(
                $c->get('method_name'),
                'Module_XPaymentsConnector_Model_PaymentMethod_XPayment'
            );
        }

        $this->xlite->set('X-Payments connector', true);
    }

    /**
     * Check - module is configured or not
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function isConfigured()
    {
        $failed = false;

        // Check shopping cart id
        $failed |= empty(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_shopping_cart_id)
            || !preg_match('/^[\da-f]{32}$/Ss', XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_shopping_cart_id);

        // Check URL
        $failed |= empty(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_xpayments_url);

        $parsed_url = @parse_url(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_xpayments_url);

        $failed |= !$parsed_url || !isset($parsed_url['scheme']) || $parsed_url['scheme'] != 'https';

        // Check public key
        $failed |= empty(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_public_key);

        // Check private key
        $failed |= empty(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_private_key);

        // Check private key password
        $failed |= empty(XLite_Model_Config::getInstance()->XPaymentsConnector->xpc_private_key_password);

        return !$failed;
    }

    /**
     * Check module requirements 
     * 
     * @return integer
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function checkRequirements()
    {
        $code = 0;

        if (!function_exists('curl_init')) {
            $code = $code | self::REQ_CURL;
        }

        if (
            !function_exists('openssl_pkey_get_public') || !function_exists('openssl_public_encrypt')
            || !function_exists('openssl_get_privatekey') || !function_exists('openssl_private_decrypt')
            || !function_exists('openssl_free_key')
        ) {
            $code = $code | self::REQ_OPENSSL;
        }

        if (!class_exists('DOMDocument')) {
            $code = $code | self::REQ_DOM;
        }

        return $code;
    }


    
}