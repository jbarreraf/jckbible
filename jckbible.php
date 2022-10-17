<?php
/*
	Plugin Name: (JCK) Santa Biblia
	Plugin URI: evangelica.class_alias
	Description: Biblia basada en el api bibliaapi.com
	Version:1.1
	Author: Juan Barrera Freire.
	Author URI:https://evangelica.cl
    License: GPL2
    Copyright 2020 evangelica.cl - Juan Barrera Freire
    
    v1.1: 
        - Mejora para desplegar código HTML.
        - Mejora gráfica en presentación de desplegables para elegir Versión, Libro y Capítulo en formatos desktop y mobile.
*/


defined('ABSPATH') or die("Bye bye");

define('JCKBIB_PATH',plugin_dir_path(__FILE__));
define('BIB_API_URI', 'https://api.biblia.com/v1/bible/content/') ;
// define('BIB_API_URI', 'https://api.biblia.com/v1/bible/content/RVR60.html?passage=') ;

$bibChapter = '';

/* Define el shortcode y lo asocia a una función */
add_shortcode('jck_bible_form', 'fnc_jck_bib_frm');
add_shortcode('jck_bib_chapter', 'getBibChapter');

require_once('include/jckbibstruct.php') ;
require_once('include/jckBibConst.php') ;

/** 
 * Función que pintará el formulario de la biblia.
 * 
 * @return string
 */
function fnc_jck_bib_frm() 
{
	// Carga esta hoja de estilo para poner más bonito el formulario
	wp_enqueue_style('css_aspirante', plugins_url('css/jckbib_style.css', __FILE__));
    wp_enqueue_script('js_select_enlazado', plugins_url('js/jckbiblefuncs.js', __FILE__));
	
	iniDataJS($_POST['bib_chapter']) ;

	echo '<form action="' . get_the_permalink() . '" method="post" id="frm_bible" class="frm_bible_form"">' ;
    echo '<div>' ;
	echo '  <div class="bib-sel-col">' ;
    echo '        <h2>Versi&oacute;n:</h2>' ;
	echo '		<select name="bib_version" id="bib_version" class="select-css">' ;

				$nMaxEle = count(BibleStruct::getBibVerNmt()) ;
				for ($nItem = 0; $nItem < $nMaxEle; ++$nItem)
				{

	echo '          <option value="'. BibleStruct::getBibVerNmt()[$nItem] . '"' ;

					if (sanitize_text_field($_POST['bib_version']) == BibleStruct::getBibVerNmt()[$nItem]) {
						echo 'selected' ;
					}
	echo '			>' .  BibleStruct::getBibVerNme()[$nItem] . '</option>' ;
				}
	echo '		</select>' ;
	echo '  </div>' ;
	echo '  <div class="bib-sel-col">' ;
	echo '      <h2>Libro:</h2>' ;
	echo '      <select name="bib_book" id="bib_book" class="select-css">';
	
				$nMaxEle = count(BibleStruct::getBksNmt()) ;
				for ($nItem = 0; $nItem < $nMaxEle; ++$nItem)
				{
	echo '  		<option value="' . $nItem . '" ';

					if ((int)sanitize_text_field($_POST['bib_book']) == $nItem) {
						echo 'selected' ;
					}
	echo '          >' . BibleStruct::getBksNme()[$nItem] . ' </option>';
				}
	echo '  	</select>' ;

	echo '  </div>' ;
	echo '    <div class="bib-sel-col">' ;
	echo '      <h2>Cap&iacute;tulo:</h2>' ;
	echo '		<select name="bib_chapter" id="bib_chapter"  class="select-css"></select>' ;
	echo '    </div>' ;
        
	echo '</div>' ;
	echo '<div>' ;
    echo '  <div class="bib-btn-col">' ;
	echo '        <h2>&nbsp</h2>' ;
	echo '        <button type="submit" value="btnBibSearch">Buscar</button>' ;
	echo '  </div>' ;
	echo '</div>' ;
	echo '</form>' ;

	getBibPassage(sanitize_text_field($_POST['bib_version']), sanitize_text_field($_POST['bib_book']), sanitize_text_field($_POST['bib_chapter']), '') ;

    return '';
}

function getBibPassage($strVersion, $strBook, $strChapter, $strVerse)
{
    global $bibChapter ;
    $htmlResponse = new DOMDocument();

	if ($strBook != '' AND $strChapter != '')
	{
		$bibapiuri = BIB_API_URI . $strVersion . '.html?passage=' . BibleStruct::getBksNmt()[(int)$strBook] . $strChapter . '&style=fullyFormattedWithFootnotes&key=' . BIB_API_KEY  ;
		
		$response = wp_remote_post($bibapiuri);
		$http_code = wp_remote_retrieve_response_code( $response );

		if ($http_code = '200')
		{
/*
			$htmlResponse->loadHTML(wp_remote_retrieve_body( $response ));
			$htmlResponse->getElementsByTagName('span')->item(0)->nodeValue = $strBook . ' ' . $strChapter ;
			$bibChapter = $htmlResponse->saveHTML();
*/			
			$bibChapter = wp_remote_retrieve_body( $response );

		}
	}
}

function getBibChapter()
{
    global $bibChapter ;
    return $bibChapter ;
}

function iniDataJS($strChp)
{
	echo
		'<script>
			var arrChp = [' ;
	$nMaxChp = count(BibleStruct::getBksCHp()) ;
	echo BibleStruct::getBksCHp()[0] ;

	for ($nChp = 1; $nChp < $nMaxChp; ++$nChp )
	{
		echo ', ' ;
		echo BibleStruct::getBksCHp()[$nChp] ;
	}

	echo '];' ;

	if (is_null($strChp))
	{
		$strChp = '0' ;
	}
	echo 'var selChp = ' . $strChp . ' ; ' ;
	
	echo '</script>' ;
	echo '' ;

}
?>