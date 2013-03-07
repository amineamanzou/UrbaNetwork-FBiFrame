<?php $i=0; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
        <title><?php echo isset($title_for_layout)? $title_for_layout:'Urbanetwork'; ?></title>
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.css">
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container canvas">
            <div class="header">
                <div class="topbar" data-scrollspy="scrollspy">
                  <div class="topbar-inner">
                    <div class="container canvas">
                      <a class="brand" href="#">Urbanetwork</a>
                      <ul class="nav secondary-nav">
                        <?php while($i<3){ ?>
                            <li <?php if ($pages[$i] == $nompage ) echo 'class="active"'; ?> >
                                <a href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.$pages[$i];?>" 
                                   title="<?php echo $pages[$i]; ?>"><?php echo $pages[$i]; ?> </a>
                            </li>
                            <?php $i++?>
                        <?php } ?>
                        <li class="dropdown" data-dropdown="dropdown">
                            <a href="#" class="dropdown-toggle">About Us</a>
                            <ul class="dropdown-menu">
                              <li <?php if ($pages[$i+1] == $nompage ) echo 'class="active"'; ?> >
                                <a href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.$pages[$i+1];?>" 
                                   title="<?php echo $pages[$i+1]; ?>"><?php echo $pages[$i+1]; ?> </a>
                              </li>
                              <li class="divider"></li>
                              <li <?php if ($pages[$i] == $nompage ) echo 'class="active"'; ?> >
                                <a href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.$pages[$i];?>" 
                                   title="<?php echo $pages[$i]; ?>"><?php echo $pages[$i]; ?> </a>
                              </li>
                            </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            
            <br>
            <br>
            <br>
        
            <?php   echo $content_for_layout; ?>
            
            <br>
            <br>
            <br>
        </div>
        <footer>
            <div class="container canvas">
                <div class="row">
                    <div class="span4 foot">
                        <p>
                        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US">
                            <img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
                        </a><br/>
                        This work is licensed under a 
                        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US">
                            Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License
                        </a>.</p>
                        <p>&copy; urbanetwork.com 2012-2013.</p>
                    </div>
                    <div class="span5 foot">
                        <h3>Communautées</h3>
                        <div class="row">
                            <div class="span1">
                                <a href="http://www.facebook.com/pages/Urbanetwork" >
                                    <img src="/webroot/images/IcoFacebook.jpeg"/>
                                </a>
                            </div>
                            <div class="span1">
                                <a href="https://plus.google.com/Urbanetwork" >
                                    <img src="/webroot/images/IcoGoogle.jpeg"/>
                                </a>
                            </div>
                            <div class="span1">
                                <a href="http://www.twitter.com/Urbanetwork" >
                                    <img src="/webroot/images/IcoTwitter.jpeg"/>
                                </a>
                            </div>
                            <div class="span1">
                                <a href="http://in.linkedin.com/in/Urbanetwork" >
                                    <img src="/webroot/images/IcoLinkedIn.jpeg"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="span3 foot">
                        <img class="thumbnail" src="/webroot/images/smallLogo.png" alt="Urbanetwork logo"/>
                    </div> 
                </div>
            </div>
        </footer>
        <!-- Le javascript -->
        <script src="/webroot/javascript/jquery-1.7.1.min.js"></script>
        <script src="/webroot/javascript/bootstrap-alerts.js"></script>
        <script src="/webroot/javascript/bootstrap-popover.js"></script>
        <script src="/webroot/javascript/bootstrap-twipsy.js"></script>
        <script src="/webroot/javascript/bootstrap-tabs.js"></script>
        <script src="/webroot/javascript/bootstrap-dropdown.js"></script>
        
    </body>
</html>
