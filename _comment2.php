<!DOCTYPE html>
<html lang=en>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset=utf-8>
<title>GKMS | <?PHP echo $tab ?></title>
<!-- Mobile specific metas -->
<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
<!-- Force IE9 to render in normal mode -->
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name=description content="GKMS Version 1.1">
<meta name=keywords content="GKMS">
<meta name=application-name content="GUNANUSA KPI MANAGEMENT SYSTEM">
<!-- Import google fonts - Heading first/ text second -->
<style>
    /* latin */
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Droid Sans'), local('DroidSans'), url(http://fonts.gstatic.com/s/droidsans/v6/s-BiyweUPV0v-yRb-cjciPk_vArhqVIZ0nv9q090hN8.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin */
@font-face {
  font-family: 'Droid Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(http://fonts.gstatic.com/s/droidsans/v6/EFpQQyG9GqCrobXxL-KRMYWiMMZ7xLd792ULpGE4W_Y.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/K88pR3goAWT7BTt32Z01mxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/RjgO7rYTmqiVp7vzi-Q5URJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/LWCjsQkB6EMdfHrEVqA1KRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/xozscpT2726on7jbcb_pAhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0370-03FF;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/59ZRklaO5bWGqF5A9baEERJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/u-WUoqrET9fUeobQW7jkRRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzK-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
  unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzJX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzBWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzKaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
  unicode-range: U+0370-03FF;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzP8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
  unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzD0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: local('Open Sans Bold'), local('OpenSans-Bold'), url(http://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzOgdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

    
    </style>
<!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- Css files -->
<link rel=stylesheet type=text/css href=assets/css/main.min.css>
<link rel="stylesheet" type=text/css href="assets/css/custom.css">
<!-- Fav and touch icons -->
<link rel=apple-touch-icon-precomposed sizes=144x144 href=assets/img/ico/apple-touch-icon-144-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=114x114 href=assets/img/ico/apple-touch-icon-114-precomposed.png>
<link rel=apple-touch-icon-precomposed sizes=72x72 href=assets/img/ico/apple-touch-icon-72-precomposed.png>
<link rel=apple-touch-icon-precomposed href=assets/img/ico/apple-touch-icon-57-precomposed.png>
<link rel=icon href=assets/img/ico/ico3.png type=image/png>
<!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
<meta name=msapplication-TileColor content=#3399cc>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	//##### send add record Ajax request to response.php #########
	$("#FormSubmit").click(function (e) {
			e.preventDefault();
			if($("#contentText").val()==='')
			{
				alert("Please enter some text!");
				return false;
			}
			
			$("#FormSubmit").hide(); //hide submit button
			$("#LoadingImage").show(); //show loading image
			
		 	var myData = 'content_txt='+ $("#contentText").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				$("#responds").append(response);
				$("#contentText").val(''); //empty text field on successful
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image

			},
			error:function (xhr, ajaxOptions, thrownError){
				$("#FormSubmit").show(); //show submit button
				$("#LoadingImage").hide(); //hide loading image
				alert(thrownError);
			}
			});
	});

	//##### Send delete Ajax request to response.php #########
	$("body").on("click", "#responds .del_button", function(e) {
		 e.preventDefault();
		 var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
		 var DbNumberID = clickedID[1]; //and get number from array
		 var myData = 'recordToDelete='+ DbNumberID; //build a post data structure
		 
		$('#item_'+DbNumberID).addClass( "sel" ); //change background of this element by adding class
		$(this).hide(); //hide currently clicked delete button
		 
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url: "response.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData, //Form variables
			success:function(response){
				//on success, hide  element user wants to delete.
				$('#item_'+DbNumberID).fadeOut();
			},
			error:function (xhr, ajaxOptions, thrownError){
				//On error, we alert user
				alert(thrownError);
			}
			});
	});

});
</script>
    </head>
    <body>

        <div class="panel panel-default plain panel-closed toggle showControls">
            <!-- Start .panel -->
            <div class="panel-heading white-bg" style="border-bottom: 1px solid #e4e9eb;">
              
              <ul class="chat-ui chat-messages chat-widget">
                <li class=chat-user>
                  <p class=avatar><img src=assets/img/avatars/support.png alt=@support></p>
                  <p class=chat-name>Administrator <span class=chat-time></span></p>
                  <p class=chat-txt>Using this form for your comments!</p>
                  <p class=chat-attach-file></p>
                </li>
              </ul>
            </div>
            <div class="panel-body p0">
              <ul class="chat-ui chat-messages chat-widget" id="responds">
                  <?php

                    $username = "root"; //mysql username
                    $password = "root"; //mysql password
                    $hostname = "localhost"; //hostname
                    $databasename = 'ajaxtest2'; //databasename
                    $port = '8889'; //port

                    //connect to database
                    $mysqli = new mysqli($hostname, $username, $password, $databasename, $port );

                    //MySQL query
                    $results = $mysqli->query("SELECT id,content FROM add_delete_record");
                    //get all records from add_delete_record table
                    while($row = $results->fetch_assoc())
                    {
                        echo '<li id="item_'.$row["id"].'" class=chat-user style="padding: 8px; border-bottom: 1px solid #e4e9eb;">';
                        echo '<p class=avatar><img src=assets/img/avatars/fm.png alt=@female></p>';
                        echo '<p class=chat-name>Sundari Sukoco <span class=chat-time>';
                        echo '<a href="#" class="del_button" id="del-'.$row["id"].'">X</a></span></p>';
                        //echo '<div class="del_wrapper">';
                        //echo '<img src="images/icon_del.gif" border="0" />';
                        //echo '</a></div>';
                        echo '<p class=chat-txt>'.$row["content"].'</p></li>';
                    }

                    //close db connection
                    $mysqli->close();
                ?>
              </ul>
            </div>
            <div class="panel-footer white-bg">
              <div class="chat-write chat-widget">
                <form action=# class=form-horizontal role=form>
                  <div class="form-group relative">
                    <textarea name="content_txt" id="contentText" class="form-control elastic" rows=1></textarea>
                    <div class="pull-right mt10"><a id="FormSubmit" class="btn btn-primary">Post</a></div>
                  </div>
                  <!-- End .form-group  -->
                </form>
              </div>
            </div>
          </div>
          <!-- End .panel -->
        </body>
    