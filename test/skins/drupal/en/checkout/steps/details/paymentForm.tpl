{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Payment methods details forms switcher
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<widget template="{cart.paymentMethod.formTemplate}" IF="cart.paymentMethod.formTemplate" />

<widget module="PayPalPro" template="modules/PayPalPro/standard_checkout.tpl" visible="{cart.paymentMethod.params.solution=#standard#}">
<widget module="GoogleCheckout" template="modules/GoogleCheckout/google_checkout.tpl" visible="{cart.paymentMethod.payment_method=#google_checkout#}">