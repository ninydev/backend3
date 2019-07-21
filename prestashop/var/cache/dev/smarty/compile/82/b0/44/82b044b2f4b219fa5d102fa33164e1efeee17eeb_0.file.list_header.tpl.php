<?php
/* Smarty version 3.1.33, created on 2019-07-19 18:37:23
  from '/var/www/clients/client1/web20/web/prestashop/admin613o3wyrs/themes/default/template/controllers/attributes_groups/helpers/list/list_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d31e3b3d9bf33_52282024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82b044b2f4b219fa5d102fa33164e1efeee17eeb' => 
    array (
      0 => '/var/www/clients/client1/web20/web/prestashop/admin613o3wyrs/themes/default/template/controllers/attributes_groups/helpers/list/list_header.tpl',
      1 => 1562348418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d31e3b3d9bf33_52282024 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10383612155d31e3b3d9b463_98034404', 'leadin');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/list/list_header.tpl");
}
/* {block 'leadin'} */
class Block_10383612155d31e3b3d9b463_98034404 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'leadin' => 
  array (
    0 => 'Block_10383612155d31e3b3d9b463_98034404',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() {
			$(location.hash).click();
		});
	<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'leadin'} */
}
