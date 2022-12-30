//For shop.php page

let btns = document.querySelectorAll(".addtocart");

function checkoutButtons(){
    for (i of btns) {
        i.addEventListener('click', function() {
            let id = this.id;
            console.log(id);
    
            $.post('cartprocess.php', {
                id: id
            }, (response) => {
                // response from PHP back-end
                console.log(response);
            })
    
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Added to cart!',
                showConfirmButton: false,
                timer: 2500
              })
        });
    }
}

//For shoppingcart.php page

checkoutButtons();
