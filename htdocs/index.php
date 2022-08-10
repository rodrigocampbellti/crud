<?php


require('config/_config.php');


if (isset($_GET['p']))


    $page = htmlspecialchars(trim(strtolower($_GET['p'])));


else


    $page = 'home';


if (!file_exists('page/' . $page . '.php'))

    $page = 'e404';


require('page/' . $page . '.php');



if (file_exists('css/' . $page . '.css'))

   
    $page_css = '<link rel="stylesheet" href="css/' . $page . '.css">';


else


    $page_css = '';


if (file_exists('js/' . $page . '.js'))


    $page_js = '<script src="js/' . $page . '.js"></script>';


else

    $page_js = '';


if ($page_title != '') $page_title .= ' ~ CRUD Usuário';
else $page_title = 'CRUD Usuário';


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <?php
 
    echo $page_css;
    ?>

    
    <title><?php echo $page_title ?></title>
</head>

<body>

    <div class="wrap">

        <header>
            <h1>
                <a href="/">
                Application 2022 </a>
            </h1>
        </header>

        <nav>
            <a href="/">Listagem</a>
            <a href="/?p=new">Cadastro</a>
            
        </nav>

        <main>
            <?php
         
            echo $page_content;
            ?>
        </main>

        <footer>&copy; Criado por Rodrigo Campbell em 2022</footer>

    </div>

    <script src="js/script.js"></script>

    <?php

    echo $page_js;
    ?>

</body>

</html>