<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php bloginfo('name'); wp_title(); ?></title>

    <meta name="description" content="Schroder Partners">
    <meta name="keywords" content="schroder, partners">
    <meta name="copyright" content="Copyright Schroder Partners 2010">
    <meta name="author" content="Author: Schroder Partners">
    <meta name="email" content="Email: suppport@anythingit.net">
    
    <meta name="Charset" content="UTF-8">
    <meta name="Distribution" content="Global">
    <meta name="Rating" content="General">
    <meta name="Robots" content="INDEX,FOLLOW">
    <meta name="Revisit-after" content="1 Day">
    <meta name="expires" content="never">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>

<body><div id="top"></div>
<div id="wrap"><div id="headerimg001"><a href="/"><img id="" src="<?php bloginfo('stylesheet_directory'); ?>/img/headerimg001.jpg" hspace="20" /></a></div>

<div id="header" >
<!-- <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1> -->
<p><strong><?php bloginfo('description'); ?></strong><br/></p>
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="860" height="158" align="middle" id="FlashID">
      <param name="movie" value="schroder_splash_da.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object data="schroder_splash_da.swf" type="application/x-shockwave-flash" width="860" height="158" align="middle">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object></td>
  </tr>
</table>

<?
$homepage = "/";
$currentpage = $_SERVER['REQUEST_URI'];
if($homepage==$currentpage) {
echo "";
}
else {
include 'navigation.php' ;
}
?>
<?php
if($homepage==$currentpage) {
?>
<div id="leftside">
  
  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Main Sidebar') ) : else : ?>
  
  <h2 class="hide">Main menu:</h2>
	<ul class="page"><?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
		<li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&post_date&depth=1&title_li='); ?><?php the_excerpt(); ?>
	</ul>

<?php endif; ?>

</div>
<?php 
	}
	else {
?>

<div id="leftsidewide">

</div>
<?php
	}
?>

<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
