
function calculate(){
    var amount = $('#amount').val();
    var percentage = $('#percentage').val();
    var tip = amount * (percentage/100);
    var total = Number(amount) + tip;

    //tip.toFixed(2) function makes sure that there is 
    //only 2 digits after the decimal point
    $('#tip').val(tip.toFixed(2));
    $('#total').val(total.toFixed(2));

    return false;
}

//attaching the function to the submit event
$('#calculator').submit(calculate);