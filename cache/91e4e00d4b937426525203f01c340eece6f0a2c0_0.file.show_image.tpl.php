<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 14:27:03
  from 'c:\winnmp\www\auction\templates\show_image.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee633b7e939d0_80697429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91e4e00d4b937426525203f01c340eece6f0a2c0' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\show_image.tpl',
      1 => 1592144821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee633b7e939d0_80697429 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo $_smarty_tpl->tpl_vars['return_url']->value;?>
">вернуться</a>
<div><img src="<?php echo Image::get_path_by_id($_smarty_tpl->tpl_vars['id']->value);?>
"></div>
<a href="<?php echo $_smarty_tpl->tpl_vars['return_url']->value;?>
">вернуться</a><?php }
}
