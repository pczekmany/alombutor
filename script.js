AC_FL_RunContent = 0;
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}



function divdisp_on(id){

	if (id == 'logindiv'){
		document.getElementById('logindiv').style.display = 'block';
	}
	
	if (id == 'admin_termekadatlap' || id == 'admin_termekfotok' || id == 'admin_termekforum' || id == 'admin_termekdokumentumok'){
		document.getElementById('admin_termekadatlap').style.display = 'none';
		document.getElementById('admin_termekfotok').style.display = 'none';
		document.getElementById('admin_termekforum').style.display = 'none';
		document.getElementById('admin_termekdokumentumok').style.display = 'none';
		document.getElementById('kepfeltolt').style.display = 'none';
		document.getElementById('dokfeltolt').style.display = 'none';
	}
	
	if (id == 'penztar_kosarx' || id == 'penztar_vasarlox' || id == 'penztar_fizetesx'){
		document.getElementById('penztar_kosar').style.color = '#ee3224';
		document.getElementById('penztar_kosar').style.backgroundColor = '#ffffff';
		document.getElementById('penztar_vasarlo').style.color = '#ee3224';
		document.getElementById('penztar_vasarlo').style.backgroundColor = '#ffffff';
		document.getElementById('penztar_fizetes').style.color = '#ee3224';
		document.getElementById('penztar_fizetes').style.backgroundColor = '#ffffff';
		document.getElementById('penztar_kosarx').style.display = 'none';
		document.getElementById('penztar_vasarlox').style.display = 'none';
		document.getElementById('penztar_fizetesx').style.display = 'none';
	}
	
	if (id == 'admin_cikkadatlap' || id == 'admin_cikkszoveg' || id == 'admin_cikktermek'){
		document.getElementById('admin_cikkadatlap').style.display = 'none';
		document.getElementById('admin_cikkszoveg').style.display = 'none';
		document.getElementById('admin_cikktermek').style.display = 'none';
	}
	
	if (id == 'admin_termekfotok'){document.getElementById('kepfeltolt').style.display = 'block';}
	if (id == 'admin_termekdokumentumok'){document.getElementById('dokfeltolt').style.display = 'block';}
	
	if (id == 'penztar_kosarx'){
		document.getElementById('penztar_tovabb').style.display = 'block';
		document.getElementById('penztar_vissza').style.display = 'none';
	}
	
	if (id == 'penztar_vasarlox'){
		document.getElementById('penztar_tovabb').style.display = 'block';
		document.getElementById('penztar_vissza').style.display = 'block';
	}
	
	if (id == 'penztar_fizetesx'){
		document.getElementById('penztar_tovabb').style.display = 'none';
		document.getElementById('penztar_vissza').style.display = 'block';
		vasarlo_check();
		}
	
	document.getElementById(id).style.display = 'block';
	
	var newStr = id.substring(0, id.length-1);
	document.getElementById(newStr).style.color = '#ffffff';
	document.getElementById(newStr).style.backgroundColor = '#ee3224';
	
}

function divdisp_off(id){

	if (id == 'logindiv'){
		document.getElementById('logindiv').style.display = 'none';
	}
	
	if (id==1){id = 'admin_termekadatlap';}
	if (id==2){id = 'admin_termekfotok';}
	document.getElementById(id).style.display = 'none';
	}
	
