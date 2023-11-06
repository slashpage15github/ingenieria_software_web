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
        alert("Error: nombre no debe ir vacio");
        return false;
    }
    else if (js_ema.length <= 0){
        alert("Error: Email no debe ir vacio");
        return false;
    }
    else if (!radioSelected){
        alert("Error: Seleccione un producto");
        return false;
    }
    else if (js_depa == 0){
        alert("Error: Debe seleciconar un departamento");
        return false;
    }
    else if (js_desc.length < 50){
        alert("Error: Al menos debe escribir algo que menciona la problematica mínimo 50 chars");
        return false;
    }

   
}

/*obtener los valores de etiquetas*/
let getTextInputByID=(id)=>{
    return document.getElementById(id).value.trim();
}