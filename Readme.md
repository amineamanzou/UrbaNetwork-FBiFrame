UrbaNetwork project
===============================================================

## Introduction
This project is a Facebook iFrame that will promote underground artist sush as danser, graffer and all kind of street performer.
Urbanetwork is a project born in the university for our studies. We are a dev team composed of 3 members.
We love web developement and we wanted to use all the API that interact with social and media website for an open source and MVC project.

## Installation
### Download and install the package
* Download zip file from gitHub [here](https://github.com/amineamanzou/UrbaNetwork-FBiFrame)
* Unzip it in your document root directory

### Create your database

* Launch phppgadmin
* Create your databse for example : urbanetwork-fb
* Import the SQL file : [here](https://github.com/amineamanzou/UrbaNetwork-FBiFrame/blob/master/model/schemacreate.sql)
    Or you can find it here :

```bash
cd ./model/
```

### Configuration

* Create your configuration file :

```bash
cp ./config/config.php.dist ./config/Config.php
```

* Customize it :

  ```php
  // ./config/Config.php
  class Conf {
      
      /**
       *  Permet le stockage de plusieur base de donnée par exemple pour switcher
       *  entre un environnement de production et développement.
       */
      static  $databases = array(
                    // The production environnement on heroku
                    'default' => array( 
                        'host'      => 'ec2-23-23-201-251.compute-1.amazonaws.com',
                        'port'      => 5432,
                        'dbname'    => 'db07sb6qgledcv',
                        'login'     => 'tggzkndflnupsy',
                        'password'  => 'zmwMTm-cfCnqfZJla9WGSTU5ga' 
                    ),
                    'dev' => array(
                        'host'      => '127.0.0.1',
                        'port'      => 5432,
                        'dbname'    => 'urbanetwork-fb',  
                        'login'     => 'root',            //Your local login
                        'password'  => ''                 //Your local pass
                    )
              );
  }
  ```

### Creating the virtual host with Facebook config :

* For example :
    
    <VirtualHost *:80>
        DocumentRoot /Users/adam/Sites/myapp
        ServerName myapp.localhost
        SetEnv FACEBOOK_APP_ID 12345
        SetEnv FACEBOOK_SECRET abcde
    </VirtualHost>

## Ready !
You can now use this project as a normal web project.

