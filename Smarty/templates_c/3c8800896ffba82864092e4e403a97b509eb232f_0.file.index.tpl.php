<?php
/* Smarty version 3.1.33, created on 2019-07-19 19:49:43
  from '/var/www/clients/client1/web20/web/Smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d31f4a72f7539_63575740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c8800896ffba82864092e4e403a97b509eb232f' => 
    array (
      0 => '/var/www/clients/client1/web20/web/Smarty/templates/index.tpl',
      1 => 1563554978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5d31f4a72f7539_63575740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>
    Hello World
</h1>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
