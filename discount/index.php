<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        label {
            width: 170px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div id="content">
    <h1 style="color: #CD214F">Tính chiết khấu sản phẩm</h1>
    <form method="post" >
        <div id="data">
            <label  style="color: purple">Mô tả sản phẩm: </label>
                <input type="text" name="description">
            <br>
            <label style="color: purple">Giá niêm yết:</label>
            <input type="number" name="price"><br>
            <label style="color: purple">Phần trăm chiết khấu</label>
            <input type="number" name="discount_percent"><br>
        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" onclick="" value="Tính">
        </div>Calculate Discount
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] =="POST"){
        $price = $_POST["price"];
        $discount_percent = $_POST["discount_percent"];
        $discount_Amount = ($price*$discount_percent)/100;
        $discountprice = $price - $discount_Amount;
        echo "Số tiền được chiết khấu: ".$discount_Amount;
        echo "<br>";
        echo "Giá sản phẩm đã chiết khấu: ".$discountprice;
    }
    ?>
</div>
</body>
</html>