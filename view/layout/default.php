<?php $i=1; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
        <title><?php echo isset($title_for_layout)? $title_for_layout:'Urbanetwork'; ?></title>
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.css">
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.min.css">
<!--        <link rel="stylesheet" href="/webroot/stylesheets/screen.css" media="Screen" type="text/css" />
        <link rel="stylesheet" href="/webroot/stylesheets/mobile.css" media="handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)" type="text/css" />-->

    </head>
    
    <body>
        <div class="container canvas">
            <div class="header">
                <div class="topbar" data-scrollspy="scrollspy">
                  <div class="topbar-inner">
                    <div class="container canvas">
                      <a class="brand" href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.'Welcome'; ?>">Urbanetwork</a>
                      <ul class="nav secondary-nav">
                        <?php while($i<4): ?>
                            <li <?php if ($pages[$i] == $nompage ) echo 'class="active"'; ?> >
                                <a href="<?php echo BASE_URL.'index.php'.DS.'pages'.DS.$pages[$i];?>" 
                                   title="<?php echo $pages[$i]; ?>"><?php echo $pages[$i]; ?> </a>
                            </li>
                            <?php $i++?>
                        <?php endwhile; ?>
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
            
            <div class="container canvas" style="padding-top: 60px">
                <?php   echo $this->Session->flash(); ?>
                <?php   if(!$this->Session->isLogged()) : ?>
                      <div>
                        <h1>Welcome, please connect with Facebook</h1> 
                        <div class="fb-login-button"></div>
                      </div>
                <?php   else : ?>
                    <?php   echo $content_for_layout; ?>
                <?php   endif; ?>
            </div>
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
        <script src="/webroot/javascript/bootstrap-modal.js"></script>
            <script type="text/javascript">
                function logResponse(response) {
                  if (console && console.log) {
                    console.log('The response was', response);
                  }
                }

                $(function(){
                  // Set up so we handle click on the buttons
                  $('#postToWall').click(function() {
                    FB.ui(
                      {
                        method : 'feed',
                        link   : $(this).attr('data-url')
                      },
                      function (response) {
                        // If response is null the user canceled the dialog
                        if (response != null) {
                          logResponse(response);
                        }
                      }
                    );
                  });

                  $('#sendToFriends').click(function() {
                    FB.ui(
                      {
                        method : 'send',
                        link   : $(this).attr('data-url')
                      },
                      function (response) {
                        // If response is null the user canceled the dialog
                        if (response != null) {
                          logResponse(response);
                        }
                      }
                    );
                  });

                  $('#sendRequest').click(function() {
                    FB.ui(
                      {
                        method  : 'apprequests',
                        message : $(this).attr('data-message')
                      },
                      function (response) {
                        // If response is null the user canceled the dialog
                        if (response != null) {
                          logResponse(response);
                        }
                      }
                    );
                  });
                });
              </script>

              <script type="text/javascript">
                window.fbAsyncInit = function() {
                  FB.init({
                    appId      : '<?php echo AppInfo::appID(); ?>', // App ID
                    channelUrl : '<?php echo ROOT.DS.'webroot'; ?>/channel.html', // Channel File
                    status     : true, // check login status
                    cookie     : true, // enable cookies to allow the server to access the session
                    xfbml      : true // parse XFBML
                  });

                  // Listen to the auth.login which will be called when the user logs in
                  // using the Login button
                  FB.Event.subscribe('auth.login', function(response) {
                    // We want to reload the page now so PHP can read the cookie that the
                    // Javascript SDK sat. But we don't want to use
                    // window.location.reload() because if this is in a canvas there was a
                    // post made to this page and a reload will trigger a message to the
                    // user asking if they want to send data again.
                    window.location = window.location;
                  });

                  FB.Canvas.setAutoGrow();
                };

                // Load the SDK Asynchronously
                (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/all.js";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
              </script>
        
    </body>
</html>
