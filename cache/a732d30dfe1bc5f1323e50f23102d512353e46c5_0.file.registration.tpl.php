<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-02 12:40:20
  from 'C:\Apache24\htdocs\auction\templates\registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ead31f450e2a5_46352622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a732d30dfe1bc5f1323e50f23102d512353e46c5' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\registration.tpl',
      1 => 1588408491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5ead31f450e2a5_46352622 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="action_registration.php" enctype="multipart/form-data">
    логин <input name="login" type="text"><br>
    пароль <input name="password" type="password"><br>
    <button type="submit" name ="submit_registration">зарегистрироваться</button><br>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</form>
<div><a href="index.php">вернуться</a></div><?php }
}
