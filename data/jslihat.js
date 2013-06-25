var arena;
var interf;
var baseURL = "http://kurtek.upi.edu/laboratorium/games/gambaron/";
var gid;

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 
function menjawab() {
	var jawaban = document.getElementById("inama").value;
	
	document.getElementById("iloading").setAttribute("class","iloading");
	document.getElementById("iloading").setAttribute("style","");
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var hasil = xmlhttp.responseText;
			if (hasil != '') {
				
					document.getElementById("iloading").setAttribute("class","");
					document.getElementById("iloading").setAttribute("style","visibility: hidden;");
					
				if (hasil == "benar") {
					alert("Benar!");
					window.location.href = document.URL;
				} else if (hasil == "salah") {
					alert("yah, masih salah!");
				} else {
					alert(hasil);
				}

			} else {
				alert("aya nu teu beres yeuh...");
			}
		}
	}
	
	xmlhttp.open("POST",baseURL + "main/jawab",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("gid=" + gid + "&nama=" + jawaban + "&jawab=ya");
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

	var ib = 0;
	var ik = 0;
	var artemp = new Array();
	var garis;
	if (datanya.length > 0) {
		interf = setInterval(function() {
			if (ik == 0) {
				garis = new Kinetic.Line({
					points: [0,0],
          		stroke: datanya[ib][0][0],
          		strokeWidth: datanya[ib][0][1],
          		lineCap: "round",
          		lineJoin: "round",
          		/*shadow: {
            		color: 'black',
            		blur: 5,
            		offset: [0,0],
            		opacity: 0.5
          		}*/
				});
				lembar.add(garis);
				artemp = [];
			}
		 	if (datanya[ib][1].length > ik) {
		 		artemp.push(datanya[ib][1][ik]);
		 		ik++;
		 		artemp.push(datanya[ib][1][ik]);
		 		ik++;
		 		garis.setPoints(artemp);
		 		lembar.draw();
		 	} else {
		 		if ((datanya.length-1) > ib) {
		 			ib++;
		 		} else {
					clearInterval(interf);
				}
		 		ik = 0;
		 	}
		} ,10);
	}
}

