<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Test</title>
</head>
<style>
     .text_v {
	     text-align: center;
     }

     .text_e {
          text-align: justify;
     }

     .text_l {
          text-align: end;
     }

</style>
<body>
	<div class="col-lg-8 mx-auto p-3 py-md-5">
		<header class="pb-3 mb-5 border-bottom">
			<a href="#" class=" text-dark text-decoration-none">
				<span class="fs-4"><em><b>Registro de alumnos</b></em></span>
                    <div class="text_l">
                         <button type="button" class="btn btn-outline-primary text_l" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                              Registrar alumno
                         </button>
                    </div>
			</a>
			<div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="nombre">Nombre</label>
											<input type="text" name="nombre" id="nombre"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="apellido">Apellido</label>
											<input type="text" name="apellido" id="apellido"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group">
											<label for="telefono">Telefono</label>
											<input type="text" name="telefono" id="telefono"
												class="form-control">
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label for="correo">Correo Electronico</label>
											<input type="mail" name="correo" id="correo"
												class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="form-group">
											<label for="direccion">Direccion</label>
											<input type="text" name="direccion" id="direccion"
												class="form-control">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary"data-bs-dismiss="modal">Close</button>
                                   <button type="button" class="btn btn-outline-success" onclick="insert();">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</header>

		<main>

               <table class="table">
                    <thead>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Telefono</th>
                         <th>Correo Electronico</th>
                         <th>Direccion</th>
                         <th>Acciones</th>
                    </thead>
                    <tbody class="table-group-divider">
                         <?php foreach ($listado_alumnos as $item): ?>
                              <tr id="fila<?= $item->id_alumno;?>">
                                   <td><?= $item->id_alumno;?></td>
                                   <td><?= $item->nombre;?></td>
                                   <td><?= $item->apellido;?></td>
                                   <td><?= $item->telefono;?></td>
                                   <td><?= $item->correo;?></td>
                                   <td><?= $item->direccion;?></td>
                                   <input type="hidden" name="eliminar" id="eliminar<?= $item->id_alumno;?>" value="<?= $item->id_alumno;?>">
                                   <td>
                                        <a type="button" onclick="eliminar<?= $item->id_alumno;?>();">Eliminar</a>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#modaleditar<?= $item->id_alumno; ?>">Editar</a>
                                   </td>
                              </tr>

                              <div class="modal fade modal-xl" id="modaleditar<?= $item->id_alumno; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Alumno <?= $item->nombre." ".$item->apellido;?></h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                  <form>
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label for="nombre">Nombre</label>
                                                                      <input type="text" name="nombre" id="nombre<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->nombre; ?>">
                                                                      <input type="hidden" name="id_alumno" id="id_alumno<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->id_alumno; ?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label for="apellido">Apellido</label>
                                                                      <input type="text" name="apellido" id="apellido<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->apellido; ?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label for="telefono">Telefono</label>
                                                                      <input type="text" name="telefono" id="telefono<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->telefono; ?>">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <br>
                                                       <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label for="correo">Correo Electronico</label>
                                                                      <input type="mail" name="correo" id="correo<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->correo; ?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                 <div class="form-group">
                                                                      <label for="direccion">Direccion</label>
                                                                      <input type="text" name="direccion" id="direccion<?= $item->id_alumno; ?>" class="form-control" value="<?= $item->direccion; ?>">
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </form>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="button" class="btn btn-outline-secondary"data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-outline-success" onclick="actualizar<?= $item->id_alumno;?>();">Guardar</button>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <script>
                                   function eliminar<?= $item->id_alumno;?>() {
                                        var id = $("#eliminar<?= $item->id_alumno;?>").val();
                                        var msg = "\n";
                                        var ok = true;

                                        if (id == "") {
                                             msg += " - Nombre";
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
                                             Swal.fire({
                                                  title: "Eliminar",
                                                  text: "Quieres eliminar el registro <?= $item->id_alumno;?>?",
                                                  icon: "warning",
                                                  showCancelButton: true,
                                                  confirmButtonColor: "#009a00",
                                                  cancelButtonColor: "#d33",
                                                  confirmButtonText: "Eliminar"
                                             }).then((result) => {
                                                  if (result.isConfirmed) {
                                                       $.post('http://localhost/test/index.php/welcome/delete', {
                                                            id: id
                                                       }, function (data) {
                                                            if (data == 1) {
                                                                 Swal.fire(
                                                                      'info',
                                                                      'Datos eliminados correctamente',
                                                                      'success'
                                                                 )
                                                                 $("#fila" + id).remove();
                                                            } else {
                                                                 Swal.fire(
                                                                      'Oops...',
                                                                      'No hemos podido guardar los datos correctamente',
                                                                      'error'
                                                                 )
                                                            }
                                                       });
                                                  }
                                             });
                                        }
                                   }

                                   function actualizar<?= $item->id_alumno;?>() {
                                        var id= $("#id_alumno<?= $item->id_alumno; ?>").val();
                                        var nombre = $("#nombre<?= $item->id_alumno; ?>").val();
                                        var apellido = $("#apellido<?= $item->id_alumno; ?>").val();
                                        var telefono = $("#telefono<?= $item->id_alumno; ?>").val();
                                        var correo = $("#correo<?= $item->id_alumno; ?>").val();
                                        var direccion = $("#direccion<?= $item->id_alumno; ?>").val();
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
                                                  id: id,
                                                  nombre: nombre,
                                                  apellido: apellido,
                                                  telefono: telefono,
                                                  correo: correo,
                                                  direccion: direccion
                                             }, function (data) {
                                                  if (data == 1) {

                                                       Swal.fire({
                                                            title: "Datos actualizados",
                                                            type: 'success',
                                                            showDenyButton: false,
                                                            showCancelButton: false,
                                                            confirmButtonText: "Aceptar"
                                                            }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                 location.reload();
                                                            }
                                                       });



                                                       /*Swal.fire(
                                                            'Perfecto!',
                                                            'Datos registrados correctamente',
                                                            'success'
                                                       )*/
                                                       $('#modaleditar<?= $item->id_alumno; ?>').modal('hide');
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
                              </script>
                         <?php endforeach; ?>
                    </tbody>
               </table>

		</main>
		<footer class="pt-5 my-5 text-muted border-top">

		</footer>
	</div>
	<script src="<?= base_url('assets/js');?>/insert.js"></script>
     
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
	</script>
</body>

</html>
