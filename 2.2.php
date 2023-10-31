<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Complete this form to Submit Your Feedback</h1>
    <form action="" method="POST">
        <label for="name">Name: </label>
        <select name="title" id="title">
            <option value="Mr">Mr</option>
            <option value="Mr">Mrs</option>
        </select>
        <input type="text" name="name">
        <br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <br><br>
        <label for="phone">Phone: </label>
        <input type="phone" name="phone" id="phone">
        <br><br>

        <label for="comment">Comment: </label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

        <br><br>

        <span>Rating: </span>

        
        <input type="radio" id="Excellent" name="rating" value="Excellent">
        <label for="Excellent">Excellent</label>
        
        <input type="radio" id="Okay" name="rating" value="Okay">
        <label for="Okay">Okay</label>

        <input type="radio" id="Boring" name="rating" value="Boring">
        <label for="Boring">Boring</label>
        <br><br>

        <input type="submit" name="submit" value="Send My Feedback">
        <br><br>
        
        
        <?php 
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $comment = $_POST['comment'];
            $title = $_POST['title'];
            $rating = $_POST['rating'];

            echo 'Thank you: '.$title.' '.$name.'<br> Your Email Address is '.$email.'<br>and your phone number is '.$phone.'<br>you stated that '.$comment.' and '.$rating;
        }
        
        ?>

    </form>
</body>
</html>