<?php
$conn = mysqli_connect('localhost', 'root', '', 'schooldatabase','4306');

function checkV($id_e){
	global $conn;
	$req_check = "SELECT * FROM validé WHERE id_etudiant=$id_e";
	$res_check = mysqli_query($conn, $req_check);
	if (mysqli_num_rows($res_check)){
		return 1;
	}
	return 0;

}

function checkA($id_e){
	global $conn;
	$req_check = "SELECT * FROM ajournée WHERE id_etudiant=$id_e";
	$res_check = mysqli_query($conn, $req_check);
	if (mysqli_num_rows($res_check)){
		return 1;
	}
	return 0;

}

$an = $_POST['an1'];
$id = $_POST['id'];
$name = $_POST['filname'];

$id_e = $id ;
$id_n = $an ;

?>


<!DOCTYPE html>
<html>
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
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #V {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background-color: #ffffff;
			font-size: 1.5em;	
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        #rv {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            font-weight: bold;
			font-size: 1.5em;	
            cursor: pointer;
        }

        #rv:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Validation</title>
    <link rel="icon" href="favi.png" />
</head>

<body>
    <div class="container">
        <?php
        if (checkA($id_e)) {
            echo '<div id="V"><p>L\'étudiant est déjà ajourné</p></div>';
        } elseif (checkV($id_e)) {
            echo '<div id="V"><p>L\'étudiant est déjà validé</p></div>';
        } else {
            $req = "INSERT INTO validé VALUES ('$id_e', $id_n)";
            $res = mysqli_query($conn, $req);
            echo '<div id="V"><p>L\'étudiant a validé l\'année !</p></div>';
        }
        ?>

        <div id="V">
            <p></p>
        </div>

        <div class="text-center">
            <form method="post" action="gitdash.php">
                <input type="hidden" name="an1" value="<?php echo $an; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="filname" value="<?php echo $name; ?>">
                <input type="submit" value="révenir au main tableau de bord" id="rv">
            </form>
        </div>
    </div>
</body>
</html>
