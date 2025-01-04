document.addEventListener("DOMContentLoaded", () => {
	const formulario = document.querySelector("#formularioEventos");
  const calendarEl = document.getElementById("agenda");
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "es",
    displayEventTime: false,
    headerToolbar: {
    	left: "prev,next today",
    	center: "title",
    	right: "dayGridMonth"
    },
    eventSources: {
      url: baseURL+"/evento/mostrar",
      method: "POST",
      extraParams: {
        _token: formulario._token.value,
      },
    },
    dateClick: (info) => {
    	formulario.reset();
    	formulario.start.value = info.dateStr;
    	formulario.end.value = info.dateStr;
      $("#evento").modal("show");
    },
    eventClick: (info) => {
    	axios.post(baseURL+"/evento/editar/"+info.event.id)
  		.then((respuesta) => {
	  		formulario.id.value = respuesta.data.id;
	  		formulario.title.value = respuesta.data.title;
	  		formulario.descripcion.value = respuesta.data.descripcion;
	  		formulario.start.value = respuesta.data.start;
	  		formulario.end.value = respuesta.data.end;
	  		$("#evento").modal("show");
	  	}).catch((error) => {
	  			if(error.response){
	  				console.info(error.response.data);
	  			}
	  		}
	  	);
    }
  });
  calendar.render();
  const enviarDatos = (url) => {
  	const datos = new FormData(formulario);
  	const nuevaURL = baseURL+url;
  	axios.post(nuevaURL, datos)
  	.then((respuesta) => {
  		calendar.refetchEvents();
  		$("#evento").modal("hide");
  	}).catch((error) => {
				if(error.response){
					console.info(error.response.data);
				}
  		}
  	);
  }

  document.getElementById("btnGuardar").addEventListener("click", () => {
  	enviarDatos("/evento/agregar");
  });

  document.getElementById("btnEliminar").addEventListener("click", () => {
  	enviarDatos("/evento/borrar/"+formulario.id.value);
  });

  document.getElementById("btnModificar").addEventListener("click", () => {
  	enviarDatos("/evento/actualizar/"+formulario.id.value);
  });
});