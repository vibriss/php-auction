<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-02 12:21:17
  from 'C:\Apache24\htdocs\auction\templates\errors_and_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ead2d7d760d03_38377306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52b7d6bec262a542bb3d82f2b799732e34779b45' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\errors_and_messages.tpl',
      1 => 1588407227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ead2d7d760d03_38377306 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
    <div style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div> 
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
    <div style="color:green"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div> 
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
