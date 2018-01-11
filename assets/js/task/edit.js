$(function(){
	$('#attachmentEdit').click(function(e){
			$('#manageAttachment').toggleClass('invisible', $(this).is(':checked') == false);	
			$('#attachmentDownloadLink').toggleClass('invisible', $(this).is(':checked'));	
	});
}); 