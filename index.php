<!DOCTYPE html>
<?php
if(!session_id()){
	session_start();
}
$indices = array(
//'PHP_SELF', 
//'argv', 
//'argc', 
//'GATEWAY_INTERFACE', 
//'SERVER_ADDR', 
//'SERVER_NAME', 
//'SERVER_SOFTWARE', 
//'SERVER_PROTOCOL', 
//'REQUEST_METHOD', 
//'REQUEST_TIME', 
//'REQUEST_TIME_FLOAT', 
//'QUERY_STRING', 
//'DOCUMENT_ROOT', 
//'HTTP_ACCEPT', 
//'HTTP_ACCEPT_CHARSET', 
//'HTTP_ACCEPT_ENCODING', 
'HTTP_ACCEPT_LANGUAGE', 
//'HTTP_CONNECTION', 
//'HTTP_HOST', 
//'HTTP_REFERER', 
'HTTP_USER_AGENT', 
//'HTTPS', 
'REMOTE_ADDR', 
//'REMOTE_HOST', 
//'REMOTE_PORT', 
//'REMOTE_USER', 
//'REDIRECT_REMOTE_USER', 
//'SCRIPT_FILENAME', 
//'SERVER_ADMIN', 
//'SERVER_PORT', 
///'SERVER_SIGNATURE', 
//'PATH_TRANSLATED', 
//'SCRIPT_NAME', 
//'REQUEST_URI', 
//'PHP_AUTH_DIGEST', 
//'PHP_AUTH_USER', 
//'PHP_AUTH_PW', 
//'AUTH_TYPE', 
//'PATH_INFO', 
//'ORIG_PATH_INFO'
);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
        <meta charset="UTF-8">
        <title>Información Sistema</title>        
    </head>
    <body>
		<div class="header">
			<h3>ACTIVIDAD UF4 (DES)</h3>
			<h5>Información sobe el sisteam. Variable $_SERVER.</h5>
		</div>
		<div id="main_frame">
			
			<?php
			$ip = $_SERVER['REMOTE_ADDR'];
			$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
			if($query && $query['status'] == 'success') {
			  $pais = $query['country'].', '.$query['city'];
			} else {
			  $pais = 'Unable to get location';
			}
			
			print("<li> Idioma: ".split('[- ,]',$_SERVER['HTTP_ACCEPT_LANGUAGE'])[1]."</li>\n");
			
			print("<li> Dirección IP: ".$ip."</lI>\n");
			
			print("<li> País: ".$pais."</li>\n");
			
			print("<li> Sistema Operativo: ".split('[(;]',$_SERVER['HTTP_USER_AGENT'])[1]." ".split('[ ]',$_SERVER['HTTP_USER_AGENT'])[2]."</li>\n");
			
			print("<li> Browser: ".split('[ ]',$_SERVER['HTTP_USER_AGENT'])[10]."</li>\n");
			
			print("</ul>\n");
			?>		
			
		</div>
		<div class="footer">
			<p>Isaac Rovira</p>
			<p>UF4 - Desarrollo en entorno servidor</p>
			<p>Mayo 2018</p>
		</div>
	</body>	
</html>