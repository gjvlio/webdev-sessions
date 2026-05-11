@extends('common.main')
@section('title', 'Frutiger!')
@section('content')

<div class="main-content-wrapper">
    <div class="row mx-0 my-2 my-md-3 align-items-start justify-content-center gy-3 w-100">

        {{-- Form --}}
        <div class="col-12 col-lg-4 aero-box mb-3 mb-lg-0 me-lg-3">
            <h1 class="title mb-3 text-center"><b>Post a thought...</b></h1>
            <p><i>What are you thinking right now? Share it to the community!</i></p>
                @if($errors -> any())
                    @foreach ( $errors -> all() as $error )
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            <form class="aero-form text-start" method="POST" action="{{route('addPost')}}">
            @csrf

                <div class="mb-3">
                    <i class="bi bi-cursor-text"></i>
                    <label for="text" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Title:</label>
                    <input type="text" class="form-control aero-input" id="email" placeholder="Start with a punch!" name="post_title">
                </div>
                <div class="mb-3">
                    <i class="bi bi-chat-quote-fill"></i>
                    <label for="textarea" class="form-label fw-bold" style="color: #1a4d66; text-shadow: 0 1px 1px rgba(255,255,255,0.8);">Description:</label>
                    <textarea class="form-control aero-input" id="description" placeholder="Erm... I think I really love green" name="post_description" rows="5" style="resize: vertical;"></textarea>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                    <button type="submit" class="btn aero-btn">Submit post</button>
                    <a href="#" class="aero-link">Need help?</a>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-7 aero-box ms-lg-3">
            <h2 class="title mb-3 text-center"><b>Community Posts</b></h2>
            <div class="table-responsive">
                <table class="table aero-table w-100">
                    <thead>
                        <tr>
                            <th><span class="aero-th-pill">Title</span></th>
                            <th><span class="aero-th-pill">Description</span></th>
                            <th><span class="aero-th-pill">Created By</span></th>
                            <th><span class="aero-th-pill">Status</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->created_by }}</td>
                            <td>{{ $post->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

html, body {
    overflow-x: hidden;
    max-width: 100%;
    width: 100%;
}

body > * {
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
}

body {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  overflow-x: hidden;
  max-width: 100%;

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
  margin-top: 40px;
  
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
    border-spacing: 0 6px;
    color: #1a4d66;
    width: 100%;
}

.aero-table thead th {
    background: transparent;
    border: none;
    padding-bottom: 12px;
    text-align: center;
    vertical-align: middle;
}

.aero-table td, .aero-table th {
    background-color: transparent !important;
}

.aero-table tbody tr td {
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.25);
    border-top: 1px solid rgba(255, 255, 255, 0.7);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    vertical-align: middle;
    text-align: center;
    font-size: 0.92rem;
}

.aero-table tbody tr td:first-child {
    border-left: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 10px 0 0 10px;
    font-weight: 600;
}

.aero-table tbody tr td:last-child {
    border-right: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 0 10px 10px 0;
}

.aero-table tbody tr:hover td {
    background: rgba(255, 255, 255, 0.45);
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
    white-space: nowrap;
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
        overflow-x: hidden;
    }

    .main-content-wrapper {
        padding: 8px;
        overflow-x: hidden;
    }

    .aero-box {
        padding: 20px 16px;
        width: 92vw;
        max-width: 92vw;
        margin-top: 20px;
    }

    .aero-table tbody tr td {
        padding: 8px 10px;
    }
}
</style>

@endsection