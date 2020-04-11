<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            font-size: 17px;
            color: #926239;
            line-height: 1.6;
        }

        #showcase {
            background-image: url(<?php echo url('/school2.jpg') ?>);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        #showcase h1 {
            font-size: 50px;
            line-height: 1.2;
        }

        #showcase p {
            font-size: 20px;
        }

        #showcase .button {
            font-size: 18px;
            text-decoration: none;
            color: #926239;
            border: #926239 1px solid;
            padding: 10px 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        #showcase .button:hover {
            background: #926239;
            color: #fff;
        }

    </style>
</head>

<body>
    <header id="showcase">
        <h1>School Management System</h1>
        <p>This is school management System. You can login as : </p>
        <div class="row">
            <div class="col">
                <a href="{{ route('students.login') }}" class="button">Student</a>

            </div>
            <div class="col">
                <a href="{{ route('login') }}" class="button">Teacher</a>
            </div>
        </div>
    </header>
</body>

</html>
