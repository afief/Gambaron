//javascript

var baseURL = "http://kurtek.upi.edu/laboratorium/games/gambaron/";

var arena;
var lembar;
var gariske = -1;
var argaris = new Array();
var tebalGaris = 5;
var warnaGaris = "#000";
var isMDown = false;
var keymap = new Array();
var ngambar = "";
var as;

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }

var hapuskey = 72;

function ambilDataURL() {
	arena.toDataURL({ 
		callback: function(dataUrl) { 
			as = dataUrl;
		}
	});
}

function unduh() {
	arena.toDataURL({ 
		callback: function(dataUrl) { 
			var nw = window.open('','Gambar Kamu','width=580,height=430'); 
			nw.document.write("klik kanan -> simpan gambar </br> <img src='" + dataUrl + "'>");
			nw.focus();
		}
	});
}

function unggah() {
	var datagaris = consoleGaris();
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var hasil = xmlhttp.responseText;
			if (hasil != '') {
				window.location.href = baseURL + "lihat/id/" + hasil;
			} else {
				alert("ada yang salah");
			}
		}
	}
	
	if (ngambar != "") {
		xmlhttp.open("POST",baseURL + "unggah",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("ngambar=" + ngambar + "&dgambar=" + datagaris);
	} else {
		alert("belum diberi nama");
		document.getElementById("inama").focus();
	}
}

function consoleGaris() {
	var dafgaris = lembar.get('.garis');
	var ss = "[";
	dafgaris.forEach( function(dg) {
		var dgp = dg.getPoints();
		var dgh = new Array();
		dgp.forEach(function(val) {
			dgh.push(val.x);
			dgh.push(val.y);
		});
		ss = ss + "[['" + dg.getStroke() + "'," + dg.getStrokeWidth() + "],[" + dgh + ']],';
	});
	ss = ss.substr(0, ss.length-1);
	ss = ss + "]";
	return ss;
}

function hapusSemua() {
	var gk = lembar.get(".garis");
	gk.forEach(function(e) {
		e.remove();
	});
	isMDown = false;
	argaris.splice(0,argaris.length);
	lembar.draw();
}

function hapusgaris(ke) {
	var gk = lembar.get('#garis'+ke)[0];
	gk.remove();
	lembar.draw();
}

function gadown(e) { //garis mouseDown
	if (keymap.indexOf(hapuskey) >= 0) {
		e.shape.remove();
		lembar.draw();
	}
}

function mdown(e) {
	gariske++;
	var gbaru = new Kinetic.Line({
          points: [0,0],
          stroke: warnaGaris,
          strokeWidth: tebalGaris,
          lineCap: "round",
          lineJoin: "round",
          id: "garis"+gariske,
          name: "garis"
	});
	gbaru.on('mousedown', gadown);
	lembar.add(gbaru);
	isMDown = true;
}
function mmove(e) {
	if (isMDown && (keymap.indexOf(hapuskey) < 0)) {
		argaris.push(e.offsetX);
		argaris.push(e.offsetY);

		var gaktif = lembar.get('#garis'+gariske)[0];
		gaktif.setPoints(argaris);
		
		lembar.draw();
		//console.log(e.layerX, e.layerY);
	}
}
function mup(e) {
	isMDown = false;
	argaris.splice(0,argaris.length);
}

function kdown(e) {
	if (keymap.indexOf(e.keyCode) < 0) {
		keymap.push(e.keyCode);
	}
	
	if ((keymap.indexOf(17) >= 0) && (keymap.indexOf(90) >= 0)) {
	 if (lembar.get('#garis'+gariske).length > 0) {
		if (gariske >= 0) {
				isMDown = false;
				argaris.splice(0,argaris.length);
			hapusgaris(gariske);
			gariske--;
		} else {
			
		}
	 } else {
	 	gariske--;
	 }
	}
}
function kup(e) {
	if (e.keyCode == 27) {
		isMDown = false;
		argaris.splice(0,argaris.length);
	}
	while (keymap.indexOf(e.keyCode) >= 0) {
		keymap.splice(keymap.indexOf(e.keyCode), 1);
	}
}

function setPilihanWarna() {
	var konwar = document.getElementById("warna");
	var kotw = ['0','8','f'];
	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 3; j++) {
			for (var k = 0; k < 3; k++) {
				konwar.insertAdjacentHTML("beforeEnd", "<li class='war' style='background-color: #" + kotw[i] + kotw[j] + kotw[k] + ";'></li>");
			}
		}
	}
	var dwar = document.getElementsByClassName('war');
	for (var i = 0; i < dwar.length; i++) {
		dwar[i].addEventListener("click", function(e) {
			document.getElementById("jwarna").innerHTML = "Warna - " + e.currentTarget.style.backgroundColor;
			warnaGaris = e.currentTarget.style.backgroundColor;
		});
	}
}

window.onload = function() {

	document.getElementById("iloading").setAttribute("class","");
	document.getElementById("iloading").setAttribute("style","visibility: hidden;");	
	
	arena = new Kinetic.Stage({
		container: "kontainer",
		width: document.getElementById("kontainer").offsetWidth,
		height: document.getElementById("kontainer").offsetHeight
	});
	lembar = new Kinetic.Layer();
	arena.add(lembar);
	
	var bg = new Kinetic.Rect({
		x: 0,
		y: 0,
		width: arena.getWidth(),
		height: arena.getHeight(),
		fill: "#fff"
	});
	
	lembar.add(bg);
	lembar.draw();
	
	lembar.on("mousedown touchstart", mdown);
	lembar.on("mousemove touchmove", mmove);
	lembar.on("mouseup touchend", mup);
	
	document.getElementById("kontainer").addEventListener("mouseout", mup);
	document.body.addEventListener("keydown", kdown);
	document.body.addEventListener("keyup", kup);
	
	setPilihanWarna();
}
