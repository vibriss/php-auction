<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 20:57:12
  from 'C:\Apache24\htdocs\auction\templates\user_lots.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eaef7e8118315_63439441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60cdd032fe10869281bce2103cd80593450eb065' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\user_lots.tpl',
      1 => 1588525027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user_login.tpl' => 1,
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eaef7e8118315_63439441 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:user_login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div><a href="index.php">вернуться</a></div>
<form method="POST" action="action_add_lot.php" enctype="multipart/form-data">
    название*<input name="name" type="text"><br>
    описание<input name="description" type="text"><br>
    начальная цена*<input name="price" type="text" value="0"><br>
    длительность<select name="lifetime">
        <option value="60" selected>1 час</option>
        <option value="120">2 часа</option>
        <option value="180">3 часа</option>
        <option value="1">1 минута</option>
    </select><br>
    изображение<input type="file" name="file"><br>
    <button type="submit" name="submit_add">добавить</button>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</form>   

<?php echo $_smarty_tpl->tpl_vars['user']->value->lot_list()->show();
}
}
