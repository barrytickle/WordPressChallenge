<?php
  wp_footer(); //Grabs all the wordpress javascript

  /* Optional But mainly used on Physio123 Client Blogs */
  // include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php';
  /*
    ===============================================
                        OR
    ===============================================
   */
  /*
    $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
    $file = str_replace('//content','', $file);
    echo $file;
  */
 ?>
