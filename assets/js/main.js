$(document).ready(function () {

    //$('#boton1').attr('disabled', true);
    document.getElementById("boton1").disabled = true;
    let ids = [];


    $(".btn-danger").click(function (e) { 
        e.preventDefault();
        
        ids.push(this.id);

        console.log(ids)

        let ide = document.getElementById(this)

        //jQuery('.btn-danger').prop('disabled', false);
        //$('#'+this.id).attr("disabled", false);
        
        

        localStorage.setItem("id",JSON.stringify(ids))

        

        /* $.ajax({
            type: "post",
            url: "http://localhost/rmm-inventario/ajax/carrito.php",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                console.log(response)
            }
        }); */
    });
});