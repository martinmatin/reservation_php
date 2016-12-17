<?php
class ShowTable {
    function render($file, $variables) {

        include $file;

        return $variables;
    }
}?>
