<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style = "color: #546B41; font-family: sans-serif; background-color: #FFF8EC!important", class = "bg-primary">
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
            <div class="col-lg-6 border">
                <div class="card">
                    <img src="rivera_laravel\resources\images\yum.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-lg-6 border">
                <div class="card">
                    <img src="rivera_laravel\resources\images\dog.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class = "row">
            <div class="col-lg-4 col-md-6 col-sm-4 border"></div>
            <div class="col-lg-4 col-md-6 col-sm-4 border"> col 4 </div>
            <div class="col-lg-4 col-md-6 col-sm-4 border"> col 4 </div>
        </div>
    </div>

</body>

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

</html>