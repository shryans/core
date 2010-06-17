{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Vertical minicart total block
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="#minicart.vertical.childs", weight="20")
 *}
<div class="cart-totals" IF="!cart.empty">
  <p class="cart-total"><span>Total: </span>{price_format(cart,#total#):h}</p>
</div>