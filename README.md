# Web Development — COMP016 Sessions Review

This repository is a progressive web development learning project built on **Laravel (PHP)**. Each session/activity introduces a new concept, building on the last — from basic routing all the way to full database-backed CRUD operations.

---

## Session Overview

| # | Session | Key Concept |
|---|---------|-------------|
| 1 | Online Meeting (Mar 4) | Basic Routing & URL Parameters |
| 2 | Activity #1 | Controllers & Separation of Concerns |
| 3 | Activity #2 | Utility Classes, Blade Views, Laravel Logging |
| 4 | FTF (Apr 8) | HTML/CSS Crash Course, Bootstrap, Responsive Design |
| 5 | Activity #3 | Frutiger Aero UI, Custom CSS, Route-to-View Wiring |
| 6 | Activity #4 | Blade Templating, Header/Footer, FE→BE Form Connection |
| 7 | FTF (Apr 29) | Form Validation, MySQL Setup, DB Connection |
| 8 | Activity #1 (Finals) | DB Read with `DB::table`, POST Form, Laravel Logging |
| 9 | Activity #2 (Finals) | Full CRUD — Create, Read, Update with FK Join |
| 10 | Activity #3 (Finals) | Delete Post & Search/Filter with LIKE Query |

---

## Concept Deep Dives

### 1. Basic Routing (`routes/web.php`)
**Session 1 — Online Meeting (Mar 4, 2026)**

Laravel routes map a URL to a closure or controller method. The simplest form returns a string directly.

```php
// Static route — returns plain text
Route::get('home', function () {
    return "Home Page";
});

// Route with one URL parameter
Route::get('user/{id}', function ($id) {
    $inputParameter = $id;
    return "Input parameter is " . $inputParameter;
});

// Route with two URL parameters
Route::get('user/{id}/{name}', function ($id, $name) {
    return $name . ", your input parameter is " . $id;
});
```

**Key concepts:**
- `Route::get(uri, callback)` — registers a GET route
- `{id}` — URL segment captured as a PHP variable
- Multiple parameters bind in order of appearance in the URI

---

### 2. Controllers & Separation of Concerns
**Session 2 — Activity #1**

Instead of putting logic inside route closures, **controllers** encapsulate page behavior. Routes now point to a controller class and method.

```php
// web.php — clean, no business logic
Route::get('home', [HomeController::class, 'displayHome']);
Route::get('about', [AboutController::class, 'displayAbout']);
Route::get('calculate/{num1}/{num2}', [CalculateController::class, 'displayCalculate']);

// Route Groups with prefix — avoids repeating 'user/' in every route
Route::group(['prefix' => 'user'], function () {
    Route::get('{id}',        [UserController::class, 'userInputID'])->name('userID');
    Route::get('{id}/{name}', [UserController::class, 'userInputParam'])->name('userDisplay');
    Route::get('pic',         [UserController::class, 'userDisplayPic']);
});

// Fallback route — catches any undefined URL
Route::fallback([FallbackController::class, 'displayErrorImage']);
```

**Key concepts:**
- `[ControllerClass::class, 'methodName']` — controller-method binding
- `Route::group(['prefix' => 'x'])` — groups routes under a shared URL prefix
- `->name('routeName')` — named routes allow `route('routeName')` references in views
- `Route::fallback()` — catches all unmatched routes (custom 404 behavior)
- `response()->file($path)` — serves a raw file (image, PDF) as HTTP response

---

### 3. Utility Classes, Blade Views & Laravel Logging
**Session 3 — Activity #2**

Business logic is moved out of controllers into a dedicated `Utils` helper class. The result is passed to a Blade view using `compact()`.

```php
// CalculateController.php — delegates math to Utils
$utils = new Utils();
$sum        = $utils->addNumbers($num1, $num2);
$difference = $utils->subtractNumbers($num1, $num2);
$product    = $utils->multiplyNumbers($num1, $num2);
$quotient   = $utils->divideNumbers($num1, $num2);

// Logging — write to storage/logs/laravel.log
Log::info('======= START Index Function =======');
Log::info('Sum = ' . $sum);
Log::debug('Detailed debug line');

return view('calculate', compact('num1', 'num2', 'sum', 'difference', 'product', 'quotient'));
```

```php
// Utils.php — pure math, no HTTP concerns
public function divideNumbers($param1, $param2) {
    if ($param2 == 0) {
        Log::error('param2 (denominator) is undefined');
        return "Undefined";
    }
    return $param1 / $param2;
}
```

```blade
{{-- calculate.blade.php — Blade displays controller-passed variables --}}
<h2>SUM: {{ $sum }}</h2>
<h2>DIFFERENCE: {{ $difference }}</h2>
```

**Key concepts:**
- `compact('var1', 'var2')` — packages PHP variables into an associative array for the view
- `{{ $variable }}` — Blade's escaped output syntax
- `Log::info()` / `Log::debug()` / `Log::error()` — write timestamped entries to `laravel.log`
- `dd()` — "dump and die," halts execution to inspect a value during debugging
- Utility/helper classes — separate reusable logic from HTTP-layer controllers

---

### 4. HTML/CSS Crash Course & Bootstrap
**Session 4 — FTF (Apr 8, 2026)**

Pure HTML structure paired with Bootstrap's grid system and custom CSS rules.

```html
<!-- Bootstrap grid — 12-column system -->
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-4 border">  <!-- responsive column -->
        <div class="card">
            <img src="{{ asset('images/chiikawa.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Chiikawa</h5>
                <p class="card-text">A timid, gentle creature...</p>
                <a href="#" class="btn btn-primary">Visit here</a>
            </div>
        </div>
    </div>
</div>
```

```css
/* Custom CSS in Blade — scoped styling */
.background-calc {
    font-weight: 25px;
    background-color: #e7532e;
}
.title {
    font-weight: 60px;
    text-align: center;
}
/* ID selector — unique element targeting */
#inputFName { }
/* Descendant selector */
.background-calc .g-button {
    background-color: #99AD7A;
}
```

**Key concepts:**
- `col-lg-X col-md-X col-sm-X` — Bootstrap responsive breakpoints (large/medium/small)
- Bootstrap `card` component — image + body + button pattern
- CSS class vs. ID selectors (`.class` vs. `#id`)
- `{{ asset('path') }}` — generates correct public asset URLs in Laravel
- `onclick="window.location.href='url'"` — inline JS for button navigation

---

### 5. Frutiger Aero UI & Custom CSS Design System
**Session 5 — Activity #3**

Built a full Frutiger Aero-themed page with custom CSS design tokens — glassmorphism effects, radial gradients, custom `@font-face`, and a reusable `.aero-*` class system.

```css
/* @font-face — loading a custom variable font */
@font-face {
    font-family: 'Basenji';
    src: url('/assets/Basenji_Variable.otf') format('opentype');
}

/* Glassmorphism panel */
.aero-box {
    background: linear-gradient(180deg, rgba(255,255,255,0.45) 0%, rgba(255,255,255,0.1) 100%);
    border: 1px solid rgba(255,255,255,0.8);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15), inset 0 2px 5px rgba(255,255,255,0.9);
    backdrop-filter: blur(8px);
    border-radius: 16px;
}

/* CSS ::before pseudo-element — decorative gloss overlay */
.aero-box::before {
    content: "";
    position: absolute;
    height: 50%;
    background: linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 100%);
    pointer-events: none;
}

/* Responsive adjustment */
@media (max-width: 767.98px) {
    body { background-attachment: scroll; }
    .aero-box { padding: 20px 16px; width: 92vw; }
}
```

**Key concepts:**
- `@font-face` — embedding and using custom fonts
- `backdrop-filter: blur()` — CSS glassmorphism effect
- `linear-gradient()` / `radial-gradient()` — multi-stop color gradients
- `::before` pseudo-element — decorative layer without extra HTML
- `background-attachment: fixed` — parallax-style background (desktop only)
- `@media` query — responsive breakpoint adjustments

---

### 6. Blade Templating System, Header/Footer & FE→BE Form Connection
**Session 6 — Activity #4 (Online, Apr 15, 2026)**

Introduced the **Blade layout inheritance** pattern — a single `main.blade.php` template houses the HTML boilerplate, header, and footer; child views only define their content section.

```blade
{{-- views/common/main.blade.php — master layout --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('common.header')
    @yield('content')
    @include('common.footer')
</body>
</html>
```

```blade
{{-- Any child view — extends the master layout --}}
@extends('common.main')
@section('title', 'Frutiger!')
@section('content')
    <div class="main-content-wrapper">
        {{-- page-specific HTML only --}}
    </div>
@endsection
```

```blade
{{-- Sticky Bootstrap navbar with dropdown --}}
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><hr class="dropdown-divider"></li>
            </ul>
        </li>
    </ul>
    <form class="d-flex" role="search">
        <input class="form-control" type="search" placeholder="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</nav>
```

**FE→BE form connection:**
```blade
{{-- name="" attribute is what Laravel reads on the backend --}}
<form method="POST" action="{{ route('addUser') }}">
    @csrf
    <input type="text" name="first_name" placeholder="Enter your first name">
    <input type="email" name="email" placeholder="Enter your email">
</form>
```

**Key concepts:**
- `@extends` / `@section` / `@yield` — Blade layout inheritance
- `@include` — partial view injection (header, footer components)
- `sticky-top` — CSS/Bootstrap class for scroll-fixed navbar
- `@csrf` — Laravel CSRF token injection, required on all POST forms
- `name="field"` on `<input>` — maps HTML input to `$request->field_name` in the controller
- `route('namedRoute')` — generates URL from named route definition

---

### 7. Form Validation, MySQL Setup & Database Connection
**Session 7 — FTF (Apr 29, 2026)**

Added server-side form validation with custom Tagalog error messages, set up a MySQL database via MySQL Workbench, and connected Laravel to it via `.env`.

```php
// FrutigerController.php — server-side validation
$request->validate([
    'first_name' => ['required', 'min:2'],
    'last_name'  => ['required'],
    'email'      => ['required', 'email', 'ends_with:@iskolarngbayan.pup.edu.ph'],
    'password'   => ['required', 'min:8'],
], [
    'first_name.required' => 'Kailangan mong ilagay sa patlang ang iyong pangalan',
    'first_name.min'      => 'Sobrang ikli ng iyong pangalan. Dagdagan mula dalawang letra pataas.',
    'email.ends_with'     => 'Iskolar ka ba? Paki-lagay ang tamang hulihan: @iskolarngbayan.pup.edu.ph',
    'password.required'   => 'Kailangan mong ilagay sa patlang ang iyong salitang lihim',
]);
```

```blade
{{-- frutiger_register.blade.php — display validation errors --}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
```

```ini
# .env — database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webdev_rivera
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

**MySQL table setup (Workbench):**
```sql
-- users table
id          INT (PK, AI)
last_name   VARCHAR(45) NN
first_name  VARCHAR(45) NN
middle_name VARCHAR(45) NULL
email       VARCHAR(45) NN
password    VARCHAR(45)
```

**Key concepts:**
- `$request->validate([rules], [messages])` — auto-redirects back with errors on failure
- `$errors->any()` / `$errors->all()` — Blade access to the validation error bag
- Validation rules: `required`, `min:N`, `email`, `ends_with:domain`
- `.env` file — environment-specific config (never committed to git)
- `DB_*` keys — Laravel's database connection config
- `php artisan tinker` + `DB::connection()->getPDO()` — verify DB connection from CLI
- MySQL Workbench — GUI for creating schemas, tables, and inserting dummy data

---

### 8. DB Read, POST Form & Laravel Query Builder
**Session 8 — Activity #1 (Finals)**

Connected the Frutiger post page to MySQL — reading all rows from a `post` table and displaying them in a Blade table. Added a POST form that validates, logs, and inserts new records.

```php
// FrutigerController.php
public function displayPost() {
    $posts = DB::table('post')->get();      // SELECT * FROM post
    return view('frutiger_postform', compact('posts'));
}

public function addPost(Request $request) {
    $request->validate([
        'post_title'       => ['required', 'min:2'],
        'post_description' => ['required'],
    ], [
        'post_title.required'       => 'You need to include a title for your post',
        'post_description.required' => 'You need to include a description for your post',
    ]);

    Log::info("========== POST ==========");
    Log::info("Title: " . $request->post_title);

    $result = DB::table('post')->get();     // returns current rows after insert
    return $result;
}
```

```blade
{{-- frutiger_postform.blade.php — loop over DB rows --}}
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
```

**MySQL `post` table:**
```
id          INT (PK, AI)
title       TEXT NN
description TEXT NN
created_by  VARCHAR(45) NN
created_at  DATETIME
updated_at  DATETIME
status      VARCHAR(45)
```

**Key concepts:**
- `DB::table('table')->get()` — Laravel Query Builder, returns a Collection
- `DB::table('table')->insert([...])` — raw insert without Eloquent ORM
- `@foreach ($collection as $item)` — Blade loop over a DB result set
- `$post->column` — accessing column values on a stdClass object
- `compact('posts')` — passes the `$posts` collection into the view
- `redirect()->route('routeName')` — POST-Redirect-GET pattern to avoid form resubmission

---

### 9. Full CRUD with FK Join, Edit Form & DB Migrations
**Session 9 — Activity #2 (Finals)**

Completed the full CRUD loop: Create, Read, and Update. Introduced Laravel migrations, database seeders, and a SQL JOIN between `posts` and `statuses` tables.

#### Migrations
```php
// create_statuses_table.php
Schema::create('statuses', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();   // internal key: 'draft', 'published', 'archived'
    $table->string('display_name');     // human-readable: 'Draft', 'Published', 'Archived'
    $table->timestamps();
});

// create_posts_table.php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->unsignedBigInteger('created_by');
    $table->unsignedBigInteger('status_id')->nullable();
    $table->foreign('status_id')->references('id')->on('statuses')->nullOnDelete();
    $table->timestamps();
});
```

#### Seeder
```php
// StatusSeeder.php
DB::table('statuses')->insert([
    ['name' => 'draft',     'display_name' => 'Draft',     ...],
    ['name' => 'published', 'display_name' => 'Published', ...],
    ['name' => 'archived',  'display_name' => 'Archived',  ...],
]);
```

#### Read with JOIN
```php
// FrutigerPostController.php — displayPost()
$posts = DB::table('posts')
    ->leftJoin('statuses', 'posts.status', '=', 'statuses.id')
    ->select('posts.*',
             'statuses.display_name as status_display_name',
             'statuses.name as status_name')
    ->get();
```

#### Create (Insert)
```php
// addPost()
DB::table('posts')->insert([
    'title'       => $request->post_title,
    'description' => $request->post_description,
    'created_by'  => 1,
    'created_at'  => now(),
    'status'      => $request->status,
]);
return redirect()->route('displayPost');
```

#### Update (Edit)
```php
// editForm() — load existing post into edit view
public function editForm($id) {
    $post     = DB::table('posts')->where('id', $id)->first();
    $statuses = DB::table('statuses')->get();
    return view('frutiger_postform_edit', compact('post', 'statuses'));
}

// editSubmit() — apply the update
public function editSubmit(Request $request, $id) {
    // ... validate ...
    DB::table('posts')->where('id', $id)->update([
        'title'       => $request->post_title,
        'description' => $request->post_description,
        'status'      => $request->status,
        'updated_at'  => now(),
    ]);
    return redirect()->route('displayPost');
}
```

```blade
{{-- Edit form — pre-fills from existing post, preserves current status selection --}}
<input type="text" name="post_title" value=" {{ $post->title }} ">
<select name="status">
    @foreach ($statuses as $status)
        @if($post->status == $status->id)
            <option value="{{ $status->id }}" selected>{{ $status->display_name }}</option>
        @else
            <option value="{{ $status->id }}">{{ $status->display_name }}</option>
        @endif
    @endforeach
</select>
```

**Key concepts:**
- `php artisan make:migration` — creates a migration file for schema changes
- `Schema::create()` / `Blueprint` — define table structure in PHP
- `$table->foreign()->references()->on()->nullOnDelete()` — FK constraint with null cascade
- `DB::table()->leftJoin()` — SQL LEFT JOIN via Query Builder
- `->select('alias as col_name')` — column aliasing in queries
- `DB::table()->where('id', $id)->first()` — fetch single record by PK
- `DB::table()->where('id', $id)->update([...])` — UPDATE query via Query Builder
- `now()` — Laravel helper returning current timestamp
- `DatabaseSeeder` — entry point that calls child seeders via `$this->call()`

---

### 10. Delete Post & Search/Filter with LIKE Query
**Session 10 — Activity #3 (Finals)**

Completed full CRUD by adding Delete, and introduced server-side search filtering via SQL `LIKE` query.

#### Delete Post
```php
// FrutigerPostController.php — deletePost()
public function deletePost($id){
    DB::table('posts')->where('id', $id)->delete();
    return redirect()->route('displayPost');
}
```

```blade
{{-- frutiger_postform.blade.php — delete button in Action column --}}
@if($post->status_name != 'published')
    <form action="{{ route('deletePost', $post->id) }}" method='post' class="d-inline m-0 p-0">
        @csrf
        @method('delete')   {{-- spoofs DELETE method — HTML only supports GET/POST --}}
        <button type="submit" class="bi bi-trash3-fill border-0 bg-transparent">
        </button>
    </form>
@endif
```

```php
// routes/web.php
Route::delete('delete/{id}', [FrutigerPostController::class, 'deletePost'])->name('deletePost');
```

#### Search Posts
```php
// FrutigerPostController.php — searchPosts()
public function searchPosts(Request $request){
    $term = trim($request->input('q', ''));

    if ($term === '') {
        return $this->displayPost();    // empty query = show all
    }

    $posts = DB::table('posts')
        ->leftJoin('statuses', 'posts.status', '=', 'statuses.id')
        ->select('posts.*', 'statuses.display_name as status_display_name', 'statuses.name as status_name')
        ->where(function($query) use ($term) {
            $query->where('posts.title', 'like', "%{$term}%")
                  ->orWhere('posts.description', 'like', "%{$term}%");
        })
        ->get();

    $statuses = DB::table('statuses')->get();
    return view('frutiger_postform', compact('posts', 'statuses'));
}
```

```blade
{{-- Search form above community table --}}
<form method="GET" action="{{ route('searchPosts') }}" class="d-flex gap-2">
    <input name="q" type="text" class="form-control aero-input"
           placeholder="Search..." value="{{ request('q') }}">  {{-- persists term --}}
    <button class="btn aero-btn" type="submit">Search</button>
</form>
```

```php
// routes/web.php
Route::get('search/', [FrutigerPostController::class, 'searchPosts'])->name('searchPosts');
```

**Key concepts:**
- `DB::table()->where('id', $id)->delete()` — DELETE query via Query Builder
- `@method('delete')` — Blade directive that spoofs HTTP DELETE (HTML forms only support GET/POST)
- `Route::delete()` — registers a DELETE HTTP method route
- `$request->input('key', 'default')` — reads query param with fallback default
- `where('col', 'like', "%{$term}%")` — SQL LIKE for partial string match
- `orWhere()` — OR condition chaining on Query Builder
- `use ($term)` — PHP closure capture, passes outer variable into anonymous function scope
- `request('q')` — Blade/Laravel helper to read current request query param (persists search term in input)
- `trim()` — strips whitespace from search input to avoid blank-space queries

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel (PHP) |
| Frontend | Blade Templates, Bootstrap 5, Custom CSS |
| Database | MySQL (via `DB::table` Query Builder) |
| Logging | Laravel Log facade (`storage/logs/laravel.log`) |
| Dev Server | `php artisan serve` → `http://127.0.0.1:8000` |
| DB GUI | MySQL Workbench |

---

## Route Map

```
GET  /                          → welcome view
GET  /home                      → HomeController@displayHome
GET  /about                     → AboutController@displayAbout
GET  /user/{id}                 → UserController@userInputID
GET  /user/{id}/{name}          → UserController@userInputParam
GET  /user/edit/{id}            → UserController@userEditID
GET  /user/edit/{id}/{name}     → UserController@userEditIDName
GET  /user/pic                  → UserController@userDisplayPic
GET  /user/delete               → UserController@index
GET  /calculate/{num1}/{num2}   → CalculateController@displayCalculate
GET  /frutiger                  → FrutigerRegisterController@displayFrutiger
GET  /frutiger/register         → FrutigerRegisterController@displayRegister
POST /frutiger/registerUser     → FrutigerRegisterController@addUser
GET  /frutiger/post             → FrutigerPostController@displayPost
POST /frutiger/addPost          → FrutigerPostController@addPost
GET    /frutiger/edit/{id}      → FrutigerPostController@editForm
POST   /frutiger/edit/{id}      → FrutigerPostController@editSubmit
DELETE /frutiger/delete/{id}    → FrutigerPostController@deletePost
GET    /frutiger/search         → FrutigerPostController@searchPosts
*      (fallback)               → FallbackController@displayErrorImage
```
