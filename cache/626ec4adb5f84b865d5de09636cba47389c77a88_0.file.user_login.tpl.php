<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 10:41:18
  from 'c:\winnmp\www\auction\templates\user_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee5fece643a45_91244549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '626ec4adb5f84b865d5de09636cba47389c77a88' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\user_login.tpl',
      1 => 1592131268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5ee5fece643a45_91244549 (Smarty_Internal_Template $_smarty_tpl) {
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
