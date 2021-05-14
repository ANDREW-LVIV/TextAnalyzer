<?php

use PHPUnit\Framework\TestCase;

class NumberOfWordsTest extends TestCase
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
      $this->assertEquals($expected, $analyze->numberOfWords($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 1],
      ['текст для тесту', 3],
      ['текст для, тесту.', 3],
      ['текст для, тесту. ще один текст.', 6],
    ];
  }

}