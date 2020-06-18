<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 12:21:39
  from 'c:\winnmp\www\auction\templates\lot_list\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb5c5313aae0_95406145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3050ff4295bcb6fdaa4f0f1bcb5abbc622cb3be' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\lot_list\\main.tpl',
      1 => 1592482896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:errors_and_messages.tpl' => 1,
  ),
),false)) {
function content_5eeb5c5313aae0_95406145 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['lot_list']->value) == 0) {?>
    <div>активных аукционов нет<div/>
<?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender("file:errors_and_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <form method="POST" action="action_bid.php" enctype="multipart/form-data">
        <table border="1" cellspacing="20" cellpadding="10">
            <tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lot_list']->value, 'lot', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['lot']->value) {
?>
                    <td>
                        <table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td valign = "top">
                                    название
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_name();?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    описание
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_description();?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    начальная цена
                                </td>
                                <td>   
                                    <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_price();?>

                                </td>
                            </tr>
                            <?php if (Bid::get_highest_bid($_smarty_tpl->tpl_vars['lot']->value->get_id())) {?>
                                <tr>
                                    <td>
                                        текущая ставка
                                    </td>
                                    <td>   
                                        <?php echo Bid::get_highest_bid($_smarty_tpl->tpl_vars['lot']->value->get_id());?>

                                    </td>
                                </tr>
                            <?php }?>
                            <tr>
                                <td>
                                    <?php if (!$_smarty_tpl->tpl_vars['lot']->value->get_time_to_end()) {?>
                                        время лота истекло
                                    <?php } else { ?>
                                        время до окончания
                                        </td>
                                        <td> 
                                        <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_time_to_end();?>

                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['lot']->value->get_images())) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lot']->value->get_images(), 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
                                            <a href="show_image.php?id=<?php echo $_smarty_tpl->tpl_vars['image']->value->get_id();?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value->get_path();?>
" width="200"></a>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        картинка отсутствует   
                                    <?php }?>
                                </td>
                            </tr>    
                            <?php if (($_smarty_tpl->tpl_vars['lot']->value->get_user_id() != $_smarty_tpl->tpl_vars['user']->value->get_id()) && $_smarty_tpl->tpl_vars['lot']->value->get_time_to_end() && $_smarty_tpl->tpl_vars['user']->value->is_logged_in()) {?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">
                                        <input type="text" name="bid">
                                    </td>
                                    <td> 
                                        <button type="submit">сделать ставку</button>
                                    </td>
                                </tr>   
                            <?php }?>
                        </table>    
                    </td>
                <?php if (!(($_smarty_tpl->tpl_vars['key']->value+1) % 2)) {?>
                    </tr><tr>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tr>
        </table>
    </form> 
<?php }
}
}
