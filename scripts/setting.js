// 	$(document).ready(function()
// 		{
// 			function ajaxFileUpload()
// { 
// 	$.ajaxFileUpload
// 	(
// 		{
// 			url:'/user/upload', 
// 			secureuri:false,
// 			fileElementId:'fileToUpload',
// 			dataType: 'json',
// 			success: function (data, status)
// 			{
// 				alert(data.error_message);
// 				$('#profileImage').attr('src', data.image_address);
// 				if(typeof(data.error) != 'undefined')
// 				{
// 					if(data.error != '')
// 					{
// 						alert(data.error);
// 					}
// 					else
// 					{
// 						alert(data.msg);
// 					}
// 				}
// 			},
// 			error: function (data, status, e)
// 			{
// 				alert(e);
// 			}
			
// 		}
// 	);
// 	return false;
// };
// 			$('#upload').click(
// 				function()
// 				{
// 					ajaxFileUpload();
// 				}
// 			);
            
//             $('#detail-form').submit(function() { 
//                             // submit the form 
//                             $(this).ajaxSubmit(); 
//                             // return false to prevent normal browser submit and page navigation 
//                             return false; 
//                         });
            
//             $('#password-form').submit(function() { 
//                 // submit the form 
//                 $(this).ajaxSubmit(); 
//                 // return false to prevent normal browser submit and page navigation 
//                 return false; 
//             });
            
// 		});