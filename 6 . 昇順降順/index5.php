$numbers[$j + 1]) { // 位置を交換 $temp = $numbers[$j]; $numbers[$j] = $numbers[$j + 1]; $numbers[$j + 1] = $temp; } } } // 並び替えた結果を表示 echo "
Ascending order:

"; echo "
"; foreach ($numbers as $number) { echo "
$number
"; } echo "
"; echo "
Descending order:

"; echo "
"; foreach (array_reverse($numbers) as $number) { echo "
$number
"; } echo "
"; } // テキストエリアを表示 echo "
"; for ($i = 1; $i <= $max_textareas; $i++) { echo "
"; } echo "Sort Numbers"; echo "
"; ?>