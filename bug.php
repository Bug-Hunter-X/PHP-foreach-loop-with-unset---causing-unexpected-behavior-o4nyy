function foo(array $arr) {
  foreach ($arr as $key => $value) {
    if ($value === 'something') {
      unset($arr[$key]);
    }
  }
  return $arr;
}

$arr = ['a', 'something', 'b', 'something'];
$result = foo($arr);
print_r($result); // Output: Array ( [0] => a [2] => b )

//The issue is that modifying the array during iteration can lead to unexpected results. When unset() is called it re-indexes the array, skipping elements and potentially leading to elements not being checked as expected.

function foo2(array $arr) {
  $keysToRemove = [];
  foreach ($arr as $key => $value) {
    if ($value === 'something') {
      $keysToRemove[] = $key;
    }
  }
  foreach ($keysToRemove as $key) {
    unset($arr[$key]);
  }
  return $arr;
}

$arr = ['a', 'something', 'b', 'something'];
$result = foo2($arr);
print_r($result); // Output: Array ( [0] => a [2] => b )