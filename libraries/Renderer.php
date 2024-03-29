<?php

class Renderer
{


    public static function render(string $path, array $variables = [])
    {
    
        // ['var1' => 2, ]
        extract($variables);
    
        ob_start();
        require('templates/' . $path . '.html.php');
        $pageContent = ob_get_clean();
    
        require('templates/layout.html.php');
    }

}