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
      $this->assertIsArray($analyze->frequencyOfCharactersArray($input));
    }

  public function textDataProvider()
  {
    return [
      ['Львів - це круте місто!',
        [
          [
            'character' => 'space',
            'number' => 4,
            'percentage' => 17.4,
          ],
          [
            'character' => 'В',
            'number' => 2,
            'percentage' => 8.7,
          ],
          [
            'character' => 'І',
            'number' => 2,
            'percentage' => 8.7,
          ],
          [
            'character' => 'Е',
            'number' => 2,
            'percentage' => 8.7,
          ],
          [
            'character' => 'Т',
            'number' => 2,
            'percentage' => 8.7,
          ],
          [
            'character' => 'Л',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'Ь',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => '-',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'Ц',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'К',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'Р',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'У',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'М',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'С',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => 'О',
            'number' => 1,
            'percentage' => 4.3,
          ],
          [
            'character' => '!',
            'number' => 1,
            'percentage' => 4.3,
          ]
        ]
      ],
    ];
  }

}