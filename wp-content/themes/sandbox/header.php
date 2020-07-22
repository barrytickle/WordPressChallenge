<?php
session_start();

  wp_head(); //Grabs all the wordpress styling
  // include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php';
  /*
   DONT UN-COMMENT THIS.
   bloginfo('template_directory') ---- Gets the file path to the theme folder.
   e.g. <link rel="stylesheet" href="<?php echo bloginfo('template_directory').'/style.css'; ?>">
  */
  /*
    ===============================================
                        OR
    ===============================================
   */
  /*
    $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
    $file = str_replace('//content','', $file);
    echo $file;
  */
 ?>
<link rel="stylesheet" href="<?php echo bloginfo('template_directory').'/style.css'; ?>">


<div class="site-container">
  <div class="site-pusher">

    <header class="header">

      <a href="#" class="header__icon" id="header__icon"></a>
      <a href="#" class="header__logo">Taxonomies</a>
      <nav class="menu">
        <?php $terms = get_terms('book_genre');?>
        <?php foreach($terms as $t): ?>
          <a href="/genre/<?php echo $t->slug; ?>"><?php echo $t->name; ?></a>
        <?php endforeach; ?>
      </nav>
    </header>
