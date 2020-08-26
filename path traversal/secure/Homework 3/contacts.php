<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">       <!-- IE compatibility -->
<html>
<head>
<title>Contacts</title>
<h1>Contacts</h1>
</head>
<body>

<?php
    $currpage = basename($_SERVER['PHP_SELF'] . '.php', '.php');
    $whitelist = ['Contact1.txt','Contact2.txt'];
    
    if (isset($_POST['submit'])) {
        $path = escapeshellcmd($_POST['entry']);
        $output = shell_exec("cat " . $path);
        echo $output;
    } else {
        echo    "<p><strong>Open Contact:</strong></p>" .
                "<form method='post' action='$currpage' id='contactform'>" . 
                "<table><tr><td><select name='entry'>";
        for ($i=0; $i<count($whitelist); $i++) {
            echo    "<option value='$whitelist[$i]'>$whitelist[$i]</option>";
        }
        echo    "</select></td><td><input type='submit' name='submit'></tr></table></form>";
  
    } //end else (path provided)
?>