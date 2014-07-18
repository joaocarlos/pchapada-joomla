<?php
/**
 * @version		$Id: default.php 18062 2010-07-09 02:58:04Z infograf768 $
 * @package		Joomla.Site
 * @subpackage	Templates.atomic
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
<div id="login">
	<form action="index.php" method="post" id="form-login">
	<div id="login_input">
	<?php if ($params->get('greeting')) : ?>
		<div>
		<?php if($params->get('name') == 0) : {
			echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
		} else : {
			echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
		} endif; ?>
		</div>
	<?php endif; ?>
		<div class="logout-button">
			<input type="submit" name="Submit" class="btn btn-success" value="<?php echo JText::_('JLOGOUT'); ?>" />
		</div>
	
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</form>
</div>
<?php else : ?>
<div id="login">
	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="form-login" >
		<?php echo $params->get('pretext'); ?>
		<div>
			<fieldset class="input">
				<p id="form-login-username">
					<label for="modlgn_username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
					<input id="modlgn_username" type="text" name="username" class="inputbox"  class="span2" />
				</p>
				<p id="form-login-password">
					<label for="modlgn_passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
					<input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18"  />
				</p>
				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<p id="form-login-remember">
					<label for="modlgn_remember"><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?></label>
					<input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
				</p>
				<?php endif; ?>
				<div class="login-button">
					<input type="submit" name="Submit" class="btn btn-success" value="<?php echo JText::_('JLOGIN') ?>" />
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="user.login" />
					<input type="hidden" name="return" value="<?php echo $return; ?>" />
				</div>
			<?php echo JHtml::_('form.token'); ?>
			</fieldset>
		</div>
		<ul>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
				<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
			</li>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
				<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
			</li>
			<?php
			$usersConfig = JComponentHelper::getParams('com_users');
			if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
					<?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a>
			</li>
			<?php endif; ?>
		</ul>
		<?php echo $params->get('posttext'); ?>
	</form>
</div>
<?php endif; ?>