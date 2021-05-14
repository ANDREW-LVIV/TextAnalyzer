<?php

use PHPUnit\Framework\TestCase;

class CreateSentencesListArrayTest extends TestCase
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
      $this->assertEquals($expected, $analyze->createSentencesListArray($input));
    }

  public function textDataProvider()
  {
    return [
      ['', []],
      ['текст', []],
      ['текст для тесту', []],
      ['текст для, тесту', []],
      ['текст для, тесту.', ['текст для, тесту.']],
      ['число пі 3.1415929', []],
      ['число пі 3.1415929.', ['число пі 3.1415929.']],
      ['Пі. Число пі 3.1415929.', ['Пі.', 'Число пі 3.1415929.']],
    ];
  }

}