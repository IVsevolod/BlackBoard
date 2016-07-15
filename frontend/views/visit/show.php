<?php
/**
 * @var integer $type
 * @var string  $url
 * @var string[] $fileA
 */

$base = __DIR__ . "/base.txt";
$file = file($base);
for ($i = 0; $i < sizeof($file); $i++) {
    $line = explode("^^", $file[$i]);
    if ($line[0] == $type) {
        $line[] = 'http://sdrd.ru';
        echo "<frameset rows='";
        $num = round(85 / $line[0]);
        for ($q = 0; $q < sizeof($line) - 1; $q++) {
            echo $num . "%,";
        }
        echo "15%'>";

        for ($j = 1; $j < count($line); $j++) {
            echo "<frame src='" .  $line[$j] . "'>";
        }
        echo "<frame src='" . \yii\helpers\Url::to(['visit/bottom', ['url' => $url, 'type' => $type]]) . "'>";
        echo "</frameset>";
    }
}
exit;