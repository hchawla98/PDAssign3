/*
    The function placeOrder() is called when the form "myform" is submitted.
    It should run some validations and show the output.
*/
function placeOrder(){
    var error='';
    var name = document.getElementById('name').value;
    var postcode = document.getElementById('postcode').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var province = document.getElementById('province').value;
    var product1 = parseInt(document.getElementById('product 1').value);
    var product2 = parseInt(document.getElementById('product 2').value);
    var product3 = parseInt(document.getElementById('product 3').value);
    var delivery = parseInt(document.getElementById('delivery').value);
    

       var regexPostcode = /^[A-Z][0-9][A-Z][s\-]?[0-9][A-Z][0-9]$/;  //Regular Expression
       var regexPhone = /^[(]?[0-9][0-9][0-9][)]?[s\-]?[0-9][0-9][0-9][s\-]?[0-9][0-9][0-9][0-9]$/;  //Regular Expression
       var regexEmail = /\S+@\S+/
       
    if(name.trim()==''){
        error+='Please enter a name. </br>';
    }
    if(!regexEmail.test(email)){
        error+='Please enter a valid Email Address. </br>';
    }
    if(!regexPhone.test(phone)){
        error+='Please enter a valid Phone Number. <br/>';
    }
    if(address == '')
    {
        error += 'Enter an address. </br>';
    }
    if(city == '')
    {
        error += 'Enter a city name. </br>';
    }
    if(!regexPostcode.test(postcode)){
        error+='Please enter a valid postcode. </br>';
    }
    
    
    if(province == ''){
        error += 'Select a valid province. </br>';
    }

    if(product1 == '')
    {
        product1 == 0;
        product1 = parseInt(product1);
    }
    if(product2 == '')
    {
        product2 == 0;
        product2 = parseInt(product2);
    }
    if(product3 == '')
    {
        product3 == 0;
        product3 = parseInt(product3);
    }

    if(product1 == 0)
    {
        if(product2 == 0)
        {
            if(product3 == 0)
            {
                error +='Enter 1 or more quantity of atleast 1 product </br>';  //To get atleast 1 quantity of 1 of products
            }
            
        }
        
    
    }

    
    //to get integer input of all products
    if(isNaN(product1)){
        error += 'Enter a valid number for Product 1. </br>'
    }
    if(isNaN(product2)){
        error += 'Enter a valid number for Product 2. </br>'
    }
    if(isNaN(product3)){
        error += 'Enter a valid number for Product 3. </br>'
    }
    if(delivery == '')
    {
        error+= 'Please select a delivery time. </br>'
    }

    var product1Cost = product1*20;  //total amount of product 1
    var product2Cost = product2*25;  //total amount of product 2
    var product3Cost = product3*30;  //total amount of product 3
    
    var subTotal = parseInt(product1Cost+product2Cost+product3Cost+delivery);  //Order total inclusive shipping but without taxes
    

    if(province == 'Ontario' | province =='Manitoba'){
        var tax = 13;
    }
    if(province == 'Quebec'){
        var tax = 14.975;
    }
    if(province == 'Nova Scotia' | province == 'New Brunswick' | province == 
    'Newfoundland and Labrador' | province == 'Prince Edward Island'){
        var tax = 15;
    }
    if(province == 'Alberta'){
        var tax = 5;
    }
    if(province == 'British Columbia'){
        var tax = 12;
    }
    if(province == 'Saskatchewan'){
        var tax = 11;
    }
    
    var t = tax*subTotal/100;   //final tax amount
    var taxf = parseInt(t.toFixed(2));    //rounding off tax
    var total = taxf+subTotal;  //Order total inclusive of taxes

    if(error !=''){
        document.getElementById('formResult').innerHTML=error;
    }else{
        var myOutput=`
                    <p align="center">Your Invoice</p>
                    <p>Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: ${name}</p>
                    <p>Email&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: ${email} </p>
                    <p>Phone&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: ${phone} </p>
                    <p>Delivery Address&emsp; :  ${address}</p>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;${city}</p>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;${province},${postcode} </p>
                    
                    <p>${product1} Product 1 @ $20 : $${product1Cost} </p>
                    <p>${product2} Product 2 @ $25 : $${product2Cost} </p>
                    <p>${product3} Product 3 @ $30 : $${product3Cost} </p>
                    <p>Shipping Charges&emsp;       : $${delivery}</p>
                    <p>Sub Total&emsp;&emsp;&emsp;&emsp;&ensp;: $${subTotal}</p>
                    <p>Tax @ ${tax}% &emsp;&emsp;&emsp;: $${taxf}</p>
                    <p>Total &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: $${total}</p>
        `;
        document.getElementById('formResult').innerHTML=myOutput;  //Gives final output which is invoice
        document.getElementById('myForm').reset();  //Resets the form data
    }

    return false;
}