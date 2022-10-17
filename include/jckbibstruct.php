<?php
/** 
 *	Class Name: BibleStruct
 *	Description: Clase que contiene la estructura base de cada libro de la biblia
 *					- Nombre nemotecnico: Nombre para la invocación de la API
 *					- Nombre presentación: Nombre que se mostrará al usuario
 *					- Total Capítulo: Por cada libro, el último capítulo
 *	Version:1.0
 *	Author: Juan Barrera Freire.
 *  License: GPL2
 *  Copyright 2019 IEDP Conchalí - Juan Barrera F.
 */




defined('ABSPATH') or die("Bye bye");

class BibleStruct {
	private static $arrBibVerNmt = array('RVR60', 'RVA', 'KJV') ;

	private static $arrBibVerNme = array('Reina Valera 1960', 'Reina Valera Actualizada', 'King James (Ingl&eacute;s)') ;

	private static $arrBksNmt = array(
	'genesis', 'exodus', 'leviticus', 'numbers', 'deuteronomy', 'joshua', 'judges', 'ruth', '1samuel', '2samuel',
	'1kings', '2kings','1chronicles', '2chronicles', 'ezra', 'nehemia', 'esther', 'job', 'psalms', 'proverbs', 'ecclesiastes','song',
	'isaiah', 'jeremiah', 'lamentations', 'ezekiel', 'daniel', 'hosea', 'joel', 'amos', 'obadiah', 'jonah', 'micah', 'nahum', 'habakkuk',
	'zephaniah', 'haggai', 'zechariah', 'malachi',
	'matthew', 'mark', 'luke', 'john', 'acts', 'romans', '1corinthians', '2corinthians', 'galatians',
	'ephesians', 'philippians', 'colossians', '1thessalonians', '2thessalonians', '1timothy', '1timothy', 'titus', 'philemon',
	'hebrew', 'james', '1peter', '2peter', '1john', '2john', '2john', 'jude', 'revelation'
	) ;
	private static $arrBksNme = array(
	'G&eacute;nesis', '&Eacute;xodo', 'Lev&iacute;tico', 'N&uacute;meros', 'Deuteronomio', 'Josu&eacute;', 'Jueces', 'Ruth', '1ra Samuel', '2da Samuel',
	'1a de Reyes', '2a de Reyes', '1a de Cr&oacute;nicas', '2a de Cr&oacute;nicas', 'Esdras', 'Nehem&iacute;as', 'Ester', 'Job', 'Salmos', 'Proverbios', 'Eclesiast&eacute;s', 'Cantar de los Cantares',
	'Isa&iacute;as', 'Jerem&iacute;as', 'Lamentaciones', 'Ezequiel', 'Daniel', 'Oseas', 'Joel', 'Am&oacute;s', 'Abd&iacute;as', 'Jon&aacute;s', 'Miqueas', 'Nahum', 'Habacuc',
	'Sofon&iacute;as', 'Hageo', 'Zacar&iacute;as', 'Malaqu&iacute;as',
	'San Mateo', 'San Marcos', 'San Lucas', 'San Juan', 'Hechos de los Ap&oacute;stoles', 'Romanos', '1a de Corintios', '2a de Corintios', 'G&aacute;latas',
	'Efesios', 'Filipenses', 'Colosenses', '1a de Tesalonicenses', '2a de Tesalonicenses', '1a de Timoteo', '2a de Timoteo', 'Tito', 'Filem&oacute;n',
	'Hebreos', 'Santiago', '1a de Pedro', '2a de Pedro', '1a de Juan', '2a de Juan', '3a de Juan', 'Judas', 'Apocalipsis'
	) ;

	private static $arrBksChp = array(
	50, 40, 27, 36, 34, 24, 21, 4, 31, 24,
	22, 25, 29, 36, 10, 13, 10, 42, 150, 31, 12, 8,
	66, 52, 5, 48, 12, 14, 3, 9, 1, 4, 7, 3, 3,
	3, 2, 14, 4,
	28, 16, 24, 21, 28, 16, 16, 13, 6,
	6, 4, 4, 5, 3, 6, 4, 3, 1, 
	13, 5, 5, 3, 5, 1, 1, 1, 22
	) ;

	public static function getBibVerNmt(){
		return self::$arrBibVerNmt ;
	}

	public static function getBibVerNme(){
		return self::$arrBibVerNme ;
	}

	public static function getBksNmt(){
		return self::$arrBksNmt ;
	}

	public static function getBksNme(){
		return self::$arrBksNme ;
	}
	
	public static function getBksChp(){
		return self::$arrBksChp ;
	}
	
}


?>