{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Form start (order search)
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<form action="{getFormAction()}" method="{getParam(#form_method#)}" name="{getFormName()}" onsubmit="javascript: {getJSOnSubmitCode()}" class="search-orders" style="display: none;">
<input FOREACH="getFormParamsAsPlainList(),paramName,paramValue" type="hidden" name="{paramName}" value="{paramValue}" />