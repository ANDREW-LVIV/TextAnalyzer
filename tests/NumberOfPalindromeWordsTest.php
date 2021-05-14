<?php

use PHPUnit\Framework\TestCase;

class NumberOfPalindromeWordsTest extends TestCase
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
      $this->assertEquals($expected, $analyze->numberOfPalindromeWords($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 0],
      ['текст для тесту', 0],
      ['око за око, зуб за зуб', 1],
      ['Don\'t nod.', 0],
      ['I did, did I?', 1],
    ];
  }

}