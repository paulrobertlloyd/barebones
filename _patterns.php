<!DOCTYPE html><html lang="en-gb"<?php if($_GET['debug']==true) echo ' class="debug"';?>>

<head>
    <title>Pattern Primer</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/_css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="/_css/patterns.css" type="text/css"/>
    <style>
        .pattern {
            margin:2em 0;
            border-top:1px dotted #d0d0d0;
            padding:2em 0 1.9375em;
            }
            .pattern:before, .pattern:after {
                content:"";
                display:table;
                margin-bottom:-1px;
            }
            .pattern:after {
                clear:both;
            }
        .pattern .display {
            width:55%;
            float:left;
        }
        .pattern .source {
            width:35%;
            float:right;
        }
        .pattern .source textarea {
            font:0.75em/1.5 Menlo,Monaco,'Courier New',Courier,monospace; /* 16px/24px */
            width:100%;
        }
    </style>
</head>

<body>
    <h1>Pattern Primer</h1>
    <p class="lede">A guide to all the common snippets of markup used throughout the site.</p>

<?php
    $files = array();
    $patterns_dir = "_patterns";
    $handle = opendir($patterns_dir);
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;
    sort($files);
    foreach ($files as $file):
        echo '<div class="pattern">';
        echo '<div class="display">';
        include($patterns_dir.'/'.$file);
        echo '</div>';
        echo '<div class="source">';
        echo '<textarea rows="10" cols="30">';
        echo htmlspecialchars(file_get_contents($patterns_dir.'/'.$file));
        echo '</textarea>';
        echo '<p><a href="'.$patterns_dir.'/'.$file.'">'.$file.'</a></p>';
        echo '</div>';
        echo '</div>';
    endforeach;
?>
    <footer role="contentinfo">
        <nav role="navigation">
            <ul>
                <li><a href="_styleguide.php">Styleguide</a></li>
                <li><a href="_patterns.php">Pattern Primer</a></li>
                <li><a href="readme.md">Read Me</a></li>
            </ul>
        </nav>
        <p><small>Copyright &#169; 2012 Paul Robert Lloyd. This work is <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/2.0/uk/">Creative Commons licensed</a>.</small></p>
    </footer><!--/.contentinfo-->
</body>
</html>