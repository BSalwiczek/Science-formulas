function replaceLink(lang)
{
	var link = window.location.href;

	var linkToGo = "";
	if(lang==0)
	{
		linkToGo = link.replace("/pl/","/en/");
		linkToGo = checkLink(linkToGo);
		if(linkToGo.indexOf('cont') != -1)
			linkToGo = linkToGo+"&en=true";
		else
			linkToGo = linkToGo+"?en=true";
	}else
	{
		linkToGo = link.replace("/en/","/pl/");
		linkToGo = checkLink(linkToGo);
		if(linkToGo.indexOf('cont') != -1)
			linkToGo = linkToGo+"&pl=true";
		else
			linkToGo = linkToGo+"?pl=true";
	}
	
	window.location.href = linkToGo;
}

function checkLink(link)
{
	if(link.indexOf('?en=true')!= -1)
	{ 
		link = link.replace("?en=true","");
	}else (link.indexOf('?pl=true')!= -1)
	{
		link = link.replace("?pl=true","");
	}
	
	if(link.indexOf('&en=true')!= -1)
	{ 
		link = link.replace("&en=true","");
	}else (link.indexOf('&pl=true')!= -1)
	{
		link = link.replace("&pl=true","");
	}
	
	return link;
}
