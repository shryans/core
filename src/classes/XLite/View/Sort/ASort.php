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

namespace XLite\View\Sort;

// FIXME - class should use the same approaches as the ProductsList one

/**
 * Abstract sort widget 
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
abstract class ASort extends \XLite\View\AView
{
    /**
     * Widget parameter names
     */

    const PARAM_PARAMS          = 'params';
    const PARAM_SORT_CRITERIONS = 'sortCriterions';
    const PARAM_CELL            = 'cell';


    /**
     * Get form parameters
     * 
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getFormParams()
    {
        $params = $this->getParam(self::PARAM_PARAMS);

        $params['action'] = 'search';

        return $params;
    }

    /**
     * Check - specified sort criterion is selected or not
     * 
     * @param string $key Sort criterion code
     *  
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isSortCriterionSelected($key)
    {
        $cell = $this->getParam(self::PARAM_CELL);

        return isset($cell['sortCriterion']) && $key == $cell['sortCriterion'];
    }

    /**
     * Check - sort order is ascending or not
     * 
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isSortOrderAsc()
    {
        $cell = $this->getParam(self::PARAM_CELL);

        return empty($cell['sortOrder']) || 'asc' == $cell['sortOrder'];
    }

    /**
     * Build sort order link URL 
     * 
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getSortOrderURL()
    {
        $params = $this->getParam(self::PARAM_PARAMS);

        $target = \XLite::TARGET_DEFAULT;
        $action = '';

        if (isset($params['target'])) {
            $target = $params['target'];
            unset($params['target']);
        }

        if (isset($params['action'])) {
            $action = $params['action'];
            unset($params['action']);
        }

        $action = 'search';

        $params['sortOrder'] = $this->isSortOrderAsc() ? 'desc' : 'asc';

        return $this->buildURL($target, $action, $params);
    }

    /**
     * Get class name for sort order link
     * 
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getSortOrderLinkClassName()
    {
        return $this->isSortOrderAsc() ? 'asc' : 'desc';
    }

    /**
     * Register JS files
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        $list[] = 'common/sort.js';

        return $list;
    }

    /**
     * Register CSS files
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();

        $list[] = 'common/sort.css';

        return $list;
    }


    /**
     * Return widget default template
     *                               
     * @return string                
     * @see    ____func_see____
     * @since  1.0.0
     */                              
    protected function getDefaultTemplate()
    {
        return 'common/sort.tpl';
    }

    /**
     * Define widget parameters
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_PARAMS          => new \XLite\Model\WidgetParam\Collection('URL params', array()),
            self::PARAM_SORT_CRITERIONS => new \XLite\Model\WidgetParam\Collection('Sort criterions', array()),
            self::PARAM_CELL            => new \XLite\Model\WidgetParam\Collection('List conditions cell', array()),
        );
    }

    /**
     * Check if widget is visible
     *
     * @return boolean 
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function isVisible()
    {
        return parent::isVisible() && $this->getParam(self::PARAM_SORT_CRITERIONS);
    }
}
