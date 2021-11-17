$(".btn_add_cart_item").click(function (event) 
{
  event.preventDefault()
  let product = $(this).data("product")
  let target = $(this).data("target")
  //console.log(target)
  $.ajax({
        url: target,
        type: "POST",
        data: {product: product},
        success: function( result ) 
        {
         if(result.status)
         {
          $(".totalItemsCart").html(result.Items)
          $.get(target.replace("add", "minicart"), function(data) {
            $(".minicart-list").html(data)
          });

          if(result.status)
          {
          icon = 'success'

          }
          massage = result.massage
            Swal.fire({
              icon: icon,
              title: massage,


            })
         }
        }
      });
})

$(".listshopping" ).on("click",".delete_item",
function (event) {
  event.preventDefault()
  //console.log($(this)).data("parentid")
  let product = $(this).data("parentid")
 Swal.fire({
  title: 'Are you sure?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
     url: shoppingCartURl+'delete',
     type: 'POST',
     data: {product:product},
     cache: false,

    }).done(
    function(data)
    {
      var title = 'Error'
      var icon = "error"
      if(data.status)
      {
        title = data.massage
        icon = "success"        

        }
        Swal.fire({
          title: title,
          icon: icon
      })
    })
  }
})

})



 if (result.isConfirmed) {
    $.ajax({
     url: shoppingCartURl+'update',
     type: 'POST',
     data: {product:product, quantity:quantity},
     cache: false,

    }).done(
    function(data)
    {
      var title = 'Error'
      var icon = "error"
      if(data.status)
      {
        title = data.massage
        icon = "success"        

        }
        Swal.fire({
          title: title,
          icon: icon
      })
    })
  }

/*
cambio el producto
remove
valor = 0 haga 

*/

