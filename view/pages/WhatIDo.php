<?php
    $title_for_layout = 'What I Do';
    $i = 0;
?>
<section id="overview">
    <div class="hero-unit">
        <p><?php echo $title_for_layout; ?></p>
        <i>Qu'est je fait ces derniers jours ?</i>
    </div>
</section>

<div class="alert-message well">
  <a class="close" href="#">×</a>
  <p><strong>Normalement</strong> suite de post what i do. Avec un form pour poster.</p>
</div>


<div class="">
    <?php while(isset($page[$i])) { ?>
        <blockquote>
            <small>
                I was
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

<?php debug($page); ?>

