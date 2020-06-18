<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-02 12:21:17
  from 'C:\Apache24\htdocs\auction\templates\user_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ead2d7d499d65_83828549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ae4893fd4eac773547d7e4500a231ae13531bea' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\user_login.tpl',
      1 => 1588407670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5ead2d7d499d65_83828549 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['user']->value->is_logged_in()) {?>
    <div>вы вошли как <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->get_login(), ENT_QUOTES, 'UTF-8', true);?>
</div>
    <form method="POST" action="action_logout.php" enctype="multipart/form-data">
        <button type="submit" name="submit_logout">выйти</button>
    </form>
<?php } else { ?>
    <form method="POST" action="action_login.php" enctype="multipart/form-data">
        <div>логин<input name="login" type="text"></div>
        <div>пароль<input name="password" type="password"></div>
        <button type="submit" name ="submit_login">войти</button>
        <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </form>
    <a href="registration.php">регистрация</a>
<?php }
}
}
