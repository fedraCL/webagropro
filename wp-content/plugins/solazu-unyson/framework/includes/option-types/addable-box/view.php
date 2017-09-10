<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * @var string $id
 * @var  array $option
 * @var  array $data
 * @var  array $controls
 * @var  array $box_options
 */

$attr = $option['attr'];
unset($attr['name']);
unset($attr['value']);

// generate controls html
{
	ob_start(); ?>
	<small class="slz-option-box-controls">
		<?php foreach ($controls as $c_id => $control): ?>
			<small class="slz-option-box-control-wrapper"><a href="#" class="slz-option-box-control" data-control-id="<?php echo esc_attr($c_id) ?>" onclick="return false"><?php echo $control ?></a></small>
		<?php endforeach; ?>
	</small>
	<?php $controls_html = ob_get_clean();
}

if ($option['sortable']) {
	$attr['class'] .= ' is-sortable';
}

$attr['class'] .= ' width-type-'. $option['width'];

if (!empty($data['value'])) {
	$attr['class'] .= ' has-boxes';
}
?>
<div <?php echo slz_attr_to_html($attr); ?>>
	<!-- Fixes https://github.com/ThemeFuse/Unyson/issues/1278#issuecomment-208032542 -->
	<?php echo slz()->backend->option_type('hidden')->render($id, array('value' => '~'), array(
		'id_prefix' => $data['id_prefix'],
		'name_prefix' => $data['name_prefix'],
	)); ?>
	<?php $i = 0; ?>
	<div class="slz-option-boxes metabox-holder">
		<?php foreach ($data['value'] as $value_index => &$values): ?>
			<?php $i++; ?>
			<div class="slz-option-box" data-name-prefix="<?php echo slz_htmlspecialchars($data['name_prefix'] .'['. $id .']['. $i .']') ?>" data-values="<?php echo slz_htmlspecialchars(json_encode($values)) ?>">
				<?php ob_start() ?>
				<div class="slz-option-box-options slz-force-xs">
					<?php
					echo slz()->backend->render_options($box_options, $values, array(
						'id_prefix'   => $data['id_prefix'] . $id .'-'. $i .'-',
						'name_prefix' => $data['name_prefix'] .'['. $id .']['. $i .']',
					));
					?>
				</div>
				<?php
				echo slz()->backend->render_box(
					$data['id_prefix'] . $id .'-'. $i .'-box',
					'&nbsp;',
					ob_get_clean(),
					array(
						'html_after_title' => $controls_html,
						'attr' => array(
							'class' => 'slz-option-type-addable-box-pending-title-update',
						),
					)
				);
				?>
			</div>
		<?php endforeach; unset($values); ?>
	</div>
	<br class="default-box-template slz-hidden" data-template="<?php
		/**
		 * Place template in attribute to prevent it to be treated as html
		 * when this option will be used inside another option template
		 */

		$values = array();

		// must contain characters that will remain the same after htmlspecialchars()
		$increment_placeholder = '###-addable-box-increment-'. slz_rand_md5() .'-###';

		echo slz_htmlspecialchars(
			'<div class="slz-option-box" data-name-prefix="'. slz_htmlspecialchars($data['name_prefix'] .'['. $id .']['. $increment_placeholder .']') .'">'.
				slz()->backend->render_box(
					$data['id_prefix'] . $id .'-'. $increment_placeholder .'-box',
					'&nbsp;',
					'<div class="slz-option-box-options slz-force-xs">'.
						slz()->backend->render_options($box_options, $values, array(
							'id_prefix'   => $data['id_prefix'] . $id .'-'. $increment_placeholder .'-',
							'name_prefix' => $data['name_prefix'] .'['. $id .']['. $increment_placeholder .']',
						)).
					'</div>',
					array(
						'html_after_title' => $controls_html,
					)
				).
			'</div>'
		);
	?>">
	<div class="slz-option-boxes-controls">
		<?php
		echo slz_html_tag('button', array(
			'type'    => 'button',
			'onclick' => 'return false;',
			'class'   => 'button slz-option-boxes-add-button',
			'data-increment' => ++$i,
			'data-increment-placeholder' => $increment_placeholder,
			'data-limit' => intval($option['limit']),
		), slz_htmlspecialchars($option['add-button-text']));
		?>
	</div>
</div>