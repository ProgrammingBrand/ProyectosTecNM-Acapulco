function buscarCurp() {
    const curp = document.getElementById('curp').value;
    if (!curp) {
      alert("Por favor ingresa un valor para CURP.");
      return;
    }
  
    fetch(`buscar.php?curp=${curp}`)
      .then(response => response.json())
      .then(data => {
        console.log('Resultado CURP:', data);
        // Llenar los campos con la información recibida
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  
  function buscarRfc() {
    const rfc = document.getElementById('rfc').value;
    if (!rfc) {
      alert("Por favor ingresa un valor para RFC.");
      return;
    }
  
    fetch(`buscar.php?rfc=${rfc}`)
      .then(response => response.json())
      .then(data => {
        console.log('Resultado RFC:', data);
        // Llenar los campos con la información recibida
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  