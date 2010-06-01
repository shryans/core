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
 * @subpackage Core
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * Common operations repository
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Core_Operator extends XLite_Base implements XLite_Base_ISingleton
{
    /**
     * Check if we need to perform a redirect or not 
     * 
     * @return bool
     * @access protected
     * @since  3.0.0
     */
    protected function checkRedirectStatus()
    {
        return !XLite_Core_CMSConnector::isCMSStarted() 
            || !XLite_Core_Request::getInstance()->__get(XLite_Core_CMSConnector::NO_REDIRECT);
    }

    /**
     * setHeaderLocation
     * 
     * @param string $location URL
     * @param int    $code     operation code
     *  
     * @return void
     * @access protected
     * @since  3.0.0
     */
    protected function setHeaderLocation($location, $code = 302)
    {
        header('Location: ' . $location, true, $code);
    }

    /**
     * finish 
     * 
     * @return void
     * @access protected
     * @since  3.0.0
     */
    protected function finish()
    {
        exit (0);
    }


    /**
     * Singleton access method
     * 
     * @return XLite_Core_Converter
     * @access public
     * @since  3.0
     */
    public static function getInstance()
    {
        return self::getInternalInstance(__CLASS__);
    }

    /**
     * redirect 
     * 
     * @param string $location URL
     * @param int    $code     operation code
     *  
     * @return void
     * @access public
     * @since  3.0.0
     */
    public function redirect($location, $code = 302)
    {
        if ($this->checkRedirectStatus()) {
            $this->setHeaderLocation($location, $code);
            $this->finish();
        }
    }
}
