<?php

use PHPUnit\Framework\TestCase;

class MostLongestShortestSentencesTest extends TestCase
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
      $this->assertEquals($expected, $analyze->mostLongestShortestSentences($input, 'long'));
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
    $this->assertEquals($expected, $analyze->mostLongestShortestSentences($input, 'short'));
  }

  public function textLongDataProvider()
  {
    return [
      ['текст', ''],
      ['lviv.travel - Плануй подорож до Львова! Корисні поради та цікава інформація про те, куди піти в місті. Події, заклади, музеї та маршрути.',
        'Корисні поради та цікава інформація про те, куди піти в місті.<br><br>lviv.travel - Плануй подорож до Львова!<br><br>Події, заклади, музеї та маршрути.'],
    ];
  }

  public function textShortDataProvider()
  {
    return [
      ['текст', ''],
      ['lviv.travel - Плануй подорож до Львова! Корисні поради та цікава інформація про те, куди піти в місті. Події, заклади, музеї та маршрути.',
        'Події, заклади, музеї та маршрути.<br><br>lviv.travel - Плануй подорож до Львова!<br><br>Корисні поради та цікава інформація про те, куди піти в місті.'],
    ];
  }

}