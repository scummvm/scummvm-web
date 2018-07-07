<html>
<body>
<pre>
<?php
  echo shell_exec("cd ..;echo '$ git pull --rebase';git pull --rebase;echo '$ git status';git status;composer install");
?>
</pre>
</body>
</html>
