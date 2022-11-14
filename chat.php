<title>Output</title>
<body>
  <div>
    <?php 
      $contents = (explode("\\n",file_get_contents("chat.data")));

      foreach ($contents as $content)
      echo '<p class="text">' .$content. '</p>';
    ?>
  </div>
</body>
