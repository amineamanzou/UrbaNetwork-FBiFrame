
    <div class="hero-unit">
      <h2>Welcome, <strong><?php echo $this->Session->read('nom').' '.$this->Session->read('prenom'); ?></strong></h2>
      <h4>
        You can share this project and help us to increase the sharing experience :
      </h4>
    </div>

    <div class="span-two-thirds pull-right">
        <h3><strong> Classement </strong></h3>
        <table class="zebra-striped">
            <thead>
                <th>Score</th>
                <th>User</th>
                <th>Discipline</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
<br>
    <div class="span-two-thirds pull-right">
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
            //debug($this->Session->read());
            
            
?>
