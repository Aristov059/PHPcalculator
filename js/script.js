
var summa = document.getElementById("summa");

$('#month').change(function(){
    var selectval= $(this).val(); // Получим значение из select со значением #participation
    if( selectval == "1" || selectval == "2" || selectval == "12"  ) {
        summa.value = "600";
    } else if ( selectval == "9" || selectval == "10" || selectval == "11" || selectval == "3" || selectval == "4" || selectval == "5" ){
        summa.value = "400";
    } else if ( selectval == "6" || selectval == "7" || selectval == "8"  ){
        summa.value = "300";
    }
});