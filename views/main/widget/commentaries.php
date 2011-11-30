<?php foreach($commentaries as $commentary): ?>
<dl>
	<?php echo View::factory('main/widget/commentary')->bind('commentary', $commentary) ?>
</dl>
<?php endforeach ?>