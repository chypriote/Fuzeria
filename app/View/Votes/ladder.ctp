<?php $this->assign('title', 'Vote et gagne'); ?>
<main id="vote-ladder" class="col-md-9">
	<header>
		<h1>Le top des votants</h1>
	</header>
	<table class="table">
	  <thead>
			<td class="ladder-rank">Classement</td>
			<td colspan="2">Joueur</td>
			<td class="ladder-score">Votes</td>
	  </thead>
	  <tbody>
		  <?php 
						$a = 0;
					for($nb=0;$a < 5 && isset($data[$nb]);$nb++) {
						switch ($a+1) {
							case 1:
								echo '<tr class="first"><td><i class="fa fa-trophy"></i></td>';
								break;
							case 2:
								echo '<tr class="second"><td><i class="fa fa-trophy"></i></td>';
								break;
							case 3:
								echo '<tr class="third"><td><i class="fa fa-trophy"></i></td>';
								break;
							default:
								echo '<tr><td>'.($a+1).'<sup>ème</sup></td>';
								break;
						}
					?>
					<td>
						<?php echo $this->Html->image($data[$nb]['User']['avatar'], ['class' => 'avatar-rounded img-responsive']); ?>
					</td>
					<td class="ladder-name">
						<?php echo $this->Html->link($data[$nb]['User']['username'], ['controller' => 'users', 'action' => 'profile', 'username' => $data[$nb]['User']['username']], ['class' => 'nolink']); ?>
					</td>
					<td><?php echo $data[$nb]['User']['votes']; ?></td>
				</tr>
			<?php $nb--;$a++;} ?>
	  </tbody>
	</table>
</main>
<?php echo $this->element('sidebar'); ?>