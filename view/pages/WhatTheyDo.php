<?php
    $i = 0;
?>

<div class="hero-unit">
    <p><?php echo $nompage; ?></p>
    <i>Que font vos amis en ce moment ?</i>
</div>


<div class="well" style="height: 110px">
    <div class="form-stacked">
        <label for="xlInput3">Poster :&nbsp;</label>
        
          <input class="xlarge" id="xlInput3" name="xlInput3" size="30" type="text">
  
          <input class="small" type="text" value="May 1, 2011">
          <input class="mini" type="text" value="12:00am">
          to
          <input class="small" type="text" value="May 8, 2011">
          <input class="mini" type="text" value="11:59pm">
          
          <span class="help-block">Example : doing a show at Casablanca.</span>
    </div>
    <div class="actions pull-right">
      <input type="submit" class="btn primary" value="Save changes">&nbsp;<button type="reset" class="btn">Cancel</button>
    </div>
</div>

<div class="">
    <?php while(isset($page[$i])) { ?>
        <blockquote>
            <small>
                <?php 
                    echo $page[$i]->nom.' '.$page[$i]->prenom.' is ';
                ?>
            </small>
            <p>
                <?php 
                    echo $page[$i]->verbe . ' at ' . $page[$i]->place  . '. ' . $page[$i]->quand;
                ?>
            </p>
        </blockquote>
    <?php
            $i++;
          }
    ?>
</div>

