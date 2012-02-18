
$(function(){
	var url = window.location.toString();
	var segment = url.substring(url.lastIndexOf("#"));
	$("#user-setting-navs a[href=" + segment + "]").tab('show');
});
