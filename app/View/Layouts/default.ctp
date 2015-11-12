<?php if(!isset($server_ip)) exit('Erreur: impossible de communiquer avec la base de donn&eacute;es'); ?>
<!DOCTYPE html>
<!--[if IE 8]><html lang="fr" class="ie8"><![endif]-->  
<!--[if IE 9]><html lang="fr" class="ie9"><![endif]-->  
<!--[if !IE]><!--><html lang="fr"><!--<![endif]-->  
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ExtazCMS">
	<meta name="author" content="MrSaooty">
  <title><?php echo $this->fetch('title'); ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<?php
	// Favicon
	echo $this->Html->meta('favicon.png', $logo_url, array('type' => 'icon'));

	echo $this->Html->css('style');
	echo $this->Html->css('app');
	echo $this->Html->css('404');
	echo $this->Html->css('blog');
	echo $this->Html->css('profile');
	echo $this->Html->css('timeline');

	echo $this->Html->css('line-icons/line-icons');
	echo $this->Html->css('flexslider/flexslider');
	echo $this->Html->css('parallax-slider/parallax-slider');
	echo $this->Html->css('dropzone');
	echo $this->Html->css('plugins.css');
	echo $this->Html->css('ie8.css');
	echo $this->Html->css('plugins/animate.css');
	echo $this->Html->css('plugins/box-shadows.css');
	echo $this->Html->css('plugins/flatty');

	echo $this->Html->css('custom');

	echo $this->Html->css('main');

	?>
</head>	
<?php //TODO background pour localhost ?>
<body cz-shortcut-listen="true" class="boxed-layout" background="<?php echo $this->webroot.'app/webroot/img/bg/'.$background; ?>">
	<div id="wrapper" class="container">
		<header>
			<nav class="navbar navbar-default row" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-top">
							<span class="sr-only">Toggle navigation</span>
							<span class="fa fa-bars"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index', 'admin' => false]); ?>">
						   <img src="<?php echo $logo_url; ?>" class="img-responsive" alt="Fuzeria"> <?php echo $name_server; ?>
						</a>
					</div>
  				<div id="navbar-top" class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="none"><?php echo $this->Html->link('Accueil', '/'); ?></li>
							<?php if($use_store){ ?>
  							<li class="none"><?php echo $this->Html->link('Boutique', ['controller' => 'shops', 'action' => 'index']); ?></li>
							<?php } ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Support <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><?php echo $this->Html->link('Rediger un ticket', ['controller' => 'pages', 'action' => 'add_ticket']); ?></li>
									<li><?php echo $this->Html->link('Consulter mes tickets', ['controller' => 'pages', 'action' => 'list_tickets']); ?></li>
								</ul>
							</li>
							<?php if ($use_votes && $use_votes_ladder){ ?>
  							<li class="dropdown">
  								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Votes <i class="fa fa-angle-down"></i></a>
  								<ul class="dropdown-menu">
  									<li><?php echo $this->Html->link('Vote et gagne', ['controller' => 'votes', 'action' => 'index']); ?></li>
  									<li><?php echo $this->Html->link('Classement', ['controller' => 'votes', 'action' => 'ladder']); ?></li>
  								</ul>
  							</li>
							<?php } elseif ($use_votes && !$use_votes_ladder) { ?>
                <li><?php echo $this->Html->link('Vote et gagne', ['controller' => 'votes', 'action' => 'index']); ?></li>
							<?php } ?>
							<?php if($use_rules){ ?>
  							<li class="none"><?php echo $this->Html->link('Règlement', ['controller' => 'pages', 'action' => 'rules']); ?></li>
							<?php } ?>
							<?php if($use_team){ ?>
                <li class="none"><?php echo $this->Html->link('Équipe', ['controller' => 'pages', 'action' => 'team']); ?></li>
							<?php } ?>
							<?php if($use_contact){ ?>
  							<li class="none"><?php echo $this->Html->link('Contact', ['controller' => 'pages', 'action' => 'contact']); ?></li>
							<?php } ?>
							<?php if($nb_cpages){ ?>
                <li class="none"><?php echo $this->Html->link($cpages[0]['Cpage']['name'], ['controller' => 'cpages', 'action' => 'read', 'slug' => $cpages[0]['Cpage']['slug']]); ?></li>
							<?php } elseif ($nb_cpages != 0 && $nb_cpages > 1) { ?>
                <li class="dropdown">
  								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Autres <i class="fa fa-angle-down"></i></a>
  								<ul class="dropdown-menu">
  									<?php foreach($cpages as $cp){ ?>
  										<li><?php echo $this->Html->link($cp['Cpage']['name'], ['controller' => 'cpages', 'action' => 'read', 'slug' => $cp['Cpage']['slug']]); ?></li>
  									<?php } ?>
  								</ul>
							 </li>
							<?php } ?>
						</ul>
  				</div>
        </div>
			</nav>
		</header>

		<?php if($happy_hour){ ?>
			<div class="happy-hour">
				<?php if($use_paypal){ ?>
					<i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?>. Achetez <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass ou <?php echo $paypal_tokens.' '.$site_money.' + '.$paypal_happy_hour_bonus.' gratuits'; ?> via PayPal !
					<a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="btn btn-default btn-xs happy-hour-btn"><i class="fa fa-shopping-cart"></i> Recharger</a>
					<button class="btn btn-default btn-xs happy-hour-close"><i class="fa fa-times"></i></button>
        <?php } else { ?>
					<i class="fa fa-gift"></i> Happy hour en cours, <?php echo $happy_hour_bonus.'% de '.$site_money.' gratuits'; ?>. Achetez <?php echo $starpass_tokens.' '.$site_money.' + '.$starpass_happy_hour_bonus.' gratuits '; ?> via Starpass !
					<a href="<?php echo $this->Html->url(['controller' => 'shops', 'action' => 'reload']); ?>" class="btn btn-default btn-xs happy-hour-btn"><i class="fa fa-shopping-cart"></i> Recharger</a>
					<button class="btn btn-default btn-xs happy-hour-close"><i class="fa fa-times"></i></button>
        <?php } ?>
			</div>
		<?php } ?>
		
		<?php echo $this->Session->flash(); ?>
    <section id="content" class="clearfix">
		  <?php echo $this->fetch('content'); ?>
    </section>
		<footer class="copyright row container">
			<p class="text-center">
				<?php
				/*
				* Merci de ne pas retirer cette mention,
				* Je partage ce CMS gratuitement sans attentes en retour.
				* Merci de respecter mon travail.
				*/
				?>
				Thème Fuzeria pour <a href="http://extaz-cms.com/" target="_blank">ExtazCMS</a> | Créé par <a href="http://www.chypriote.net" target="_blank">ChypRiotE</a>
			</p>
		</footer><!--/copyright-->

		</div>   
		<!--=== End Footer ===-->
	</div><!--/wrapper-->
  <script type="text/javascript">jQuery(document).ready(function(){App.init();App.initSliders();});</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.js"></script>
	<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    <?php
      echo $this->Html->script('flexslider/jquery.flexslider-min');
      echo $this->Html->script('parallax-slider/modernizr');
      echo $this->Html->script('parallax-slider/jquery.cslider');
      echo $this->Html->script('dropzone');
      echo $this->Html->script('app');
      echo $this->Html->script('jquery.confirm');
      echo $this->Html->script('jquery.bootstrap-growl');
      echo $this->Html->script('index');
      echo $this->Html->script('jquery.autocomplete');
      echo $this->Html->script('plugins/humane');
      echo $this->Html->script('custom');
      echo $this->Html->script('main');
    ?>
	<?php if(!empty($analytics) && $analytics){ ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?= $analytics; ?>', 'auto');
		  ga('send', 'pageview');
		</script>
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="files/respond.js"></script>
		<script src="files/html5shiv.js"></script>	
	<![endif]-->
</body>
</html>	