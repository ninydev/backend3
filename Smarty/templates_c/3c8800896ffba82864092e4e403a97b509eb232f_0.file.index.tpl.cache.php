<?php
/* Smarty version 3.1.33, created on 2019-07-19 20:49:23
  from '/var/www/clients/client1/web20/web/Smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3202a3b906b0_06958380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c8800896ffba82864092e4e403a97b509eb232f' => 
    array (
      0 => '/var/www/clients/client1/web20/web/Smarty/templates/index.tpl',
      1 => 1563558563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d3202a3b906b0_06958380 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1257458865d3202a3b6fdf8_84267395';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>
    Hello World
</h1>
<p> Hello <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
 </p>
<div class="alert-info">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['States']->value, 'State');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['State']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['State']->value;?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div>
<?php if ($_smarty_tpl->tpl_vars['msgError']->value) {?>
    <div class="alert-danger"><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
