$(document).ready(function()
{
	$('#top-new-message button.primary').click(function()
		{
			alert($(this).parent().prev().children('textarea:first').val());
		}
	);
});