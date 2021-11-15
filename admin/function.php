<?php
function kisalt($metin, $uzunluk){
// substr ile belirlenen uzunlukta kesiyoruz
		$metin = substr($metin, 0, $uzunluk)."...";
// kesilen metindeki son kelimeyi buluyoruz
		$metin_son = strrchr($metin, " ");
// son kelimeyi " ..." ile değiştiriyoruz
		$metin = str_replace($metin_son," ...", $metin);

		return $metin;
} ?>
