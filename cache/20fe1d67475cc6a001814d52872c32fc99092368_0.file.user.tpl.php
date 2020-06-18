<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 20:57:12
  from 'C:\Apache24\htdocs\auction\templates\list\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaef7e8e62bb4_72354909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20fe1d67475cc6a001814d52872c32fc99092368' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\list\\user.tpl',
      1 => 1588495221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eaef7e8e62bb4_72354909 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['lots']->value) == 0) {?>
    <div>аукционов нет<div/>
<?php } else { ?>
    <form method="POST" action="action_delete.php" enctype="multipart/form-data">
        <table border="1" cellspacing="20" cellpadding="10">
            <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lots']->value, 'lot', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['lot']->value) {
?>
                <td valign = "top">
                    <?php echo $_smarty_tpl->tpl_vars['lot']->value->show();?>

                    <input type="checkbox" name="img_id_to_delete[]" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">
                </td>
                <?php if (!(($_smarty_tpl->tpl_vars['key']->value+1) % 4)) {?>
                    </tr><tr>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tr>
        </table>
        <button type="submit" name="submit_delete">удалить</button>
    </form>
<?php }
}
}
