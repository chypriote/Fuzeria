<?php $this->assign('title', 'Connexion'); ?>
<main id="login" class="col-sm-6 col-sm-offset-3">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User', array('class' => 'sky-form')); ?>
		<header class="reg-header">  
			<h1 class="login-form">Connexion</h1>
      <h1 class="register-form">Inscription</h1>
		</header>
		<fieldset>
  		<div class="input-group">
  			<span class="input-group-addon"><i class="fa fa-user"></i></span>
  			<?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control', 'label' => false)); ?>
  		</div>
		</fieldset>
    <fieldset class="register-form">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <?php echo $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Adresse email', 'class' => 'form-control', 'label' => false, 'div' => false, 'required' => 'required')); ?>
      </div>
    </fieldset>
		<fieldset>
			<div id="password-field" class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mot de passe', 'class' => 'form-control', 'label' => false)); ?>
			</div>
      <div class="checkbox pull-left login-form">
        <input type="checkbox" name="data[User][rememberMe]" id="UserRememberMe" checked=""><i></i> Rester connecté
      </div>
			<div class="note pull-right login-form">
				<?php echo $this->Html->link('Mot de passe oublié ?', ['controller' => 'users', 'action' => 'forgot_password'], array('class' => 'modal-opener')); ?>
			</div>
		</fieldset>
    <fieldset class="register-form">
      <div id="checkpass-field" class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <?php echo $this->Form->input('password_confirmation', array('type' => 'password', 'placeholder' => 'Confirmation', 'class' => 'form-control', 'label' => false, 'required' => 'required')); ?>
      </div>
    </fieldset>
		<footer class="clearfix">
      <button class="rounded btn-u pull-left login-form" id="create_account">S'Inscrire</button>
      <button class="rounded btn-u pull-left register-form" id="login_account">Déjà un compte ?</button>
			<button class="rounded btn-u pull-right login-form" type="submit">Se connecter</button>
      <span class="register-form"><?php if($use_captcha == 1) echo $ayah->getPublisherHTML(); ?></span>
      <button class="rounded btn-u pull-right register-form" type="submit">S'inscrire</button>
		</footer>
	<?php echo $this->Form->end(); ?>
</main>


<script>
$(document).ready(function(){
  $('#create_account').click(function(){
    $('.login-form').hide();
    $('.register-form').show();
    $('#UserLoginForm').attr('action', '/extaz/inscription').attr('id', 'UserSignupForm');
  });
  $('#login_account').click(function(){
    $('.login-form').show();
    $('.register-form').hide();
    $('#UserLoginForm').attr('action', '/extaz/connexion').attr('id', 'UserLoginForm');
  });
});
</script>