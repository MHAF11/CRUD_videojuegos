window.onload = () =>{
    setTimeout(()=>{
        if(document.getElementById('alerta') != null){
            document.getElementById('alerta').remove()
        }
    }, 3000);
}

let btnEliminar = document.querySelector('#btnEliminar');
let lbl_nombre = document.querySelector('#lbl_nombre')
window.setInfo = (id,nombre) =>{
    btnEliminar.setAttribute('data-id',id);
    lbl_nombre.innerHTML = 'Eliminarás el videojuego: <b>'+nombre+'</b>'
}

btnEliminar.addEventListener('click', ()=>{
    let id = btnEliminar.getAttribute('data-id');
    let form = document.querySelector('#frm_'+id);
    form.submit();
})