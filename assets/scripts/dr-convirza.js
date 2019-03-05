//DR Convirza
//v1.0
var $ = require('jquery');
window.jQuery = window.$ = $;
var Cookies = require("js-cookie");


$(document).ready(function(){
	//global.convirzaID is set via wp_localize_script in PHP in functions.php
	if(global.convirzaID.length > 0){
		if(!Cookies.get('TrackNum') || Cookies.get('TrackNum')==''){
			
			var script = document.createElement('script');
			script.onload = function () {
				function dniLoadingTimer() {
					if(typeof(getDNIRecord) == "function"){
						getDNIRecord(global.convirzaID, "dni.logmycalls.com");
			  	}else{
				  	setTimeout(dniLoadingTimer, 100);
			  	}
				}
				setTimeout(dniLoadingTimer, 100);
			};
			script.src = 'https://dni.logmycalls.com/dni.js?app_id=CT';
			document.head.appendChild(script);
			
		}
	}
});
