function validarCampo() {
    // Obtener el valor del campo
    var campo = document.getElementById("txt_alias").value;
    
    // Verificar que el campo tenga no más de 5 caracteres y contenga letras y números
    if (/^[a-zA-Z0-9]{1,5}$/.test(campo)) {
      alert("Campo válido");
    } else {
      alert("El campo debe tener no más de 5 caracteres y contener letras y números");
    }
  }

  function validarRut(rut) {
    // Eliminar el guión del RUT
    rut = rut.replace(/-/g, '');
    
    // Verificar que el RUT tenga 8 o 9 dígitos
    if (rut.length < 8 || rut.length > 9) {
      return false;
    }
    
    // Calcular el dígito verificador
    var suma = 0;
    var multiplo = 2;
    var digito;
    
    for (var i = rut.length - 1; i >= 0; i--) {
      suma += parseInt(rut.charAt(i)) * multiplo;
      
      if (multiplo < 7) {
        multiplo += 1;
      } else {
        multiplo = 2;
      }
    }
    
    digito = 11 - (suma % 11);
    
    if (digito == 11) {
      digito = 0;
    } else if (digito == 10) {
      digito = 'K';
    }
    
    // Comparar el dígito verificador calculado con el dígito verificador proporcionado en el RUT
    if (digito == rut.charAt(rut.length - 1).toUpperCase()) {
      return true;
    } else {
      return false;
    }
  }