<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        html {
            background-image: radial-gradient(rgba(0, 28, 185, 0.277), rgba(0, 28, 185, 0.227), rgba(0, 28, 185, 0.187),rgba(0, 28, 185, 0.127), rgba(0, 28, 185, 0.127));
            height: 100%;
        }

        .conatiner {
            display: flex;
            justify-content: center;
            background: transparent;
        }

        h1{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            text-align: center;
            color: rgb(13, 23, 51);
        }

        table {
            border-collapse: collapse;
            background-color: rgb(13, 23, 51);
            box-shadow: 1px 1px 10px black;
            border-radius: 10px;
            margin-top: 10%;
        }

        td,
        tr {
            background-color: transparent;
            padding: 5px 10px;
        }

        input[type="submit"] {
            background-color: rgba(104, 103, 103, 0.25);
            color: rgb(255, 255, 255);
            border: 0;
            margin: 0 5px;
            border-radius: 50px;
            width: 100%;
            padding: 20px;
        }

        input[type="text"] {
            text-align: right;
            background-color: transparent;
            color: white;
            width: 100%;
            border: 0;
            padding: 20px;
        }

        input[type="submit"]:hover {
            filter: brightness(1000%);
        }

        .num input[type="submit"] {
            background-color: rgba(145, 145, 145, 0.6);
        }

        .op input[type="submit"] {
            background-color: #ff9900;
            font-size: 1.1rem;
        }

        input[type="submit"]:hover {
            filter: brightness(120%);
        }
    </style>
</head>

<body>
<?php

$num = "";
$result = "";
$cookie_name1 = "num";
$cookie_value1 = "";
$cookie_name2 = "op";
$cookie_value2 = "";

if(isset($_POST['submit'])){
    $num = $_POST['display'].$_POST['submit'];
}
else{
    $num = "";
}

if(isset($_POST['op'])){
    $cookie_value1 = $_POST['display'];
    setcookie($cookie_name1, $cookie_value1, time() + (24*60*60*30), "/");
 
    $cookie_value2 = $_POST['op'];
    setcookie($cookie_name2, $cookie_value2, time() + (24*60*60*30), "/");

}

if(isset($_POST['equals'])){{
        $num = $_POST['display'];
        switch($_COOKIE['op']){
            case "+":
                $result = $_COOKIE['num'] + $num;
                break;
            case "-":
                $result = $_COOKIE['num'] - $num;
                break;
            case "x":
                $result = $_COOKIE['num'] * $num;
                break;
            case "÷":
                $result = $_COOKIE['num'] / $num;
                break;
            case "√x":
                $result = sqrt($_COOKIE['num']);
                break;
            case "x^2":
                $result = ($_COOKIE['num'])*($_COOKIE['num']);
                break;
            case "ln":
                $result = log($_COOKIE['num']);
                break;  
            case "log10":
                $result = log($_COOKIE['num'], 10);
                break;   
            case "sin":
                $result = sin($_COOKIE['num'] * M_PI/180);
                break; 
            case "cos":
                if($_COOKIE['num']%90 == 0){
                    $result = 0;
                }
                else{
                    $result = cos($_COOKIE['num'] * M_PI/180);
                }
                break;
            case "tan":
                if($_COOKIE['num']%90 == 0){
                    $result = "Not defined";
                }
                else{
                    $result = tan($_COOKIE['num'] * M_PI/180);
                }
                break;
            case "cot":
                if($_COOKIE['num']%180 == 0){
                    $result = "Not defined";
                }
                else if($_COOKIE['num']%90 == 0){
                    $result = 0;
                }
                else{
                    $result = 1/tan($_COOKIE['num'] * M_PI/180);
                }
                break;
            case "cosec":
                if($_COOKIE['num']%180 == 0){
                    $result = "Not defined";
                }
                else{
                    $result = 1/sin($_COOKIE['num'] * M_PI/180);
                }
                break;
            case "sec":
                if($_COOKIE['num']%90 == 0){
                    $result = "Not defined";
                }
                else{
                    $result = 1/cos($_COOKIE['num'] * M_PI/180);
                }
                break;
            default:
                $result = "Invalid";

        }
    }
    $num = $result;
}

// if(isset($_POST['dir'])){
//     $cookie_value1 = $_POST['display'];
//     setcookie($cookie_name1, $cookie_value1, time() + (24*60*60*30), "/");

//     switch($_POST['dir']){
//         case "√x":
//             $result = sqrt($_COOKIE['num']);
//             break;
//         case "x^2":
//             $result = $_COOKIE['num']*$_COOKIE['num'];
//             break;
//     }
//     $num = $result;

// }

?>



<div class="conatiner">
        <form method="post">
            <h1>
                Scientific <br> Calculator
            </h1>
            <table>
                <tr>
                    <td colspan="5"><input type="text" name="display" value=<?php echo $num; ?>></td>
                </tr>
                <tr>
                    <td><input type="submit" name="op" value="√x"></td>
                    <td><input type="submit" name="op" value="x^2"></td>
                    <td colspan="3" class="reset"><input type="submit" name="clear" value="AC"
                            style="background-color: rgb(5, 223, 150); "></td>
                    <td class="op"><input type="submit" name="op" value="÷"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="op" value="ln"></td>
                    <td><input type="submit" name="op" value="log10"></td>
                    <td class="num"><input type="submit" name="submit" value="7"></td>
                    <td class="num"><input type="submit" name="submit" value="8"></td>
                    <td class="num"><input type="submit" name="submit" value="9"></td>
                    <td class="op"><input type="submit" name="op" value="x"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="op" value="sin"></td>
                    <td><input type="submit" name="op" value="cos"></td>
                    <td class="num"><input type="submit" name="submit" value="4"></td>
                    <td class="num"><input type="submit" name="submit" value="5"></td>
                    <td class="num"><input type="submit" name="submit" value="6"></td>
                    <td class="op"><input type="submit" name="op" value="-"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="op" value="tan"></td>
                    <td><input type="submit" name="op" value="cot"></td>
                    <td class="num"><input type="submit" name="submit" value="1"></td>
                    <td class="num"><input type="submit" name="submit" value="2"></td>
                    <td class="num"><input type="submit" name="submit" value="3"></td>
                    <td class="op"><input type="submit" name="op" value="+"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="op" value="cosec"></td>
                    <td><input type="submit" name="op" value="sec"></td>
                    <td colspan="2" class="num"><input type="submit" name="submit" value="0"></td>
                    <td class="num"><input type="submit" name="submit" value="."></td>
                    <td class="op"><input type="submit" name="equals" value="="></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>