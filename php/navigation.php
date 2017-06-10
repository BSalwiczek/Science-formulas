<?php
function createNav($pathToGoBack,$highlighted) 
{
	require_once($pathToGoBack.'setLang.php');

	echo'

<nav class="navbar navbar-default">
  <div class="fluid-container" id="navConteiner">
    <div class="navbar-header">
      <button type="button" id="navbarToggleBtn" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
	    <li class="dropdown" id="langDropdown">
	      <a class="dropdown-toggle moreLang" data-toggle="dropdown" href="#"><img src="img/world.png" /></a>
	      <ul class="dropdown-menu" id="languageMenu">
	         <li id="EngLang"><a href="#">English</a></li>
	         <li id="PlLang"><a href="#">Polski</a></li>';
	         echo '<script>
				$(document).ready(function(){

					$("#EngLang").click(function(){
						document.cookie = "Language=en";
						location.reload();
					})
					$("#PlLang").click(function(){
						document.cookie = "Language=pl";
						location.reload();
					})
				})
			</script>';echo'
	       </ul>
	    </li>
        <li class="SubjectBtn" id="MatBut"><a href="'.returnLangText('matematyka','math').'">';
			setLangText('Matematyka','Math');
	echo'</a></li>
        <li class="SubjectBtn" id="PhysBut"><a href="'.returnLangText('fizyka','physics').'">Physics</a></li>
        <li class="SubjectBtn" id="ChemBut"><a href="'.returnLangText('chemia','chemistry').'">Chemistry</a></li>

        <script>
        	$(window).ready(function(){
        		var highlighted ='.$highlighted.';
        		if(highlighted==1){
        			$("#MatBut").css({"background-color": "#F2F2F2"});
        			$("#MatBut>a").attr(\'style\', \'color: #53bf6b!important\');
        		}
        		else if(highlighted==2){
        			$("#PhysBut").css({"background-color": "#F2F2F2","color":"#53bf6b !important"});
        			$("#PhysBut>a").attr(\'style\', \'color: #53bf6b!important\');

        		}
        		else if(highlighted==3){
        			$("#ChemBut").css({"background-color": "#F2F2F2","color":"#53bf6b !important"});
        			$("#ChemBut>a").attr(\'style\', \'color: #53bf6b!important\');


        		}
        	})
        </script>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      ';

if (session_status() == PHP_SESSION_NONE) {
     session_start();
 	}

	$_SESSION['siteAfterLogin'] = $_SERVER['REQUEST_URI'];

	if(!isset($_SESSION['login']))
	{	
		echo'
		<li class="liSign"><a href="register" class="signLog"><span class="glyphicon glyphicon-user"></span><span style="display:inline-block;padding-left: 5px">';setLangText('Rejestracja','Sign Up');echo'</span></a></li>
    	<li class="liLog"><a href="login" class="signLog"><span class="glyphicon glyphicon-log-in"></span><span style="display:inline-block;padding-left: 5px">';setLangText('Zaloguj','Login');echo'</span></a></li>';
	}else
	{
		$logToSay = $_SESSION['login'];
		$len = strlen($logToSay);
		//$toAdd = -(($len*$len) /1.93);

		$logToSay = '<span style="display:inline-block;padding-left:5px">'.$logToSay.'</span>';

		echo'
		<li class="liSign"><a href="" class="signLog"><span class="glyphicon glyphicon-user"></span> '.$logToSay.'</a></li>
    	<li class="liLog"><a href="logout.php" class="signLog"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';



	}
 	echo'
     
      	
      </ul>
    </div>
  </div>
</nav>

<script>
var whenRes = function()
	  {
		if($(window).width()<880){
	    $("#langDropdown").hide();
	    $(".liSign").css({
	    	float: "left",
	    	"padding-left": "25%"
	    })
	    $(".liLog").css({
	    	float: "right",
	    	"padding-right": "25%"
	    })
	    $("#myNavbar").css({
	    	margin: "0 auto !important"
	    })
	    $("ul.navbar-left>li").last().css({
	    	"border-bottom":"1px solid #42ae5a"
	    })
	  	
	  }
	  else
	  {
	    $("#langDropdown").show();
	    $(".liSign").css({
	    	float: "left",
	    	"padding-left": "0"
	    })
	    $(".liLog").css({
	    	float: "left",
	    	"padding-right": "0"
	    })
	    $("ul.navbar-left>li").last().css({
	    	border: "none"
	    })
	  }
	}
	$(window).ready(whenRes);
	$(window).on(\'resize\',whenRes);

</script>


	';

//scroll up button

echo '<div class="scrollup"><img src="img/scroll_up.png" /></div>';

};


?>
