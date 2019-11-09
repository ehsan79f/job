<?php
// PHP program to demonstrate
// Basic Euclidean Algorithm

// Function to return
// gcd of a and b
function gcd($a, $b)
{
    if ($a == 0)
        return $b;
    return gcd($b % $a, $a);
}


if($_GET)
echo gcd($_GET['a'],$_GET['b']);

// This code is contributed by m_kit
?>
<form action="" method="get">
    <input type="text" name="a">
    <input type="text" name="b">
    <input type="submit">
</form>