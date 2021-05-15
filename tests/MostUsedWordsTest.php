<?php

use PHPUnit\Framework\TestCase;

class MostUsedWordsTest extends TestCase
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
      $this->assertEquals($expected, $analyze->mostUsedWords($input, 10));
      $this->assertIsString($analyze->mostUsedWords($input, 10));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 'текст'],
      ['текст для тесту', 'текст, для, тесту'],
      ['Львів - місто обласного значення в Україні, адміністративний центр Львівської області, Львівської агломерації, Львівського району, Львівської міської громади, національно-культурний та освітньо-науковий осередок країни, великий промисловий центр і транспортний вузол, вважається столицею Галичини та центром Західної України. За кількістю населення — шосте місто країни (станом на березень 2021 року у Львові проживало 720 383 особи).', 'львівської, місто, країни, центр, та, львів, за, галичини, центром, західної'],
    ];
  }

}