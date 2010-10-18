{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Item price
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="itemsList.product.grid.customer.info", weight="30")
 * @ListChild (list="itemsList.product.list.customer.info", weight="40")
 * @ListChild (list="itemsList.product.table.customer.columns", weight="40")
 *}
<widget class="\XLite\View\Price" product="{product}" displayOnlyPrice="true" IF="isShowPrice()" />