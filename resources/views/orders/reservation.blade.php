@extends('base')
@section('main')


<div class="col-sm-12">  @if(session()->get('success'))    <div class="alert alert-success">      {{ session()->get('success') }}      </div>  @endif</div>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <h1 class="display-5">Fizetés</h1>


    <form id="myForm" method="post" action="/actualevent/reservation" validate>
                @csrf
                <div class="form-group">
                    <label for="name">Név:</label>
                    <input type="text" class="form-control" name="name" required minlenght="2"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required  minlenght="3"/>
                </div>
                
                <br/>
                <button type="submit" class="btn btn-primary btn-lg btn-block" action="javascript:checkValidity();">Fizetek</button><span style="width:50px;display:inline-block;">&nbsp;</span>
                <span><a href="/actualevent" class="btn btn-danger btn-lg btn-block">Megszakítom a fizetést</a></span>


        <input type="hidden" name="user_session" value="{{ $session }}"> 
                
    </form>
    </div>
</div>


<script type="text/javascript">
$( document ).ready(function() {


    $('#yForm').bind('submit', function() {
        valid = form.checkValidity();
        form.reportValidity();

        return (valid) ? true : false;
    });



    

 






});
</script>

@endsection