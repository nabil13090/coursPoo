<?php

spl_autoload_register(function($className) {

    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    require_once("libraries/$className.php");
});

// DIRECTORY_SEPARATOR 
// Dans le contexte fourni, DIRECTORY_SEPARATOR est une constante utilisée dans le langage de programmation PHP. 
// Elle est utilisée pour séparer les composants d'un chemin de fichier. Sa valeur est une chaîne spécifique au système d'exploitation utilisée 
// sur les systèmes Windows (\\) et les systèmes de type Unix (/).
// Dans ce cas, le fragment de code fourni démontre son utilisation dans une fonction d'autoload personnalisée pour les classes PHP. 
// Cette fonction utilise DIRECTORY_SEPARATOR pour formater correctement le chemin de fichier lors du chargement d'un fichier de classe nommé d'après 
// le nom de la classe, garantissant ainsi que le code fonctionne de manière cohérente sur différents systèmes d'exploitation //

