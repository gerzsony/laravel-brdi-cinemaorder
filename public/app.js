import './bootstrap';

$( document ).ready(function() {

    //gen room layout
    let ti = "<tr>"
    for(let i=1; i<= 80; i++){
        ti += "<td id='ti_"+ i +"' class='sold'>" + i + "</td>";

    }
    ti += "</tr>";
    $('#roomlayout').children('tbody').html = ti ;


    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "eventdata",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (msg) {
            $.each(msg, function( index, value ) {
                console.log( index + ": " + value );
            });
            console.log(msg);
            
                    
        }
    });
    
});
