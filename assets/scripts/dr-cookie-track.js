//DR Cookie Track
//v1.0
var $ = require('jquery');
window.jQuery = window.$ = $;
var Cookies = require("js-cookie");

$(function() {
    readTrackNum();
    readCampaign();
    var TrackNumCookie = Cookies.get('TrackNum');
    if (TrackNumCookie) {
        $("span.tracknum").each(function() {
            $(this).html(TrackNumCookie.replace("%20", " "));
        });
        $('a[href^="tel:"]').each(function() {
            $(this).attr('href', 'tel:' + TrackNumCookie.replace(/[- )(]/g, ''));
        });
    }
    var CampaignCookie = Cookies.get('DRcampaign');
    if (CampaignCookie) {
        $("input[name='Campaign']").each(function() {
            $("<input type='hidden' />").attr('name', 'DRcampaign').val(CampaignCookie).insertAfter($(this));
        });
    }
});

function readTrackNum() {
    var TrackNum = getParameterByName('TrackNum');
    if (TrackNum) {
        Cookies.set('TrackNum', TrackNum, {
            expires: 7
        });
    }
}

function readCampaign() {
    var Campaign = getParameterByName('DRcampaign');
    if (Campaign) {
        Cookies.set('DRcampaign', Campaign, {
            expires: 7
        });
    }
}

function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
