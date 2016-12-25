/**
 * Created by es.sitnikov on 16.12.2016.
 */
function setPrice() {
    h = document.getElementById("dynamicmodel-id1").value * 1 + document.getElementById("dynamicmodel-id2").value * 1;
    w = document.getElementById("dynamicmodel-id3").value * 1;

    price = Math.round(((h * (mp + montag))/ 1000) + (pp * w * h /1000000) + packp + postp);
    document.getElementById("dynamicmodel-price").value = price;
    $("#span_price span").html(price + ' руб.');
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    setPrice();

    $('input').change(function () {
        setPrice();
    });

    $('input').keyup(function () {
        setPrice();
    });

});

