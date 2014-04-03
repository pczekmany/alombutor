<?php
$index_html = new html_blokk;
$menu = filter_input(INPUT_GET, 'menu');

$galeria = '
<a href="termekkepek/ujtermek_kep.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/ujtermek_kep.jpg" alt="" />
</a>
<div class="highslide-caption">
    <div id="kepfelirat">Icuka első képe<br />(1/3)</div>
    <a href="#" onclick="return hs.next(this)" class="controlleft">
    <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
    </a>
    <a href="#" onclick="return hs.previous(this)" class="controlright">
    <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
    </a>
</div>

<a href="termekkepek/akciostermek_kep.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/akciostermek_kep.jpg" alt="" />
</a>
<div class="highslide-caption">
    <div id="kepfelirat">Icuka második képe<br />(2/3)</div>
    <a href="#" onclick="return hs.next(this)" class="controlleft">
    <img src="graphics/next_sz.png" border="0" alt="következő" title="következő" />
    </a>
    <a href="#" onclick="return hs.previous(this)" class="controlright">
    <img src="graphics/back_sz.png" border="0" alt="előző" title="előző" />
    </a>
</div>

<a href="termekkepek/akciostermek_kep.jpg" class="highslide" onclick="return hs.expand (this, {dimmingOpacity: 0.90})">
    <img src="termekkepek/akciostermek_kep.jpg" alt="" />
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