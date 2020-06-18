<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 21:02:37
  from 'c:\winnmp\www\auction\templates\lot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eea84ed1eaf66_45769916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6ffb52866b8817ab6a6596de8dd5ad8aa939419' => 
    array (
      0 => 'c:\\winnmp\\www\\auction\\templates\\lot.tpl',
      1 => 1592427732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eea84ed1eaf66_45769916 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <table border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td>
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
    </table>
</div><?php }
}
