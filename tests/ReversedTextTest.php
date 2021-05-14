<?php

use PHPUnit\Framework\TestCase;

class ReversedTextTest extends TestCase
{

  /**
   * @dataProvider textDataProvider
   *
   * @param $input
   * @param $expected
   */
    public function testFunction($input, $expected)
    {
      $analyze = new TextAnalyzer\Analyzer();
      $this->assertEquals($expected, $analyze->reversedText($input));
    }

  public function textDataProvider()
  {
    return [
      ['', ''],
      ['текст', 'тскет'],
      ['Пі. Число пі 3.1415929.', '.9295141.3 іп олсиЧ .іП'],
    ];
  }

}