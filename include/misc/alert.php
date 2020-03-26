<?php
      
if($msg == "303") { 
    
    echo '<div class=slidingDiv><font color=#F68484>The email and password is not match!</font></div>'; }

else if($msg == "302") {
    
    echo '<div class=slidingDiv><font color=#F68484>Sorry, We doesnt recognize that email.</font></div>';
}

else if($msg == "301") {
    
    echo '<div class=slidingDiv><font color=#F68484>Sorry, Please Login First!</font></div>';
}

else if($msg == "202") {
    
    echo '<div class=slidingDiv><font color=#2cc36b>Reset done. Please check your email!</font></div>';
} else if($msg == "101") {
    
    echo '<div class=slidingDiv><font color=#1abc9c>Password successfully reset. </font></div>';
} else if($msg == "201") {
    
    echo '<div class=slidingDiv><font color=#1abc9c>You have successfully logged out.</font></div>';
}

?>