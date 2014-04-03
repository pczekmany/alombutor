<?php
$index_html = new html_blokk;
$menu = filter_input(INPUT_GET, 'menu');

$galeria = '
<a href="termekkepek/reka_sarok.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/reka_sarok.jpg" alt="" />
</a>
<div class="highslide-caption">
    <div id="kepfelirat">Réka első képe<br />(1/3)</div>
    <a href="#" onclick="return hs.next(this)" class="controlleft">
    <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
    </a>
    <a href="#" onclick="return hs.previous(this)" class="controlright">
    <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
    </a>
</div>

<a href="termekkepek/roma_sar_kon.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/roma_sar_kon.jpg" alt="" />
</a>
<div class="highslide-caption">
    <div id="kepfelirat">Réka második képe<br />(2/3)</div>
    <a href="#" onclick="return hs.next(this)" class="controlleft">
    <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
    </a>
    <a href="#" onclick="return hs.previous(this)" class="controlright">
    <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
    </a>
</div>

<a href="termekkepek/romakonh.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/romakonh.jpg" alt="" />
</a>
<div class="highslide-caption">
    <div id="kepfelirat">Icuka harmadik képe<br />(3/3)</div>
    <a href="#" onclick="return hs.next(this)" class="controlleft">
    <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
    </a>
    <a href="#" onclick="return hs.previous(this)" class="controlright">
    <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
    </a>
</div>';

$array = array('galeria' => $galeria);

if ($menu){
   $tartalom = $index_html->load_template_file("sablonok/".$menu.".html", $array);}
else {	
   $tartalom = $index_html->load_template_file("sablonok/cimlap.html", $array);
}	