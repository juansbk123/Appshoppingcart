const inputUnits = document.querySelector('.input-units'),
      inputAdd = document.querySelector('.quantity-add'),
      inputSub = document.querySelector('.quantity-sub'),
      price = document.getElementById('precio'),
      totalPrice = document.getElementById('precio-total');

inputAdd.addEventListener('click', () =>{
    inputUnits.value = parseInt(inputUnits.value)+1;
    totalPrice.textContent = (parseInt(inputUnits.value) * parseFloat(price.textContent)).toFixed(2);
});
inputSub.addEventListener('click', () => {
    if(inputUnits.value > "1"){
        inputUnits.value = parseInt(inputUnits.value)-1;
        totalPrice.textContent = (parseInt(inputUnits.value) * parseFloat(price.textContent)).toFixed(2) ;
    } 
    else alert("No es posible ingresar valores negativos ni 0");
});

inputUnits.addEventListener('change',()=>{
    if (inputUnits.value <= "0" || !inputUnits.value.match('[0-9]+')){
     alert("Valor no permitido");
     inputUnits.value = "1";
    }
});

