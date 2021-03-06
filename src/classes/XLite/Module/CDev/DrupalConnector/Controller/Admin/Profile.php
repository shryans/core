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
 * @subpackage Controller
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      1.0.0
 */

namespace XLite\Module\CDev\DrupalConnector\Controller\Admin;

/**
 * \XLite\Module\CDev\DrupalConnector\Controller\Admin\Profile 
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   1.0.0
 */
class Profile extends \XLite\Controller\Admin\Profile implements \XLite\Base\IDecorator
{
    /**
     * Prevent users registering by administrator
     * 
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function handleRequest()
    {
        if ($this->isRegisterMode() || 'delete' === \XLite\Core\Request::getInstance()->action) {

            \XLite\Core\TopMessage::addError(
                'It is impossible to delete or create user accounts because your store currently works '
                . 'as an integration with Drupal and shares users with Drupal. Deleting/creating user '
                . 'accounts is possible via Drupal administrator interface.'
            );

            $this->markAsAccessDenied();
        }

        return parent::handleRequest();
    }
}
