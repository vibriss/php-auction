<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-03 11:34:25
  from 'C:\Apache24\htdocs\auction\templates\add_lot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eae7401d5b955_94332974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6651578dc0898645fbebd552b9d8975fefc5c89' => 
    array (
      0 => 'C:\\Apache24\\htdocs\\auction\\templates\\add_lot.tpl',
      1 => 1588491260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eae7401d5b955_94332974 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="action_add_lot.php" enctype="multipart/form-data">
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
<div><a href="index.php">вернуться</a></div><?php }
}
