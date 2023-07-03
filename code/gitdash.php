<?php 
 $conn = mysqli_connect('localhost', 'root', '', 'schooldatabase','4306');
 $an = $_POST['an1'];
 $id = $_POST['id'];
 $name = $_POST['filname'];

 




function getDATAetudiant($etudiant_id){
     global $conn ;
     $sql = "SELECT e.nom as name, e.prenom, f.nom,  e.date_naissance ,e.code_a ,e.email,e.cin  FROM etudiant e ,filiere f where e.filiere_id=f.id and e.id=$etudiant_id";
     $res = mysqli_query($conn, $sql);
     $data = [];
     $et = mysqli_fetch_assoc($res) ;
     array_push($data,$et['name']);
     array_push($data,$et['prenom']);
     array_push($data,$et['nom']);
     array_push($data,$et['date_naissance']);
     
     array_push($data,$et['code_a']);
     array_push($data,$et['email']);
     array_push($data,$et['cin']);
     
     return $data;
 }
 
 function getIDS($an,$name){
     global $conn;
     $sql = "SELECT distinct e.id, e.nom, e.prenom FROM etudiant e, filiere f, filiere_niveau f_n WHERE e.id = f_n.id_etudiant AND f.id = f_n.filiere_id AND f.nom LIKE '$name' AND f_n.niveau_id = $an";
     $res = mysqli_query($conn, $sql);
     $code_a = [];
     $noms = [];
     $prenom = [];
 
     while ($et = mysqli_fetch_assoc($res)) {
         $code_a[] = $et['id'];
         
     }
 
     $data = [];
     $data = $code_a;
     return $data;
 
 }
 
 function getPOSITION($id,$an,$name){
     global $conn;
     $ids=getIDS($an,$name);
     $nbr=count($ids);
     for($x=0;$x<$nbr;$x++){
         if($ids[$x]==$id) return $x;
     }
 
 }
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
function nexxt($pos,$ids){
 $nbr=count($ids);
 if ($pos==$nbr-1){
     return $ids[$pos];    
 }
 return $ids[$pos+1]  ;
 


}

function previos($pos,$ids){
 $nbr=count($ids);
 
 if ($pos==0){
     return $ids[$pos];    
 }
 return $ids[$pos-1] ;


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

$ids=getIDS($an,$name);

$pos=getPOSITION($id_etudiant,$an,$name);


$names=getName($id_s1);
$notes=getNotes($id_s1,$id_etudiant);
$abs_1=abs_s($id_etudiant,$id_s1);
$names1=getName($id_s2);
$notes1=getNotes($id_s2,$id_etudiant);
$abs_2=abs_s($id_etudiant,$id_s2);
$absT_1=getTOTALabs($abs_1);
$absT_2=getTOTALabs($abs_2);
$absT=[$absT_1,$absT_2];
$names = json_encode($names);
$notes = json_encode($notes);
$abs = json_encode($abs_1);
$names1 = json_encode($names1);
$notes1 = json_encode($notes1);
$absT = json_encode($absT);
$abs1 = json_encode($abs_2);
$moy_s1=moy_s($id_s1,$id_etudiant);
$moy_s2=moy_s($id_s2,$id_etudiant);
$moy=[$moy_s1,$moy_s2];
$moy = json_encode($moy);


 $data=getDATAetudiant($id_etudiant);


?>

<!DOCTYPE html>
<html>
<head>
		<title>Student's Dashboard</title>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<link rel="icon" href="favi.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&dislay=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>	
        <style>
 #left {
    position: absolute;
    left: 285px;
    top: 20px;
  }

  #left form {
    display: inline-block;
    margin: 0;
  }

  .arrow {
    vertical-align: middle;
    width: 50px;
    height: 50px;
  }
 

  #right {
    position: absolute;
    right: 20px;
    top: 20px;
  }

  #right form {
    display: inline-block;
    margin: 0;
  }
	</style>	
</head>
<body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">

        <div class="header-left">
          <form method="post" action="gitdash.php">
			<?php $idp=previos($pos,$ids);?>
    		<input type="hidden" name="an1" value="<?php echo $an; ?>">
            <input type="hidden" name="id" value="<?php echo $idp; ?>">
            <input type="hidden" name="filname" value="<?php echo $name; ?>">
			<input id="left" class="arrow" type="image" src="left-arrow.png" alt="Bouton flèche" >
					</form>
        </div>
        <div class="header-right">
          
          <form method="post" action="gitdash.php">
    		<?php $idn=nexxt($pos,$ids);?>
    		<input type="hidden" name="an1" value="<?php echo $an; ?>">
            <input type="hidden" name="id" value="<?php echo $idn; ?>">
            <input type="hidden" name="filname" value="<?php echo $name; ?>">
			<input id="right" class="arrow" type="image" src="right-arrow.png" alt="Bouton flèche" >
			</form>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            ENSIAS
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">

          <li class="sidebar-list-item">
            <form action="bulletin1.php" method="post">
             
              <input type="hidden" name="an1" value="<?php echo $an; ?>">
            <input type="hidden" name="id" value="<?php echo $id_etudiant; ?>">
            <input type="hidden" name="filname" value="<?php echo $name; ?>">
            <button type="submit" class="sidebar-button">
                <p class="text-primar">Bulletin</p>
              </button>
            </form>
          </li>
          <li class="sidebar-list-item">
          <form method="post" action="ajournee.php">
				<input type="hidden" name="an1" value="<?php echo $an; ?>">
            <input type="hidden" name="id" value="<?php echo $id_etudiant; ?>">
            <input type="hidden" name="filname" value="<?php echo $name; ?>">
              <button type="submit" class="sidebar-button">
                <p class="text-primar">Ajournée</p>
              </button>
            </form>
          </li>
          <li class="sidebar-list-item">
          <form method="post" action="valide.php">
			<input type="hidden" name="an1" value="<?php echo $an; ?>">
            <input type="hidden" name="id" value="<?php echo $id_etudiant; ?>">
            <input type="hidden" name="filname" value="<?php echo $name; ?>">
              <button type="submit" class="sidebar-button">
                <p class="text-primar">Validé</p>
              </button>
            </form>
          </li>
          <li class="sidebar-list-item">
                <a class="text-primar"  href="pagechoix.php">révenir a la page d'accueil</a>
 
          </li>

        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">


         

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">NOM :</p>

            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[0]?></span>
          </div>
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">PRENOM :</p>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[1]?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">FILIERE :</p>

            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[2] ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Date de Naissance :</p>
              
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[3] ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Code Apogéee :</p>
              
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[4] ?></span>
          </div>
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">EMAIL :</p>
              
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[5] ?></span>
          </div>
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">CIN :</p>
              
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data[6] ?></span>
          </div>





          

        </div>

        <div class="charts">


        <div class="charts-card">
            <p class="chart-title">Abscence Total</p>
            <div id="donut-chart"></div>
          </div>
          <script>
            var abst = JSON.parse('<?php echo $absT; ?>');
            var moyen = JSON.parse('<?php echo $moy; ?>');
var barChartOptions = {
  series: abst,
  labels: ['S1', 'S2'],
  chart: {
    type: 'donut',
    height: 350,
    toolbar: {
      show: false
    }
  },
  colors: [
    "#246dec",
    "#cc3c43"
  ]
};

var barChart = new ApexCharts(document.querySelector("#donut-chart"), barChartOptions);
barChart.render();

          </script>

          <div class="charts-card">
            <p class="chart-title">Moyenne</p>
            <div id="absT-chart"></div>
          </div>


          <script>
            // AREA CHART
var areaChartOptions = {
  series: [{
    name: 'Moyenne',
    data: moyen
  }],
  chart: {
    height: 350,
    type: 'bar',
    toolbar: {
      show: false,
    },
  },
  colors: [
    "#246dec",
    "#cc3c43",
    "#367952",
    "#f5b74f",
    "#4f35a1"
  ],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    
  },
  labels: ['S1', 'S2'],
  markers: {
    size: 0
  },
  yaxis: {
    min: 0,
    max: 20
  },
  tooltip: {
    shared: true,
    intersect: false,
  }
};

var areaChart = new ApexCharts(document.querySelector("#absT-chart"), areaChartOptions);
areaChart.render();
          </script>


          

        </div>

        <div class="charts">


          <div class="charts-card">
            <p class="chart-title">Abscence S1</p>
            <div id="abs1-chart"></div>
          </div>
          <script>
                        
  
  var namess = JSON.parse('<?php echo $names; ?>');
  var abss = JSON.parse('<?php echo $abs; ?>');
  var notess = JSON.parse('<?php echo $notes; ?>'); 

            var barChartOptions = {
  series: [{
    data: abss
  }],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false
    },
  },
  colors: [
    "#246dec",
    "#cc3c43",
    "#367952",
    "#f5b74f",
    "#4f35a1"
  ],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  },
  xaxis: {  
    categories: namess,
  },

};

var barChart = new ApexCharts(document.querySelector("#abs1-chart"), barChartOptions);
barChart.render();

          </script>

          <div class="charts-card">
            <p class="chart-title">Notes S1</p>
            <div id="notes1-chart"></div>
          </div>


          <script>
            // AREA CHART
var areaChartOptions = {
  series: [{
    name: 'Moyenne module',
    data: notess
  }],
  chart: {
    height: 350,
    type: 'line',
    toolbar: {
      show: false,
    },
  },
  colors: ["#4f35a1", "#246dec"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    
  },
  labels: namess,
  markers: {
    size: 0
  },
  yaxis: {
    min: 0,
    max: 20
  },
  tooltip: {
    shared: true,
    intersect: false,
  }
};

var areaChart = new ApexCharts(document.querySelector("#notes1-chart"), areaChartOptions);
areaChart.render();
          </script>


          

        </div>

        <div class="charts">
          <script>

          </script>

          <div class="charts-card">
            <p class="chart-title">Abscence S2</p>
            <div id="abs2-chart"></div>
          </div>
          <script>
                var namess1 = JSON.parse('<?php echo $names1; ?>');
                var abss1= JSON.parse('<?php echo $abs1; ?>');
                var notess1 = JSON.parse('<?php echo $notes1; ?>');
            var barChartOptions = {
  series: [{
    data: abss1
  }],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false
    },
  },
  colors: [
    "#246dec",
    "#cc3c43",
    "#367952",
    "#f5b74f",
    "#4f35a1"
  ],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  },
  xaxis: {
    categories: namess1,
  },

};

var barChart = new ApexCharts(document.querySelector("#abs2-chart"), barChartOptions);
barChart.render();

          </script>

          <div class="charts-card">
            <p class="chart-title">Notes S2</p>
            <div id="notes2-chart"></div>
          </div>


          <script>
            // AREA CHART
var areaChartOptions = {
  series: [{
    name: 'Moyenne module',
    data: notess1
  }],
  chart: {
    height: 350,
    type: 'line',
    toolbar: {
      show: false,
    },
  },
  colors: ["#4f35a1", "#246dec"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    
  },
  labels: namess1,
  markers: {
    size: 0
  },
  yaxis: {
    min: 0,
    max: 20
  },
  tooltip: {
    shared: true,
    intersect: false,
  }
};

var areaChart = new ApexCharts(document.querySelector("#notes2-chart"), areaChartOptions);
areaChart.render();
          </script>


          

        </div>
      </main>


    </div>


 <script >


var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
  if(!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if(sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}


    </script>
  </body>
</html>