<?php $this->assign('title', 'Mes tickets'); ?>
<main id="view-ticket" class="col-md-9">
  <header>
    <h1>Consulter un ticket</h1>
  </header>
  <ul class="timeline">
    <li class="clearfix">
      <time class="col-md-3" datetime>
        <span class="date"><?php echo $this->Time->format('d/m/Y', $data['Support']['created']); ?></span>
        <span class="time"><?php echo $this->Time->format('H\hi', $data['Support']['created']); ?></span>
      </time>
      <i class="icon rounded-x hidden-xs"></i>
      <article class="col-md-8">
        <header>
          <?php if($role > 0){ ?>
            <?php if($data['User']['username'] == null){
                echo 'Ticket de <u>Compte supprimé</u>';
              } else{ ?>
                <a href="<?php echo $this->Html->url(['controller' => 'users', 'action' => 'edit', $data['User']['id'], 'admin' => true]); ?>">
                  Ticket de <?php echo $data['User']['username']; ?>
                </a>
            <?php } ?>
          <?php } else { ?>
            Ticket de <?php echo $data['User']['username']; ?>
          <?php } ?>
          <?php if($role > 0){ ?>
            <?php if($data['Support']['resolved'] == 0){ ?>
              <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'close_ticket', 'id' => $data['Support']['id']]); ?>" class="btn btn-default btn-sm pull-right">
                <i class="fa fa-lock"></i>Clôturer ce ticket
              </a>
            <?php } else { ?>
              <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'open_ticket', 'id' => $data['Support']['id']]); ?>" class="btn btn-default btn-sm pull-right">
                <i class="fa fa-unlock"></i>Ouvrir ce ticket
              </a>
            <?php } ?>
          <?php } else { ?>
            <?php if($data['Support']['resolved'] == 0){ ?>
              <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'close_my_ticket', 'id' => $data['Support']['id']]); ?>" class="btn btn-default btn-sm pull-right">
                <i class="fa fa-lock"></i>Fermer mon ticket
              </a>
            <?php } ?>
          <?php } ?>
        </header>
        <p>
          <?php echo $data['Support']['message']; ?>
        </p>
      </article>
    </li>
    <?php if($nbComments != 0){ ?>
      <?php foreach(array_reverse($comments) as $comment){ ?>
      <li class="clearfix">
        <time class="col-md-3" datetime>
          <span class="date"><?php echo $this->Time->format('d/m/Y', $comment['supportComments']['created']); ?></span>
          <span class="time"><?php echo $this->Time->format('H\hi', $comment['supportComments']['created']); ?></span>
        </time>
        <i class="icon rounded-x hidden-xs"></i>
        <article class="col-md-8">
          <header>
            <?php if($comment['User']['username'] == null){
              echo 'Réponse de <u>Compte supprimé</u>';
              } else{
              echo 'Réponse de '.$comment['User']['username'];
              } ?>
            <?php if($role > 0){ ?>
              <a href="<?php echo $this->Html->url(['controller' => 'pages', 'action' => 'delete_support_comment', 'id' => $comment['supportComments']['id']]); ?>" class="tooltips btn btn-default btn-sm pull-right confirm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Supprimer cette réponse"><font color="red"><i class="fa fa-times"></i> Supprimer</font></a>
            <?php } ?>  
          </header>
          <p class="text-justify">
            <?php echo $comment['supportComments']['message']; ?>
          </p>
        </article>
      </li>
      <?php } ?>
    <?php } else { ?>
      <?php if($data['Support']['resolved'] == 0){ ?>
        <li class="clearfix">
          <time class="col-md-3" datetime></time>
          <i class="icon rounded-x hidden-xs"></i>
          <article class="col-md-8 no-answer">
            <p>Aucune réponse pour le moment</p>
          </article>
        </li>
      <?php } ?>
    <?php } ?>
    <?php if($data['Support']['resolved'] == 0){ ?>
      <li class="clearfix">
        <time class="col-md-3"></time>
        <i class="icon rounded-x hidden-xs"></i>
        <article class="col-md-8 repondre">
          <?php echo $this->Form->create('Pages', ['action' => 'answer_ticket', 'class' => '', 'inputDefaults' => ['error' => false]]); ?>
            <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $this->params['pass'][0], 'class' => 'form-control']); ?>
            <?php echo $this->Form->textarea('message', ['placeholder' => 'Laisser une réponse', 'class' => 'form-control']); ?>
            <footer class="clearfix">
              <button class="btn-u rounded btn-u-xs pull-right" type="submit">Envoyer</button>
            </footer>
          <?php echo $this->Form->end(); ?>
        </article>
      </li>
    <?php } else { ?>
      <li class="clearfix">
        <time class="col-md-3" datetime></time>
        <i class="icon rounded-x hidden-xs"></i>
        <article class="col-md-8">
          <p>
            <i class="fa fa-lock"></i> Ce ticket est fermé
          </p>
        </article>
      </li>
    <?php } ?>
  </ul>
</main>
<?php echo $this->element('sidebar'); ?>
<script>
$(document).ready(function(){
  $(".confirm").confirm({
    text: "Voulez vous vraiment supprimer cette réponse ?",
    title: "Confirmation",
    confirmButton: "Oui",
    cancelButton: "Non"
  });
});
</script>