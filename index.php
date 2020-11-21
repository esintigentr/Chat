<?php
if(!headers_sent()) header("content-Type: text/html; charset=UTF-8");

/*
	ÖrümcekOyun - Ücretsiz Flash Oyun Scripti
	Copyright 2011 - http://www.orumcekoyun.com
	Bu yazılım tamamen ücretsizdir, Siz yazılımı Lisans şartlarına göre çoğaltabilir veya dağıtabilirsiniz. Ancak ticari amaçlar için kullanamazsınız.
	Bu yazılım hiçbir GARANTİ VERMEMEKTEDİR çünkü ücretsizdir.
*/

$begin = microtime(true); 
ob_start();
session_start();

@error_reporting ( E_ALL ^ E_WARNING ^ E_NOTICE );
@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_NOTICE );



define ('ORUMCEK', true );
define ( 'ROOT_DIR', dirname(__FILE__) );
$show_tpl = 'main';
$adminmi = 0;



if (!isset($sayfa)) { $sayfa=1;  }


require_once 'includes/init.php';


if (isset($_GET['ara']) ) { 

	$show_tpl = 'search';

 }


if (isset($_GET['n']) ) {
		if ($_GET['n']=="cikis" )  {

				$smarty->clearcache('index.tpl',$_COOKIE['ORUMCEK_MEMBER_ID'].$sayfa.$dil);
				setcookie ("ORUMCEK_MEMBER_ID", "0", time()-2592000,"/"); //2592000 sayısı 1 aya denk geliyor
				setcookie ("ORUMCEK_PASSWD", "0", time()-2592000,"/"); //2592000 sayısı 1 aya denk geliyor
				echo "<center><p>Lütfen Bekleyiniz / Please Wait!</p></center>";
							
							echo '<script type="text/javascript"><!--
								setTimeout("Redirect()",2000);
								function Redirect()
								{
								 location.href = "index.php";
								}
							// --></script>
							';
							exit();			
			}
			
				
		}

require_once(dirname(__FILE__) . '/fonksiyon.php');
require_once( INCLUDE_DIR . '/redirect.php');

ob_end_flush();

$end = microtime(true);
?>
<!-- Query Count: <?php echo $query_count ?> -->
<!-- Page Speed: <?php echo substr($end - $begin,0,5) ?> Seconds" -->
