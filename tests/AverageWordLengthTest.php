<?php

use PHPUnit\Framework\TestCase;

class AverageWordLengthTest extends TestCase
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
      $this->assertEquals($expected, $analyze->averageWordLength($input));
      $this->assertIsNumeric($analyze->averageWordLength($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 5],
      ['текст для тесту', 4.33],
      ['текст для, тесту', 4.33],
      ['текст для, тесту.', 4.33],
      ['число пі 3.1415929', 3.50],
      ['число пі 3.1415929.', 3.50],
      ['Пі. Число пі 3.1415929.', 3.00],
    ];
  }

}