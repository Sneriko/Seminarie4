
$(document).ready(function() {
    $('#loginform').submit(function(event) {
        var formData = {
            'username': $('input[name=username]').val(),
            'pwd': $('input[name=pwd]').val()
        };
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: "../Login/login.inc.php", // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })

            .done(function (data) {
                if (data.success) {
                    console.log(data);
                    document.cookie = "username=" + data.userid;
                    console.log(document.cookie);
                    $("#loginform").hide();
                    $("#logoutform").show();
                    $("#signin").hide();
                    $("#comments").remove();
                }
            });
        event.preventDefault();
    });




    $('#logoutform').submit(function(event) {
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: '../Logout/logout.inc.php', // the url where we want to POST
                encode: true

            })

                .done(function () {

                    // log data to the console so we can see

                    document.cookie = document.cookie = 'username=; Max-Age=-99999999;';
                    document.cookie = document.cookie = 'PHPSESSID=; Max-Age=-99999999;';
                    console.log(document.cookie);
                    $("#loginform").show();
                    $("#logoutform").hide();
                    $("#signin").show();
                    $("#comments").remove();



                });
            event.preventDefault();
        });


    $('#storecomment').submit(function(event) {
        var formData = {
            'comment': $('input[name=comment]').val()
        };
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: '../Recipes/store-entry.php', // the url where we want to POST
            data: formData,
            encode: true

        })

            .done(function () {
                console.log("hej");
                $("#comments").remove();



            });
        event.preventDefault();
    });


    $('.deleteEntry').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: '../Recipes/delete-entry.php', // the url where we want to POST
        })
            .done(function () {
                console.log('hej');

            });

    });



    $('#getcomments').submit(function(event) {

        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'getcomments.php', // the url where we want to POSTencode: true

        })
            .done(function (data) {
                console.log(document.cookie);
                var c = JSON.parse(data);
                showComments(c);
            });
        event.preventDefault();
    });

    function showComments(c) {
        var recipe = $_GET('id');
        for (key in c) {
            var x = getCookie("username");
            if (recipe == c[key]['recipeid']){
                var commentid = c[key]['commentid'];
                $("body").append("<div id='comments'></div>");
                $("#comments").append("<div style='color: blue'>" + c[key]['username'] + "</div>",
                "<div style='border: 1px solid black; width: 50%; height: auto'>" + c[key]['comment'] + "</div>");
                if (x == c[key]['username']){
                    $("#comments").append("<a class='deleteEntry' style='color: beige' href='delete-entry.php?id=" + commentid + "'>" +
                        "<button class='deleteEntry'style='background-color: beige'>Delete</button></a>");
                }
            }
        }
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
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

    function $_GET(q,s) {
        s = s ? s : window.location.search;
        var re = new RegExp('&'+q+'(?:=([^&]*))?(?=&|$)','i');
        return (s=s.replace('?','&').match(re)) ? (typeof s[1] == 'undefined' ? '' : decodeURIComponent(s[1])) : undefined;
    }

});