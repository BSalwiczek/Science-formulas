/**
 * Copyright (c) 2007-2015 Ariel Flesler - aflesler ○ gmail • com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 2.1.3
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});

$(document).ready(function(){

	$('.scrollup').click(function() { $.scrollTo($('body'), 1000); });

	$(window).scroll(function(){

		if($(this).scrollTop()>300 && $( window ).width()>800) $('.scrollup').fadeIn();
		else $('.scrollup').fadeOut();

		if($(document).scrollTop() < 160 && $(document).scrollTop() > 100)
		{
			$("#nav").hide();
			$("#emptyNav").css({
				"height": "60px"
			})
		}
		if($(document).scrollTop() < 100)
		{
			$("#nav").show();
			$("#emptyNav").css({
				"height": "0px"
			})
		}	

		if($(document).scrollTop() > 160)
		{
			$("#nav").css({
				"position":"fixed",
				"top" : "0",
				"height":"30px",
				"-webkit-box-shadow":" -1px -5px 29px 1px rgba(0,0,0,0.75)",
				"-moz-box-shadow": "-1px -5px 29px 1px rgba(0,0,0,0.75)",
				"box-shadow": "1px -5px 29px 1px rgba(0,0,0,0.75)"
			})
			$(".SubjectButton").css({
				"font-size": "20px",
				"height": "18px",
				"padding-top": "2px"
			})
			$("#languageButton").css({
				"display": "none"
			})
			$("#registerButton").css({
				"display": "none"
			})
			$("#NavSearchForm").css({
				"display": "none"
			})
			$("#loginButton").css({
				"font-size": "22px"
			})
			$("#nav").fadeIn(300);
		}else
		{

			$("#nav").css({
			"position":"static",
			"height":"60px",
			})
			$(".SubjectButton").css({
				"font-size": "30px",
				"height": "40px",
				"padding-top": "10px"
			})
			$("#languageButton").css({
				"display": "block"
			})
			$("#registerButton").css({
				"display": "block"
			})
			$("#loginButton").css({
				"font-size": "25px"
			})
			$("#NavSearchForm").css({
				"display": "block"
			})
		
		}
	})
})