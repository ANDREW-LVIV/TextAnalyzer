<?php

use PHPUnit\Framework\TestCase;

class NumberOfSentencesTest extends TestCase
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
      $this->assertEquals($expected, $analyze->numberOfSentences($input));
      $this->assertIsInt($analyze->numberOfSentences($input));
    }

  public function textDataProvider()
  {
    return [
      ['', 0],
      ['текст', 0],
      ['текст для тесту', 0],
      ['текст для, тесту.', 1],
      ['Пі. Число пі 3.1415929.', 2],
      ['Пі. Число пі 3.1415929!', 2],
      ['Пі. Чи число пі рівне 3.1415929?', 2],
      ['Пі.... Це 3.1415929?!', 2],
      ['текст для, тесту. ще одине речення.', 2],
    ];
  }

}