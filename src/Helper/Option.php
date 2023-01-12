<?php

namespace BingoPress\Helper;

!defined( 'WPINC ' ) or die;

/**
 * Helper library for framework
 */

trait Option {

    /** Array Merge Recursive */
    public function ArrayMergeRecursive(array $array1, array $array2){
        $merged = $array1;
        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = $this->ArrayMergeRecursive($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }
        return $merged;
    }

}
