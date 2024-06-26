--TEST--
Bug #26697 (calling class_exists on a nonexistent class in autoloader results in segfault)
--FILE--
<?php

spl_autoload_register(function ($name) {
    echo __METHOD__ . "($name)\n";
    var_dump(class_exists('NotExistingClass'));
    echo __METHOD__ . "($name), done\n";
});

var_dump(class_exists('NotExistingClass'));

?>
--EXPECTF--
{closure:%s:%d}(NotExistingClass)
bool(false)
{closure:%s:%d}(NotExistingClass), done
bool(false)
