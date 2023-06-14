//general
function goShop(){
    window.location.href = "shop.php";
}
function goCart(){
    window.location.href = "shoppingcart.php";
}
function goHome(){
    window.location.href = "index.php";
}
function goCredits(){
    window.location.href = "credits.php";
}
function goAbout(){
    window.location.href= "index.php#aboutme";
}
function goContact(){
    window.location.href="index.php#form";
}
function loggedin(){
    Swal.fire({
        icon: 'success',
        title: 'You have successfully logged in!'
      })
}
function loginerror(){
    Swal.fire({
        icon: 'error',
        title: 'The username and/or password is incorrect!',
        text: 'Please try again.'
      })
}
/* function login(){
    (async () => {

        const { value: formValues } = await Swal.fire({
          title: 'Login!',
          icon: 'info',
          html:
            '<input id="swal-input1" class="swal2-input">' +
            '<input id="swal-input2" class="swal2-input">',
          focusConfirm: false,
          preConfirm: () => {
            return [
              document.getElementById('swal-input1').value,
              document.getElementById('swal-input2').value
            ]
          }
        })
        
        if (formValues) {
          Swal.fire(JSON.stringify(formValues))
        }
        
        })()    
} */

// Get the button:
let mybutton = document.getElementById("scrolltop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
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

function login(){
    document.getElementById("loginformdiv").style.width="100%";
}

function loginclose(){
    document.getElementById("loginformdiv").style.width="0%";
}

function gotoimage(id){
    window.location.href = "shop.php";
    window.onload = itemopen(id);
    console.log(id);
}

function signup(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'You have successfully sent your message!',
        showConfirmButton: false,
        timer: 1500
    })
}

// $(function(){  // FUNCTION FOR FADE IN $(document).ready shorthand
//     $('#title').fadeIn('slow');
//   });
  
// $(document).ready(function() {
      
//       /* Every time the window is scrolled ... */
//       $(window).scroll( function(){
      
//           /* Check the location of each desired element */
//           $('.reveal').each( function(i){
              
//               var bottom_of_object = $(this).position().top + $(this).outerHeight();
//               var bottom_of_window = $(window).scrollTop() + $(window).height();
              
//               /* If the object is completely visible in the window, fade it it */
//               if( bottom_of_window > bottom_of_object ){
                  
//                   $(this).animate({'opacity':'1'},1500);
                      
//               }
              
//           }); 
      
//       });
      
// });

//For shop.php page

// let btns = document.querySelectorAll(".addtocart");

// function checkoutButtons(){
//     for (i of btns) {
//         i.addEventListener('click', function() {
//             let number = prompt("How many?", "1");
//             if (number!= null){
//                 number = Number(number);

//                 let id = this.id;
//                 console.log(id);
        
//                 $.post('cartprocess.php', {
//                     id: id, number: number
//                 }, (response) => {
//                     response from PHP back-end
//                     console.log(response);
//                 })
        
//                 Swal.fire({
//                     position: 'top-end',
//                     icon: 'success',
//                     title: 'Added to cart!',
//                     showConfirmButton: false,
//                     timer: 1500
//                 })
//             }
                
            
//         });
//     }
// }

function addtocart(id){
    let number = document.getElementById(id+'amount').value;
    console.log(id, number);
    if (number!= null){
        number = Number(number);

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
        document.getElementById(id+"btn").innerHTML = "‣";
        
    }else{
        document.getElementById(id).style.display = "block";
        document.getElementById(id+"btn").innerHTML = "▾";
    }
}

function itemopen(id){
    document.getElementById(id).style.width = "80%";
}

function itemclose(id){
    document.getElementById(id).style.width = "0%";
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
        url: "deleteproduct.php",
        type: "POST",
        data: {id: id},
        success: function(data){
            console.log(data);
        }
    });
}

// checkoutButtons();

//For checkout.php page
function pay(){
    Swal.fire({
        title: 'Your order has been confirmed!',
        text: "You will receive a receipt in your email and be redirected to the home page shortly.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Okay!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php";
        }
      })
}