$(document).ready(function () {

    let obj = []
    var carrito;
    existsLocalStorage()

    function existsLocalStorage() {

        //comprobar si esta creado
        if (localStorage.getItem("id-carrito")) {
            //obtener el localstorage del id-carrito
            const objIds = JSON.parse(localStorage.getItem("id-carrito"))
            console.log("pasa")
            pintarTabla(objIds)

            console.log("no existe")
            console.log(objIds)
            objIds.forEach(element => {
                capturar(element.id, element.titulo,element.precio)
                console.log(obj.length)
                $(".btn-secondary").html(`<i class="fas fa-shopping-cart"></i>(${obj.length})`);
            });



            //bucle para recorrer el objeto que contiene los ids seleccionados
            for (const key in objIds) {
                let element = objIds[key];
                for (const key in element) {
                    if (Object.hasOwnProperty.call(element, key)) {
                        const ele = element[key];
                        let Docid = "#carrito-" + ele;
                        if ($(Docid).data("id")) {
                            $(Docid).attr('disabled', true);
                        };
                    }
                }
            }
        }
    }

    function existsObjetos() {
        if (localStorage.getItem("id-carrito") !== undefined) {
            const objIds = JSON.parse(localStorage.getItem("id-carrito"))
            objIds.forEach(element => {
                console.log(element.id)
                capturar(element.id, element.titulo,element.precio)
            });
        }
    }

    function capturar(iden, tittle,precio) {
        function Carrito(id, titulo,precio) {
            this.id = id,
            this.titulo = titulo
            this.precio = precio
        }
        carrito = new Carrito(iden, tittle,precio)
        agregar()
    }

    function agregar() {
        obj.push(carrito)
    }

    $(document).on("click", ".btn-danger", function (e) {
        e.preventDefault();

        $(this).attr('disabled', true);

        let id = $(this).data("id")

        let titulo = $(this).attr("titulo-car");

        let precio = $(this).attr("precio-car");

        if (obj !== null) {
            capturar(id, titulo,precio)
            pintarTabla(obj)
            localStorage.removeItem("id-carrito")
            localStorage.setItem("id-carrito", JSON.stringify(obj))
        } else {
            capturar(id, titulo,precio)
            pintarTabla(obj)
            localStorage.setItem("id-carrito", JSON.stringify(obj))
        }

        $(".btn-secondary").html(`<i class="fas fa-shopping-cart"></i>(${obj.length})`);

        let tablita = $("#tabla")[0]
        console.log(tablita)
        /* for (const key in obj) {
            const element = obj[key];
            console.log(element)
        } */

    });

    function pintarTabla(array) {
        let plantilla = "";
        let total = 0;
        array.forEach(element => {
            plantilla += `<tr>
                                <td scope="row">${element.id}</td>
                                <td>${element.titulo}</td>
                                <td>${element.precio}</td>
                            </tr>`

            total += parseInt(element.precio)
        });

        console.log(total)
        $("#tabla").html(plantilla);
        $("#total").text("total: "+total);
    }


});