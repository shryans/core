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
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\View\Pager\Admin\Module;

/**
 * Pager for the orders search page
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
class Install extends \XLite\View\Pager\Admin\Module\AModule
{
    /** 
     * Register CSS files to include
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getCSSFiles()
    {   
        $list = parent::getCSSFiles();

        $list[] = 'items_list/module/install/pager/css/style.css';

        return $list;
    }   

    /**
     * Return CSS classes to use in parent widget of pager
     * 
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getCSSClasses()
    {
        return parent::getCSSClasses() . ' addons-pager';
    }

    /**
     * getItemsPerPageDefault
     *
     * @return integer
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getItemsPerPageDefault()
    {
        return 5;
    }

    /**
     * Return widget default template
     *
     * :TODO: check if where is a more convinient way to get ItemsList dir
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getDefaultTemplate()
    {
        return 'items_list' . LC_DS . 'module' . LC_DS . 'install' . LC_DS . 'pager' . LC_DS . 'body.tpl';
    }

    /**
     * Do not show pager on bottom
     * 
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function isVisibleBottom()
    {
        return false;
    }
}
