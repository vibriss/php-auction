<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 12:22:08
  from 'c:\winnmp\www\auction\templates\lot_list\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb5c700d3c71_18154297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8511542ce9860bec306a952680129d31c979702' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\lot_list\\user.tpl',
      1 => 1592482630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeb5c700d3c71_18154297 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['lot_list']->value) == 0) {?>
    <div>аукционов нет<div/>
<?php } else { ?>
    <form method="POST" action="action_stop_or_delete.php" enctype="multipart/form-data">
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
                            <?php if (Bid::get_highest_bid($_smarty_tpl->tpl_vars['lot']->value->get_id())) {?>
                                <tr>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['lot']->value->get_time_to_end()) {?>
                                            лидер
                                        <?php } else { ?>
                                            победитель
                                        <?php }?>
                                    </td>
                                    <td> 
                                            <?php echo $_smarty_tpl->tpl_vars['lot']->value->get_winner()->get_login();?>

                                    </td>
                                </tr> 
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['lot']->value->get_time_to_end()) {?>
                                <tr> 
                                    <td> 
                                        <button type="submit" name="submit_stop" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">завершить</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                        <div><a href="edit_lot.php?lot=<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">редактировать</a></div>
                                    </td>
                                </tr>
                            <?php }?>
                            <tr> 
                                <td>
                                    <button type="submit" name="submit_delete" value="<?php echo $_smarty_tpl->tpl_vars['lot']->value->get_id();?>
">удалить</button>
                                </td>
                            </tr>
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
