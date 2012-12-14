<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<title>
		<? echo $title; ?>
	</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<?
		foreach ($styles as $file => $type) 
			echo HTML::style($file, array('media' => $type)), "\n";
		foreach ($scripts as $file) 
			echo HTML::script($file), "\n";
	?>
</head>
<body>
	<!-- title bar  -->
	<div>
		<div id="title">
			<img class="left" src="/assets/images/logo.png"/>
			<span class="sans-serif headline"><? echo $title; ?></span>
		</div>
	</div>
	<!-- end title bar -->
	
	<!-- info bar -->
	<div id="infobar">
		<a href="#" ajax="previous" class="icon semi-big icon-space-top">&lt;</a>
		<a href="#" ajax="next" class="negative-left-margin-2 icon semi-big icon-space-top">=</a>
		<a href="#" ajax="dashboard" class="sans-serif small">Home</a>
		<span id="category-description">Lorem Ipsum dolor sit amet</span>
	</div>
	<!-- end info bar -->
	
	<!-- nav & content -->
	<div class="colmask leftmenu">
		<div class="colleft">
			<div id="content" class="col1 sans-serif normal dark-gray normal-lh"> <!-- right -->
				<? echo $content; ?>
			</div>
			<div class="col2" id="navmenu"> <!-- left -->
				<span class="sans-serif uppercase very-small gray">navigate to:</span>
				<ul class="sans-serif">
					<li><a href="#" ajax="dashboard" class="big bold">Dashboard<span class="icon right very-big">=</span></a></li>
					<li><a href="#" ajax="templates">Templates</a></li>
					<li><a href="#" ajax="structures">Structures</a></li>
					<li><a href="#" ajax="articles">Articles</a></li>
					<li><a href="#" ajax="file_manager">File Manager</a></li>
					<li><a href="#" ajax="user">User</a></li>
					<li><a href="#" ajax="system">System</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end nav & content -->
	
	<!-- -->
	<div id="bottombar">
		<span class="sans-serif small">&copy; 2012 Thomas Lack</span>
	</div>
	<!-- -->
</body>
</html>