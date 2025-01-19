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