<?php echo Form::open(Request::current()) ?>

	<dl>
		<dt><?php echo Form::textarea('commentary', $post['commentary'], array('class' => 'rte')); if (isset($errors['commentary'])) echo '<div class="error">'.UTF8::ucfirst($errors['commentary']).'</div>' ?></dt>
	</dl>
	<dl>
		<dt class="submit">
			<?php echo Form::button('reply', __('Post reply')) ?>
		</dt>
	</dl>

<?php echo Form::close() ?>