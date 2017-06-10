function leadComm(id, lang){
	function setLangText(pl,en){
	if(lang == 'pl')
		return pl;
	else
		return en;
	}
	$(window).ready(function(){

		$(document).on('click', "#dele"+id+"", function (e) {
			var h = String(parseInt($(this.parentNode.parentNode).css("height"))) + "px";
			var w = String(parseInt($(this.parentNode.parentNode).css("width"))) + "px";
			var toGoUp = "-" + String(parseInt($(this.parentNode.parentNode).css("height")) - parseInt($(".comOptions").css("height"))) + "px";
			$(this.parentNode.parentNode).append("<div id='deleteBox' style='width: "+w+";height: "+h+";background-color: rgba(255,75,75,0.70); z-index: 5; margin-left: -16px;margin-top: "+toGoUp+";position: absolute; border: 1px solid rgba(255,75,75,0.70);text-align:center; border-radius: 5px'><div style='margin-top: 15px; z-index: 5; color: black; margin-bottom: 5px;font-size: 0.8em'>"+setLangText("Na pewno chcesz usunąć ten komentarz?", "Are you sure to delete this comment?")+"</div><div id='deleteYes"+id+"' class='deleteIt deleteOption'>"+setLangText("Tak", "Yes")+"</div><div id='deleteNo"+id+"' class='dontDelete deleteOption'>"+setLangText("Nie", "No")+"</div></div>");
		});
		$(window).on('resize',function(){
			$("#deleteBox").css("width",w+" !important;");
			$("#com"+id+">#deleteBox").css("latter-spacing","10px !important;");
		});
		$("#com"+id+">#deleteBox").css("latter-spacing","10px !important;");
		$(document).on('click', "#deleteYes"+id, function (e) {
			 $.post("php/deleteCom.php",{comID : id },function(data){
				$("#com"+id+"").fadeOut(500);
				$("#comNum").html(data);
			})
			
			
		});
		$(document).on('click', "#deleteNo"+id+"", function (e) {
			 $("#com"+id+" > #deleteBox").remove();
		});
		
		var inside = $("#com"+id+"> .comContent").html();
		$(document).on('click', "#edit"+id+"", function (e) {
			var inside = $("#com"+id+">.comContent").html();

				inside = inside.replace(/<br>/g,"\n");
			$("#com"+id+">.comContent").html("<textarea rows='5' cels='20' style='height:auto' wrap='hard' class='editCom' data-autoresize >"+inside+"</textarea>");
			var numOfLines = $("#com"+id+" > .comContent > textarea.editCom").attr("scrollHeight")/17;
			$("#com"+id+">.comOptions").html("<div class='row'><div class='editCancel col-sm-1' id='editCancel"+id+"'>"+setLangText("Anuluj","Cancel")+"</div><div class='editSave col-sm-1' id='editSave"+id+"'>"+setLangText("Zapisz","Save")+"</div></div>");
			
			
		});

		$(document).on('click', "#editCancel"+id+"", function (e) {
			 $("#com"+id+">.comContent").html(inside);
			 $("#com"+id+">.comOptions").html("<div class='optionAnswer' id='ans"+id+"'><img src='img/answer.png' class='optionsButton'/></div><div class='optionEdit' id='edit"+id+"'><img src='img/edit.png' class='optionsButton'/></div><div class='optionDelete' id='dele"+id+"'><img src='img/delete.png' class='optionsButton' /></div>");
		});

		$(document).on('click', "#editSave"+id+"", function (e) {
			var newCont = $("#com"+id+" > .comContent > textarea.editCom").val();
			if(newCont !== "" && newCont.replace(/(?:\r\n|\r|\n)/g, "") !== "")
			{
				newCont = newCont.replace(/(?:\r\n|\r|\n)/g, "<br/>");
			inside = newCont;
			 $.post("php/editCom.php",{comID :id,newContent: newCont },function(data){
				$("#com"+id+"").hide().fadeIn(500);
				$("#com"+id+" > .comContent").html(newCont);
				$("#com"+id+">.comOptions").html("<div class='optionAnswer' id='ans"+id+"'><img src='img/answer.png' class='optionsButton'/></div><div class='optionEdit' id='edit"+id+"'><img src='img/edit.png' class='optionsButton'/></div><div class='optionDelete' id='dele"+id+"'><img src='img/delete.png' class='optionsButton' /></div>");})
			}
			
		});
	})
}
