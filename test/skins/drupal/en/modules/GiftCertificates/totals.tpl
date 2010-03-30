{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Applied gift certificate row
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<li IF="!cart.payedByGC=0">
  <em>Paid with GC:</em>
  {price_format(cart,#payedByGC#):h}
  <div><widget class="XLite_View_Button_Link" location="{buildURL(#cart#,#remove_gc#,_ARRAY_(#return_target#^target))}" label="Remove GC" /></div>
</li>
