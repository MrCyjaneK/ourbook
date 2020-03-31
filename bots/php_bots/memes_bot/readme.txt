So the bot was working, but photo quality waas low. So it is no more.

nginx conf:
 
    location /i {
      try_files $uri $uri $uri/ @extensionless-php;
    }
    location /a {
      try_files $uri $uri $uri/ @extensionless-php;
    }
    location @extensionless-php {
      rewrite ^(.*)$ $1.php last;
    }
