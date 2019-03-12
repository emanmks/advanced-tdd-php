<?php

namespace App;

class NameInverter {

    public function invert(string $name): string
    {
        if (empty($name)) return "";

        $trimmedName = trim($name);
        $splitName = preg_split("/[\s,]+/", $trimmedName);
        if (count($splitName) === 1) return $splitName[0];
        if ($this->isHonorific($splitName[0])) {
            unset($splitName[0]);
            $splitName = array_values($splitName);
        }

        return $splitName[1] . ", " . $splitName[0];
    }

    private function isHonorific(string $word): bool
    {
        return preg_match('/(Mr|Mrs|Ms)/', $word);
    }
}
