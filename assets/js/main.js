$(document).ready(function () {


    let ids = []

    let obj = {}

    //existsLocalStorage()

    function existsLocalStorage() {
        //comprobar si esta creado

        if (localStorage.getItem("id-carrito") !== undefined) {
            const objIds = JSON.parse(localStorage.getItem("id-carrito"))


            var editButtons = document.querySelectorAll('button#carrito');



            for (const property in objIds) {
                console.log(objIds[property]);

                editButtons.forEach(e => {
                    console.log(e.dataset.id);
                    objIds[property].forEach(ex => {
                        if (parseInt(e.dataset.id, 10) == ex) {
                            $("#carrito").attr('disabled', true);
                        }
                    })
                });
            }
            //$("#carrito").attr('disabled', true);
        }
    }

    $(document).on("click", "#carrito", function (e) {
        e.preventDefault();
        console.log("hola")


        $(this).attr('disabled', true);

        let id = $(this).data("id")

        ids.push(id);

        console.log(ids.length)

        obj = {
            "id": ids
        }


        $(".btn-secondary").html( `<i class="fas fa-shopping-cart"></i>(${ids.length})`);

        //localStorage.setItem("id-carrito", JSON.stringify(obj))
    });


});