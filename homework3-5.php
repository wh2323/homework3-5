<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>달력</title>
</head>
<body>
  <?php
  $year = isset($_POST["year"]) ? $_POST["year"] : date("Y");
  $month = isset($_POST["month"]) ? $_POST["month"] : date("n");
  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
  $firstDayOfMonth = date("w", strtotime("$year-$month-01"));
  $lastDayOfMonth = date("w", strtotime("$year-$month-$daysInMonth"));

  echo "<table>";
  echo "<caption>{$year}년 {$month}월</caption>";
  echo "<tr><th>일</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th></tr>";
  echo "<tr>";
  for ($i = 0; $i < $firstDayOfMonth; $i++) {
    echo "<td></td>";
  }
  for ($i = 1; $i <= $daysInMonth; $i++) {
    echo "<td>{$i}</td>";
    if (($i + $firstDayOfMonth - 1) % 7 == 6 && $i < $daysInMonth) {
      echo "</tr><tr>";
    }
  }
  for ($i = $lastDayOfMonth; $i < 6; $i++) {
    echo "<td></td>";
  }
  echo "</tr>";
  echo "</table>";
  ?>

  <form method="post">
    <label for="year">연도:</label>
    <input type="number" name="year" value="<?php echo $year; ?>">
    <label for="month">월:</label>
    <input type="number" name="month" value="<?php echo $month; ?>">
    <input type="submit" value="달력 보기">
  </form>
</body>
</html>