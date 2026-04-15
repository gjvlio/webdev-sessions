<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutiger</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="row m-2 m-md-3 w-100 max-w-100 align-items-start g-2 g-md-3">
        
        <div class="col-12 col-md-4 col-lg-4 aero-box mb-3 mb-md-0">
            <h1 class="title mb-3 text-start"><b>Login</b></h1>
            
            <form class="aero-form text-start">
                <div class="mb-2">
                    <label for="email" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Email:</label>
                    <input type="email" class="form-control aero-input" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Password:</label>
                    <input type="password" class="form-control aero-input" id="password" placeholder="Enter password">
                </div>
                <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                    <button type="submit" class="btn aero-btn">Login</button>
                    <a href="#" class="aero-link">Forgot password?</a>
                </div>
            </form>
        </div>
        
        <div class="col-12 col-md-8 col-lg-8 aero-box ms-md-3" style="width: auto; flex: 1;">
            <h1 class="title">What is <b>Frutiger Aero?</b></h1>
            <p class="mb-4">Frutiger Aero is the glossy, optimistic design aesthetic that dominated the mid-2000s to early 2010s. Characterized by skeuomorphic glass textures, vibrant auroras, lens flares, and an obsession with nature blending seamlessly with technology, it represents a time when the internet felt like an expansive, refreshing ocean of limitless potential. Think splashing water, grassy fields, floating bubbles, and perfectly curved, translucent hardware.</p>
            
            <div class="row mb-3 g-3 justify-content-center">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img1.jpg') }}" class="img-fluid frutiger-img" alt="Image 1">
                </div>
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img2.jpg') }}" class="img-fluid frutiger-img" alt="Image 2">
                </div>
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img3.jpg') }}" class="img-fluid frutiger-img" alt="Image 3">
                </div>
            </div>
            
            <div class="row mb-4 g-3 justify-content-center">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img4.jpg') }}" class="img-fluid frutiger-img" alt="Image 4">
                </div>
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img5.jpg') }}" class="img-fluid frutiger-img" alt="Image 5">
                </div>
                <div class="col-12 col-md-4">
                    <img src="{{ asset('images/assets/img6.jpg') }}" class="img-fluid frutiger-img" alt="Image 6">
                </div>
            </div>

            <h2 class="title mt-0 mb-3" style="font-size: 1.5rem;">Why <b>Frutiger Aero</b> is <b><u>BETTER</u></b> than everything?</h2>
            <div class="table-responsive mb-0">
                <table class="table aero-table text-center align-middle">
                    <thead>
                        <tr>
                            <th class="text-start border-0"></th>
                            <th class="border-0"><div class="aero-th-pill" style="background: linear-gradient(180deg, #9af6d0 0%, #46c79a 100%); color: #053b26;">Frutiger Aero</div></th>
                            <th class="border-0"><div class="aero-th-pill">Flat Design</div></th>
                            <th class="border-0"><div class="aero-th-pill">Y2K Tech</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start fw-bold">Skeuomorphic Gloss</td>
                            <td><span class="aero-check gold">&#10004;</span></td>
                            <td><span class="aero-cross">&#10008;</span></td>
                            <td><span class="aero-check">&#10004;</span></td>
                        </tr>
                        <tr>
                            <td class="text-start fw-bold">Nature & Water Themes</td>
                            <td><span class="aero-check gold">&#10004;</span></td>
                            <td><span class="aero-cross">&#10008;</span></td>
                            <td><span class="aero-cross">&#10008;</span></td>
                        </tr>
                        <tr>
                            <td class="text-start fw-bold">Optimistic Vibes</td>
                            <td><span class="aero-check gold">&#10004;</span></td>
                            <td><span class="aero-cross">&#10008;</span></td>
                            <td><span class="aero-check blue">&#10004;</span></td>
                        </tr>
                        <tr>
                            <td class="text-start fw-bold">Actual Soul</td>
                            <td><span class="aero-check gold">&#10004;</span></td>
                            <td><span class="aero-cross">&#10008;</span></td>
                            <td><span class="aero-check blue">&#10004;</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<style>
@font-face {
    font-family: 'Basenji';
    src: url('/assets/Basenji_Variable.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
}

body {
  margin: 0;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 12px 0;
  background: radial-gradient(circle at center, #a1ebff 0%, #4da5c2 100%);
  
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: #1a4d66;

  background-image: 
    linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), 
    url('/images/assets/img_bg.jpg');
  background-size: cover; 
  background-position: center; 
  background-attachment: fixed;
}

.aero-box {
  position: relative;
  padding: 24px 22px;
  border-radius: 16px;
  text-align: center;
  
  background: linear-gradient(
    180deg, 
    rgba(255, 255, 255, 0.45) 0%, 
    rgba(255, 255, 255, 0.1) 100%
  );

  border: 1px solid rgba(255, 255, 255, 0.8);
  border-bottom: 1px solid rgba(255, 255, 255, 0.3);

  box-shadow: 
    0 10px 30px rgba(0, 0, 0, 0.15),
    inset 0 2px 5px rgba(255, 255, 255, 0.9),
    inset 0 -2px 5px rgba(255, 255, 255, 0.3);

  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  overflow: hidden; 
}

.aero-box::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 50%;
  
  background: linear-gradient(
    180deg, 
    rgba(255, 255, 255, 0.8) 0%, 
    rgba(255, 255, 255, 0.0) 100%
  );
  
  border-radius: 16px 16px 50% 50% / 16px 16px 20px 20px;
  pointer-events: none; 
}

.aero-box .title { 
  font-family: 'Basenji', "Segoe UI", sans-serif;
  margin-top: 0;
  font-weight: normal; 
  text-shadow: 0 1px 2px rgba(255,255,255, 0.8);
  position: relative;
  z-index: 1;
}

.aero-box p, .table-responsive {
  position: relative;
  z-index: 1;
  font-size: 0.98rem;
  line-height: 1.5;
}

.frutiger-img {
    width: 100%;
    aspect-ratio: 1 / 1; 
    object-fit: cover; 
    display: block;
    margin: 0 auto; 
    max-width: 220px; 
    border-radius: 12px;
    padding: 6px; 
    background: linear-gradient(135deg, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.3) 100%);
    border: 1px solid rgba(255,255,255,0.9); 
    box-shadow: 0 4px 8px rgba(0,0,0,0.1), inset 0 2px 4px rgba(255,255,255,0.8);
}

.aero-form {
    position: relative;
    z-index: 1; 
}

.aero-input {
    background: rgba(255, 255, 255, 0.4) !important;
    border: 1px solid rgba(255, 255, 255, 0.6) !important;
    border-radius: 6px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.08);
    color: #1a4d66 !important;
    font-family: inherit;
}

.aero-input:focus {
    background: rgba(255, 255, 255, 0.7) !important;
    border-color: rgba(255, 255, 255, 1) !important;
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.8), inset 0 2px 4px rgba(0, 0, 0, 0.05);
    outline: none;
}

.aero-input::placeholder {
    font-style: italic;
    color: rgba(26, 77, 102, 0.6);
}

.aero-btn {
    background: linear-gradient(180deg, #9af6d0 0%, #46c79a 48%, #22a87b 52%, #36d8a2 100%);
    border: 1px solid #1c8863;
    border-radius: 8px;
    color: #052c1d;
    font-weight: bold;
    padding: 8px 24px;
    text-shadow: 0 1px 1px rgba(255,255,255,0.4);
    box-shadow: 
        inset 0 1px 2px rgba(255, 255, 255, 0.8),
        0 4px 6px rgba(0, 0, 0, 0.15);
    font-family: inherit;
}

.aero-link {
    color: #005f8a;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
}

.aero-table {
    border-collapse: separate;
    border-spacing: 0;
    color: #1a4d66;
}

.aero-table td, .aero-table th {
    background-color: transparent !important; 
}

.aero-table tbody tr td {
    padding: 10px 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    border-top: 1px solid rgba(255, 255, 255, 0.8); 
    background: rgba(255, 255, 255, 0.15);
}

.aero-table tbody tr:first-child td {
    border-top: none;
}

.aero-th-pill {
    background: linear-gradient(180deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.4) 100%);
    border: 1px solid rgba(255,255,255,0.8);
    border-radius: 20px;
    box-shadow: 
        inset 0 2px 3px rgba(255,255,255,1),
        0 2px 4px rgba(0,0,0,0.05);
    display: inline-block;
    padding: 6px 18px;
    font-weight: 700;
    text-shadow: 0 1px 1px #fff;
}

.aero-check {
    font-size: 1.4rem;
    color: #2bd4a3;
    text-shadow: 0 0 8px rgba(43, 212, 163, 0.8), 0 1px 1px rgba(0,0,0,0.2);
}

.aero-check.gold {
    color: #ffca28;
    text-shadow: 0 0 8px rgba(255, 202, 40, 0.8), 0 1px 1px rgba(0,0,0,0.2);
}

.aero-check.blue {
    color: #4da5c2;
    text-shadow: 0 0 8px rgba(77, 165, 194, 0.8), 0 1px 1px rgba(0,0,0,0.2);
}

.aero-cross {
    font-size: 1.2rem;
    color: rgba(26, 77, 102, 0.3);
}

@media (max-width: 767.98px) {
    body {
        align-items: flex-start;
        padding: 10px 0;
        background-attachment: scroll;
    }

    .aero-box {
        padding: 16px 14px;
    }

    .aero-table tbody tr td {
        padding: 8px 10px;
    }
}
</style>
</html>