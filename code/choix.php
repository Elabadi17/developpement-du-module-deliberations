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

        #divpch {
            text-align: center;
            margin-bottom: 30px;
        }

        #Pch {
            font-size: 24px;
            font-weight: bold;
        }

        #deliberer,
        #maj {
            text-align: center;
            margin-bottom: 20px;
        }

        .glow-on-hover {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .glow-on-hover:hover {
            background-color: #0056b3;
        }

        .glow-on-hover i {
            margin-right: 5px;
        }
    </style>
    <title>Choix</title>
    <link rel="icon" href="favi.png" />
</head>

<body>
    <div class="container">
        <div id="divpch">
            <p id="Pch">Choissir une option</p>
        </div>
        <div>
            <div id="deliberer">
                <button class="glow-on-hover" type="button" value="Deliberer" id="del" onclick="window.location.href='pagechoix.php'">
                    <i class="fa fa-home"></i> Deliberer
                </button>
            </div>
            <div id="maj">
                <button class="glow-on-hover" type="button" value="Mise à jour" id="maj1" onclick="window.location.href='MAJ.html'">
                    Mise à jour
                </button>
            </div>
        </div>
    </div>
</body>
</html>
