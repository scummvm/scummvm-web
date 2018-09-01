<?php
  switch (PHP_OS) {
    case "Darwin":
      exec('open http://localhost:8000');
      break;
    case "Linux":
      exec('xdg-open http://localhost:8000');
      break;
    case "Windows":
      exec('start http://localhost:8000');
      break;
    default:
      exec('xdg-open http://localhost:8000');
      break;
  }
?>
