<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-11 06:32:02
  from 'c:\winnmp\www\auction\templates\inactive_lots.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb8f162c3e794_08398511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeb9c6e223abb73f827e1e7b9ddf798817f1fc94' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\inactive_lots.tpl',
      1 => 1589178707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user_login.tpl' => 1,
    'file:list/main.tpl' => 1,
  ),
),false)) {
function content_5eb8f162c3e794_08398511 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:user_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div><a href="index.php">вернуться</a></div>
<?php $_smarty_tpl->_subTemplateRender("file:list/main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
