

<?php
    /**
     * session_start(); es una función en PHP que inicia una sesión en el servidor web y almacenar información de sesión en variables
     */
    session_start();
    
    /* el codigo require lo utilizo para incluir la conexion de la base de datos, en este caso el archivo conexion.php
     * donde se encuentra el codigo de la conexion a la base de datos 
     */
    require "./conexion.php";

    /**Creacion de las consultas a la base de datos de regiones, comunas y candidato
     *
     */
    
    /**
     * En esta línea de código, se está realizando una consulta a la base de datospara seleccionar todos los registros de la tabla "regiones" en la base de datos
     */
    $sentencia = $conn->query('SELECT * FROM `regiones`');
    /** 
     * se está recuperando el resultado de la consulta SQL que se ejecutó previamente y se está almacenando en la variable "$region" 
     */

    $region = $sentencia->fetchAll(PDO::FETCH_OBJ);

    /**
     * En esta línea de código, se está realizando una consulta a la base de datos para seleccionar todos los registros de la tabla "comunas" en la base de datos
     */
     

    $sentenciaco = $conn->query('SELECT * FROM `comunas`');
    /**
     * se está recuperando el resultado de la consulta SQL que se ejecutó previamente y se está almacenando en la variable "$comuna" 
     */ 
    $comuna = $sentenciaco->fetchAll(PDO::FETCH_OBJ);

    /**
     * En esta línea de código, se está realizando una consulta a la base de datospara seleccionar todos los registros de la tabla "candidato" en la base de datos
     */
    $sentenciacandidato = $conn->query('SELECT * FROM `candidato`');
    /**
     * se está recuperando el resultado de la consulta SQL que se ejecutó previamente y se está almacenando en la variable "$candidato" 
     */

    $candidato = $sentenciacandidato->fetchAll(PDO::FETCH_OBJ);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>

    <!--En esta línea de código se está agregando un archivo JavaScript llamado "validaciones.js" a la página HTML-->
    <script src="validaciones.js"></script>
    <title>Formulario</title>
</head>

<body>
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full max-w-[550px]">
    <!-- se crea un formulario HTML que enviará los datos ingresados por el usuario al archivo "procesar.php" en el servidor web.-->
    <form action="procesar.php" method="POST">
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
        Nombre y Apellido
        </label>
        <input
          type="text"
          name="txt_nombre"
          id="name"
          placeholder="Nombre y Apellido"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          required
        />
      </div>
      <div class="mb-5">
        <label
          for="subject"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Alias
        </label>
        <input
          type="text"
          name="txt_alias"
          id="subject"
          placeholder="Alias"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          maxlength="5"
          minlength="1"
          
          />
      </div>
      <div class="mb-5">
        <label
          for="subject"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Rut
        </label>
        <input
          type="text"
          name="txt_rut"
          id="subject"
          placeholder="Ingrese su rut"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
      <div class="mb-5">
        <label
          for="subject"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Email
        </label>
        <input
          type="email"
          name="txt_email"
          id="subject"
          placeholder="correo electronico"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>

        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

        <!-- En este div se realiza el llenado del combo box "cbo_region" para visualizar todas las regiones extraidas
             directamente desde la base de datos-->
        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Region</label>
                <select name="cbo_region" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            
            
            <?php
            /**
             * se está utilizando el bucle "foreach" para recorrer el array "$region",
             * que contiene los resultados de la consulta SQL realizada anteriormente a la base de datos. 
             * En cada iteración del bucle, el valor actual del array se asigna a la variable "$dato" 
             */ 
            foreach ($region as $dato) {
            ?> 
            <!--muestra todas las regiones recuperadas de la base de datos como opciones. 
                La opción que se muestra por defecto es la primera región en el array "$region".
            -->
                <option selected><?php echo $dato->region; ?></option>
            <?php
            }
            ?>
            </select>
            
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>
            


        <!-- En este div se realiza el llenado del combo box "cbo_comuna" para visualizar todas las regiones extraidas
             directamente desde la base de datos-->
        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Comuna</label>
                <select name="cbo_comuna" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            <?php
            /** 
             * se está utilizando el bucle "foreach" para recorrer el array "$comuna", 
             * que contiene los resultados de la consulta SQL realizada anteriormente a la base de datos. 
             * En cada iteración del bucle, el valor actual del array se asigna a la variable "$dato" 
            */ 
            foreach ($comuna as $dato) {
            ?> 
            <!--muestra todas las regiones recuperadas de la base de datos como opciones. 
                La opción que se muestra por defecto es la primera región en el array "$comuna".
            -->
                <option selected><?php echo $dato->comuna; ?></option>
            <?php
            }
            ?>
            </select>
            
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>

        <!-- En este div se realiza el llenado del combo box "cbo_candidato" para visualizar todas las regiones extraidas
        directamente desde la base de datos-->
        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Candidato</label>
                <select name="cbo_candidato" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            <?php
            /**
             * se está utilizando el bucle "foreach" para recorrer el array "$candidato", 
             * que contiene los resultados de la consulta SQL realizada anteriormente a la base de datos. 
             *  En cada iteración del bucle, el valor actual del array se asigna a la variable "$dato" 
            */
            foreach ($candidato as $dato) {
            ?> 
            <!--muestra todas las regiones recuperadas de la base de datos como opciones. 
                La opción que se muestra por defecto es la primera región en el array "$candidato".
            -->            
                <option selected><?php echo $dato->Nombre; ?></option>
            <?php
            }
            ?>
            </select>
            
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>
        <div class='flex flex-col gap-6'>
        
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Como se entero de nosotros</label>
    <div class='flex flex-row'>        
        <input type="checkbox" name="web" id="cb1" value="cb1"
        class='
            appearance-none h-6 w-6 bg-gray-400 rounded-full 
            checked:bg-green-300 checked:scale-75
            transition-all duration-200 peer
        '
    />
        <div class='h-6 w-6 absolute rounded-full pointer-events-none
        peer-checked:border-green-300 peer-checked:border-2
        '>
        </div>
        <label for='cb1' class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>Web</label>
            
    </div>
    <div class='flex flex-row'>
        <input type="checkbox" name="tv" id="cb2" value="cb2"
        class='
            appearance-none h-6 w-6 bg-gray-400 rounded-full 
            checked:bg-green-300 checked:scale-75
            transition-all duration-200 peer
        '
    />
        <div class='h-6 w-6 absolute rounded-full pointer-events-none
        peer-checked:border-green-300 peer-checked:border-2
        '>
        </div>
        <label for='cb1' class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>TV</label>
            
    </div>
    <div class='flex flex-row'>
        <input type="checkbox" name="rrss" id="cb3" value="cb3"
        class='
            appearance-none h-6 w-6 bg-gray-400 rounded-full 
            checked:bg-green-300 checked:scale-75
            transition-all duration-200 peer
        '
    />
        <div class='h-6 w-6 absolute rounded-full pointer-events-none
        peer-checked:border-green-300 peer-checked:border-2
        '>
        </div>
        <label for='cb1' class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>Redes Sociales</label>
            
    </div>
    <div class='flex flex-row'>
        <input type="checkbox" name="amigo" id="cb4" value="cb4"
        class='
            appearance-none h-6 w-6 bg-gray-400 rounded-full 
            checked:bg-green-300 checked:scale-75
            transition-all duration-200 peer
        '
    />
        <div class='h-6 w-6 absolute rounded-full pointer-events-none
        peer-checked:border-green-300 peer-checked:border-2
        '>
        </div>
        <label for='cb1' class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>Amigo</label>
            
    </div>
      <div>
        <!-- Esta línea de código crea un botón en HTML con la propiedad "onclick" que llama a la función 
             "validarCampo()" cuando el usuario hace clic en el botón
        -->
        <button onclick="validarCampo()" 
        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >Votar</button>
      </div>
    </form>
  </div>
</div>
</body>