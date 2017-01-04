<?php
class View {
    function render($file, $variables = array(),$people=array()) {
        extract($people);
        extract($variables);

        ob_start();
        include $file;
        $renderedView = ob_get_clean();

        return $renderedView;
    }
}?>
