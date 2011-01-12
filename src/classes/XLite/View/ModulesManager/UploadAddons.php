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

namespace XLite\View\ModulesManager;

/**
 * Modules modify widget
 *
 * @package XLite
 * @see     ____class_see____
 * @since   3.0
 *
 */
class UploadAddons extends \XLite\View\Dialog
{
    /**
     * Target that is allowed for Upload Addons widget 
     */
    const UPLOAD_ADDONS_TARGET  = 'upload_addons';

    /**
     * Javascript file that is used for multiadd functionality 
     */
    const JS_SCRIPT             = 'modules_manager/upload_addons/js/upload_addons.js';


    /**
     * Return list of targets allowed for this widget
     *
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function getAllowedTargets()
    {
        $result = parent::getAllowedTargets();

        $result[] = self::UPLOAD_ADDONS_TARGET;
    
        return $result;
    }

    /** 
     * Get a list of JavaScript files required to display the widget properly
     * 
     * @return void
     * @access public
     * @since  3.0.0
     */
    public function getJSFiles()
    {   
        $list = parent::getJSFiles();

        $list[] = self::JS_SCRIPT;

        return $list;
    }   


    /**
     * Return title
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getHead()
    {
        return 'Upload add-ons';
    }

    /**
     * Return templates directory name
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getDir()
    {
        return 'modules_manager' . LC_DS . 'upload_addons';
    }

}