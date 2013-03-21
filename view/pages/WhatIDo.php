
<section id="overview">
    <div class="hero-unit">
        <p><?php echo $nompage; ?></p>
        <i>Qu'est je fait ces derniers jours ?</i>
    </div>
</section>

<div class="well" style="height: 110px">
    <form action="" method="POST" class="">
        <label>Poster :&nbsp;</label>
        
          <input class="xlarge" id="verb" name="verb" size="30" type="text">
          at
          <input class="small" id="where" name="where" size="20" type="text">
          from
          <input class="small" id="beginDate" type="text" value="May 1, 2011">
          <input class="mini" id="beginHour" type="text" value="12:00am">
          to
          <input class="small" id="endDate" type="text" value="May 8, 2011">
          <input class="mini" id="endHour" type="text" value="11:59pm">
          
          <span class="help-block">Example : doing a show at Casablanca.</span>
         
        <div class="actions pull-right">
          <input type="submit" class="btn primary" value="Post">&nbsp;<button type="reset" class="btn">Cancel</button>
        </div>
    </form>
</div>


<div class="">
    <?php foreach($page as $k => $v ) : ?>
        <blockquote>
            <small>
                I was
            </small>
            <p>
                <?php 
                    echo $v->verbe . ' at ' . $v->place  . '. ' . $v-> quand;
                ?>
            </p>
        </blockquote>
    <?php
            endforeach;
    ?>
</div>

<div class="pagination">
  <ul>
    <?php for( $i = 1; $i <= $nbrPage; $i++):?>
    <li><a href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.$nompage.DS.'?numPage='.$i; ?>"><?php echo $i; ?></a></li>
    <?php     endfor; ?>
  </ul>
</div>

<?php    debug($_POST); ?>