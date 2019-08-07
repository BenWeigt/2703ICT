<?php
  /*
  * Script to print the prime factors of a single positive integer
  * sent from a form.
  * BAD STYLE: Does not use templates.
  */
  include "includes/defs.php";

  # Set $number to the value entered in the form.
  $error = null;
  $number = isset($_GET['number']) ? $_GET['number'] : null;

  # Check $number is nonempty, numeric and between 2 and PHP_MAX_INT = 2^31-1.
  # (PHP makes it difficult to do this naturally; see the manual.)
  if (empty($number)) {
    $error = "Error: Missing value\n";
  } else if (!is_numeric($number)) {
    $error = "Error: Nonnumeric value: $number\n";
  } else if ($number < 2 || $number != strval(intval($number))) {
    $error = "Error: Invalid number: $number\n";
  } else {
    # Set $factors to the array of factors of $number.
    $factors = factors($number);
    # Set $factors to a single dot-separated string of numbers in the array.
    $factors = join(" . ", $factors);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Factors</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/wp.css">
  </head>
  
  <body>  
    <h1>Factorisation</h1>
    <?= $error ? '<p class="alert">'.$error : '<p>'."$number = $factors" ?></p>
    <hr>
    <h2>Another factorisation</h2>
    <form method="get" action="factorise.php">
      <p>Number to factorise: <input type="text" name="number" value="<?=$number?>">
      <p><input type="submit" value="Factorise it!">
    </form>
  </body>
</html>
