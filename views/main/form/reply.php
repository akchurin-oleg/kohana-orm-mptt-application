<?php echo Form::open(Request::current()) ?>

	<dl>
		<dt><?php echo Form::textarea('commentary', $post['commentary'], array('class' => 'rte')); if (isset($errors['commentary'])) echo '<div class="error">'.UTF8::ucfirst($errors['commentary']).'</div>' ?></dt>
	</dl>
	<dl>
		<dt class="submit">
			<ul class="box-menu">
				<li><?php echo Form::button('reply', __('Post reply')) ?></li>
				<li><?php echo HTML::anchor('', __('Cancel'), array('class' => 'close')) ?></li>
			</ul>
		</dt>
	</dl>

<?php echo Form::close() ?>