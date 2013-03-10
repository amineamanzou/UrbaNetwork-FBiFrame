<?php
    session_start();
    $i = 0;
?>
<section id="overview">
    <div class="hero-unit">
        <p><?php echo $title_for_layout; ?></p>
        <i>Que font vos amis en ce moment ?</i>
    </div>
</section>

<div class="alert-message well">
  <a class="close" href="#">×</a>
  <p><strong>Normalement</strong> suite de post what they do. Avec un form pour poster.</p>
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

