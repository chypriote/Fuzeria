<?php $this->assign('title', 'Vote et gagne'); ?>
<main id="main-vote" class="col-md-9">
  <header>
    <h1>Vote pour le serveur</h1>
  </header>
  <?php if($use_votes_ladder == 1){ ?>
		<section class="col-md-4">
      <table class="table">
        <thead>
          <td colspan="3"><i class="fa fa-trophy"></i> Top 5</td>
        </thead>
      	<tbody>
      		<?php 
      		  for ($nb=0; $nb < 5 && isset($data[$nb]); $nb++) { ?>
      		  <tr>
      				<td class="position"><?php echo ($nb+1) .'<sup>'. ($nb ? 'ème' : 'er') .'</sup>'; ?></td>
      				<td class="picture">
                <?php echo $this->Html->image($data[$nb]['User']['avatar'], ['class' => 'avatar-rounded img-responsive']); ?>
              </td>
      				<td class="user">
      					<?php if ($connected && $data[$nb]['User']['username'] == $connected['username']) {
                    echo '<b>' . $data[$nb]['User']['username'] . '</b>';
                  } else {
                    echo $data[$nb]['User']['username'];
                  } ?>
      					<span class="text-muted"><?php echo $data[$nb]['User']['votes']; ?> votes</span>
      				</td>
      			</tr>
      		<?php } ?>
      	</tbody>
        <tfoot>
          <td colspan="3">
            <a href="votes/classement" class="btn-u rounded" ><i class="fa fa-search"></i> Classement complet</a>
          </td>
        </tfoot>
      </table>
		</section>
		<aside class="vertical-separator"></aside>
	<?php } ?>
	<section class="col-md-<?php echo ($use_votes_ladder ? '8' : '12'); ?>" ?>
		<div class="info-block">
      <i class="fa fa-3x fa-circle">
        <span class="stacker"><?php echo $nb_votes ? $nb_votes : '0'; ?></span>
      </i>
      <h4>
        <?php
    			echo !$nb_votes ? "Tu n'as jamais voté pour le serveur" : "Tu as voté $nb_votes fois, merci";
        ?>
      </h4>
		</div>
		<div class="vote-call">
			<h4><?php echo $votes_description; ?></h4>
			<a href="<?php echo $votes_url; ?>" class="btn-u btn-u-dark rounded btn-u-lg" target="_blank" onclick="window.location.href='<?php echo $this->Html->url(['controller' => 'votes', 'action' => 'vote']); ?>';">
				Vote pour <?php echo $name_server; ?>
			</a>
		</div>
	</section>
</main>
<?php echo $this->element('sidebar'); ?>