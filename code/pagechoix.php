<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Couleur de fond */
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff; /* Couleur du bouton */
            border-color: #007bff; /* Couleur de la bordure du bouton */
        }

        .table {
            background-color: #ffffff; /* Couleur de fond de la table */
        }

        .table th,
        .table td {
            border-color: #dddddd; /* Couleur des bordures de la table */
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'schooldatabase', '4306');

    function getFiliere()
    {
        global $conn;
        $sql = "SELECT id, nom FROM filiere";
        $res = mysqli_query($conn, $sql);
        $noms = [];
        while ($et = mysqli_fetch_assoc($res)) {
            $noms[$et['id']] = $et['nom'];
        }

        return $noms;
    }

    function getData($name, $an)
    {
        global $conn;
        $sql = "SELECT distinct e.id, e.nom, e.prenom FROM etudiant e, filiere f, filiere_niveau f_n WHERE e.id = f_n.id_etudiant AND f.id = f_n.filiere_id AND f.nom LIKE '$name' AND f_n.niveau_id = $an";
        $res = mysqli_query($conn, $sql);
        $code_a = [];
        $noms = [];
        $prenom = [];

        while ($et = mysqli_fetch_assoc($res)) {
            $code_a[] = $et['id'];
            $noms[] = $et['nom'];
            $prenom[] = $et['prenom'];
        }

        $data = [];
        $data[] = $code_a;
        $data[] = $noms;
        $data[] = $prenom;
        return $data;
    }

    $noms = getFiliere();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['fil'];
        $an = $_POST['anne'];
        if ($name && $an) {
            $data = getData($name, $an);
            $combinedData = [[], [], []];
            if (count($data[0]) === count($data[1]) && count($data[0]) === count($data[2])) {
                $combinedData = array_map(null, $data[0], $data[1], $data[2]);
            }
        }
    }
    ?>

    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="fil">Filiere:</label>
                <input list="Filiere" name="fil" class="form-control">
                <datalist id="Filiere">
                    <?php foreach ($noms as $id => $nom) : ?>
                        <option value="<?php echo $nom; ?>">
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="anne">Annee:</label>
                <input list="annee" name="anne" class="form-control">
                <datalist id="annee">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                </datalist>
            </div>
            <button type="submit" class="btn btn-primary">GOOO</button>
        </form>

        <table id="etudiant" class="table">
            <thead>
                <tr>
                    <th>Code apoge</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($combinedData)) {
                    foreach ($combinedData as [$dt, $ds, $dr]) {
                        $id_etudiant = $dt;
                ?>
                        <tr>
                            <td>
                                <a><?php echo "-$dt-"; ?></a>
                                <form method="post" action="gitdash.php">
                                    <input type="hidden" name="an1" value="<?php echo $an; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id_etudiant; ?>">
                                    <input type="hidden" name="filname" value="<?php echo $name; ?>">
                                    <input type="submit" value="SHOW DASHBOARD">
                                </form>
                            </td>
                            <td><?php echo "-$ds-"; ?></td>
                            <td><?php echo "-$dr-"; ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
