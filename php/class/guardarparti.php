<?php
require '../config/conexion.php';
require 'sesion.php';
require '../../vendor/autoload.php';
/*$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$id_torneo = $_POST["id_torneo"];
$ope = $_POST["ope"];
$con = new conexion();
$con->conectar();
$sql = pg_query("select sp_invitaciones($codigo,'$nombre',$id_torneo,'$email','$ope')");
$noticia = pg_last_notice($con->url);
echo str_replace("NOTICE: ","",$noticia);

$mensajehtml = '<html>'.

'<head>'.
    '<title>Invitación</title>'.
'</head>'.

'<body style="'.
'font-family:  Open Sans , sans-serif;'.
'line-height: 20px;">'.
    '<div style="'.
    'background-color: #5a6158;'.
    'border: none;'.
    'margin: auto;'.
    'margin-top: 60px;'.
    'width: 40em;'.
    'padding: 30px;'.
    'color: white;'.
    'text-align: center;'.
    'line-height: 50px;'.
'">'.
        '<h2 style="'.
        'font-size: 29.25px;">BETSCORE</h2>'.
        '<h4>'.
        'Hola '.$nombre.' fuiste invitado a participar de un torneo'.
        '</h4>'.

            '<a href="http://betscore.herokuapp.com/php/core/adm_tor/adm_tor.php/php/core/adm_tor/det_tor.php?l_id_torneo='.$id_torneo.'">'.
                '<button style="'.
                'background-color: #e5603b;'.
                'background-image: linear-gra-dient(to bottom, #e5603b, #e5603b);'.
                'background-repeat: repeat-x;'.
                'padding: 8px 18px;'.
                'font-size: 16.25px;'.
                'border-radius: 1px;'.
                'border-color: #e5603b;'.
                'color: white;'.
                'cursor: pointer;'.
                'margin: 20px;'.
            '">Ver datos del torneo</button>'.
            '</a>'.

    '</div>'.
'</body>'.

'</html>';

$to = $email;
$subject = "Betscore torneo de apuestas";
$message = $mensajehtml;
$header = "MIME-Version: 1.0  \r\n";
$header .= "Content-type: text/html; charset=utf-8 \r\n";
$header .= "From:betscore.invitaciones@gmail.com \r\n";
$retval = mail ($to,$subject,$message,$header);
if( $retval == true ){
   echo " Mensaje enviado";
}else{
   echo "Mensaje no enviado";
}
*/

$from = new SendGrid\Email(null, "betscore.invitaciones@gmail.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();
?>