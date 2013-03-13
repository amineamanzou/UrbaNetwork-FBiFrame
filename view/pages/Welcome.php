
    <div class="hero-unit">
      <h2>Welcome, <strong><?php echo $this->Session->read('nom').' '.$this->Session->read('prenom'); ?></strong></h2>
      <h4>
        You can share this project and help us to increase the sharing experience :
      </h4>
    </div>
    <div class="pull-right">
          <a href="#" class="btn" id="postToWall" data-url="<?php echo AppInfo::getUrl(); ?>">
            <span class="plus">Post to Wall</span>
          </a>

          <a href="#" class="btn" id="sendToFriends" data-url="<?php echo AppInfo::getUrl(); ?>">
            <span class="speech-bubble">Send Message</span>
          </a>

          <a href="#" class="btn" id="sendRequest" data-message="Test this awesome app">
            <span class="apprequests">Send Requests</span>
          </a>
    </div>
<br>
<?php
            debug($this->Session->read());
            
?>
