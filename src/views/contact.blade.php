<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="{{ route("contact") }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Your name">
        <input type="email" name="email" placeholder="Your email">
        <input type="text" name="subject" placeholder="Your subject">
        <textarea name="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
</html>