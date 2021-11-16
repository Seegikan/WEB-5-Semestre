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