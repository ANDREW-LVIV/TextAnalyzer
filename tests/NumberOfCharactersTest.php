<?php

use PHPUnit\Framework\TestCase;

class NumberOfCharactersTest extends TestCase
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
      $this->assertEquals($expected, $analyze->numberOfCharacters($input));
    }

  public function textDataProvider()
  {
    return [
      ['', 0],
      ['текст', 5],
      ['текст для тесту', 15],
      ['текст для, тесту.', 17],
    ];
  }

}