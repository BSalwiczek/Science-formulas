<?php 

function createComments($retToDB)
{

	if(isset($_GET['cont']))
		$contentID = $_GET['cont'];
	else if(isset($_SESSION['cont']))
	{
		$contentID = $_SESSION['cont'];
	}else 
	{
		header('Location: ../science-formulas');
	}

	$contentID = substr($contentID, 1);

	include_once($retToDB."setLang.php");

	echo "<br/>";

	if(isset($_SESSION['login']))
	{
		echo '<span style="font-size: 0.5em; margin-top: -10px;">'.$_SESSION['login'].' :</span></br>';
		setLangText('<textarea placeholder="Dodaj komentarz..." id="writeComment" data-autoresize wrap="hard" ></textarea>',
			'<textarea placeholder="Write a comment..." id="writeComment" data-autoresize ></textarea>');
		echo '<div style="clear:both"></div>';
		echo '<div id="publishButton">';setLangText('Publikuj','Publish');echo'</div>';

		echo '<script>
			$(document).ready(function(){
				$("#publishButton").click(function(){
					if($("textarea#writeComment").val() != "")
					{
						var str = $("textarea#writeComment").val();
						str = str.replace(/(?:\r\n|\r|\n)/g, "<br/>");
						$.post("php/addCom.php",{
							commentCon: str,
							contID: '.$contentID.',
							retToDB: "'.$retToDB.'" },function(data){
							$("#allComments").hide().html(data).fadeIn("1000");
						});
						
						newCommCont = "";
						$("textarea#writeComment").val("");
						$("textarea#writeComment").css("height","62");
						$("span#comNum").text(String(parseInt($("span#comNum").text())+1));
						
					}
				})
			}) 
		</script>';
	}
	else{
		echo '<span style="font-size: 23px;margin-bottom: 14px;display:block">';
		setLangText('<a href="login">Zaloguj się </a>by skomentować !',
			'<a href="login">Sign in </a> to write a comment !');
		echo '</span>';
		echo '<div style="clear:both"></div>';
		echo '<textarea placeholder="Sign in" id="writeComment" disabled style="margin-top: 10px" ></textarea>';
	}
	echo "<script>
	jQuery.each(jQuery('textarea[data-autoresize]'), function() {
	    var offset = this.offsetHeight - this.clientHeight;
	 
	    var resizeTextarea = function(el) {
	        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
	    };
	    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
	});
	</script>";

	
	$_SESSION['cont'] = $contentID;
	require_once("updateComments.php");

}

?>