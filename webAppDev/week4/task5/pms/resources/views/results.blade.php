<?php
/*
 * Simple example to illustrate associative arrays and queries.
 * DANGEROUS: Does not sanitise user input.
 * BAD STYLE: Does not use templates.  Interleaves PHP and HTML.
 */
include "includes/defs.php";

/* Get form data. */
$name = isset($_GET['name']) ? $_GET['name'] : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;
$state = isset($_GET['state']) ? $_GET['state'] : null;

$error = null;
if (empty($name) && empty($state))
{
  if (empty($year))
  {
    $error = 'At least one field must contain value.';
  }
  else
  {
    $year = preg_replace('/\s*,*/', '', $year);
    if (strval(intval($year)) != $year)
    {
      $error = 'Year must be a number.';
    }
  }
}

if ($error /*&& false*/) // Or dont, backup version captures error on page
{
  header('Location: index.php?error='.rawurlencode($error));
  die();
}

/* Get array of pms that match query in form data. */
$pms = search($name, $year, $state);
?>

<!-- display results -->
<!DOCTYPE html>
<!-- Results page of associative array search example. -->
<html>
<head>
    <title>Associative array search results page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/wp.css">
</head>

<body>
<h2>Australian Prime Ministers</h2>

<?php
  if ($error)
  {
?>
  <h3>Query</h3>
  <p class="alert">
  <?=$error?>
  </p>
  <form method="get" action="results.php">
  <table>
    <tr><td>Name: </td><td><input type="text" name="name"></td></tr>
    <tr><td>Year: </td><td><input type="text" name="year"></td></tr>
    <tr><td>State: </td><td><input type="text" name="state"></td></tr>
    <tr><td colspan=2><input type="submit" value="Search">
                      <input type="reset" value="Reset"></td></tr>
  <table>
  </form>
  <hr>
  <p>
    Sources:
    <a href="show.php?file=results.php">results.php</a>
    <a href="show.php?file=includes/defs.php">includes/defs.php</a>
    <a href="show.php?file=includes/pms.php">includes/pms.php</a>
  </p>
</body>
</html>
<?php
    die();
  }
?>




<h3>Results</h3>

<?php 
if (count($pms) == 0) {
?>
<p>No results found.</p>
<?php
} else {
?>
<table class="bordered">
<thead>
<tr><th>No.</th><th>Name</th><th>From</th><th>To</th><th>Duration</th><th>Party</th><th>State</th></tr>
</thead>
<tbody>
<?php
foreach($pms as $pm) {
  print 
      "<tr><td>{$pm['index']}</td><td>{$pm['name']}</td><td>{$pm['from']}</td><td>{$pm['to']}</td><td>{$pm['duration']}</td><td>{$pm['party']}</td><td>{$pm['state']}</td></tr>\n";
}
?>
</tbody>
</table>
<?php
}
?>

<p><a href="index.php">New search</a></p>

<hr>
<p>
  Sources:
  <a href="show.php?file=results.php">results.php</a>
  <a href="show.php?file=includes/defs.php">includes/defs.php</a>
  <a href="show.php?file=includes/pms.php">includes/pms.php</a>
</p>

</body>
</html>
