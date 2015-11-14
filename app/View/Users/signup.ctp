<?php $this->assign('title', 'Inscription'); ?>
<div id="register" class="col-sm-6 col-sm-offset-3">
	<?php echo $this->Form->create('User', array('class' => 'sky-form', 'inputDefaults' => array('error' => false)));?>
		<header>
      <h1 class="login-form">Connexion</h1>
      <h1 class="register-form">Inscription</h1>
		</header>
		<fieldset>
			<?php echo $this->Form->error('username'); ?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<?php echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Pseudo', 'class' => 'form-control', 'label' => false, 'div' => false, 'required' => 'false')); ?>
			</label>
		</fieldset> 
    <fieldset class="register-form">
			<?php echo $this->Form->error('email'); ?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<?php echo $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Adresse email', 'class' => 'form-control', 'label' => false, 'div' => false, 'required' => 'false')); ?>
			</div>
		</fieldset>
		<fieldset>
			<?php echo $this->Form->error('password'); ?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<?php echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mot de passe', 'class' => 'form-control', 'label' => false, 'required' => 'false')); ?>
			</div>
      <div class="checkbox pull-left login-form">
        <input type="checkbox" name="data[User][rememberMe]" id="UserRememberMe" checked=""><i></i> Rester connecté
      </div>
      <div class="note pull-right login-form">
        <?php echo $this->Html->link('Mot de passe oublié ?', ['controller' => 'users', 'action' => 'forgot_password'], array('class' => 'modal-opener')); ?>
      </div>
		</fieldset>
		<fieldset class="register-form">
			<?php echo $this->Form->error('password_confirmation'); ?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<?php echo $this->Form->input('password_confirmation', array('type' => 'password', 'placeholder' => 'Confirmation', 'class' => 'form-control', 'label' => false, 'required' => 'false')); ?>
			</div>
		</fieldset>
		<footer class="clearfix">
      <a class="rounded btn-u pull-left login-form" id="create_account">S'Inscrire</a>
      <a class="rounded btn-u pull-left register-form" id="login_account">Déjà un compte ?</a>
      <button class="rounded btn-u pull-right login-form" type="submit">Se connecter</button>
      <span class="register-form"><?php if($use_captcha == 1) echo $ayah->getPublisherHTML(); ?></span>
      <button name="captcha" class="rounded btn-u pull-right register-form" type="submit">S'inscrire</button>
		</footer>
	<?php echo $this->Form->end(); ?>
</div>