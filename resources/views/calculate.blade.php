@extends('common.main')
@section('title', 'Calculate')
@section('content')
    <div class = "container">
        <div class = "background-calc">
            <div class="row">
                <h1 class = "title">Basic Calculator</h1>
                <h2>First number: {{ $num1 }}</h1>
                <h2>Second number: {{ $num2 }}</h1>
                <h3>SUM: {{ $sum }}</h2>
                <h3>DIFFERENCE: {{ $difference }}</h2>
                <h3>PRODUCT: {{ $product }}</h2>
                <h3>QUOTIENT: {{ $quotient }}</h2>
            </div>

            <div id = "inputFName">
                <input type = "text" id = "inputFName" placeholder = "This is a textbox for input"/>
                <div class = "g-button">
                    <input type = "button" id = "" value = "Go to Facebook" onclick = "window.location.href='https://www.facebook.com'"/>
                </div>
            </div>
        </div> 
            <div class = "g-button">
                <input type = "button" id = "" value = "Go to YouTube" onclick = "window.location.href='https://www.youtube.com'"/>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
    </div>
    
    <div class="container border">
        <div class="row">
            <div class="col-lg-6 border">col 6</div>
            <div class="col-lg-6 border">col 6</div>
        </div>

        <div class = "row">
            <div class="col-lg-4 col-md-6 col-sm-4 border">
                <div class="card">
                    <img src="{{ asset('images/chiikawa.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Chiikawa</h5>
                            <p class="card-text">A timid, gentle, and easily frightened little creature who tries their absolute best to work hard and support their friends despite crying often.</p>
                            <a href="#" class="btn btn-primary">Visit Chiikawa here</a>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 border">
                <div class="card">
                    <img src="{{ asset('images/hachiware.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Hachiware</h5>
                            <p class="card-text">An optimistic, resourceful, and chatty cat-like companion who frequently acts as the group's spokesperson and always looks on the bright side.</p>
                            <a href="#" class="btn btn-primary">Visit Hachiware here</a>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 border">
                <div class="card">
                    <img src="{{ asset('images/usagi.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Usagi </h5>
                            <p class="card-text">A chaotic, fiercely capable, and deeply unpredictable yellow rabbit who communicates almost entirely through loud, bizarre noises like "Yah!" and "Ura!".</p>
                            <a href="#" class="btn btn-primary">Visit Usagi here</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .background-calc {
        font-weight: 25px;
        background-color: #e7532e;
    }

    .background-calc .g-button {
        background-color: #99AD7A;
    }

    .title {
        font-weight: 60px;
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #inputFName {

    }

    div {
        border-width: 3px;
        border-color: black;
        border-style: solid;
        background-color: #DCCCAC;
    }

    .container {
        padding: 0;
        margin: auto;
    }

</style>

@endsection