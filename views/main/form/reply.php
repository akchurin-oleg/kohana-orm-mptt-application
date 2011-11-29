<?php echo Form::open(Request::current()) ?>

	<dl>
		<dt><?php echo Form::textarea('comment', $post['comment'], array('class' => 'rte')); if (isset($errors['comment'])) echo '<div class="error">'.UTF8::ucfirst($errors['comment']).'</div>' ?></dt>
	</dl>
	<dl>
		<dt class="submit">
			<?php echo Form::button('reply', __('Post reply')) ?>
		</dt>
	</dl>

<?php echo Form::close() ?>