<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-05 15:22:56
  from 'c:\winnmp\www\auction\templates\registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb184d0929513_25459633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f0341aa80eb79c68c88c5fdf7a532fb794b04b6' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\registration.tpl',
      1 => 1588408491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eb184d0929513_25459633 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="action_registration.php" enctype="multipart/form-data">
    логин <input name="login" type="text"><br>
    пароль <input name="password" type="password"><br>
    <button type="submit" name ="submit_registration">зарегистрироваться</button><br>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</form>
<div><a href="index.php">вернуться</a></div><?php }
}
