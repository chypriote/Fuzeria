
// Changement d'input pour le formulaire add ticket
$(function() {
	$('#PagesType').change(function(){
		var type = $('#PagesType').val();
		if(type == 'report'){
			$('#priority').hide();
			$('#report_input').show();
			$('#PagesMessage').attr('placeholder', 'Raison du signalement');
		}
		else{
			$('#priority').show();
			$('#report_input').hide();
			$('#PagesMessage').attr('placeholder', 'Votre question/message');
		}
	});
});