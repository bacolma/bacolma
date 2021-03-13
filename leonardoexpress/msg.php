<?php
    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
        echo '<div class="alert alert-danger" role="alert">';
        foreach($_SESSION['ERRMSG_ARR'] as $msg) {           
                echo ''.$msg.'<br>';               
        }
        echo '</div>';
        unset($_SESSION['ERRMSG_ARR']);
    }
      
    
    if( isset($_SESSION['OK_ARR']) && is_array($_SESSION['OK_ARR']) && count($_SESSION['OK_ARR']) >0 ) {
        echo '<div class="alert alert-success" role="alert">';
        foreach($_SESSION['OK_ARR'] as $msg) {
            echo ''.$msg.'<br>';
        }
        echo '</div>';
        unset($_SESSION['OK_ARR']);
    }
?>
