<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>Mars Rovers:</h1>
        <?php
        
        $rovers = $vars['rovers'];
        
        foreach ($rovers as $rover) {

            echo '<pre>';
            print_r($rover);
            echo '</pre>';
            
        }
        
        ?>
    </body>
</html>
