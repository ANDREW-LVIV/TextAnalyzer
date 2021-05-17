<?php

use PHPUnit\Framework\TestCase;

class MostLongestPalindromeWordsTest extends TestCase
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
      $this->assertEquals($expected, $analyze->mostLongestPalindromeWords($input));
      $this->assertIsString($analyze->mostLongestPalindromeWords($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', ''],
      ['око за око, зуб за зуб', 'око'],
      ['Don\'t nod.', ''],
      ['I did, did I?', 'did'],
      ['Anna Civic Kayak Level Madam Mom Noon Racecar Radar Redder Refer Repaper Rotator Rotor Sagas Solos Stats Tenet Wow',
        'rotator, repaper, racecar, redder, level, stats, solos, sagas, rotor, refer'],
    ];
  }

}