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

namespace XLite\Module\CDev\Taxes\Model;

/**
 * Product class 
 * 
 * @see   ____class_see____
 * @since 1.0.0
 */
abstract class ProductClass extends \XLite\Model\ProductClass implements \XLite\Base\IDecorator
{
    /**
     * Tax rates (relation)
     * 
     * @var    \Doctrine\Common\Collections\ArrayCollection
     * @see    ____var_see____
     * @since  1.0.0
     *
     * @OneToMany (targetEntity="XLite\Module\CDev\Taxes\Model\Tax\Rate", mappedBy="product_class", cascade={"all"})
     */
    protected $tax_rates;

    /**
     * Constructor
     *
     * @param array $data Entity properties
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function __construct(array $data = array())
    {
        $this->tax_rates = new \Doctrine\Common\Collections\ArrayCollection();

        parent::__construct($data);
    }

}
