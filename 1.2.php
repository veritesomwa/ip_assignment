<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        td{
            position: relative;
        }
        input[type=number]{
            border:none;
            height: 30px;
        }

        tr{
            height: 30px;
        }
        select{
            font-size:20px;
        }
    </style>

    <?php 

    // Check to see if form has been submited.
    
    if(isset($_POST['submit'])){
        // getting setted posted data from form inputs
        $first_num = $_POST['first_num'];
        $second_num = $_POST['second_num'];
        $arithmatic = $_POST['arithmatic'];

        
        switch ($arithmatic) {
            // checking if the arithmatic is equevelant to the case which is *. if not on to the next case
            case '*':
                $result = $first_num * $second_num;
                break;
            case '/':
                $result = $first_num / $second_num;
                break;
            case '+':
                $result = $first_num + $second_num;
                break;
            case '-':
                $result = $first_num - $second_num;
                break;
            
            default:
                # code...
                break;
        }
        
    }


    ?>
    <!-- Making sure the attribute method value is post to receive request in php -->
    <form action="" method="post">
        <table border>
            <tr>
                <th>Your Result</th>
                <!-- I perform this isset to fill in the value if the page have refreshed after submit. if there is an error. the text will still be there. -->
                <td><center><?php if(isset($result))echo $result?></center></td>
            </tr>
            <tr>
                
                <th class="header">Enter your First num</th>
                <td><input type="number" name="first_num" value="<?php if(isset($_POST['first_num']))echo $_POST['first_num']?>"></td>
            </tr>
            <tr>
                <th class="header">Enter your Second num</th>
                <td><input type="number" name="second_num" value="<?php if(isset($_POST['second_num']))echo $_POST['second_num']?>"></td>
            </tr>
            <tr>
                <th class="header">Select Your Choice</th>
                <td>
                    <center>
                    <select name="arithmatic" id="">
                        <option>*</option>
                        <option>-</option>
                        <option>/</option>
                        <option>+</option>
                    </select>
                    </center>
                    
                </td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" value="Show Result" name="submit"></center></td>
            </tr>
        </table>
    </form>


</body>
</html>


