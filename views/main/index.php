<h1><?php echo __('Think of it as some kind of news or article') ?></h1>

<p><?php echo ('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here", making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum" will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).') ?></p>
<p><?php echo __('The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.') ?></p>

<?php echo HTML::anchor(Route::get('default')->uri(array('controller' => 'main', 'action' => 'reply')), __('Post reply'), array('rel' => 'boxed')) ?>
<div id="commentaries">
<?php echo View::factory('main/widget/commentaries')->bind('commentaries', $commentaries) ?>
</div>