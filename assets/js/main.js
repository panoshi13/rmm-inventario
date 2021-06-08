$(document).ready(function () {
  //creacion del array y objetos para que guarden los id,titulo,precios y unidad
  let obj = [];
  let carrito;
  let mtotal = 0;

  existsLocalStorage();
  $("#direccion").hide();
  $(".tarjeta").hide();

  $(document).on("click", "#domicilio", function () {
    $("#direccion").show();
    $(".tarjeta").show();
  });
  $(document).on("click", "#tienda", function () {
    $("#direccion").hide();
    $(".tarjeta").show();
  });
  $(document).on("click", "#express", function () {
    $("#direccion").show();
    $(".tarjeta").show();
  });

  //comprobacion si existe el localStorage
  function existsLocalStorage() {
    //comprobar si esta creado
    if (localStorage.getItem("id-carrito")) {
      //obtener el localstorage del id-carrito
      const objIds = JSON.parse(localStorage.getItem("id-carrito"));
      obj = objIds
      pintarTabla(objIds);
      objIds.forEach((element) => {
        $(".btn-secondary").html(
          `<i class="fas fa-shopping-cart"></i>(${objIds.length})`
        );
      });

      //bucle para recorrer el objeto que contiene los ids seleccionados y desactivar su boton
      for (const key in objIds) {
        if (Object.hasOwnProperty.call(objIds, key)) {
          const ele = objIds[key].id;
          let Docid = "#carrito-" + ele;
          console.log(Docid);
          if ($(Docid).data("id")) {
            $(Docid).attr("disabled", true);
          }
        }
      }
    }
  }

  function capturar(iden, tittle, precio) {
    function Carrito(id, titulo, precio, unidad) {
      this.id = id;
      this.titulo = titulo;
      this.precio = precio;
      this.unidad = unidad;
    }
    carrito = new Carrito(iden, tittle, precio, 1);
    obj.push(carrito);
  }

  //agregar a producto a carrito de compra
  $(document).on("click", ".btn-danger", function (e) {
    e.preventDefault();

    $(this).attr("disabled", true);

    let id = $(this).data("id");

    let titulo = $(this).attr("titulo-car");

    let precio = $(this).attr("precio-car");

    //obj = JSON.parse(localStorage.getItem("id-carrito"));

    //console.log(localStorage.getItem("id-carrito"))
    if (obj !== null) {
      capturar(id, titulo, precio);
      pintarTabla(obj);
      localStorage.removeItem("id-carrito");
      localStorage.setItem("id-carrito", JSON.stringify(obj));
    } else {
      capturar(id, titulo, precio);
      pintarTabla(obj);
      localStorage.setItem("id-carrito", JSON.stringify(obj));
    }

    $(".btn-secondary").html(
      `<i class="fas fa-shopping-cart"></i>(${obj.length})`
    );

    let tablita = $("#tabla")[0];
  });

  function pintarTabla(array) {
    let plantilla = "";
    let plantilla1 = "";
    let total = 0;
    array.forEach((element) => {
      plantilla += `<tr>
                                <td scope="row">${element.id}</td>
                                <td>${element.titulo}</td>
                                <td>${element.precio}</td>
                                <button type="button" class="btn btn-dark"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>`;

      total += parseInt(element.precio) * element.unidad;

      mtotal = total;

      plantilla1 += `<tr>
                        <td scope="row" carid="${element.id}">${element.id}</td>
                        <td>${element.titulo}</td>
                        <td>${element.precio}</td>
                        <td>${element.unidad}</td>
                        <td><button type="button" class="btn btn-light border" id="aument" data-id="${element.id}">+</button>
                        <button type="button" class="btn btn-light border" id="dismin" data-id="${element.id}">-</button>
                        <button type="button" class="btn btn-light border" id="borrar" data-id="${element.id}"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>`;
    });

    //pintar la tabla de datos agregados al carrito
    $("#tabla").html(plantilla);
    $("#tabla1").html(plantilla1);
    $("#total").text("total: " + total);
  }

  $(document).on("click", "#aument", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    const objIds = JSON.parse(localStorage.getItem("id-carrito"));
    objIds.forEach((element) => {
      if (element.id == id) {
        element.unidad++;
        localStorage.setItem("id-carrito", JSON.stringify(objIds));
      }
    });

    pintarTabla(objIds);
  });
  $(document).on("click", "#dismin", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    const objIds = JSON.parse(localStorage.getItem("id-carrito"));
    objIds.forEach((element) => {
      if (element.id == id) {
        element.unidad--;
        localStorage.setItem("id-carrito", JSON.stringify(objIds));
      }
    });
    pintarTabla(objIds);
  });

  $(document).on("click", "#borrar", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    const object = JSON.parse(localStorage.getItem("id-carrito"));

    for (const key in object) {
      if (object[key].id == id) {
        object.splice(key, 1);
        localStorage.setItem("id-carrito", JSON.stringify(object));
      }
    }
    existsLocalStorage();
    pintarTabla(object);
  });
  
  $(document).on("click", "#finCompra",function (e) {
    e.preventDefault()

    const data = localStorage.getItem("id-carrito");
    const compra = {
      "departamento" : $("#departamento").val(),
      "distrito": $("#distrito").val(),
      "direccion":$("#direc").val(),
      "coste" : mtotal,
      "id-usuario" : $("#id-usuario").attr("id-usuario")
    }
    const compras = JSON.stringify(compra)

    $.ajax({
      type: "post",
      url: "http://localhost/rmm-inventario/ajax/pedido.php",
      data: {compras},
      dataType: "dataType",
      success: function (response) {
        $.ajax({
          type: "post",
          url: "http://localhost/rmm-inventario/ajax/carrito.php",
          data: {data},
          dataType: "dataType",
          success: function (response) {
            console.log(response)
          }
        });
      }
    });

    

    var url = "http://localhost/rmm-inventario/pedido/historial";    
    $(location).attr('href',url);
    localStorage.removeItem("id-carrito");
  });

});
