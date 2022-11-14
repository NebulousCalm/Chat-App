<!DOCTYPE html>
<html>
<head>
  <title>Chat App</title>
  <noscript>If you are seeing this it means you don't have javascript please enable it</noscript>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
  <script defer src="script.js"></script>
  <script>
  // iframe refresh and super rad jquery :) 
  $(function() {
    function refreshIFrame() {
      setTimeout(function() {
        $('#iFrame').attr('src', $('#iFrame').attr('src'));
        $('#chatLog').html( $('#iFrame').contents().find('body').find('div').html() );
        refreshIFrame();
      }, 1000);    
    }
    refreshIFrame();
  });
  </script>
</head>
<body onload="checkCookie()">
  <div id="main"></div>

  <!-- chat iframe -->
  <div id="chatLog"></div>
  <iframe src="chat.php" id="iFrame"></iframe>

  <!-- form -->
  <form class="input-form text" method="post">
    <input type="text" name="user" placeholder="User" id="name" class="text-box" style="width:600px;" readonly><br>
    <br>
    <input type="text" name="input" placeholder="Enter a message" class="text-box" required>
    <input type="submit" name="Send" id="btn">
  </form>
</body>
</html>

<!-- PHP script -->
<?php
  if(isset($_POST['input'])) {
    $filename = "./chat.data";
    $data = htmlspecialchars($_POST['input']);
    $user = $_POST['user'];
    $output= $user.': ' .$data. '\\n';
    $file_contents = file_get_contents($filename);
    $content = $output . $file_contents;
    file_put_contents($filename, $content);  
  }
?>
