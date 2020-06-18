<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 12:15:10
  from 'c:\winnmp\www\auction\templates\add_lot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb5ace9e4957_22756514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14dcae161100ecf39ee48429133d9237077ef469' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\add_lot.tpl',
      1 => 1592482509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eeb5ace9e4957_22756514 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="action_add_lot.php" enctype="multipart/form-data">
    <table border="1" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                                название*
            </td>
            <td>
                <input name="name" type="text">
            </td>
        </tr>
        <tr>
            <td>
                описание
            </td>
            <td>
                <input name="description" type="text">
            </td>
        </tr>
        <tr>
            <td>
                                начальная цена*
            </td>
            <td>   
                <input name="price" type="text" value="0">
            </td>
        </tr>
        <tr>
            <td>
                длительность
            </td>
            <td>   
                <select name="lifetime">
                    <option value="60" selected>1 час</option>
                    <option value="120">2 часа</option>
                    <option value="180">3 часа</option>
                    <option value="1">1 минута</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                изображение
            </td>
            <td>     
                <input type="file" name="file[]" multiple="true">
            </td>
        </tr>    
    </table>
    <button type="submit" name="submit_add">добавить</button>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</form>   <?php }
}
