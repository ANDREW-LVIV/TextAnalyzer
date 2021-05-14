<?php

use PHPUnit\Framework\TestCase;

class calculateHashTest extends TestCase
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
      $this->assertEquals($expected, $analyze->calculateHash($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', '9c3be446b6247e1110062439f0956f69accf2c51'],
      ['lviv.travel - Плануй подорож до Львова! Корисні поради та цікава інформація про те, куди піти в місті. Події, заклади, музеї та маршрути.',
        '900bfe9ac439d50d5914a43f6f0af82548ac4455'],
    ];
  }

}