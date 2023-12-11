@extends('base')
@section('main')


<div class="col-sm-12">  @if(session()->get('success'))    <div class="alert alert-success">      {{ session()->get('success') }}      </div>  @endif</div>

<div class="row">
    <div class="col-sm-12">
    <h1 class="display-5">Jegyvásárlás</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZI2Xn8dvwM0?si=FSYhuih9Tdc3OZfg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
    <div class="col-sm-6">
    <h2 class="display-10">Énekesmadarak és kígyók balladája</h2>
    
        Az ifjú Coriolanus Snow az utolsó reménysége az egykor büszke Snow családnak, akik kegyvesztetté váltak a háború utáni Capitoliumban. Hogy pozícióját biztosítsa, vonakodva bár, de vállalja az elszegényedett 12. körzet kiválasztottja, Lucy Gray Baird mentorának szerepét. Miután Lucy Gray elbűvöli Panem közönségét, Snow meglátja a lehetőséget mindkettejük sorsának megváltoztatására. Összefog Lucy Grayjel, hogy az esélyeket kedvező irányba fordíthassa, és innentől kezdve csak egy hajszálon függ mindaz, amiért addig dolgozott. A jó és a rossz ösztönei viaskodnak benne, miközben versenyt fut az idővel – s a verseny végén, ha túléli, az is kiderül, hogy énekesmadár vagy kígyó válik belőle.
    </div>    
</div>
<br/>

<div class="row">
    <div class="col-sm-8">
        <table class="table" id="roomlayout">
            <thead>
                <tr><td colspan="10"><div style="width:50%;margin-left:auto;margin-right:auto;background-color:#c0c0c0;text-align:center">mozivászon</div></td></tr>
            </thead>    
            <tbody>        
            </tbody>  
        </table>

       
    </div>
    <div class="col-sm-4">
        Jelmagyarázat:<br/><br/>

        <span class="free" style="width:50px;"> XX </span> - Szabad ülőhely  <br/>
        <span class="tmp_reserved"> XX </span> - Lefoglalás alatt  <br/>
        <span class="sold"> XX </span> - Az ülőhely foglalt <br/>

        <br/>
        Kattintson a mozi alaprajzán lefoglalni kívánt szabad székekre azok ideiglenes lefoglalásához.
        A foglalás befejezéséhez és fizetéshez kattintson az alábbi gombra. Megszakított vásárlás esetén az űlőhelyek 2 perc után automatikusan felszabadulnak.
        <br/>

        <div id="reservedlist"></div>  <a id="reserveBtn" style="margin: 19px;" href="/actualevent/reservation" class="btn btn-secondary disabled" disabled>Kijelölt székek foglalásának kifizetése</a></div>
        
    
    </div>
</div>
<br/><br/><br/>
<div class="row">
    <div class="col-sm-2" ></div>
    <div class="col-sm-8" style="border: 1px solid green ;">
    <h2 class="display-15">Tesztelési doboz</h2>
    <span>  <a id="frreupseats" style="margin: 19px;" href="" class="btn btn-warning">😈 Véletlenszeűen 2 szék felszabadítása a könyebb teszteléshez 😈 </a></span>
    <span>  <a id="github" style="margin: 19px;" href="" class="btn btn-primary" target="_blank">Kód átnézése a Githubon</a></span>
    <span>  <a id="overview" style="margin: 19px;" href="" class="btn btn-primary" target="_blank">Projekt Áttekintő oldal</a></span>
    </div>    
</div>
<br/>




<script type="text/javascript">
$( document ).ready(function() {

function drawRooomSeats(){
    let ti = "<tr>"
    for(let i=1; i<= 80; i++){
        ti += "<td id='ti_"+ i +"' class='free'>" + i + "</td>";
        if ((i % 5 == 0) && (i % 10 != 0)) {
            ti += "</td><td>";
        }
        if (i % 10 == 0) {
            ti += "</tr><tr>";
        }

    }
    ti += "</tr>";
    $('#roomlayout').children('tbody').html(ti);
}

drawRooomSeats();


function loadSeatReservations(){
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/eventdata/seats",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (msg) {

            for(let i=1; i<=80; i++){
                $("#ti_" + i).removeAttr('class');
                $("#ti_" + i).toggleClass('free');                
            }

            $.each(msg, function( index, row ) {
                $("#ti_" + row.seat_id).removeAttr('class');
                $("#ti_" + row.seat_id).toggleClass(row.order_status);
            });        
        }
    });
}

loadSeatReservations();
setInterval(loadSeatReservations, 5000);


$("td").click(function(e){ 
  let color = $( this ).css( "background-color" );
  if (color == "rgb(0, 128, 0)") {
    let seat = $(this).attr('id').replace(/^\D+/g, '');

    //$(this).css("font-weight","bold");

    $.post('/eventdata/tmp_reservation', 
        {seat_id: $(this).attr('id'), user_session: "{{ $orders['session'] }}"},
        function(response){ 
            console.log(response.response);

            if (response.response == 'tmp_reserved') {
                $("#reservedlist").append('<span class="tmp_reserved">[' + seat + ']</span> ');
                $("#reserveBtn").removeAttr('class');
                $("#reserveBtn").toggleClass('btn btn-primary');
            }

            loadSeatReservations();
        }
    );


  }

});


$("#frreupseats").click(function(e){ 
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/eventdata/forcedel2seats",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (msg) {
            console.log(msg);
            loadSeatReservations();
        }
    });

});


});
</script>


@endsection