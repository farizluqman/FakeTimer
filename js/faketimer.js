jQuery(".FakeTimerMain").each(function (el) {
    let $t = jQuery(this);
    let h = $t.attr('dataFakeTimerH');
    let m = $t.attr('dataFakeTimerM');
    let s = $t.attr('dataFakeTimerS');

    let id = $t.attr('id');
    let expiry = $t.attr('dataFakeTimerExpiry');

    let cookie_id = 'FakeTimerS_' + h + m + s + id;
    let time = FakeTimer_getCookie(cookie_id);

    console.log(h);
    time = h * 3600;
    time += m * 60;
    time += s * 1;

    if (time != "") {
    } else {
        FakeTimer_setCookie(cookie_id, time, expiry);
    }

    var countDownDate = moment()
        .add(time, 'seconds');


    var x = setInterval(function () {
        let diff = countDownDate.diff(moment());
        time = time - 1;
        FakeTimer_setCookie(cookie_id, time, expiry);
        if (diff <= 0) {
            clearInterval(x);
            // If the count down is finished, write some text
            $t.children('div.FakeTimerH').html('00');
            $t.children('div.FakeTimerM').html('00');
            $t.children('div.FakeTimerS').html('<span style="color: red">00</span>');
        } else {
            $t.children('div.FakeTimerH').html(moment.utc(diff).format("HH"));
            $t.children('div.FakeTimerM').html(moment.utc(diff).format("mm"));
            $t.children('div.FakeTimerS').html(moment.utc(diff).format("ss"));
        }

    }, 1000);
});

function FakeTimer_getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function FakeTimer_setCookie(cname, cvalue, exhours) {
    var d = new Date();
    d.setTime(d.getTime() + (exhours * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + JSON.stringify(cvalue) + ";" + expires + ";path=/";
}