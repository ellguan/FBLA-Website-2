//general
function goShop(){
    window.location.href = "shop.php";
}
function goRegister(){
    window.location.href = "registration.php";
}
function goHome(){
    window.location.href = "index.php";
}

//For index.php page
function filter(country){
    window.location.href = "shop.php?filters%5B%5D=" + country;
}

function menuopen(){
    document.getElementById("menu").style.width = "100%";
}

function menuclose(){
    document.getElementById("menu").style.width = "0%";
}

$(function(){  // FUNCTION FOR FADE IN $(document).ready shorthand
    $('#title').fadeIn('slow');
  });
  
$(document).ready(function() {
      
      /* Every time the window is scrolled ... */
      $(window).scroll( function(){
      
          /* Check the location of each desired element */
          $('.reveal').each( function(i){
              
              var bottom_of_object = $(this).position().top + $(this).outerHeight();
              var bottom_of_window = $(window).scrollTop() + $(window).height();
              
              /* If the object is completely visible in the window, fade it it */
              if( bottom_of_window > bottom_of_object ){
                  
                  $(this).animate({'opacity':'1'},1500);
                      
              }
              
          }); 
      
      });
      
});

//For shop.php page

let btns = document.querySelectorAll(".addtocart");

function checkoutButtons(){
    for (i of btns) {
        i.addEventListener('click', function() {
            let number = prompt("How many?", "1");
            if (number!= null){
                number = Number(number);

                let id = this.id;
                console.log(id);
        
                $.post('cartprocess.php', {
                    id: id, number: number
                }, (response) => {
                    // response from PHP back-end
                    console.log(response);
                })
        
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added to cart!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
                
            
        });
    }
}

function reduceArrays(array1, array2){
    const filteredArray = array1.filter(value => array2.includes(value));
    return filteredArray;
}

function checkout(){
    window.location.href = "shoppingcart.php";
}

function dropdown(id){
    if(document.getElementById(id).style.display == "block"){
        document.getElementById(id).style.display = "none";
        
    }else{
        document.getElementById(id).style.display = "block";
    }
}

//For shoppingcart.php page

function deleteProduct(id, price){
    document.getElementById(id).style.display = "none";
    total = total - Number(price);
    if(total == 0){
        document.getElementById('nothingincart').style.display = "block";
        document.getElementById('checkout').style.display = "none";
    }
    document.getElementById('total').innerHTML = "Total = $" + total;

    $.ajax({
        method: "POST",
        url: "shoppingcart.php",
        data: { id: id }
      })
}

checkoutButtons();
