<?php

use PHPUnit\Framework\TestCase;

class MirrorMultibyteStringTest extends TestCase
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
      $this->assertEquals($expected, $analyze->mirrorMultibyteString($input));
    }

  public function textDataProvider()
  {
    return [
      ['lviv.travel - Плануй подорож до Львова! Корисні поради та цікава інформація про те, куди піти в місті. Події, заклади, музеї та маршрути.',
        'маршрути. та музеї заклади, Події, місті. в піти куди те, про інформація цікава та поради Корисні Львова! до подорож Плануй - lviv.travel'],
    ];
  }

}