<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 21:27:02
  from 'c:\winnmp\www\auction\templates\edit_lot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eea8aa67416c7_64763973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06e8e6d5b580c585603778849315e18467d71d3e' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\edit_lot.tpl',
      1 => 1592427750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eea8aa67416c7_64763973 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="action_edit.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">
    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <td>
                                название*
            </td>
            <td>
                <input name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_name();?>
">
            </td>
        </tr>
        <tr>
            <td>
                описание
            </td>
            <td>
                <input name="description" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_description();?>
">
            </td>
        </tr>
        <tr>
            <td>
                                начальная цена*
            </td>
            <td>   
                поменять нельзя
            </td>
        </tr>
        <tr>
            <td>
                длительность
            </td>
            <td>   
                поменять нельзя
            </td>
        </tr>
        <tr>
            <td> 
                <?php if (!empty($_smarty_tpl->tpl_vars['lot']->value->get_images())) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lot']->value->get_images(), 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
                        <a href="show_image.php?id=<?php echo $_smarty_tpl->tpl_vars['image']->value->get_id();?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->get_path();?>
" width="200"></a>
                        <input type="checkbox" name="image_id[]" value="<?php echo $_smarty_tpl->tpl_vars['image']->value->get_id();?>
">
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    картинки отсутствуют   
                <?php }?>
            </td>
            <td>     
                <input type="file" name="file[]" multiple="true">
            </td>
        </tr>    
    </table>
    <button type="submit" name="submit_edit">сохранить</button>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</form>   
<div><a href="user_lots.php">вернуться</a></div><?php }
}
