<?php 

if(!headers_sent()) header("content-Type: text/html; charset=UTF-8");


echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" xmlns:media="http://search.yahoo.com/mrss/"
	>

	<?php

 define ('ORUMCEK', true );	
	
require_once('globaldefine.php');
require_once(ROOT_DIR . '/includes/init.php');

require(ROOT_DIR . '/uye/lang/'.$ayar['dil'].'.php');
if ($ayar['rssacik']==0) {
	echo $lang['rsskapali'];
	die();
} ?>

	
<channel>
<title><?php echo $ayar['sitebaslik'] ?></title>
<link><?php echo $websiteURL ?></link>
<description><?php echo $ayar['description'] ?></description>
<lastBuildDate><?php echo date('d/m/Y - H:i:s'); ?></lastBuildDate>

<?php 

$query = "SELECT baslik,seobaslik, tarih, resim, aciklama from oyunlar where aktif=1 order by idno DESC limit ".$ayar['rsssayisi'];

$query_count += 1;								
$result = $db->get_results($query);
foreach ($result as $row) {	
	 $tarihim = substr($row->tarih,6,2).'/'.substr($row->tarih,4,2).'/'.substr($row->tarih,0,4); ?>

<item>
	<title><?php echo fromDB($row->baslik); ?></title>
	<link><?php echo $websiteURL.'/'.fromDB($row->seobaslik).'.html' ?></link>
	<pubDate><?php echo fromDB($row->tarih); ?></pubDate>
	<image>
		<url><?php echo fromDB($row->resim) ?></url>
		<title><?php echo fromDB($row->baslik); ?></title>
		<link><?php echo $websiteURL.'/'.fromDB($row->seobaslik).'.html' ?></link>
	</image>
	<description><![CDATA[<a href="<?php echo $websiteURL.'/'.fromDB($row->seobaslik).'.html' ?>"></link><img src="<?php echo fromDB($row->resim); ?>" width="139px" height="105px"></a><br /><?php echo fromDB($row->aciklama); ?>]]></description>

</item>
<?php } ?>
</channel>
</rss>