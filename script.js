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

//For shoppingcart.php page

checkoutButtons();
