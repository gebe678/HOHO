// this script will catch the form info sent and will process and return all of the data needed
// the price variable is set and defined in the calculatePrice.js file
// it is declared globally so it can be used here
let itemsInCart = 0;

function sendDataMain()
{
    form = document.getElementById("buyTicketForm");
    let itemsInCartDisplay = document.querySelectorAll(".numItemsInCart");

    form.addEventListener("submit", function(e){
        e.preventDefault();

        let formData = new FormData(form);

        let sendPrice = parseFloat(price.match(/\d+/g));
        formData.append("ticketPrice", sendPrice);

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(this.readyState === 4 && this.status === 200)
            {
                itemsInCart += 1;
                for(let i = 0; i < itemsInCartDisplay.length; i++)
                {
                    itemsInCartDisplay[i].innerHTML = itemsInCart;
                }
                console.log(this.responseText);
                localStorage.setItem("ticketPurchaseData", this.responseText);
                location.href="paymentPage.html";
            }
        };
        
        xhttp.open("POST", "php/processOrderForm.php", true);
        xhttp.send(formData);
    });
}