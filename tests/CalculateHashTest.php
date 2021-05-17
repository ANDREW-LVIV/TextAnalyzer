<?php

use PHPUnit\Framework\TestCase;

class CalculateHashTest extends TestCase
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
      $this->assertIsString($analyze->calculateHash($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 'e481113f85a89878a87d52b22c7f917d6e7280e6'],
      ['lviv.travel - Плануй подорож до Львова! Корисні поради та цікава інформація про те, куди піти в місті. Події, заклади, музеї та маршрути.',
        'c868d5fc53046e7a32b2600da89b377ea09c42f2'],
    ];
  }

}