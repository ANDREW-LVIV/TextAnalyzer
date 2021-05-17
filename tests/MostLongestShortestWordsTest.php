<?php

use PHPUnit\Framework\TestCase;

class MostLongestShortestWordsTest extends TestCase
{

  /**
   * @dataProvider textLongDataProvider
   *
   * @param $input
   * @param $expected
   */
    public function testLongFunction($input, $expected)
    {
      $analyze = new TextAnalyzer\Analyzer();
      $this->assertEquals($expected, $analyze->mostLongestShortestWords($input, 'long'));
      $this->assertIsString($analyze->mostLongestShortestWords($input, 'long'));
    }

  /**
   * @dataProvider textShortDataProvider
   *
   * @param $input
   * @param $expected
   */
  public function testShortFunctions($input, $expected)
  {
    $analyze = new TextAnalyzer\Analyzer();
    $this->assertEquals($expected, $analyze->mostLongestShortestWords($input, 'short'));
    $this->assertIsString($analyze->mostLongestShortestWords($input, 'short'));
  }

  public function textLongDataProvider()
  {
    return [
      ['текст', 'текст'],
      ['Один, Два, Три, Чотири, П\'ять, Шість, Сім, Вісім, Дев\'ять ,Десять.',
        'дев\'ять, чотири, десять, п\'ять, шість, вісім, один, два, три, сім'],
      ['текст для тесту', 'текст, тесту, для'],
      ['Львів - місто обласного значення в Україні, адміністративний центр Львівської області, Львівської агломерації, Львівського району, Львівської міської громади, національно-культурний та освітньо-науковий осередок країни, великий промисловий центр і транспортний вузол, вважається столицею Галичини та центром Західної України. За кількістю населення — шосте місто країни (станом на березень 2021 року у Львові проживало 720 383 особи).',
        'національно-культурний, освітньо-науковий, адміністративний, транспортний, промисловий, львівського, агломерації, вважається, львівської, населення'],
    ];
  }

  public function textShortDataProvider()
  {
    return [
      ['текст', 'текст'],
      ['Один, Два, Три, Чотири, П\'ять, Шість, Сім, Вісім, Дев\'ять ,Десять.',
        'два, три, сім, один, п\'ять, шість, вісім, чотири, десять, дев\'ять'],
      ['текст для тесту', 'для, текст, тесту'],
      ['Львів - місто обласного значення в Україні, адміністративний центр Львівської області, Львівської агломерації, Львівського району, Львівської міської громади, національно-культурний та освітньо-науковий осередок країни, великий промисловий центр і транспортний вузол, вважається столицею Галичини та центром Західної України. За кількістю населення — шосте місто країни (станом на березень 2021 року у Львові проживало 720 383 особи).',
        'та, на, за, року, львів, шосте, вузол, місто, особи, центр'],
    ];
  }

}