<?php

use PHPUnit\Framework\TestCase;

class AverageNumberOfWordsInSentenceTest extends TestCase
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
      $this->assertEquals($expected, $analyze->averageNumberOfWordsInSentence($input));
    }

  public function textDataProvider()
  {
    return [
      ['Львів', 0],
      ['Текст для тесту.', 3.00],
      ['Львів - місто обласного значення в Україні, адміністративний центр Львівської області, Львівської агломерації, Львівського району, Львівської міської громади, національно-культурний та освітньо-науковий осередок країни, великий промисловий центр і транспортний вузол, вважається столицею Галичини та центром Західної України. За кількістю населення — шосте місто країни (станом на березень 2021 року у Львові проживало 720 383 особи).',
        27.00],
    ];
  }

}