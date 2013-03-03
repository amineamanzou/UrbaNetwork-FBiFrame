<!DOCTYPE html>
<html>
    <head>
        <title>Urbanetwork</title>
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.css">
        <link rel="stylesheet" href="/webroot/stylesheets/fbootstrapp/bootstrap.min.css">
    </head>
    
    <body>
        <div class="header">
            <div class="topbar" data-scrollspy="scrollspy">
              <div class="topbar-inner">
                <div class="container canvas">
                  <a class="brand" href="#">Urbanetwork</a>
                  <ul class="nav">
                    <li class="active"><a href="#">WhatTheyDo</a></li>
                    <li><a href="#">WhatIDo</a></li>
                    <li><a href="#">Channel</a></li>
                    <li class="dropdown" data-dropdown="dropdown">
                        <a href="#" class="dropdown-toggle">About Us</a>
                        <ul class="dropdown-menu">
                          <li><a href="#">The project</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
        
        <div class="container">
            <?php   echo $content_for_layout; ?>
        </div> 
        
        <div class="footer">
            
        </div>
    </body>
</html>
