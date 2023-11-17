//arrow functions
let valida_forma = () => {
    let js_nom=getTextInputByID("f_nombre");
    let js_ema=getTextInputByID("f_email");
    let js_prod=document.getElementsByName("f_producto");
    let js_depa=getTextInputByID("f_depa");
    let js_desc=getTextInputByID("f_desc");

        // create a variable to track whether a radio button has been selected
        let radioSelected = false;

        // loop through each radio button
        for (let i = 0; i < js_prod.length; i++) {
        // check if the radio button is checked
        if (js_prod[i].checked) {
          // set the variable to true if a radio button is checked
          radioSelected = true;
          // break the loop if a radio button is checked
          break;
        }
      }

    //alert(js_prod.value);
    
    if (js_nom.length <= 0) {
        mensaje('error','Error en Nombre','El dato nombre no debe ir vacio!','<a href="www.asp.net">Necesita ayuda?</a>');
        return false;
    }
    else if (js_ema.length <= 0){
        mensaje('error','Error en email','Email no debe ir vacio!','<a href="www.asp.net">Necesita ayuda?</a>');
        return false;
    }
    else if (!radioSelected){
        mensaje('error','Error en Producto','Seleccione un producto!','<a href="www.asp.net">Necesita ayuda?</a>');
        return false;
    }
    else if (js_depa == 0){
        mensaje('error','Error en Departamento','Debe seleciconar un departamento!','<a href="www.asp.net">Necesita ayuda?</a>');
        return false;
    }
    else if (js_desc.length < 50){
        mensaje('error','Error en Problemática','Al menos debe escribir algo que menciona la problematica mínimo 50 chars!','<a href="www.asp.net">Necesita ayuda?</a>');
        return false;
    }

   
}

/*obtener los valores de etiquetas*/
let getTextInputByID=(id)=>{
    return document.getElementById(id).value.trim();
}

let mensaje = (tipo,titulo,texto,liga) =>{
    Swal.fire({
      icon: tipo,
      title: titulo,
      text: texto,
      footer: liga
    });
  }