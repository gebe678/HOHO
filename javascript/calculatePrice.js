let price = 60;

function checkForPriceChange()
{
    let priceChangeForms = document.querySelectorAll(".price_change");
    let form = document.getElementById("buyTicketForm");
    let priceDisplay = document.getElementById("priceDisplay");

    for(let i = 0; i < priceChangeForms.length; i++)
    {
        priceChangeForms[i].addEventListener("change", function(){

            let formData = new FormData(form);

            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200)
                {
                    price = this.responseText;
                    priceDisplay.innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "php/calculatePrice.php", true);
            xhttp.send(formData);
        });
    }
}