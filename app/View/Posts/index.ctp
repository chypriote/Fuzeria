<?php $this->assign('title', 'Accueil'); ?>
  <?php if($use_slider && $nb_posts >= 3){ ?>
    <section class="carousel slide carousel-v1 hidden-sm hidden-xs row" id="myCarousel-1">
      <div class="carousel-inner">
        <?php for ($i=0; $i < 3; $i++){ ?>
          <?php //TODO ternaire ?>
          <?php if($i == 0){ ?>
            <div class="item active">
          <?php } else { ?>
            <div class="item">
          <?php } ?>
          <?php
            if(filter_var($slider[$i]['Post']['img'], FILTER_VALIDATE_URL)){
              echo '<img class="img-slider" src="'.$slider[$i]['Post']['img'].'">';
            } else{
              echo '<img class="img-slider" src="'.$this->webroot.'img/posts/'.$slider[$i]['Post']['img'].'">';
            } 
          ?>
            <div class="carousel-caption">
              <p>
                <?php
                  $content = '<h3><font color="white">'.$slider[$i]['Post']['title'].'</font></h3>'.html_entity_decode(strip_tags($slider[$i]['Post']['content']));
                  if(mb_strlen($content) > 400){
                    echo mb_substr($content, 0, 400).'... <a href="'.$this->Html->url(['controller' => 'posts', 'action' => 'read', 'slug' => $slider[$i]['Post']['slug'], 'id' => $slider[$i]['Post']['id']]).'">Lire</a>';
                  } else{
                    echo $content.' <a href="'.$this->Html->url(['controller' => 'posts', 'action' => 'read', 'slug' => $slider[$i]['Post']['slug'], 'id' => $slider[$i]['Post']['id']]).'">Lire</a>';;
                  }
                ?>
              </p>
            </div>
          </div>
        <?php } ?>
      </div>
      
      <div class="carousel-arrow">
        <a data-slide="prev" href="#myCarousel-1" class="left carousel-control">
          <i class="fa fa-angle-left"></i>
        </a>
        <a data-slide="next" href="#myCarousel-1" class="right carousel-control">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </section>
  <?php } ?>
<section class="magazine col-md-9">

  <?php for ($a=0; $a < 6; $a++){ ?>
    <?php if ($a == 0 || $a == 2 || $a == 4) { ?><div class="row"> <?php } ?>
		<?php if(!empty($articles[$a]['Post']['id'])){ ?>
			<article class="col-sm-6 magazine-news">
				<header>
          <div class="magazine-news-img hidden-xs">
  					<?php
    					if(filter_var($articles[$a]['Post']['img'], FILTER_VALIDATE_URL)){
    						echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])).'"><img class="img-responsive" src="'.$articles[$a]['Post']['img'].'" alt=""></a>';
    					} else {
    						echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])).'"><img class="img-responsive" src="'.$this->webroot.'img/posts/'.$articles[$a]['Post']['img'].'" alt=""></a>';
    					}
  					?>
  					<span class="magazine-badge label-green"><?php echo $articles[$a]['Post']['cat']; ?></span>
          </div>
          <h3>
            <?php
              if(mb_strlen($articles[$a]['Post']['title']) > 35){
                echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])).'">'.mb_substr($articles[$a]['Post']['title'], 0, 35).' [...]'.'</a>';
              } else {
                echo '<a href="'.$this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])).'">'.$articles[$a]['Post']['title'].'</a>';
              }
            ?>
          </h3>
          <div class="by-author">
            Par <strong><?php echo $articles[$a]['Post']['author']; ?></strong> <small>le <?php echo $this->Time->format('d/m/Y à H:i', $articles[$a]['Post']['posted']); ?></small>
          </div>
        </header>
        <section>
          <p class="text-justify">
            <?php
              $content = html_entity_decode(strip_tags($articles[$a]['Post']['content']));
              if(mb_strlen($content) > 315){
                echo mb_substr($content, 0, 315).' [...]';
              }
              else{
                echo $content;
              }
            ?>
          </p>
          <div class="magazine-links">
            <?php if($use_posts_views){ ?>
              <a class="btn btn-default btn-xs" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])); ?>">
                <i class="fa fa-eye"></i> <?php echo count($articles[$a]['postView']); ?>
              </a>
            <?php } ?>
            <a class="btn btn-default btn-xs" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])); ?>">
              <i class="fa fa-heart"></i> <?php echo count($articles[$a]['Like']); ?>
            </a>
            <a class="btn btn-default btn-xs" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])); ?>">
              <i class="fa fa-comments"></i> <?php echo count($articles[$a]['Comment']); ?>
            </a>
            <a class="btn btn-default btn-xs" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'read', 'slug' => $articles[$a]['Post']['slug'], 'id' => $articles[$a]['Post']['id'])); ?>">
              <i class="fa fa-paper-plane"></i> Lire
            </a>
          </div>
        </section>
			</article>
		<?php } ?>
    <?php if ($a == 1 || $a == 3 || $a == 5) { ?></div><?php } ?>
	<?php } ?>
  
	<footer class="pagination text-center">
		<ul class="pagination">
			<?php
			if($nb_posts > 5){
				echo '<li>'.$this->Paginator->prev(__('«'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')).'</li>';
				echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 'Première', 'last' => 'Dernière', 'ellipsis' => ''));
				echo '<li>'.$this->Paginator->next(__('»'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')).'</li>';
				echo '<br><br>';
			}
			?>
		</ul>															
	</footer>
</section>
<?php echo $this->element('sidebar'); ?> 
<script>
	$(document).ready(function(){
		$(".confirm").confirm({
			text: "Voulez vous vraiment supprimer cet article ?",
			title: "Confirmation",
			confirmButton: "Oui",
			cancelButton: "Non"
		});
	});
</script>