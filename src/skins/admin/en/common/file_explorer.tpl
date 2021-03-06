{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * File explorer template
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *}

<table width="100%">

  <tr>
    <td FOREACH="columns,column,val" width="50%" valign="top" style="font-size:10pt">

{foreach:getColumnsData(column),node}

{if:formSelectionName}<input type="radio" name="{formSelectionName}" value="{node.id}" />{end:}

{if:node.leaf}<a href="{url:h}&mode=edit&file={node.path}"><img src="images/doc.gif" align="top" alt="" />
{else:}<a href="{url:h}&node={node.path}"><img src="images/folder.gif" align="top" alt="" />
{end:}
{node.name}</a>

{if:node.comment}&nbsp;&nbsp;-&nbsp;<span style="font-size:8pt">{node.comment}</span><br />
{else:}
<br />
{end:}

{end:}

    </td>
  </tr>

</table>
