<?php
/**
 * @version		$Id: default.php 17130 2010-05-17 05:52:36Z eddieajau $
 * @package		Joomla.Site
 * @subpackage	Templates.beez5
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$templateparams =$app->getTemplate(true)->params;
if ($templateparams->get('html5')!=1)
{
	require(JPATH_BASE.'/components/com_content/views/categories/tmpl/default.php');
	//evtl. ersetzen durch JPATH_COMPONENT.'/views/...'
} else {
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="categories-list<?php echo $this->pageclass_sfx;?>">
	<h2>Lista de Categorias</h2>
	<div class="info-text">
		Esta página apresenta uma lista de todas as <strong>Categorias</strong> presentes no sistema.
		A partir dela é possível navegar por todo conteúdo do <strong>Portal da Chapada Diamantina</strong>.
		Escolha uma das opções abaixo para exibir uma lista de <strong>subcategorias</strong> (se existir),
		uma lista de <strong>artigos</strong> relacionados, ou uma apresentação dos artigos publicado
		no Portal.
	</div>
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<?php if ($this->params->get('show_base_description')) : ?>
	<?php 	//If there is a description in the menu parameters use that; ?>
		<?php if($this->params->get('categories_description')) : ?>
			<?php echo  JHtml::_('content.prepare',$this->params->get('categories_description')); ?>
		<?php  else: ?>
			<?php //Otherwise get one from the database if it exists. ?>
			<?php  if ($this->parent->description) : ?>
				<div class="category-desc">
					<?php  echo JHtml::_('content.prepare', $this->parent->description); ?>
				</div>
			<?php  endif; ?>
		<?php  endif; ?>
<?php endif; ?>
<?php
echo $this->loadTemplate('items');
?>
</div>
<?php } ?>