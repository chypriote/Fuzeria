<?php $this->assign('title', $post['Post']['title']); ?>
<main id="blog" class="col-md-9">
  <section class="blog-post">
  	<div class="blog-img">
  	  <?php
  		if(filter_var($post['Post']['img'], FILTER_VALIDATE_URL)){
  		  echo $this->Html->image($post['Post']['img'], array('class' => 'img-responsive'));
  		} else {
  		  echo $this->Html->image('/img/posts/'.$post['Post']['img'], array('class' => 'img-responsive'));
  		}
  	  ?>
  	</div>
  	<header class="clearfix">
  	  <h1><?php echo $post['Post']['title']; ?></h1>
  	  <div class="blog-post-tags col-md-8">
    		<ul class="list-inline">
    			<li><i class="fa fa-user"></i> Posté par <strong><?php echo $post['Post']['author']; ?></strong></li>
    			<?php if($use_posts_views == 1){ ?>
    				<li>
              <i class="fa fa-eye"></i>
    					<?php 
                if($views > 1){
      						echo $views.' vues';
      					} else {
      						echo $views.' vue';
      					} 
              ?>
    				</li>
    			<?php } ?>
      			<li>
      				<?php if($post['Post']['draft'] == 1){ ?>
      				<i class="fa fa-calendar"></i> Non publié
      				<?php } else { ?>
      				<i class="fa fa-calendar"></i> <?php echo $this->Time->timeAgoInWords($post['Post']['posted']); ?>
      				<?php } ?>
      			</li>
            <li><i class="fa fa-tags"></i> <?php echo $post['Post']['cat']; ?></li>
    		  </ul>					
  	  </div>
      <div class="blog-post-like col-md-4">
        <div class="btn-group pull-right">
          <?php if($liked){ ?>
            <button class="btn btn-default btn-xs rounded-3x" id="dislike">
              <i class="fa fa-heart"></i> J'aime (<?php echo $nb_likes; ?>)
            </button>
            <button class="btn btn-default btn-xs rounded-3x" id="like" style="display:none;">
              <i class="fa fa-heart"></i> J'aime (<?php echo $nb_likes; ?>)
            </button>
          <?php } else { ?>
            <button class="btn btn-default btn-xs rounded-3x" id="dislike" style="display:none;">
              <i class="fa fa-heart"></i> J'aime (<?php echo $nb_likes; ?>)
            </button>
            <button class="btn btn-default btn-xs rounded-3x" id="like">
              <i class="fa fa-heart"></i> J'aime (<?php echo $nb_likes; ?>)
            </button>
          <?php } ?>    
          <button class="btn btn-default btn-xs rounded-3x" id="chargement" style="display:none;">
            <?php echo $this->Html->image('like_loader.gif', array('alt' => 'chargement')); ?>
          </button>
        </div>
      </div>
      <?php if($role > 1){ ?>
        <div class="col-md-4">
          <div class="btn-group">
            <a id="blog-edit" class="btn btn-default btn-xs" href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'edit', $post['Post']['id'], 'admin' => true]); ?>">
              <i class="fa fa-pencil"></i> Editer
            </a>
            <a id="blog-delete" class="confirm btn btn-default btn-xs" href="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'delete', $post['Post']['id'], 'admin' => true]); ?>">
              <i class="fa fa-times"></i> Supprimer
            </a>
          </div>
        </div>
        <div class="col-md-8">
          <div class="btn-group pull-right">
            <?php if($post['Post']['draft'] == 1){
              echo '<a class="btn btn-danger btn-xs" href=""><i class="fa fa-lock"></i> Cet article est enregistré en tant que brouillon</a>';
             } ?>
          </div>
        </div>
      <?php } ?>
  	</header>
    <?php echo $post['Post']['content']; ?>
  </section>
	<section class="related-posts hidden-xs hidden-sm">
		<h2>Derniers articles</h2>
		<div class="row">
			<?php for($i = 0; $i < 3; $i++){ ?>
				<?php if(isset($lasts_posts[$i])){ ?>
					<div class="col-md-4">
						<div class="magazine-news-img">
							<?php
  							echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $lasts_posts[$i]['Post']['slug'], 'id' => $lasts_posts[$i]['Post']['id'])).'">';
  							if(filter_var($lasts_posts[$i]['Post']['img'], FILTER_VALIDATE_URL)){
  								echo $this->Html->image($lasts_posts[$i]['Post']['img'], array('height' => '130', 'width' => '260', 'title' => $lasts_posts[$i]['Post']['title']));
  							} else{
  								echo $this->Html->image('posts/'.$lasts_posts[$i]['Post']['img'], array('height' => '130', 'width' => '260', 'title' => $lasts_posts[$i]['Post']['title']));
  							}
  							echo '</a>';
							?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</section>
	<?php if($connected){ ?>
    <section class="comments-post">
  		<?php echo $this->Form->create('Comments', ['action' => 'write', 'class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
  			<h2>
  				<?php $nb_comments = count($post['Comment']); ?>
  				<?php if($nb_comments > 1){ $comment = 'Commentaires'; } else { $comment = 'Commentaire'; } ?>
  				<?php echo $comment.' ('.$nb_comments.')'; ?>
  			</h2>
  			<fieldset>
					<?php echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $this->params['id'], 'label' => false)); ?>
					<?php echo $this->Form->textarea('comment', array('type' => 'text', 'placeholder' => 'Partagez votre avis', 'class' => 'form-control', 'rows' => '5', 'cols' => '5', 'label' => false)); ?>
  			</fieldset>
  			<footer class="clearfix">
  				<button class="btn-u pull-right" type="submit">Envoyer</button>	  
  			</footer>
  		<?php echo $this->Form->end(); ?>
    </section>
		<br>
	<?php } else { ?>
		<section class="comments-log">
			<i class="fa fa-lock"></i> Vous devez être connecté pour poster un commentaire
		</section>
	<?php } ?>
	<section class="post-comments row">
		<?php foreach($comments as $comment){ ?>
      <article class="comment clearfix">
  			<?php $username = $comment['User']['username']; ?>
  			<div class="col-sm-1">
  				<?php
  					if($username == null){
  						echo $this->Html->image('http://cravatar.eu/helmavatar/Steve', ['alt' => 'Player head', 'class' => 'img-responsive avatar-rounded']);
  					} else {
  						echo $this->Html->image($comment['User']['avatar'], ['alt' => 'Player head', 'class' => 'img-responsive avatar-rounded']);
  					}
  				?>
  			</div>
  			<div class="col-sm-11">
  				<div class="panel panel-default">
  					<header class="panel-heading">
  						<strong>
  							<?php
    							if($username == null){
    								echo '<u>Compte supprimé</u>';
    							} else{
    								echo $this->Html->link($username, ['controller' => 'users', 'action' => 'profile', 'username' => $username]);
    							}
  							?>
  						</strong>
  						<span class="text-muted"><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></span>
  						<?php if($role > 0){ ?>
  							<a href="<?php echo $this->Html->url(['controller' => 'comments', 'action' => 'delete', $comment['Comment']['id'], 'read', 'admin' => true]); ?>" class="confirm-comment btn btn-default btn-xs pull-right">
  								<i class="fa fa-times"></i>
  							</a>
  							<a href="<?php echo $this->Html->url(['controller' => 'comments', 'action' => 'edit', $comment['Comment']['id'], 'admin' => true]); ?>" class="btn btn-default btn-xs pull-right">
  								<i class="fa fa-pencil"></i>
  							</a>
  						<?php } ?>
  					</header>
  					<div class="panel-body">
  						<?php echo htmlentities($comment['Comment']['comment']); ?>
  					</div>
  				</div>
  			</div>
      </article>
		<?php } ?>
	</section>
</main>
<!--End Post-->
<?php echo $this->element('sidebar'); ?>

<script>
$(document).ready(function(){
	$(".confirm").confirm({
		text: "Voulez vous vraiment supprimer cet article ?",
		title: "Confirmation",
		confirmButton: "Oui",
		cancelButton: "Non"
	});

	$(".confirm-comment").confirm({
		text: "Voulez vous vraiment supprimer ce commentaire ?",
		title: "Confirmation",
		confirmButton: "Oui",
		cancelButton: "Non"
	});

	var nb_likes = <?php echo $nb_likes; ?>;

	$('#like').on('click', function(){
		$('#chargement').show();
		$('#like').hide();
		var id = '<?php echo $this->params['pass'][1]; ?>';
		$.post('<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'like']); ?>', {id: id}, function(){
			$('#chargement').hide();
			$('#dislike').fadeIn();
			nb_likes++;
			$('#dislike').html('<font color="red"><i class="fa fa-heart"></i></font> <span class="open-sans">J\'aime (' + nb_likes + ')</span>');
		});
	});

	$('#dislike').on('click', function(){
		$('#chargement').show();
		$('#dislike').hide();
		var id = '<?php echo $this->params['pass'][1]; ?>';
		$.post('<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'like']); ?>', {id: id}, function(){
			$('#chargement').hide();
			$('#like').fadeIn();
			nb_likes--;
			$('#like').html('<i class="fa fa-heart"></i> J\'aime (' + nb_likes + ')');
		});
	});
});
</script>