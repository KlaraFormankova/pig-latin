<?php
namespace App;

use Nette;

class PigLatinTranslator
{
    const PIG_LATIN_SUFFIX = 'ay';

    public function translateToPigLatin($word)
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $consonantCluster = '';

        // Find the initial consonant cluster
        while (!in_array(strtolower(substr($word, 0, 1)), $vowels) && !empty($word)) {
            $consonantCluster .= substr($word, 0, 1);
            $word = substr($word, 1);
        }

        // 'qu' is also consonant cluster
        if (strtolower(substr($consonantCluster, -1)) === 'q' && strtolower(substr($word, 0, 1)) === 'u') {
            $consonantCluster .= substr($word, 0, 1);
            $word = substr($word, 1);
        }

        // If there was no consonant cluster, the word starts with a vowel
        if (empty($consonantCluster)) {
            return $word . '-' . self::PIG_LATIN_SUFFIX;
        } else if (empty($word)) {
            return $consonantCluster . '-' . self::PIG_LATIN_SUFFIX;
        } else {
            return $word . '-' . $consonantCluster . self::PIG_LATIN_SUFFIX;
        }
    }
}
