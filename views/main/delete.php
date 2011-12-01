<p><?php echo __('You try to delete commentaries subtree. Are you sure?') ?></p>
<ul class="box-menu">
	<li><?php echo HTML::anchor(Route::get('default')->uri(array('controller' => 'main', 'action' => 'delete', 'id' => $commentary->pk())), __('Yes, I am sure')) ?></li>
	<li><?php echo HTML::anchor('', __('No, thanks'), array('class' => 'close')) ?></li>
</ul>