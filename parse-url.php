<?php
if(!headers_sent()) header("content-Type: text/html; charset=UTF-8");


if (! defined ( 'ORUMCEK' )) {
	die ( "Yavaaş :) / Hacking attempt! - Erişmek istediğiniz dosya: " . basename(__FILE__ )  );}

	$sef="";	
	$lastsef ="";
	
if ( isset($_GET['url'])) {

	$url = $_GET['url'];
	$par = array_filter( explode("/",$url) );
	$lastsef = $par[count($par)-1];
}	

if (!isset($show_tpl)) {
	$show_tpl = 'main';
}

	if ($show_tpl == 'main') { 

		
	$query = "SELECT gc.*, oyunlar.idno, oyunlar.seobaslik, kategoriler.idno kategoriidno, kategoriler.seobaslik kategoriseobaslik from game_categories gc, oyunlar, kategoriler 
				WHERE oyunlar.seobaslik = '" . escapeString($db->escape($lastsef)) . "'
				 AND 
				 gc.game_id = oyunlar.idno AND kategoriler.idno = gc.category_id";
	$row = $db->get_row($query);
	if ( $db->num_rows != 0 ) {

		if ($ayar['oyunoncesiaciklama']==0) { 
			$smarty->assign("is_game",'1');
			$show_tpl="play"; 
		//	$oyunbilgimi=0;
		} else {
		
		
				$oyunseflink = str_replace("%id%",fromDB($row->idno),	$ayar['oyunbilgitemeli']);
				$oyunseflink = str_replace("%baslik%",fromDB($row->seobaslik),	$oyunseflink);
				$oyunseflink = str_replace("%kategori%",fromDB($row->kategoriseobaslik),	$oyunseflink);
				
				if ( $url == str_replace(".html","",$oyunseflink) ) {
					$smarty->assign("is_game_info",'1');
					$show_tpl="game-info";
			//		$oyunbilgimi=1;	
				} else {
				
					$smarty->assign("is_game",'1');
					$show_tpl="play"; 
			//		$oyunbilgimi=0;
				
				}
		
		
			
		}
		
		$sef =  $lastsef;
	
	
	} else {
	
		$query = "SELECT idno kategoriidno, seobaslik kategoriseobaslik from kategoriler WHERE seobaslik = '" . escapeString($db->escape($lastsef)) . "'";
		$row = $db->get_row($query);
		if ( $db->num_rows != 0 ) {
		
				$kategoriseflink = str_replace("%id%",fromDB($row->kategoriidno),	$ayar['kategoritemeli']);
				$kategoriseflink = str_replace("%baslik%",fromDB($row->kategoriseobaslik),	$kategoriseflink);
			
				if ( $url == str_replace(".html","",$kategoriseflink) ) {
		
					$smarty->assign("is_category",'1');
					$show_tpl="category"; 
					$sef =  $par[1] ;
				}  else {
				
					$query = "SELECT idno, permaetiket from etiketler WHERE permaetiket = '" . escapeString($db->escape($lastsef)) . "'";
						$row = $db->get_row($query);
						if ( $db->num_rows != 0 ) {
						
								$etiketseflink = str_replace("%id%",fromDB($row->idno),	$ayar['etikettemeli']);
								$etiketseflink = str_replace("%baslik%",fromDB($row->permaetiket),$etiketseflink);
								if ( $url == str_replace(".html","",$etiketseflink) ) {
									$smarty->assign("is_tag",'1');
									$show_tpl="tag"; 
									$sef =  $par[1];
								}
						}
					
				
				
				}
				
		}  else {
		
			$query = "SELECT idno, permaetiket from etiketler WHERE permaetiket = '" . escapeString($db->escape($lastsef)) . "'";
			$row = $db->get_row($query);
			if ( $db->num_rows != 0 ) {
			
					$etiketseflink = str_replace("%id%",fromDB($row->idno),	$ayar['etikettemeli']);
					$etiketseflink = str_replace("%baslik%",fromDB($row->permaetiket),$etiketseflink);
					if ( $url == str_replace(".html","",$etiketseflink) ) {
						$smarty->assign("is_tag",'1');
						$show_tpl="tag"; 
						$sef =  $par[1];
					}
			} else {
					
				if ( $lastsef !="") {
					header( 'Location:' . siteadres . '/404.php');
					exit();
				}
			
			}
		
		
		}
	
	}
	
	 }
	 
	


?>