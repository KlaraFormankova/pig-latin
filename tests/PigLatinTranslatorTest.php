<?php

use PHPUnit\Framework\TestCase;
use App\PigLatinTranslator;

class PigLatinTranslatorTest extends TestCase
{
    public function testTranslateWordStartingWithConsonant()
    {
        $translator = new PigLatinTranslator();
        $result = $translator->translateToPigLatin('hello');
        $this->assertEquals('ello-hay', $result);
    }

    public function testTranslateWordStartingWithVowel()
    {
        $translator = new PigLatinTranslator();
        $result = $translator->translateToPigLatin('apple');
        $this->assertEquals('apple-ay', $result);
    }

    public function testTranslateWordStartingWithConsonantCluster()
    {
        $translator = new PigLatinTranslator();
        $result = $translator->translateToPigLatin('glove');
        $this->assertEquals('ove-glay', $result);
    }

    public function testTranslateWordStartingWithQu()
    {
        $translator = new PigLatinTranslator();
        $result = $translator->translateToPigLatin('queen');
        $this->assertEquals('een-quay', $result);
    }

    public function testTranslateWordStartingWithConsonantAndQu()
    {
        $translator = new PigLatinTranslator();
        $result = $translator->translateToPigLatin('square');
        $this->assertEquals('are-squay', $result);
    }
}

