<?php
/* Smarty version 3.1.33, created on 2019-07-19 18:30:36
  from '/var/www/clients/client1/web20/web/prestashop/themes/classic/templates/catalog/_partials/product-additional-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d31e21c105a31_38843314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c7dc48195950eef73cf374b79dca9e4b796dfea' => 
    array (
      0 => '/var/www/clients/client1/web20/web/prestashop/themes/classic/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1562348421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d31e21c105a31_38843314 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-additional-info">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

</div>
<?php }
}
