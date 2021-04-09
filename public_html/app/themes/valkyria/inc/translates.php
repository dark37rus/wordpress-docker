<?php
//global $t_minute;
//$t_minute = '[:ru]минут[:en]minute[:]';
//
//global $t_descr_program_list;
//$t_descr_program_list = '[:ru]В данную программу входит[:en]This program includes[:]';
//
//global $t_order;
//$t_order = '[:ru]Записаться[:en]Sign up[:]';
//
//global $t_order_massage;
//$t_order_massage = '[:ru]Записаться на массаж[:en]
//Sign up for a massage[:]';
//
//global $t_slider_girls_title;
//$t_slider_girls_title = '[:ru]Девушки в этом образе[:en]
//Girls in this look[:]';
//
//global $t_more_photo;
//$t_more_photo = '[:ru]Хочу больше фото[:en]
//I want more photos[:]';
//
//global $t_get_stock;
//$t_get_stock = '[:ru]Получить скидку[:en]
//Get a discount[:]';
//
//global $t_recommended_programs_cards;
//$t_recommended_programs_cards = '[:ru]Рекомендуемые программы:[:en]Recommended programs:[:]';
//
//global $t_recommended_programs;
//$t_recommended_programs = '[:ru]Рекомендуемые программы в этом [:en]Recommended programs in this image:[:]';

function setChangeNameGirls($value) {
	$girls_field = $value;
	$girls_name  = '[:ru]Девушка[:en]Girl[:]';

	if ( $girls_field ) {
		if ( $girls_field > 1 ) {
			$girls_name = '[:ru]Девушки[:en]Girls[:]';
		} elseif ( $girls_field > 4 ) {
			$girls_name = '[:ru]Девушек[:en]Girls[:]';
		} else {
			$girls_name = '[:ru]Девушка[:en]Girl[:]';
		}

	}
	return $girls_name;
}

