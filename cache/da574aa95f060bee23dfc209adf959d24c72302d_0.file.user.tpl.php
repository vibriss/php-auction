<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 20:59:47
  from 'c:\winnmp\www\auction\templates\list\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eea84435244f9_14772432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da574aa95f060bee23dfc209adf959d24c72302d' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\list\\user.tpl',
      1 => 1592427530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lot.tpl' => 1,
  ),
),false)) {
function content_5eea84435244f9_14772432 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['lot_list']->value) == 0) {?>
    <div>аукционов нет<div/>
<?php } else { ?>
    <form method="POST" action="action_stop_or_delete.php" enctype="multipart/form-data">
        <table border="1" cellspacing="20" cellpadding="10">
            <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lot_list']->value, 'lot', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['lot']->value) {
?>
                <td valign = "top">
                    <?php $_smarty_tpl->_subTemplateRender("file:lot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>                                                  <?php if (Bid::get_highest_bid($_smarty_tpl->tpl_vars['lot']->value->get_id())) {?>
                        <?php if ($_smarty_tpl->tpl_vars['lot']->value->get_time_to_end()) {?>
                            лидер
                        <?php } else { ?>
                            победитель
                        <?php }?>
                        <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_winner()->get_login();?>

                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['lot']->value->get_time_to_end()) {?>
                        <button type="submit" name="submit_stop" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">завершить</button>
                        <div><a href="edit_lot.php?lot=<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">редактировать</a></div>
                    <?php }?>
                    <button type="submit" name="submit_delete" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">удалить</button>
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
    </form>
<?php }
}
}
