@extends('common.main')
@section('title', 'Frutiger!')
@section('content')

<div class="main-content-wrapper">
    <div class="row m-2 m-md-3 align-items-start g-2 g-md-3">
        <div class="col-12 col-md-12 col-lg-12 aero-box mb-4 mb-md-0">
            <h1 class="title mb-3 text-center"><b>Register new account</b></h1>
            <p><i>Join the community of this aesthetic's enthusiasts</i></p>
                @if($errors -> any())
                    @foreach ( $errors -> all() as $error )
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            <form class="aero-form text-start" method="POST" action="{{route('addUser')}}">
            @csrf

                <div class="mb-3">
                    <i class="bi bi-person"></i>
                    <label for="text" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">First name:</label>
                    <input type="text" class="form-control aero-input" id="email" placeholder="Enter your first name" name="first_name">
                </div>
                <div class="mb-3">
                    <i class="bi bi-person"></i>
                    <label for="text" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Middle name:</label>
                    <input type="text" class="form-control aero-input" id="email" placeholder="Enter your middle name" name="middle_name">
                </div>
                <div class="mb-3">
                    <i class="bi bi-person"></i>
                    <label for="text" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Last name:</label>
                    <input type="text" class="form-control aero-input" id="email" placeholder="Enter your last name" name="last_name">
                </div>
                <div class="mb-3">
                    <i class="bi bi-envelope"></i>
                    <label for="email" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Email address:</label>
                    <input type="email" class="form-control aero-input" id="email" placeholder="Enter your email" name="email">
                </div>
                <div class="mb-3">
                    <i class="bi bi-asterisk"></i>
                    <label for="password" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Password:</label>
                    <input type="password" class="form-control aero-input" id="password" placeholder="Enter password" name="password">
                </div>
                <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                    <button type="submit" class="btn aero-btn">Register account</button>
                    <a href="#" class="aero-link">Need help?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
@font-face {
    font-family: 'Basenji';
    src: url('/assets/Basenji_Variable.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
}

body {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  display: flex;
  flex-direction: column; 
  
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

.main-content-wrapper {
  padding: 12px;
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  overflow: visible;
}

.aero-box {
  position: relative;
  padding: 24px 22px;
  border-radius: 16px;
  text-align: center;
  width: 40vw;
  max-width: 40vw;
  margin-top: 80px;
  
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

@endsection