	  //called when key is pressed in textbox
  $("#f_folio_finanzas").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Solo números").show().fadeOut("slow");
               return false;
    }
   });

	  //called when key is pressed in textbox
  $("#f_cuentas_por_pagar").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Solo números").show().fadeOut("slow");
               return false;
    }
   });

  	  //called when key is pressed in textbox
  $("#f_folio_viatico").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg3").html("Solo números").show().fadeOut("slow");
               return false;
    }
   });


	  //called when key is pressed in textbox
  $("#f_partida").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg4").html("Solo números").show().fadeOut("slow");
               return false;
    }
   });


  $('#f_cargos').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){

		//display error message
        $("#errmsg5").html("Números y/o con decimal").show().fadeOut("slow");

         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    
    }
    $(this).val(val); 
});

    $('#f_abonos').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){

		//display error message
        $("#errmsg6").html("Números y/o con decimal").show().fadeOut("slow");

         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    
    }
    $(this).val(val); 
});

   $('#f_reintegro').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){

		//display error message
        $("#errmsg7").html("Números y/o con decimal").show().fadeOut("slow");

         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    
    }
    $(this).val(val); 
});


	function valida_ingresos(){
	
		var js_f_fecha_registro=document.getElementById("f_fecha_registro").value.trim();
		var js_f_folio_finanzas=document.getElementById("f_folio_finanzas").value.trim();
		var js_f_cuentas_por_pagar=document.getElementById("f_cuentas_por_pagar").value.trim();
		var js_f_transferencia_cheque=document.getElementById("f_transferencia_cheque").value.trim();
		var js_f_beneficiario=document.getElementById("f_beneficiario").value;
		var js_f_abonos=document.getElementById("f_abonos").value.trim();
		var js_f_fecha_de_pago=document.getElementById("f_fecha_de_pago").value.trim();
		var js_f_componente=document.getElementById("f_componente").value;
		var js_f_concepto=document.getElementById("f_concepto").value.trim();
		var js_f_descripcion=document.getElementById("f_descripcion").value.trim();
		var js_f_num_solicitud=document.getElementById("f_num_solicitud").value.trim();
		var js_f_folio_viatico=document.getElementById("f_folio_viatico").value.trim();
		var js_f_factura=document.getElementById("f_factura").value.trim();
		var js_f_estatus=document.getElementById("f_estatus").value.trim();
		var js_f_nota=document.getElementById("f_nota").value.trim();
		var js_f_reintegro=document.getElementById("f_reintegro").value.trim();
		var js_f_partida=document.getElementById("f_partida").value.trim();
		
		if (js_f_fecha_registro.length==0){
			//Swal.fire('Any fool can use a computer');
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo fecha de registro no debe estar vacío',
			  text: '¡Verificar, por favor!'
			  /*footer: '<a href>Why do I have this issue?</a>'*/});
			return false;
		}
		else if (js_f_folio_finanzas.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo folio finanzas no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_cuentas_por_pagar.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo cuentas por pagar no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_transferencia_cheque.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Transferencia/Cheque no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_beneficiario=="0"){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Seleccione una opción de la lista de beneficiarios',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_abonos.length==0  || js_f_abonos=='.'){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Abonos no debe estar vacío o solo contener caracter punto',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_fecha_de_pago.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo fecha de pago no debe estar vacío',
			  text: '¡Verificar, por favor!'
			  /*footer: '<a href>Why do I have this issue?</a>'*/});
			return false;
		}
		else if (js_f_componente=="0"){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Seleccione una opción de la lista de componentes',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_concepto.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo de concepto no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_descripcion.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo descripcion no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_num_solicitud.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Número de Solicitud no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_folio_viatico.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Folio del Viático no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_factura.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Factura no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_estatus.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Estatus no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_nota.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Notas no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_reintegro.length==0  || js_f_reintegro=='.'){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Reintegro no debe estar vacío o solo contener caracter punto',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_partida.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Partida no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
	}



	function valida_egresos(){
	
		var js_f_fecha_registro=document.getElementById("f_fecha_registro").value.trim();
		var js_f_folio_finanzas=document.getElementById("f_folio_finanzas").value.trim();
		var js_f_cuentas_por_pagar=document.getElementById("f_cuentas_por_pagar").value.trim();
		var js_f_transferencia_cheque=document.getElementById("f_transferencia_cheque").value.trim();
		var js_f_beneficiario=document.getElementById("f_beneficiario").value;
		var js_f_cargos=document.getElementById("f_cargos").value.trim();
		var js_f_abonos=document.getElementById("f_abonos").value.trim();
		var js_f_fecha_de_pago=document.getElementById("f_fecha_de_pago").value.trim();
		var js_f_componente=document.getElementById("f_componente").value;
		var js_f_concepto=document.getElementById("f_concepto").value.trim();
		var js_f_descripcion=document.getElementById("f_descripcion").value.trim();
		var js_f_num_solicitud=document.getElementById("f_num_solicitud").value.trim();
		var js_f_folio_viatico=document.getElementById("f_folio_viatico").value.trim();
		var js_f_factura=document.getElementById("f_factura").value.trim();
		var js_f_estatus=document.getElementById("f_estatus").value.trim();
		var js_f_nota=document.getElementById("f_nota").value.trim();
		var js_f_reintegro=document.getElementById("f_reintegro").value.trim();
		var js_f_partida=document.getElementById("f_partida").value.trim();
		
		if (js_f_fecha_registro.length==0){
			//Swal.fire('Any fool can use a computer');
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo fecha de registro no debe estar vacío',
			  text: '¡Verificar, por favor!'
			  /*footer: '<a href>Why do I have this issue?</a>'*/});
			return false;
		}
		else if (js_f_folio_finanzas.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo folio finanzas no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_cuentas_por_pagar.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo cuentas por pagar no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_transferencia_cheque.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Transferencia/Cheque no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		} 		 
		else if (js_f_beneficiario=="0"){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Seleccione una opción de la lista de beneficiarios',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_cargos.length==0 || js_f_cargos=='.'){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Cargos no debe estar vacío o solo contener caracter punto',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_abonos.length==0  || js_f_abonos=='.'){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Abonos no debe estar vacío o solo contener caracter punto',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_fecha_de_pago.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo fecha de pago no debe estar vacío',
			  text: '¡Verificar, por favor!'
			  /*footer: '<a href>Why do I have this issue?</a>'*/});
			return false;
		}
		else if (js_f_componente=="0"){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Seleccione una opción de la lista de componentes',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_concepto.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo de concepto no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_descripcion.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo descripcion no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_num_solicitud.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Número de Solicitud no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_folio_viatico.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Folio del Viático no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_factura.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Factura no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_estatus.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Estatus no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_nota.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Notas no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_reintegro.length==0  || js_f_reintegro=='.'){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Reintegro no debe estar vacío o solo contener caracter punto',
			  text: '¡Verificar, por favor!'});
			return false;
		}
		else if (js_f_partida.length==0){
			Swal.fire({
			  type: 'error',
			  title: 'Error: Campo Partida no debe estar vacío',
			  text: '¡Verificar, por favor!'});
			return false;
		}
	}

function validaRFC(){
   //alert("hola");
   
   pattern = /^[a-zA-Z]{4}(\d{6})(([a-zA-Z0-9]){3})?$/;
   rfc = document.getElementById("irfc").value;
  document.getElementById("estatus").innerHTML = pattern.test(rfc);
  return pattern.test(rfc);
}


	function valida_cliente_a_borrar(){
		var js_irfc=document.getElementById("irfc").value.trim();
		if (js_irfc.length==0){
			alert("Error al borrar: Campo RFC no debe estar vacío");
			return false;
		} 
	}

	function getParametro(url_string){
    var url = new URL(url_string);
    var c = url.searchParams.get("sub");
    return c;
    }

function GetTodayDate() {
   var tdate = new Date();
   var dd = tdate.getDate(); //yields day
   var MM = tdate.getMonth(); //yields month
   var yyyy = tdate.getFullYear(); //yields year
   var hrs = tdate.getHours(); //minutos
    var min = tdate.getMinutes();//segundos
    var mili = tdate.getMilliseconds();//mili
   var currentDate= dd + "-" +( MM+1) + "-" + yyyy+"_"+hrs+"_"+min+"_"+mili;

   return currentDate;
}



function lTrim(sStr){
     while (sStr.charAt(0) == " ")
      sStr = sStr.substr(1, sStr.length - 1);
     return sStr;
    }

    function rTrim(sStr){
     while (sStr.charAt(sStr.length - 1) == " ")
      sStr = sStr.substr(0, sStr.length - 1);
     return sStr;
    }

    function allTrim(sStr){
     return rTrim(lTrim(sStr));
    }
/* end functions trim*/

function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "<img  src='css/img/32px-Crystal_Clear_app_help_index.png'/><span style='color:#ad2f2f;'>&nbsp;Alertas</span>:Facultad de Sistemas UAdeC";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button id="btn_alertjs" style="width:80px;height:33px;background:black;color:#fff;border-color:gray;font-size:20px;font-weight:bold;hover:;" onclick="Alert.ok()">OK</button>';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Alert = new CustomAlert();

function dialogo_bootstrap(msg,url){
BootstrapDialog.show({
  title: 'Programa de Escuelas Tiempo Completo',
  type: BootstrapDialog.TYPE_SUCCESS,
  closable: false,
    message: msg,
    buttons: [{
      label: 'OK',
      cssClass: 'btn-success',
        action: function(dialog) {
          dialog.close();
          window.location.href=url;
        }
    }]
});
}

/* Suprimir el uso de la tecla ENTER en Textarea 
  Autor: John Sánchez Alvarez 
  Este código es libre de usar y modificarse*/ 

//Me permite remplazar valores dentro de una cadena
function str_replace($cambia_esto, $por_esto, $cadena) {
   return $cadena.split($cambia_esto).join($por_esto);
}

//Valida que no sean ingresado ENTER dentro del textarea
function Textarea_Sin_Enter($char, $id){
   //alert ($char);
   $textarea = document.getElementById($id);
   
   if($char == 13){
      $texto_escapado = escape($textarea.value);
      if(navigator.appName == "Opera" || navigator.appName == "Microsoft Internet Explorer") $texto_sin_enter = str_replace("%0D%0A", "", $texto_escapado); 
      else $texto_sin_enter = str_replace("%0A", "", $texto_escapado);
      
      $textarea.value = unescape($texto_sin_enter); 
   }
}