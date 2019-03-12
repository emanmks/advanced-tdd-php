<?php

namespace App;

class NameInverter {

    public function invert(string $name): string
    {
        if (empty($name)) return "";

        $splitName = $this->prepareSplitName($name);
        if (count($splitName) === 1) return $splitName[0];

        return $this->formatInvertedName($splitName);
    }

    private function isHonorific(string $word): bool
    {
        return preg_match('/(Mr|Mrs|Ms)/', $word);
    }

    private function getPostNominalFromSplitName(array $splitName): string
    {
        $postNominalList = array_slice($splitName, 2);

        $output = '';
        foreach ($postNominalList as $word) {
            $output .= $word . ' ';
        }
        return $output;
    }

    private function removeHonorific($splitName): array
    {
        if ($this->isHonorific($splitName[0])) {
            unset($splitName[0]);
            $splitName = array_values($splitName);
        }
        return $splitName;
    }

    private function formatPostNominal($splitName): string
    {
        $postNominal = '';
        if (count($splitName) > 2) {
            $postNominal = $this->getPostNominalFromSplitName($splitName);
        }
        return $postNominal;
    }

    private function prepareSplitName(string $name)
    {
        $trimmedName = trim($name);
        $splitName = preg_split("/[\s,]+/", $trimmedName);
        return $splitName;
    }

    private function formatInvertedName($splitName): string
    {
        $splitName = $this->removeHonorific($splitName);
        $postNominal = $this->formatPostNominal($splitName);

        return trim($splitName[1] . ", " . $splitName[0] . " " . $postNominal);
    }
}
