<?php
/* Smarty version 3.1.33, created on 2019-07-19 18:30:27
  from '/var/www/clients/client1/web20/web/prestashop/themes/classic/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d31e213eee031_20292137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13f2fb3b7292518b3270c7f0c5ecc4054b7dfb6f' => 
    array (
      0 => '/var/www/clients/client1/web20/web/prestashop/themes/classic/templates/index.tpl',
      1 => 1562348421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d31e213eee031_20292137 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11199333705d31e213eeb9b9_58822111', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_14903234795d31e213eebf83_09099036 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_8123233835d31e213eeccf0_70304835 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_13776252795d31e213eec7c4_86286500 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8123233835d31e213eeccf0_70304835', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_11199333705d31e213eeb9b9_58822111 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_11199333705d31e213eeb9b9_58822111',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_14903234795d31e213eebf83_09099036',
  ),
  'page_content' => 
  array (
    0 => 'Block_13776252795d31e213eec7c4_86286500',
  ),
  'hook_home' => 
  array (
    0 => 'Block_8123233835d31e213eeccf0_70304835',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14903234795d31e213eebf83_09099036', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13776252795d31e213eec7c4_86286500', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
