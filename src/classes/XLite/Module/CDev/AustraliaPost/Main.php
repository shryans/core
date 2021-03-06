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
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      1.0.0
 */

namespace XLite\Module\CDev\AustraliaPost;

/**
 * ____description____
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   1.0.0
 */
abstract class Main extends \XLite\Module\AModule
{
    /**
     * Author name
     *
     * @var    string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getAuthorName()
    {
        return 'Creative Development LLC';
    }

    /**
     * Module name
     *
     * @var    string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getModuleName()
    {
        return 'Australia Post';
    }

    /**
     * Module version
     *
     * @var    string
     * @access protected
     * @since  1.0.0
     */
    public static function getMinorVersion()
    {
        return '0';
    }

    /**
     * Module description
     *
     * @var    string
     * @access protected
     * @since  1.0.0
     */
    public static function getDescription()
    {
        return 'This module introduces Australia Post real-time shipping cost calculations';
    }

    /**
     * Determines if we need to show settings form link
     *
     * @return boolean 
     * @access public
     * @since  1.0.0
     */
    public static function showSettingsForm()
    {
        return true;
    }

    /**
     * Return link to settings form
     *
     * @return string
     * @access public
     * @since  1.0.0
     */
    public static function getSettingsForm() 
    {
        return 'admin.php?target=aupost';
    }

    /**
     * Perform some actions at startup
     *
     * @return void
     * @access public
     * @since  1.0.0
     */
    public static function init() 
    {
        parent::init();

        // Register AustraliaPost shipping processor
        \XLite\Model\Shipping::getInstance()->registerProcessor('\XLite\Module\CDev\AustraliaPost\Model\Shipping\Processor\AustraliaPost');

        \XLite::getInstance()->set('AustraliaPostEnabled', true);
    }

    /**
     * Get post-installation user notes
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  1.0.0
     */
    public static function getPostInstallationNotes()
    {
        return '<b>Note:</b> please visit the <a href="admin.php?target=aupost">Australia Post setup page</a>, also available in your "Shipping settings" menu.';
    }
}
