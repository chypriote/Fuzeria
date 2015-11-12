<?php $this->assign('title', 'Envoyer un message au support'); ?>
<main id="add-support" class="col-md-9">
  <?php echo $this->Form->create('Pages', ['class' => 'sky-form', 'inputDefaults' => ['error' => false]]); ?>
  	<header class="reg-header">  
  		<h1>Envoyer un message au support</h1>
      <?php echo "Vous allez envoyer cette requête au support en tant que <u>$username</u>."; ?>
  	</header>
  	<fieldset>
			<select name="data[Pages][type]" id="PagesType" class="form-control input-sm">
				<option value="none">De quelle type est votre requête ?</option>
				<option value="question">Question</option>
				<option value="report">Signalement d'un joueur</option>
				<option value="other">Autre</option>
			</select>
  	</fieldset>
  	<fieldset id="priority">
			<select name="data[Pages][priority]" id="PagesPriority" class="form-control input-sm">
				<option value="1">Priorité de votre requête</option>
				<option value="1">Basse</option>
				<option value="2">Moyenne</option>
				<option value="3">Haute</option>
				<option value="4">Très haute</option>
			</select>
  	</fieldset>
  	<fieldset id="report_input" style="display:none;">
  		<?php echo $this->Form->input('report_input', ['type' => 'text', 'placeholder' => 'Pseudo du joueur', 'class' => 'form-control', 'label' => false]); ?>
  	</fieldset>
  	<fieldset id="message">
  		<?php echo $this->Form->textarea('message', ['placeholder' => 'Votre question/message', 'class' => 'form-control', 'rows' => 5, 'cols' => 5]); ?>
  	</fieldset>
  	<footer class="clearfix">
  		<button class="btn btn-u pull-right" type="submit">Envoyer</button>
  	</footer>
  <?php echo $this->Form->end(); ?>
</main>
<?php echo $this->element('sidebar'); ?>