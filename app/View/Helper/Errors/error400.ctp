<?php echo $this->assign('title', 'Erreur'); ?>

<main class="col-md-8 col-md-offset-2 error-v1">
	<span class="error-v1-title">404</span>
	<span>Une erreur est survenue !</span>
	<p>La page à laquelle vous tentez d'accéder n'existe pas.</p>
	<?php echo $this->Html->link('Retour à l\'accueil', '/', array('class' => 'btn-u btn-bordered')); ?>
</main>