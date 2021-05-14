<?php

use PHPUnit\Framework\TestCase;

class FrequencyOfCharactersArrayTest extends TestCase
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
      $this->assertEquals($expected, $analyze->frequencyOfCharactersArray($input));
    }

  public function textDataProvider()
  {
    return [
      ['Львів - це круте місто!',
        [
          [
            'character' => 'space',
            'number' => 4,
            'percentage' => 100,
          ],
          [
            'character' => 'В',
            'number' => 2,
            'percentage' => 50,
          ],
          [
            'character' => 'І',
            'number' => 2,
            'percentage' => 50,
          ],
          [
            'character' => 'Е',
            'number' => 2,
            'percentage' => 50,
          ],
          [
            'character' => 'Т',
            'number' => 2,
            'percentage' => 50,
          ],
          [
            'character' => 'Л',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'Ь',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => '-',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'Ц',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'К',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'Р',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'У',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'М',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'С',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => 'О',
            'number' => 1,
            'percentage' => 25,
          ],
          [
            'character' => '!',
            'number' => 1,
            'percentage' => 25,
          ]
        ]
      ],
    ];
  }

}