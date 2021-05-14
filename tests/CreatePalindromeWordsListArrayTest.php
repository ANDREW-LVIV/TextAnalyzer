<?php

use PHPUnit\Framework\TestCase;

class CreatePalindromeWordsListArrayTest extends TestCase
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
      $this->assertEquals($expected, $analyze->createPalindromeWordsListArray($input));
    }

  public function textDataProvider()
  {
    return [
      ['око за око, зуб за зуб', ['око']],
      ['Анна - це паліндром?', ['анна']],
      ['Що таке паліндром?', []],
    ];
  }

}