<?php 
if(!headers_sent()) header('content-Type: text/html; charset=UTF-8');
@session_start();

	define ('ORUMCEK', true );
	require_once( 'globaldefine.php');
	require_once(ROOT_DIR . '/includes/init.php');
	

	if (!isset(	$_GET['next_page_token'])) {
			echo($websitelang['165']);
			exit();
	}
	
	$pagenumber = intval( $_GET['pagenumber'] );
	$whr = 	$_GET['whr'];
	$next_page_token = 	$_GET['next_page_token'];

	if ($pagenumber == 0 ) { $pagenumber +=1; }

	if( $next_page_token != $_SESSION['next_page_token']) {
		echo($websitelang['165']);
		exit();
	}
	
	switch ($whr) {
		
	case "main" :
		$newgames = new newgames_class();
		$nextgames = $newgames->load($pagenumber);
		$returnstring ="";
		if ( count( $nextgames ) !=0 ) {
		
		
			$number=0;
			$number2=1;
		    
			
		
			foreach ($nextgames as $games) {
				if ( $games['baslik']!="" ) {
				$number = $number + 1;

					if ( $number2 == 1 ) {
						if ( $number == 21) {
							$number2 = $number2 + 1;
							$number=0;
							$returnstring .= '<li class="item_big">';

						} else {
							$returnstring .= '<li class="item">';
						}
					} else {
							if ( $number == 29 ) {
								$number2 = $number2 + 1;
								$number2=0;
								$number=0;
								$returnstring .= '<li class="item_big">';

							} else {
								$returnstring .= '<li class="item">';
							}
					}
							$returnstring .= '<img src="'.$games["resim"].'" alt="img">';
							$returnstring .= '<article class="da-animate da-slideFromRight" style="display: block;">';
							$returnstring .=	'<h3>'.$games["baslik"].'</h3>';
							$returnstring .=	'<em>'.$games["kategoribaslik"].'</em>';
							$returnstring .=	'<span class="link_post"><a href="'. siteadres.'/'.$games["sef"].'"></a></span>';
							$returnstring .=	'</article>';
							$returnstring .=	'</li>';
				
				
				
			}
			}
		}
			
		echo $returnstring;
		
	case "category" :
		break;
	case "tag" :
		break;
	case "search" :
		break;
	
	
	
	}
	
?>