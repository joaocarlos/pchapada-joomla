<?php
/**
 * @version		$Id: default.php 17137 2010-05-17 07:00:07Z infograf768 $
 * @package		Joomla.Site
 * @subpackage	Templates.beez5
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcut to parameters.
$params = $this->item->params;

if ($templateparams->get('html5') != 1) :
	require(JPATH_BASE.'/components/com_content/views/article/tmpl/default.php');
	//evtl. ersetzen durch JPATH_COMPONENT.'/views/...'

else :
	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>

<article class="item-page<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>

<?php if ($this->params->get('show_page_heading', 1) And $params->get('show_title')) :?>
<hgroup>
<?php endif; ?>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<?php if ($params->get('show_title')) : ?>
		<h2>
			<?php echo $this->escape($this->item->title); ?>
		</h2>
<?php endif; ?>
<?php if ($this->params->get('show_page_heading', 1) And $params->get('show_title')) :?>
</hgroup>
<?php endif; ?>

<?php if ($params->get('access-edit') ||  $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
		<ul class="actions">
		<?php if (!$this->print) : ?>
				<?php if ($params->get('show_print_icon')) : ?>
				<li class="print-icon">
						<?php echo JHtml::_('icon.print_popup',  $this->item, $params); ?>
				</li>
				<?php endif; ?>

				<?php if ($params->get('show_email_icon')) : ?>
				<li class="email-icon">
						<?php echo JHtml::_('icon.email',  $this->item, $params); ?>
				</li>
				<?php endif; ?>
				<?php if ($this->user->authorise('core.edit', 'com_content.article.'.$this->item->id)) : ?>
						<li class="edit-icon">
							<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
						</li>
					<?php endif; ?>
		<?php else : ?>
				<li>
						<?php echo JHtml::_('icon.print_screen',  $this->item, $params); ?>
				</li>
		<?php endif; ?>
		</ul>
<?php endif; ?>

	<?php  if (!$params->get('show_intro')) :
		echo $this->item->event->afterDisplayTitle;
	endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>

<?php $useDefList = (($params->get('show_author')) OR ($params->get('show_category')) OR ($params->get('show_parent_category'))
	OR ($params->get('show_create_date')) OR ($params->get('show_modify_date')) OR ($params->get('show_publish_date'))
	OR ($params->get('show_hits'))); ?>

<?php if ($useDefList) : ?>
 <div class="article-info">
 <!--<dt class="article-info-term"><strong><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></strong></dt>-->
<?php endif; ?>
<?php if ($params->get('show_create_date')) : ?>
		<div class="create">
			<strong>Criado em: </strong>
		<?php 
		echo JText::sprintf(JHtml::_('date',$this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
		</div>
<?php endif; ?>
<?php if ($params->get('show_parent_category') && $this->item->parent_slug != '1:root') : ?>
		<div class="parent-category-name">
			<?php 	$title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_parent_category') AND $this->item->parent_slug) : ?>
				<?php //echo JText::sprintf('COM_CONTENT_PARENT', $url); 
					echo JText::sprintf($url);
				?>
				<?php else : ?>
				<?php //echo JText::sprintf('COM_CONTENT_PARENT', $title); 
					echo JText::sprintf($title);
				?>
			<?php endif; ?>
		</div>
<?php endif; ?>
<?php if ($params->get('show_category')) : ?>
		<div class="category-name">
			<?php 	$title = $this->escape($this->item->category_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
			<?php if ($params->get('link_category') AND $this->item->catslug) : ?>
				<?php //echo JText::sprintf('COM_CONTENT_CATEGORY', $url); 
				echo JText::sprintf($url);?>
				<?php else : ?>
				<?php //echo JText::sprintf('COM_CONTENT_CATEGORY', $title); 
				echo JText::sprintf($title);?>
			<?php endif; ?>
		</div>
<?php endif; ?>
<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<div class="createdby">
		<?php $author =  $this->item->author; ?>
		<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>

			<?php if (!empty($this->item->contactid ) &&  $params->get('link_author') == true):?>
				<strong>Autor: </strong>
				<?php 	echo JHtml::_('link',JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid),$author); ?>
			<?php else :?>
				<strong>Autor: </strong>			
				<?php echo JText::sprintf($author); ?>
			<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($useDefList) : ?>
 </div>
 	<div class="article">
<?php endif; ?>

	<?php if (isset ($this->item->toc)) : ?>
		<?php echo $this->item->toc; ?>
	<?php endif; ?>

	<?php echo $this->item->text; ?>

	<?php echo $this->item->event->afterDisplayContent; ?>
<?php if ($useDefList) : ?>
	</div>
<?php endif; ?>	
	<?php if ($useDefList) : ?>
	<div class="publish">
		<dl class="article-info publish">
	<?php if ($params->get('show_publish_date')) : ?>
			<dd class="published">
			<em><?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE', JHtml::_('date',$this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>,</em>
			</dd>
	<?php endif; ?>		
	<?php if ($params->get('show_modify_date') && $this->item->modified > $this->item->publish_up) : ?>
			<dd class="modified">
			<?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date',$this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
			</dd>
	<?php endif; ?>
	<?php if ($params->get('show_hits')) : ?>
			<dd class="hits">
			<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
			</dd>
		</dl>
	</div>	
	<?php endif; ?>
<?php endif; ?>	
</article>

<?php endif; ?>