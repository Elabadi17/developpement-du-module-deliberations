<?php 

$conn = mysqli_connect('localhost', 'root', '', 'schooldatabase','4306') or die(mysqli_error($conn));
// Récupérer les variables depuis la superglobale $_GET
 
$an = $_POST['an1'];
$id = $_POST['id'];
$name = $_POST['filname'];

echo "Variable 1 : $an <br>";
echo "Variable 1 : $name <br>";
echo "Variable 2 : $id";

function moy(array $note,array $coeff ) {
$arrlength = count($note);
$m=0;
for($x = 0; $x < $arrlength; $x++) {
$m+=$note[$x]*$coeff[$x]   ;
}
$m/=array_sum($coeff);
return $m;
}
function extact_data(int $mo ,int $et_id ){
global $conn;
$sql = "SELECT mo.id,e_x.note,mo.nom,ma.coefficient from examen e , etudiant_examen e_x, matiere ma, module mo  where e.id=e_x.examen_id and ma.id=e.matiere_id
and ma.module_id=mo.id and mo.id=$mo  and e_x.etudiant_id=$et_id";
$res=mysqli_query($conn,$sql);

$note=[];
$coef=[];

while($et=mysqli_fetch_assoc($res)){
	array_push($note,$et['note']);
	array_push($coef,$et['coefficient']);
	$modul_name=$et['nom'];

};
$nt=moy($note,$coef);
$mod=array($nt,$modul_name);
return $mod;
}

function id_module(int $id_s){
global $conn;
$sql="SELECT m.id FROM module m, semestre s WHERE m.semestre_id=s.id and s.id=$id_s";
$res=mysqli_query($conn,$sql);
$id_m=[];
while($et=mysqli_fetch_assoc($res)){
	array_push($id_m,$et['id']);

};
return $id_m;
}
function getName(int $id_s){
global $conn;
$sql="SELECT m.nom FROM module m, semestre s WHERE m.semestre_id=s.id and m.semestre_id=$id_s";
$res=mysqli_query($conn,$sql);

$nom_m=[];
while($et=mysqli_fetch_assoc($res)){
	
	array_push($nom_m,$et['nom']);

};

return $nom_m;
}
function getNotes(int $id_s, int $id_et){
$id_mo=id_module($id_s);
$arrlength = count($id_mo);
$notes=[];
for($x = 0; $x < $arrlength; $x++) {
	$y=extact_data($id_mo[$x] ,$id_et );
	array_push($notes,$y[0]);
}
return $notes;

}

function abs_mo($id_et,$mo_id){
global $conn;
$sql="SELECT e_s.absence,s.duree,m.module_id,mo.nom FROM seance s, etudiant_seance e_s, matiere m , module mo WHERE mo.id=m.module_id and e_s.seance_id=s.id and s.matiere_id=m.id and e_s.etudiant_id=$id_et and mo.id=$mo_id";
$res=mysqli_query($conn,$sql);
$tm=0;
while($et=mysqli_fetch_assoc($res)){
	if($et['absence']){
		 $tm+=$et['duree'];
		} 

};
return $tm;

}

function abs_s($id_et,$id_s){
$id_mds=id_module($id_s);
$a_p_m=[];
$nbr=count($id_mds);


for($x = 0; $x < $nbr; $x++) {
	$tm=abs_mo($id_et,$id_mds[$x]);
	array_push($a_p_m,$tm);
}
return $a_p_m;


}

function  moy_s($id_s,$id_e){
$notes=getNotes($id_s,$id_e);
$moy=array_sum($notes)/count($notes);
return $moy;
}


function getTOTALabs($abs1){
$absT=array_sum($abs1);
return $absT;

}


if($an==1){
    $id_s1=1;
    $id_s2=2;
}
if($an==2){
    $id_s1=3;
    $id_s2=4;
}

if($an==3){
    $id_s1=5;
    $id_s2=6;
}
$id_etudiant=$id;
$names=getName($id_s1);
$notes=getNotes($id_s1,$id_etudiant);
$names1=getName($id_s2);
$notes1=getNotes($id_s2,$id_etudiant);
$noms=array_merge($names,$names1);
$notes=array_merge($notes,$notes1);
$nbr=count($notes)
?>
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
            background-color: #f2f2f2;
        }

        #h1bull {
            text-align: center;
            margin-top: 30px;
        }

        #tablenotes {
            width: 80%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        #tablenotes table {
            width: 100%;
        }

        #tablenotes th,
        #tablenotes td {
            padding: 10px;
            text-align: center;
        }

        #tablenotes th {
            background-color: #0056b3;
            color: #ffffff;
        }

        #rv {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
        }

        #rv:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Bulletin</title>
</head>

<body>
    <h1 id="h1bull"><b>Relevée de note l'élève</b></h1>
    <div id="tablenotes">
        <table>
            <tr>
                <th>Modules</th>
                <th>Note</th>
                <th>Resultat</th>
            </tr>

            <?php for ($x = 0; $x < $nbr; $x++) { ?>
                <tr>
                    <td><?php echo $noms[$x]; ?></td>
                    <td><?php echo $notes[$x]; ?></td>
                    <td><?php if ($notes[$x] >= 12) {
                                echo "Validé";
                            } else {
                                echo "Non Validé";
                            }
                            ?></td>
                </tr>
            <?php } ?>
        </table>
        <div>
            <form method="post" action="gitdash.php">
                <input type="hidden" name="an1" value="<?php echo $an; ?>">
                <input type="hidden" name="id" value="<?php echo $id_etudiant; ?>">
                <input type="hidden" name="filname" value="<?php echo $name; ?>">
                <input type="submit" value="révenir au main tableau de bord" id="rv">
            </form>
        </div>
    </div>
</body>

</html>