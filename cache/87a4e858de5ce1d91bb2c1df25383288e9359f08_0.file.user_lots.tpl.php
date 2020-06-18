<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 11:50:57
  from 'c:\winnmp\www\auction\templates\user_lots.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb5521bf7720_33203567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87a4e858de5ce1d91bb2c1df25383288e9359f08' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\user_lots.tpl',
      1 => 1592481052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user_login.tpl' => 1,
    'file:add_lot.tpl' => 1,
    'file:lot_list/user.tpl' => 1,
  ),
),false)) {
function content_5eeb5521bf7720_33203567 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:user_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div><a href="index.php">вернуться</a></div>
<?php $_smarty_tpl->_subTemplateRender("file:add_lot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:lot_list/user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
