<?php

use PHPUnit\Framework\TestCase;

class CreateWordsListArrayTest extends TestCase
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
      $this->assertEquals($expected, $analyze->createWordsListArray($input));
      $this->assertIsArray($analyze->createWordsListArray($input));
    }

  public function textDataProvider()
  {
    return [
      ['', []],
      ['текст', ['текст']],
      ['текст для тесту', ['текст', 'для', 'тесту']],
      ['текст для, тесту', ['текст', 'для', 'тесту']],
      ['текст для, тесту.', ['текст', 'для', 'тесту']],
      ['Один, Два, Три, Чотири, П\'ять, Шість, Сім, Вісім, Дев\'ять ,Десять.',
        ['один', 'два', 'три', 'чотири', 'п\'ять', 'шість', 'сім', 'вісім', 'дев\'ять', 'десять']],
    ];
  }

}