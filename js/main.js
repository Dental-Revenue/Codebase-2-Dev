
// Tracking script
var track = document.createElement("script");
track.src = "https://dentalrevenue.s3.amazonaws.com/track.js";
track.setAttribute("type", "module");
document.head.append(track);

jQuery(document).ready(function($) {

//JS Cookie
//v2.1.3
!function(a){var b=!1;if("function"==typeof define&&define.amd&&(define(a),b=!0),"object"==typeof exports&&(module.exports=a(),b=!0),!b){var c=window.Cookies,d=window.Cookies=a();d.noConflict=function(){return window.Cookies=c,d}}}(function(){function a(){for(var a=0,b={};a<arguments.length;a++){var c=arguments[a];for(var d in c)b[d]=c[d]}return b}function b(c){function d(b,e,f){var g;if("undefined"!=typeof document){if(arguments.length>1){if(f=a({path:"/"},d.defaults,f),"number"==typeof f.expires){var h=new Date;h.setMilliseconds(h.getMilliseconds()+864e5*f.expires),f.expires=h}try{g=JSON.stringify(e),/^[\{\[]/.test(g)&&(e=g)}catch(i){}return e=c.write?c.write(e,b):encodeURIComponent(e+"").replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),b=encodeURIComponent(b+""),b=b.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent),b=b.replace(/[\(\)]/g,escape),document.cookie=b+"="+e+(f.expires?"; expires="+f.expires.toUTCString():"")+(f.path?"; path="+f.path:"")+(f.domain?"; domain="+f.domain:"")+(f.secure?"; secure":"")}b||(g={});for(var j=document.cookie?document.cookie.split("; "):[],k=/(%[0-9A-Z]{2})+/g,l=0;l<j.length;l++){var m=j[l].split("="),n=m.slice(1).join("=");'"'===n.charAt(0)&&(n=n.slice(1,-1));try{var o=m[0].replace(k,decodeURIComponent);if(n=c.read?c.read(n,o):c(n,o)||n.replace(k,decodeURIComponent),this.json)try{n=JSON.parse(n)}catch(i){}if(b===o){g=n;break}b||(g[o]=n)}catch(i){}}return g}}return d.set=d,d.get=function(a){return d.call(d,a)},d.getJSON=function(){return d.apply({json:!0},[].slice.call(arguments))},d.defaults={},d.remove=function(b,c){d(b,"",a(c,{expires:-1}))},d.withConverter=b,d}return b(function(){})});

//DR Cookie Track
//v1.0
$(function(){readTrackNum();readCampaign();var TrackNumCookie=Cookies.get('TrackNum');if(TrackNumCookie){$("span.tracknum").each(function(){$(this).html(TrackNumCookie.replace("%20"," "));});$('a[href^="tel:"]').each(function(){$(this).attr('href','tel:'+TrackNumCookie.replace(/[- )(]/g,''));});}
var CampaignCookie=Cookies.get('DRcampaign');if(CampaignCookie){$("input[name='Campaign']").each(function(){$this=$(this);$("<input type='hidden' />").attr('name','DRcampaign').val(CampaignCookie).insertAfter($this);});}});function readTrackNum(){var TrackNum=getParameterByName('TrackNum');if(TrackNum){Cookies.set('TrackNum',TrackNum,{expires:3});}}
function readCampaign(){var Campaign=getParameterByName('DRcampaign');if(Campaign){Cookies.set('DRcampaign',Campaign,{expires:3});}}
function getParameterByName(name,url){if(!url){url=window.location.href;}
name=name.replace(/[\[\]]/g,"\\$&");var regex=new RegExp("[?&]"+name+"(=([^&#]*)|&|#|$)"),results=regex.exec(url);if(!results)return null;if(!results[2])return'';return decodeURIComponent(results[2].replace(/\+/g," "));}

// DR Form Processor 2.0
$(function(){$('form[action^="https://ws.dentalrevenue.com"]').on("submit",function(a){a.preventDefault();var e=$(this),n=0;if(!e.find("button").hasClass("disabled")){if(e.find(".invalid").removeClass("invalid"),e.find(".err").remove(),e.find("button").addClass("disabled"),e.find('[data-req="true"]').each(function(){var a=$(this);""==a.val()&&(a.addClass("invalid"),n++)}),$(".captcha-container").length){var s=$("#g-recaptcha-response").val();(!s||""==s)&&n++}var i=e.find('input[name="Name"]');i.length&&""==i.val()&&(i.addClass("invalid"),n++);var l=e.find('input[name="FirstName"]'),t=e.find('input[name="LastName"]');l.length&&(""==l.val()||""==t.val())&&(l.addClass("invalid"),t.addClass("invalid"),n++);var d=e.find('input[name="Phone"]'),r=e.find('input[name="EmailName"]');(d.length||r.length)&&""==d.val()&&""==r.val()&&(d.addClass("invalid"),r.addClass("invalid"),n++);var o=e.find('select[name="AdsNext-AreYouNewPatient"]');if(o.length&&"Select One"==o.val()&&(o.addClass("invalid"),o.prev().addClass("invalid"),n++),n>0){e.prepend('<p class="err">Please fill out all required form fields.</p>'),e.find("button").removeClass("disabled");return}var p=new FormData(this);p.append("api_key","6LcBtZUUAAAAALV5OTtYds1aaMjw-M_lAETu3mfc"),$(".captcha-container").length&&p.append("captchamode","simple"),$.ajax({type:"POST",url:"https://ws.dentalrevenue.com/ws/forms/postLead.aspx",cache:!1,data:p,crossDomain:!0,processData:!1,contentType:!1,success:function(a){if("error"===a.result)e.prepend('<p class="err">'+a.message+"</p>"),e.find("button").removeClass("disabled");else{var n=e.find('input[name="RedirectPageFullURL"]').val();window.location=n&&""!==n?n:"/"}},error:function(){e.prepend('<p class="err">Sorry, we had trouble processing the form. Please call our telephone number for assistance.</p>'),e.find("button").removeClass("disabled")}})}})});

console.log('main.js is connected.');

});


