// Función que realiza el cálculo automáticamente cuando se ingresa un valor
function calculate() {
    // Seleccionamos todos los inputs de precios con la clase .price-input
    const priceInputs = document.querySelectorAll('.price-input');
    
    // Inicializamos el subtotal a 0
    let subtotal = 0;
  
    // Sumamos todos los valores de los inputs de precios
    priceInputs.forEach(function(input) {
      // Si el campo tiene un valor numérico, lo sumamos al subtotal
      const price = parseFloat(input.value);
      if (!isNaN(price)) {
        subtotal += price;
      }
    });
  
    // Calcular impuestos (por ejemplo, 16% de IVA)
    const taxRate = 0.16; // IVA del 16%
    const taxes = subtotal * taxRate;
  
    // Calcular el total (subtotal + impuestos)
    const total = subtotal + taxes;
  
    // Actualizamos los campos con los resultados
    document.getElementById('subAmount').value = subtotal.toFixed(2);
    document.getElementById('taxes').value = taxes.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);
  }
  
  // Detectamos el evento "input" en los campos de precio para recalcular automáticamente
  document.querySelectorAll('.price-input').forEach(function(input) {
    input.addEventListener('input', calculate);
  });
  