
<?php
if(isset($_GET['url'])){
    if(file_exists('app/Class/'.$_GET['url'].'.php')){
        require_once('app/Class/'.$_GET['url'].'.php');
        if(count($_GET) == 1){
            $dato=new Api();
        header("Content-Type: application/json");
        echo  $dato->Api();
        }elseif(count($_GET) == 2){
            $dato = new Api();
            $i=0;
            foreach($_GET as $nombre_variable => $valor_variable){
                $parametros = array(
                    $i => array(
                        "parametro" => $nombre_variable,
                        "valor" => $valor_variable
                    )
                );
                
            }
            header("Content-Type: application/json");
            echo  $dato->ApiParametro($parametros[0]["parametro"],$parametros[0]["valor"]);
        }elseif(count($_GET) > 2){
            $dato = new Api();
            $parametros = array();
            foreach($_GET as $nombre_variable => $valor_variable){
                array_push($parametros,array(
                        "parametro" => $nombre_variable,
                        "valor" => $valor_variable

                )
                );

            }//print_r($parametros);
            header("Content-Type: application/json");
            echo  $dato->ApiMultiParametro($_GET['url'],$parametros);
    }
}else{
    echo '<LINK REL=StyleSheet HREF="recursos/estilo.css" TYPE="text/css" MEDIA=screen>
    <div class="container"> 
            <div class="divbody">
                <h2>
                    Modelo no Existe
                </h2>
            </div>
        </div>';
}
}else{
    ?>

<LINK REL=StyleSheet HREF="recursos/estilo.css" TYPE="text/css" MEDIA=screen>
<div class="container">
    <h1>Motor API Rest YAI</h1>
    <div class="divbody">
      <h2>
            Introduccion
      </h2>
      <p>
        Yai es una aplicacion hecha en PHP que basicamente te ayuda a proveer servicios API Rest de cualquier base de datos que le configures, esta hecha usando en ORM Eloquent por tanto es compatible con cualquier motor d base de datos.
        Lo que hace es de las tablas de la base datos que se le configuren debolver en formato JSON los dato que se le soliciten
      </p>
      <h2>
            Configuracion
      </h2>
      <p>
      Descargar el repositorio <code>https://gitlab.com/haroldmaussa/yai.git </code>y ponerlo en tu servidor.
        luego debes configurar la base de datos en la carpeta <code>app/DataBase/DataBase.php</code>
    <h2>Configuracion de las tablas</h2>
    La aplicacion cuenta con el comando <code>php yai model </code>para crear los modelos que seran referencia a las tablas de mi base de datos y que deben cumplir la regla de ser la primera letra en mayucula y la tabla en la base de datos debe ser prural y y en minuscula:** Ejemplo: **  si el modelo se llama User la tabla se llama users.
    debes dirigirte a la raiz del proyecto y ejecutar el comando
    php yai model nombremodel reemplazando nombremodel por el nombre de tu modelo Ejemplo: <code>php yai model User</code>
    eso creara en la carpeta <code>app/model/</code> el modelo <code>User.php</code> y en la carpeta <code>app/Class</code> la clase <code>User.php.</code>
      </p>

      <h2>Uso</h2>
      <p>
      Una vez hecha la configuracion podras entrar al proyecto y empezar a usar los servicios APIRest de tu base de datos asi:
      en tu navegador ingresa a: <code>localhost/yai-master/User</code> esto te devolvera todos los datos de tu tabla users de la base de dato.
      </p>
      <p>
      puedes pasarle los parametros para que te filtre y te debuelva solo los datos que desees. <code>localhost/yai-master/user?id=2</code> id es el campo id de la tabla users esto te devuelve el json con los datos del usuario cullo id sea iguala dos. y asi los parametros deben ser los campos de la tabla en tu DataBase
        tamben soporta multiples parametros <code>localhost/yai-master/User?id=1&name=david </code>esto te devuelve el jsson del usuario cullo id es 1 y nombre es david.
      </p>
    </div>
    <p class="divfooter">
        Liberado bajo licencia MIT
        autor: Harold Maussa Rivas
        @haroldmaussa
    </p>
</div>


<?php
} 
?>
