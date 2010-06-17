{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Product details attributes block
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="productDetails.info", weight="10")
 *}
<table IF="{product.getExtraFields(true)|product.weight|isViewListVisible(#productDetails.attributes#)}" class="product-extra-fields">

  <tr IF="{!product.weight=0}">
    <th>Weight:</th>
    <td>{product.weight} {config.General.weight_symbol}</td>
  </tr>

  <widget class="XLite_View_ExtraFields" product="{product}" />

  <tr FOREACH="getViewList(#productDetails.attributes#),w">
    {w.display()}
  </tr>

</table>
