

window.addEventListener("load", startApp);

function startApp(){

	let formulario = document.forms[0];
		// formulario.enviar.addEventListener("click", function(){
		// 	verifyData(formulario);
		// });

	formulario.addEventListener("input", inputNoValid);

	console.log(formulario);

}

function verifyData(object_form){
	
	let formulario = object_form[0];
	console.log(formulario);

	// formulario.usuario.value == "" ?
	// 	formulario.usuario.setCustomValidity("Inserte El Usuario") :
	// 	formulario.usuario.setCustomValidity("");

	// formulario.contrasena.value == "" ?
	// 	formulario.contrasena.setCustomValidity("Inserte La Contraseña") :
	// 	formulario.contrasena.setCustomValidity("");

		return formulario.usuario.value != "" && formulario.contrasena.value != "" ?  true :  false;
			
		
}

function inputNoValid(obj){

	let elementActual = obj.target;

	!elementActual.validity.valid ? elementActual.style.backgroundColor = "#FFDDDD" : 
		elementActual.style.backgroundColor = "#FFFFFF";

	


}

