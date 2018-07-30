<html>
  <head>
    <style>
      body {
        background: black;
      }
      pre {
        font-family: monospace, monospace;
        font-size: 1em;		
        color: #00FF33;
      }
    </style>
  </head>
  <body>
    <pre>
    <?php  
      while (@ ob_end_flush()); // end all output buffers if any

      $proc = popen('sh install.sh', 'r');

      while (!feof($proc))
      {
          echo fread($proc, 4096);
          @ flush();
      }
    ?>
    </pre>
  </body>
</html>
