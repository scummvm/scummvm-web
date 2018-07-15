<html>
<body>
<pre>
<?php
  // Leaving this in initially in case the new script doesn't run...
  echo shell_exec("cd ..;echo '$ git pull --rebase';git pull --rebase;echo '$ git status';git status;echo '$ composer install';composer install 2>&1");

  echo shell_exec('sh install.sh');
?>
</pre>
</body>
</html>
