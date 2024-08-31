function insert() {
	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var telefono = $("#telefono").val();
	var correo = $("#correo").val();
	var direccion = $("#direccion").val();
     var id = 0;
	var msg = "\n";
	var ok = true;

	if (nombre == "") {
		msg += " - Nombre";
		ok = false;
	}

	if (apellido == "") {
		msg += "\n - Apellido";
		ok = false;
	}

	if (telefono == "") {
		msg += " - Telefono";
		ok = false;
	}

	if (correo == "") {
		msg += " - Correo";
		ok = false;
	}

	if (direccion == "") {
		msg += " - Direccion";
		ok = false;
	}

	msg += "\n";

	if (ok == false) {
		Swal.fire({
			title: 'Campo Vacio',
			text: "Campos vacios:" + msg,
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#27cb34',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Deseas Continuar?'
		}).then((result) => {
			if (result.value) {
				Swal.fire(
					'Oops...',
					'Faltan datos por llenar',
					'error'
				)
			}
		})
	} else {
		$.post('http://localhost/test/index.php/welcome/alumnos', {
               id: 0,
			nombre: nombre,
			apellido: apellido,
			telefono: telefono,
			correo: correo,
			direccion: direccion
		}, function (data) {
			if (data == 1) {
				Swal.fire({
                         title: "Datos Guardados correctamente",
                         type: 'success',
                         showDenyButton: false,
                         showCancelButton: false,
                         confirmButtonText: "Aceptar"
                         }).then((result) => {
                         if (result.isConfirmed) {
                              location.reload();
                         }
                    });
				$("#nombre").val('');
				$("#apellido").val('');
				$("#telefono").val('');
				$("#correo").val('');
				$("#direccion").val('');
				$('#exampleModal').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').hide();
			} else {
				Swal.fire(
					'Oops...',
					'No hemos podido guardar los datos correctamente',
					'error'
				)
			}
		});
	}
}