<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">       <!-- IE compatibility -->
<html>
<head>
<title>Contacts</title>
<h1>Contacts</h1>
</head>
<body>

<?php
    $currpage = basename($_SERVER['PHP_SELF'] . '.php', '.php');
    
    if (isset($_POST['submit']) && !empty($_POST['path'])) {
        $path = escapeshellcmd($_POST['path']);
        $output = shell_exec("cat " . $path);
        echo $output;
    } else {
?>

<p><strong>Open Contact From File:</strong></p>
<form method="post" action=" <?php echo $currpage; ?> " id="contactform">
    <table>
        <tr>
            <td>
                Contact Path
            </td><td>
                <input type='text' name='path' value=''>
            </td><td>
            <input type='submit' name='submit'>
            </td>
        </tr>
    </table>
</form>

<?php  
    } //end else (path provided)
?>