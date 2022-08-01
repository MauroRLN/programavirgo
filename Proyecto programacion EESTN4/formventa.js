function abrirform()
{
  var formulario= document.getElementsByClassName('formulario').style.display = "block";
  console.log(formulario)
  formulario.addEventListener('submit', function(e)
  {
	e.preventDefault();
	var datos = new FormData(formulario);
	fetch('agregarVenta.php', {
		method: 'POST',
		body: datos
	})
	console.log(datos)
  }
  )
    
}

function cancelarform() {
	document.getElementsByClassName('formulario').style.display = "none";
	
}

var btnAbrirForm = document.getElementById('btn-abrir-form'),
	overlay = document.getElementById('overlay'),
	formulario = document.getElementById('formulario'),
	btnCerrarform = document.getElementById('btn-cerrar-form');

btnAbrirForm.addEventListener('click', function(){
	overlay.classList.add('active');
	formulario.classList.add('active');
});

btnCerrarform.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	formulario.classList.remove('active');
});
