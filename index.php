<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
    <?php
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");


        //recevoir toute les données
        if (isset($_GET['callData'])) {
            $response = array();

            //produit
            $data    = fopen( "DATA.txt", "r+" );
            $dataContent = "";
            for( $i = 0 ; $i < 10 ; $i++ ){
            $dataContent .= fgets($data, 4096);
            }

            
            $response['produits'] = $dataContent;

            fclose($data);

            //user
            $User    = fopen( "USER.txt", "r+" );
            $UserContent = "";
            for( $i = 0 ; $i < 10 ; $i++ ){
            $UserContent .= fgets($User, 4096);
            }

            $response['USER'] = $UserContent;

            fclose($User);

            echo json_encode($response);
        }

        //sauvegardé info utilisateur
        if ( isset($_GET['USER'])) {

            $USER = isset($_GET['USER']);
            
            file_put_contents('USER.txt', "\n".$USER);
        }

        //ajouter un produit
        if ( isset($_GET['ADD'])) {

            $USER = isset($_GET['USER']);
            
            file_put_contents('USER.txt', "\n".$USER);
        }
            
    ?>
</body>
</html>
