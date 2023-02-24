
<!-- Creacion de las consultas a la base de datos de regiones, comunas y candidato -->
<?php
    session_start();
    require "./conexion.php";
    
    $sentencia = $conn->query('SELECT * FROM `regiones`');
    $region = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    $sentenciaco = $conn->query('SELECT * FROM `comunas`');
    $comuna = $sentenciaco->fetchAll(PDO::FETCH_OBJ);

    $sentenciacandidato = $conn->query('SELECT * FROM `candidato`');
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
    <script src="validaciones.js"></script>
    <title>Formulario</title>
</head>

<body>
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full max-w-[550px]">
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

        
        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Region</label>
                <select name="cbo_region" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            <?php
            foreach ($region as $dato) {
            ?> 
                <option selected><?php echo $dato->region; ?></option>
            <?php
            }
            ?>
            </select>
            
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>
            



        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Comuna</label>
                <select name="cbo_comuna" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            <?php
            foreach ($comuna as $dato) {
            ?> 
                <option selected><?php echo $dato->comuna; ?></option>
            <?php
            }
            ?>
            </select>
            
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>
        <div class="max-w-2xl mx-auto">

            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Candidato</label>
                <select name="cbo_candidato" id="countries" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            <?php
            foreach ($candidato as $dato) {
            ?> 
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
        <!-- Validacion de cantidad de caracteres-->
        <button onclick="validarCampo()" 
        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >Votar</button>
      </div>
    </form>
  </div>
</div>
</body>