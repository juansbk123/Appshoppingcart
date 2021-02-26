const inputUnits = document.querySelectorAll('.input-units'),
      cartContainer = document.getElementById('cart-container'),
      total = document.getElementById('total'),
      desc = document.getElementById('desc'),
      descAmount = document.getElementById('desc_amount'),
      subtotal = document.getElementById('subtotal'),
      btnCoupon = document.getElementById('aplicar_cupon');

function actualizarCantidad(id,cantidad){
    let formData = new FormData();
    formData.append("id", id);
    formData.append("cantidad", cantidad);
    fetch('../config/actualizar.php',{
        method:"POST",
        body: formData
    }).then((res)=>res.text())
    .then(res =>{
        subtotal.textContent = parseFloat(res).toFixed(2);
        if(descAmount.dataset.tipo == "p"){
            desc.textContent = (desc.textContent != "0.00") ? (parseFloat(subtotal.textContent) * parseFloat("0."+descAmount.dataset.val)).toFixed(2) : desc.textContent;
        }
        total.textContent = (parseFloat(subtotal.textContent) - parseFloat(desc.textContent)).toFixed(2);
    });
}

cartContainer && cartContainer.addEventListener('click', (e)=>{
    if(e.target.classList.contains('quantity-add')){
        e.target.previousElementSibling.value = parseInt(e.target.previousElementSibling.value)+1;
        e.target.parentNode.parentNode.nextElementSibling.querySelector('#precio-total').textContent = (parseInt(e.target.previousElementSibling.value) * parseFloat(e.target.parentNode.parentNode.previousElementSibling.querySelector('#precio').textContent)).toFixed(2);
        actualizarCantidad(e.target.previousElementSibling.dataset.id,e.target.previousElementSibling.value);
    }
    else if(e.target.classList.contains('quantity-sub')){
        if(e.target.nextElementSibling.value > "1"){
            e.target.nextElementSibling.value = parseInt(e.target.nextElementSibling.value)-1;
            e.target.parentNode.parentNode.nextElementSibling.querySelector('#precio-total').textContent = (parseInt(e.target.nextElementSibling.value) * parseFloat(e.target.parentNode.parentNode.previousElementSibling.querySelector('#precio').textContent)).toFixed(2);
            actualizarCantidad(e.target.nextElementSibling.dataset.id,e.target.nextElementSibling.value);
        } 
        else alert("No es posible ingresar valores negativos ni 0");
    }
})


inputUnits.forEach((u)=>{
    u.addEventListener('change',function(e){
        if (e.target.value <= "0" || !e.target.value.match('[0-9]+')){
         alert("Valor no permitido");
         e.target.value = this.oldValue;
        }
        else {
            this.oldValue=this.value;
            e.target.parentNode.parentNode.nextElementSibling.querySelector('#precio-total').textContent = (parseInt(e.target.value) * parseFloat(e.target.parentNode.parentNode.previousElementSibling.querySelector('#precio').textContent)).toFixed(2);
            actualizarCantidad(e.target.dataset.id,e.target.value);
        }
    });
    u.addEventListener('focus',function(e){
        this.oldValue=this.value;
    })
})

btnCoupon.addEventListener('click',()=>{
    let code = document.getElementById('codigo_cupon').value,
        formData = new FormData();
    formData.append("codigo", code);
    fetch('../config/validarcupon.php',{
        method:"POST",
        body: formData
    }).then(res=> res.json())
    .then(res=>{
        if(res.success){
            document.getElementById('codigo_cupon').dataset.id = res.id;
            if(res.tipo == "porcentaje"){
                descAmount.textContent = `(${res.valor}%)`; 
                desc.textContent = (parseFloat(subtotal.textContent) * parseFloat("0."+res.valor)).toFixed(2);
                descAmount.dataset.val = res.valor;
                descAmount.dataset.tipo = "p";
                total.textContent = (parseFloat(subtotal.textContent) - parseFloat(desc.textContent)).toFixed(2);
            }
            else{
                desc.textContent = res.valor+".00"
                descAmount.dataset.val = res.valor;
                descAmount.dataset.tipo = "m";
                total.textContent = (parseFloat(subtotal.textContent) - parseFloat(desc.textContent)).toFixed(2);
            }
        }
        else{
            alert(res.message)
        }
    });
})