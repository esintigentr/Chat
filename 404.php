<?php
if(!headers_sent()) header("content-Type: text/html; charset=UTF-8");


	define ('ORUMCEK', true );
	require_once( dirname(__FILE__) . '/globaldefine.php');
	require_once(ROOT_DIR . '/includes/init.php');
	require('lang/'.$ayar['dil'].'.php');

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $websitelang['118'] ?></title>

<style type="text/css">

body { 
background-color:#fff; 
margin:60px;
font-family:"Comic Sans MS", cursive, sans-serif; 
font-size:12px;
color:#000;
}

.content  {
text-align:center;
border:				#000 1px solid;
background-color:	#fff;
padding:			20px;
}

h1 {
font-weight:		bold;
font-size:			14px;
color:				#990000;
}
</style>

</head>
<body>

<div class="content">
	<strong><?php echo $websitelang['118'] ?><br/><br/></strong>
		<script type="text/javascript">
	  var GOOG_FIXURL_LANG = 'tr';
	  var GOOG_FIXURL_SITE = $websiteURL;
	</script>
	<script type="text/javascript"
	  src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js">
	</script>
</div>

</body>
</html>
