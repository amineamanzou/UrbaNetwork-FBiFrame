<div class="hero-unit">
    <div class="row">
        <div class="span3">
            <img src="https://graph.facebook.com/<?php echo $this->Session->read('facebook_id'); ?>/picture?type=normal" />
        </div>
        <div class="span6">
            <h2><?php echo $this->Session->read('nom').' '.$this->Session->read('prenom'); ?></h2>
            <h3><strong>Score :</strong></h3>
        </div>
    </div>
</div>

<div class="container canvas">
    <div class="row">
        <div class="span4 well">
            Cet utilisateur n'a pas ajouter de chaîne youtube.
        </div>
        <div class="span4 well">
            Vous n'avez pas ajouter votre chaîne youtube.
        </div>
        <div class="span8 well">
          <div class="clearfix">
              <label for="xlInput5">Channel name :&nbsp;</label>
            <div class="input">
              <input class="xlarge" id="xlInput3" name="xlInput3" size="30" type="text">
            </div>
          </div>
          <div class="actions pull-right">
            <input type="submit" class="btn primary" value="Save changes">&nbsp;<button type="reset" class="btn">Cancel</button>
          </div>
        </div>
        <?php foreach($videoFeed as $v): $thumbs = $v->getVideoThumbnails(); ?>
        <div class="span4" style="height:300px;">
            <div class="well">
                <h5><strong><?php echo $v->getVideoTitle(); ?></strong></h5>
                <img class="thumbnail" src="<?php echo $thumbs[2]['url'];  ?>" >
                <p><?php echo $v->getVideoDescription(); ?></p>
                          <div id="modal-from-dom" class="modal hide fade">
            <div class="modal-header">
              <a href="#" class="close">&times;</a>
              <h3><?php echo $v->getVideoTitle(); ?></h3>
            </div>
            <div class="modal-body">
              <p><iframe width="500" height="281" src="<?php echo $v->getFlashPlayerUrl(); ?>" frameborder="0" allowfullscreen></iframe></p>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn primary">Vote for this video</a>
              <a href="#" class="btn secondary">Share</a>
            </div>
          </div>
        <button data-controls-modal="modal-from-dom" data-backdrop="true" data-keyboard="true" class="btn primary">Voir cette vidéo</button>
                <p>
                    <a href="<?php echo $v->getVideoWatchPageUrl(); ?>" class="btn danger">Voir sur youtube</a>
                    <span class="label notice"><?php echo round($v->getVideoDuration()/60); ?>min</span>
                </p>
                
                
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>



