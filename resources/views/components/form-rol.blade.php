@inject('RolController', 'App\Http\Controllers\RolController')  
<?php $roles = $RolController::index();  ?>


<style type="text/css">
	.input-group>.input-group-prepend {
	    flex: 0 0 20%;
	}
	.input-group .input-group-text {
	    width: 75%;
	}
</style>

<div>
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	  <h1 class="h2">Dashboard</h1>
	  <div class="btn-toolbar mb-2 mb-md-0">
	    <div class="btn-group mr-2">
	      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
	      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
	    </div>
	    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
	      <span data-feather="calendar"></span>
	      This week
	    </button>
	  </div>
	</div>

<div class="formCategoria">
	  <h2>Modificar Rol</h2>

<div class="input-group mb-3">
  <div class="input-group-prepend ">
    <span class="input-group-text" id="basic-addon1">Id</span>
  </div>
  <select id="rolId" class="form-control">
    @foreach($roles as $rol)
        <option>{{ $rol->id }}</option>
        @endforeach
    </select> 
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon2">Tipo</span>
  </div>
  <input id="rolTipo" type="number" min="1" max="3" step="1" list="numerosRol" class="form-control" placeholder="Nuevo tipo" aria-label="tipo" aria-describedby="basic-addon2">
</div>

<button type="submit" class="btn btn-outline-dark btn-block border-dark" onclick="sendRol()">Modificar</button>
</div>
</div>

<datalist id="numerosRol">
  <option value="1">Arrendatario</option>
  <option value="2">Arrendatario y Publicador</option>
  <option value="3">Administrador</option>
</datalist>

<script type="text/javascript">

  function sendRol(){

    var id = document.getElementById("rolId").value;
    var roltype = document.getElementById("rolTipo").value;

    $.ajax({

        type:'PUT',
        url:'/rol/update/' + id ,
        data: {
		      rol : roltype,
        },
        success: function(data){
          window.location.reload();
          console.log("update exitoso");
        },
        error: function(data){
          console.log("update fallido");
        }
    });
  }
</script>