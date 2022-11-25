<?php
require_once "SadGouseController.php";

class InfoGouseController extends SadGouseController {
    
    public $template="_infoFirstEx.twig";

    public function getContext():array{

        $context=parent::getContext();

        
        $context['section1'] = '/info';
        $context['text'] = "Описание по-настоящему грустного гуся, потерявшего товарища";
        $context['text1'] = "Грустный гусь целыми днями глядит на своё отражение в авто после смерти друзей

        Необычная и грустная история разыгралась в садовом центре Западного Суссекса в Великобритании. Там посетители центра обнаружили грустного гуся, который целыми днями глядит на своё отражение в припаркованных автомобилях и грустит по своим умершим друзьям.
        
        Раньше в садовом центре гусей было три, и они были любимцами завсегдатаев этого центра, однако не так давно две другие птицы скончались от старости и гусь остался в одиночестве. Теперь, видимо, он воспринимает своё отражение как нового товарища и проводит с ним всё время сутки напролёт.
        
        — Сначала мы не могли понять, почему он целый день смотрит на своё отражение, но потом поняли, что это происходит, вероятно, потому что ему грустно, — рассказывает Куртенэ Ласкомб, владелец садового центра.
        
        Он также добавил, что гусь предпочитает глядеть в своё отражение на чёрных машинах, так как в них его лучше видно.
        
        — Мы теперь не знаем, что делать. Мы могли бы попытаться найти ему ещё нескольких друзей, но опасаемся, что они ему не понравятся и от этого не будет никакой пользы, — говорит Ласкомб. — Мы просто хотим, чтобы он был счастлив. Если бы кто-нибудь захотел его забрать к себе, мы были бы очень рады, однако мы не хотим, чтобы он стал чьим-то рождественским ужином.

        По сей день грустный гусь часами стоит возле чёрных автомобилей и глядит на своего товарища в отражении.";



        return $context;
    }


    
}