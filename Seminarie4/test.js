
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
                    document.cookie = "user=" + data.userid;
                    console.log(document.cookie);

                    /*$("#commentform").append("<form id='storecomment' action='/Recipes/store-entry.php' method='post'>",
                        "<div>",
                            "<label for='entry'>" + data.userid + "</label>",
                        "</div>",
                        "<div>",
                            "<input type='text' name='comment' size='100'/>",
                        //<textarea rows = 5 cols = 50 name='comment' placeholder='Write your comment here.'></textarea>-->
                        "</div>",
                        "<div>",
                            "<input type='submit' value='Send'/>",
                        "</div>",
                        "</form>");*/

                    $("#loginform").hide();
                    $("#logoutform").show();
                    $("#signin").hide();
                    //$("#comments").remove();
                    $('.user').remove();
                    $(".comment").remove();
                    $(".deleteEntry").remove();
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

                document.cookie = document.cookie = 'user=; Max-Age=-99999999;';
                //document.cookie = document.cookie = 'username=; Max-Age=-99999999;';
                //document.cookie = document.cookie = 'PHPSESSID=; Max-Age=-99999999;';
                console.log(document.cookie);
                $("#loginform").show();
                $("#logoutform").hide();
                $("#signin").show();
                //$("#comments").remove();
                $('.user').remove();
                $(".comment").remove();
                $(".deleteEntry").remove();
                $("#storecomment").remove();



            });
        event.preventDefault();
    });


    $('#storecomment').submit(function(event) {
        var formData = {
            'comment': $("textarea[name=comment]").val()
        };
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: '../Recipes/store-entry.php', // the url where we want to POST
            data: formData,
            encode: true

        })

            .done(function () {
                $('.user').remove();
                $(".comment").remove();
                $(".deleteEntry").remove();





            });
        event.preventDefault();
    });


    $('#comments').on("click", '.deleteEntry', function(event) {
        var id = $(event.target).attr('id');
        console.log(id);
        console.log('hej');
        event.preventDefault();
        $.ajax({
            type: "GET",
            url: '../Recipes/delete-entry.php?id=' + id, // the url where we want to POST
            data: {id: id}
        })
            .done(function () {
                $('.user').remove();
                $(".comment").remove();
                $(".deleteEntry").remove();

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
            var x = getCookie("user");
            if (recipe == c[key]['recipeid']){
                var commentid = c[key]['commentid'];
                $("#comments").append("<div class='user' style='color: blue'>" + c[key]['username'] + "</div>",
                    "<div class='comment' style='border: 1px solid black; width: 50%; height: auto'>" + c[key]['comment'] + "</div>");
                if (x == c[key]['username']){
                    $("#comments").append("<a id='" + commentid + "' class='deleteEntry' style='color: black' href='delete-entry.php?id=" +
                        commentid + "'>Delete</a>");
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