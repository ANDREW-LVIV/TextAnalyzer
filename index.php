<?php
require __DIR__.'/vendor/autoload.php';

$analyze = new TextAnalyzer\Analyzer();

header('Content-Type: text/html; charset=utf-8');

$text = $_POST['text'] ?? '';
$text = trim($text);
$time = date("Y-m-d H:i:s");

$analyze_results = [
  [
    'title' => 'Number of characters:',
    'result' => $analyze->numberOfCharacters($text),
  ],
  [
    'title' => 'Number of words',
    'result' => $analyze->numberOfWords($text),
  ],
  [
    'title' => 'Number of sentences',
    'result' => $analyze->numberOfSentences($text),
  ],
  [
    'title' => 'Frequency of characters / Distribution of characters as a percentage of total',
    'result' => $analyze->frequencyOfCharacters($text),
  ],
  [
    'title' => 'Average word length',
    'result' => $analyze->averageWordLength($text),
  ],
  [
    'title' => 'The average number of words in a sentence',
    'result' => $analyze->averageNumberOfWordsInSentence($text),
  ],
  [
    'title' => 'Top 10 most used words',
    'result' => $analyze->mostUsedWords($text, 10),
  ],
  [
    'title' => 'Top 10 longest words',
    'result' => $analyze->mostLongestShortestWords($text, 'long', 10),
  ],
  [
    'title' => 'Top 10 shortest words',
    'result' => $analyze->mostLongestShortestWords($text, 'short', 10),
  ],
  [
    'title' => 'Top 10 longest sentences',
    'result' => $analyze->mostLongestSentences($text, 'long', 10),
  ],
  [
    'title' => 'Top 10 shortest sentences',
    'result' => $analyze->mostLongestSentences($text, 'short', 10),
  ],
  [
    'title' => 'Number of palindrome words',
    'result' => $analyze->numberOfPalindromeWords($text),
  ],
  [
    'title' => 'Top 10 longest palindrome words',
    'result' => $analyze->mostLongestPalindromeWords($text, 'long', 10),
  ],
  [
    'title' => 'Is the whole text a palindrome? (Without whitespaces and punctuation marks)',
    'result' => $analyze->isWholeTextPalindrome($text),
  ],
  [
    'title' => 'The reversed text',
    'result' => $analyze->reversedText($text),
  ],
  [
    'title' => 'The reversed text but the character order in words kept intact',
    'result' => $analyze->mirrorMultibyteString($text),
  ],
  [
    'title' => 'The time it took to process the text in ms',
    'result' => (microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000 ?: 'not calculated because of 0ms',
  ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Text Analyzer</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>

  <div class="header">
    <h2>Text Analyzer</h2>
  </div>

  <div class="main">
    <form action="" method="POST">
      <textarea type="text" name="text" rows="8"
        placeholder="Enter text to analyze"><?= htmlspecialchars($text); ?></textarea><br/>
        <input type="submit" value="analyze text">
      </form>
    </div>

    <?php if ($text): ?>
      <div class="results">
        <h3>Statistical information</h3>

        <?php foreach($analyze_results as $result): ?>
          <div class="result_item">
            <div class="result_title"><?= $result['title']; ?></div>
            <div class="result_data"><?= $result['result'] ?: " - no results -" ?></div>
          </div>
        <?php endforeach?>
        <div class="report">
          Report was generated: <?= $time; ?>
        </div>
      </div>
    <?php endif; ?>

  </body>
</html>
