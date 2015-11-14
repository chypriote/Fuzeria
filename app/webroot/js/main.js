$(document).ready(function(){
	// Formulaire de connexion/inscription
  $('#create_account').click(function(){
    $('.login-form').hide();
    $('.register-form').show();
    $('#UserLoginForm').attr('action', '/extaz/inscription').attr('id', 'UserSignupForm');
  });
  $('#login_account').click(function(){
    $('.login-form').show();
    $('.register-form').hide();
    $('#UserSignupForm').attr('action', '/extaz/connexion').attr('id', 'UserLoginForm');
  });

	// Changement d'input pour le formulaire add ticket
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