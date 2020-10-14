<?php
function toWords ($num)
{
    $ones = array(
        0 => "zero",
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fifteen",
        15 => "sixteen",
        16 => "seventeen",
        17 => "eighteen",
        18 => "nineteen",
        19 => "zero",
        "014" => "fourteen"
    );
    $tens = array(
        0 => "zero",
        1 => "ten",
        2 => "twenty",
        3 => "thirty",
        4 => "forty",
        5 => "fifty",
        6 => "sixty",
        7 => "seventy",
        8 => "eighty",
        9 => "ninety"
    );
    $hundreds = array(
        100 => "one hundred",
    );
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr, 1);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {
        while (substr($i, 0, 1) == "0")
            $i = substr($i, 1, 5);
        if ($i < 20) {
            $rettxt .= $ones[$i];
        } elseif ($i < 100) {
            if (substr($i, 0, 1) != "0") $rettxt .= $tens[substr($i, 0, 1)];
            if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
            if (substr($i, 2, 1) != "0") $rettxt .= " " . $tens[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $tens[substr($decnum, 1, 1)];
        }
    }
    return $rettxt;
    }
    extract($_POST);
    if (isset($convert)) {
        echo "<p align='center' style='color:blue'>".toWords("$num")."</p>";
}
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convert Number to Words</title>
</head>
<body>
<form method="post">
    <table border="0" align="center">
        <tr>
            <td>Enter the Numbers (Nhập vào 1 số)</td>
            <Td><input type="text" name="num" value="<?php if(isset($num)){echo$num;}?>"/></Td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Convert" name="convert"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
