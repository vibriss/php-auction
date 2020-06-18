<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 10:06:12
  from 'c:\winnmp\www\auction\templates\errors_and_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0b094b22201_40138681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '932cf05b6b441497489030a7a7e4d65b00392cf7' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\errors_and_messages.tpl',
      1 => 1591783563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0b094b22201_40138681 (Smarty_Internal_Template $_smarty_tpl) {
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warnings']->value, 'warning');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
?>
    <div style="color:orange"><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
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
