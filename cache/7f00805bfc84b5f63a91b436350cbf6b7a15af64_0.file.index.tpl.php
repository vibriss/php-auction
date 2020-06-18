<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-02 16:33:25
  from 'C:\Apache24\htdocs\auction\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ead6895c74665_00245801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f00805bfc84b5f63a91b436350cbf6b7a15af64' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\index.tpl',
      1 => 1588422768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user_login.tpl' => 1,
  ),
),false)) {
function content_5ead6895c74665_00245801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:user_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['user']->value->is_logged_in()) {?>
    <div><a href="user_lots.php">мои лоты</a></div>
<?php }
}
}
