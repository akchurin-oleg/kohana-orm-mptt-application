<?php $children = $commentary->children()->find_all()->as_array() ?>
<dt><span class="date"><?php echo $commentary->date ?></span></dt>
<dd>
<?php echo $commentary->commentary() ?>
<?php echo HTML::anchor(Route::get('default')->uri(array('controller' => 'main', 'action' => 'reply', 'id' => $commentary->pk())), __('Post reply'), array('rel' => 'boxed')) ?>
<?php if (sizeof($children) > 0): ?>
<?php echo View::factory('main/widget/commentaries')->bind('commentaries', $children) ?>
<?php endif ?>
</dd>