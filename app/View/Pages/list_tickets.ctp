<?php $this->assign('title', 'Mes tickets'); ?>
<main id="view-support" class="col-md-9">
  <header>
      <h1>Vos tickets envoyés au support</h1>
  </header>
	<?php if($nbTickets > 0){ ?>
  	<ul class="timeline">
  		<?php foreach($data as $d){ ?>
  			<li class="clearfix">
  				<time class="col-md-3" datetime>
            <span class="date"><?php echo $this->Time->format('d/m/Y', $d['Support']['created']); ?></span>
            <span class="time"><?php echo $this->Time->format('H\hi', $d['Support']['created']); ?></span>
          </time>
  				<i class="icon rounded-x hidden-xs"></i>
  				<article class="col-md-9">
  					<header>
  						<?php
    						switch($d['Support']['priority']){
    							case '1':
    								echo '<span class="text-highlights text-highlights-green">Priorité basse</span>';
    								break;
    							case '2':
    								echo '<span class="text-highlights text-highlights-blue">Priorité moyenne</span>';
    								break;
    							case '3':
    								echo '<span class="text-highlights text-highlights-orange">Priorité haute</span>';
    								break;
    							case '4':
    								echo '<span class="text-highlights text-highlights-red">Priorité très haute</span>';
    								break;
    						}
  						?>
  						<a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'view_ticket', 'id' => $d['Support']['id']]); ?>" class="btn btn-default btn-sm pull-right">
  							<i class="fa fa-list"></i>Consulter les réponses
  						</a>
  						<?php if($d['Support']['resolved'] == 0){ ?>
    						<span class="text-highlights text-highlights-green"><i class="fa fa-clock-o"></i>Ticket ouvert</span>
  						<?php } else { ?>
    						<span class="text-highlights text-highlights-red"><i class="fa fa-lock"></i>Ticket fermé</span>
  						<?php } ?>
  					</header>
  					<p>
  						<?php
  						$content = strip_tags($d['Support']['message']);
  						if(strlen($content) < 380){
  							echo $content;
  						}
  						else{
  							echo substr($content, 0, 380).'...';
  						}
  						?>
  					</p>
  				</article>
  			</li>
  		<?php } ?>
  	</ul>
	<?php } else { ?>
  	<div class="servive-block servive-block-default">
  		<i class="icon-custom icon-color-dark rounded-x fa fa-info-circle"></i>
  		<h2 class="heading-md">Aucun résultat</h2>
  		<p>Vous n'avez envoyé aucun ticket au support</p>
  	</div>
	<?php } ?>
</main>
<?php echo $this->element('sidebar'); ?>