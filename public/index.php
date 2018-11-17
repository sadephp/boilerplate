<?php

require_once __DIR__ . '/../vendor/autoload.php';

$srcDir = __DIR__ . '/../src';
$files = Webmozart\Glob\Glob::glob($srcDir . '/**/index.php');
$component = empty($_GET['component']) ? '' : strtolower($_GET['component']);

?>

<html>
    <head>
        <title>Sade Components</title>
        <style type="text/css">
            body {
                height: 100%;
                padding: 0;
                margin: 0;
            }

            .sade-boilerplate-container {
                height: 100%;
                display: -ms-flexbox;
                display: -webkit-box;
                display: -moz-box;
                display: -ms-box;
                display: box;
                -ms-flex-direction: row;
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                -ms-box-orient: horizontal;
                box-orient: horizontal;
            }

            .sade-boilerplate-nav {
                font-family: 'Helvetica', 'Arial', sans-serif;
                background: #eee;
                width: 200px;
                -ms-flex: 0 200px;
                -webkit-box-flex:  0;
                -moz-box-flex:  0;
                -ms-box-flex:  0;
                box-flex:  0;
                padding: 10px;
                border-right: 1px #ddd solid;
            }

            .sade-boilerplate-nav a {
                color: #232323;
            }

            .sade-boilerplate-component {
                -ms-flex: 1;
                -webkit-box-flex: 1;
                -moz-box-flex: 1;
                -ms-box-flex: 1;
                box-flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <div class="sade-boilerplate-container">
        <?php
            echo '<div class="sade-boilerplate-nav">';
            echo '<h3>Sade Components</h3>';
            echo '<ul>';

            foreach ($files as $file) {
                $file = realpath($file);
                $parts = explode('/', $file);
                $folder = $parts[count($parts)-2];
                echo sprintf('<li><a href="?component=%s">%s</a></li>', $folder, $folder);
            }

            echo '</ul>';
            echo '</div>';

            echo '<div class="sade-boilerplate-component">';
            if (!empty($component)) {
                $sade = new Sade\Sade($srcDir);
                echo $sade->render($component);
            } else {
                echo 'Select a component to view';
            }
            echo '</div>';
            ?>
        </div>
    </body>
</html>