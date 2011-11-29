<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $title ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
	$js  = Kohana::list_files('media/js');
	$css = Kohana::list_files('media/css');

	foreach(array_keys($js) as $file)
	{
		echo HTML::script(str_replace('\\', '/', $file));
	}

	foreach(array_keys($css) as $file)
	{
		echo HTML::style(str_replace('\\', '/', $file));
	}
?>
	</head>
	<body><?php echo $content ?></body>
</html>