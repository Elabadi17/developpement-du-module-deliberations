<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .login-form {
            width: 300px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-radius: 3px;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="login-form">
        <h2>LOGIN :</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input id="username" type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input id="password" type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Login">

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'schooldatabase','4306');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['username'];
                $an = $_POST['password'];

                $sql = "SELECT * FROM login where username like'$name' and password like '$an'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) === 1) {
                    header("Location: choix.php");
                    exit();
                } else {
                    echo "<p class='error-message'>Invalid username or password.</p>";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>
