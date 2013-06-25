//javascript

function tambahGambar(obj, data) {
	var arena = new Kinetic.Stage({
		container: "kontainer",
		width: document.getElementById("kontainer").offsetWidth,
		height: document.getElementById("kontainer").offsetHeight
	});	
	var dara = eval(data);
	
	var lembar = new Kinetic.Layer({
	});

	arena.add(lembar);	
	
	for (var i = 0; i < dara.length; i++) {
		var garis = new Kinetic.Line({
			stroke: dara[i][0][0],
			strokeWidth: dara[i][0][1],
			lineCap: "round",
			lineJoin: "round",
			points: dara[i][1]
		});
		lembar.add(garis);
	}
	lembar.draw();
	console.log(lembar);
	arena.toDataURL({ 
		callback: function(dataUrl) { 
			obj.insertAdjacentHTML("beforeEnd", "<img src='" + dataUrl + "' />");
			arena.remove();
		}
	});
}

window.onload = function() {
	var dlink = document.getElementsByClassName("linkgam");
	for (var i = 0; i < dlink.length; i++) {
		tambahGambar(dlink[i], dlink[i].getAttribute('dg'));
		dlink[i].setAttribute('dg','');
	}
	document.getElementById("kontainer").parentNode.removeChild(document.getElementById("kontainer"));
}