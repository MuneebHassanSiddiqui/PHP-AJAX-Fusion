<?php
$file_path = "Al-Faatiha.json";
$json_data = file_get_contents($file_path);
$json_de = json_decode($json_data, true);

echo '<table cellpadding="5" cellspacing="0" border="1" style="border-collapse: collapse; width: 100%;">';
echo '<thead>';
echo '<tr><th style="text-align: center; background-color: #f0f0f0; padding: 10px;" colspan="2">' . $json_de['name'] . '</th></tr>';
echo '</thead>';
echo '<tbody>';

foreach ($json_de['ayahs'] as $ayah) {
    $number = $ayah['numberInSurah'];
    $text = $ayah['text'];
    echo "<tr><td style='text-align: center; padding: 8px;'>{$number}</td><td style='padding: 8px;' align='center' >{$text}</td></tr>";
}

echo '</tbody>';
echo '</table>';
