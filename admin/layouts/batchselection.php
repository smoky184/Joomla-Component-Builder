<?php
/**
 * @package    Joomla.Component.Builder
 *
 * @created    30th April, 2015
 * @author     Llewellyn van der Merwe <http://www.joomlacomponentbuilder.com>
 * @gitea      Joomla Component Builder <https://git.vdm.dev/joomla/Component-Builder>
 * @github     Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
 * @copyright  Copyright (C) 2015 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('JPATH_BASE') or die;

JHtmlBehavior::core();
$divWrapper = range(1,120,2);
$counter = 0;
?>
<?php if ($displayData->ListSelection) : ?>
<div class="row-fluid">
	<?php foreach ($displayData->ListSelection as $ListSelection) : ?>
    <div class="control-group span6">
    	<div class="controls">
		<label for="<?php echo $ListSelection['name']; ?>" class="element-invisible"><?php echo $ListSelection['label']; ?></label>
		<select name="<?php echo $ListSelection['name']; ?>" id="<?php echo $ListSelection['name']; ?>" class="span12 small">
			<?php if (!$ListSelection['noDefault']) : ?>
				<option value=""><?php echo $ListSelection['label']; ?></option>
			<?php endif; ?>
			<?php echo $ListSelection['options']; ?>
		</select>
      	</div>
	</div>
		<?php if (in_array($counter,$divWrapper)) : ?>
</div>
<div class="row-fluid">
		<?php endif; ?>
        <?php $counter++; ?>
	<?php endforeach; ?>
</div>
<div class="control-group radio" id="batch-move-copy">
	<div class="controls">
        <label class="radio" id="batch[move_copy]c-lbl" for="batch[move_copy]c">
        <input type="radio" value="c" id="batch[move_copy]c" name="batch[move_copy]"><?php echo JText::_('Copy'); ?></label>
        <label class="radio" id="batch[move_copy]m-lbl" for="batch[move_copy]m">
        <input type="radio" checked="checked" value="m" id="batch[move_copy]m" name="batch[move_copy]"><?php echo JText::_('Update'); ?></label>
    </div>
</div>
<?php endif; ?>