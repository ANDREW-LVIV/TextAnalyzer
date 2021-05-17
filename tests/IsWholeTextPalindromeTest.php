<?php

use PHPUnit\Framework\TestCase;

class IsWholeTextPalindromeTest extends TestCase
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
      $this->assertEquals($expected, $analyze->isWholeTextPalindrome($input));
      $this->assertIsString($analyze->isWholeTextPalindrome($input));
    }

  public function textDataProvider()
  {
    return [
      ['текст', 'No'],
      ['око за око, зуб за зуб', 'No'],
      ['Юно, коню, юно, коню!', 'Yes'],
      ['Три психи пили Пилипихи спирт.', 'Yes'],
      ['А баба на волі — цілована баба.', 'Yes'],
      ['Чи в окуня є Янукович?', 'Yes'],
      ['Anna & Mom', 'No'],
      ['Anna', 'Yes'],
      ['Don\'t nod', 'Yes'],
      ['I did, did I?', 'Yes'],
      ['My gym', 'Yes'],
      ['Red rum, sir, is murder', 'Yes'],
      ['Step on no pets', 'Yes'],
      ['Top spot', 'Yes'],
      ['Was it a cat I saw?', 'Yes'],
      ['Eva, can I see bees in a cave?', 'Yes'],
      ['No lemon, no melon', 'Yes'],
    ];
  }

}