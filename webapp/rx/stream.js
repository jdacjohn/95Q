function listenLive() {
	var browser=navigator.appName;
	if (browser=="Netscape") {
		window.open("/listenLive_ns.html", "95QLive", "width=220,height=60,status=yes,toolbar=no,top=200,left=400");	
	} else {
		window.open("/listenLive.html", "95QLive", "width=220,height=200,status=yes,toolbar=no,top=200,left=400");
	}
}
