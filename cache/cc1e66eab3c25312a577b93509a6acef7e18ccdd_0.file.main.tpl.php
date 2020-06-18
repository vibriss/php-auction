<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 11:46:25
  from 'c:\winnmp\www\auction\templates\list\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb5411526fb7_03407306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc1e66eab3c25312a577b93509a6acef7e18ccdd' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\list\\main.tpl',
      1 => 1592427338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
    'file:lot.tpl' => 1,
  ),
),false)) {
function content_5eeb5411526fb7_03407306 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['lot_list']->value) == 0) {?>
    <div>активных аукционов нет<div/>
<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>     <table border="1" cellspacing="20" cellpadding="10">
        <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lot_list']->value, 'lot', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['lot']->value) {
?>
            <td valign = "top">
                <?php $_smarty_tpl->_subTemplateRender("file:lot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>     
                <?php if (($_smarty_tpl->tpl_vars['lot']->value->get_user_id() != $_smarty_tpl->tpl_vars['user']->value->get_id()) && $_smarty_tpl->tpl_vars['lot']->value->get_time_to_end() && $_smarty_tpl->tpl_vars['user']->value->is_logged_in()) {?>
                    <form method="POST" action="action_bid.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">
                        <input type="text" name="bid">
                        <button type="submit">сделать ставку</button>
                    </form> 
                <?php }?>
            </td>
            <?php if (!(($_smarty_tpl->tpl_vars['key']->value+1) % 2)) {?>
                </tr><tr>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tr>
    </table>
<?php }
}
}
