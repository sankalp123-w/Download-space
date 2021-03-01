<?php 
include 'inc/info.php';
$title = 'Contact Us | '.$sitename.'';
include 'inc/head.php';
echo '<div class="title" align="center">Contact Us</div>';
echo '<div class="item" align="center">';
$action=$_REQUEST['action']; 
if ($action=="")    /* display the contact form */ 
    { 
    ?> 
    <form  action="" method="POST" enctype="multipart/form-data"> 
    <input type="hidden" name="action" value="submit"> 
    Your name:<br> 
    <input name="name" class="input" type="text" value="" size="30"/><br> 
    Your email:<br> 
    <input name="email" class="input" type="text" value="" size="30"/><br> 
    Your message:<br> 
    <textarea name="message" cols="23" rows="4"/></textarea>
    <br> 
    <br>
    <input type="submit" class="button3" value="Send mail" title="Send Email!"/> 
    </form> 
    <?php 
    }  
else                /* send the submitted data */ 
    { 
    $name=$_REQUEST['name']; 
    $email=$_REQUEST['email']; 
    $message=$_REQUEST['message']; 
    if (($name=="")||($email=="")||($message=="")) 
        { 
        echo '<div align="center">All fields are required, please fill <a href="javascript:history.back(1)" title="Back To Fill Form">the form</a> again.</div>'; 
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        $subject="youtubelk.tk YouTube Problem"; 
        mail("'.$mail.'", $subject, $message, $from);
        echo '<div class="success">Your message received successfully</div>'; 
        } 
    } 
echo '</div>';
include 'inc/foot.php';  
?> 