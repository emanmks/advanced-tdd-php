<?php

namespace App;

class NameInverter {

    public function invert(string $name): string
    {
        if (empty($name)) return "";

        $name = trim($name);
        $name = preg_split("/[\s,]+/", $name);
        if (count($name) === 1) return $name[0];

        return $name[1] . ", " . $name[0];
    }
}
