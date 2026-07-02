<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuth\LoginController;
use App\Http\Controllers\Admin\AdminAuth\ActivationController;
use App\Http\Controllers\Admin\AdminAuth\PasswordController;
use App\Http\Controllers\Admin\LoginLogController;
use App\Http\Controllers\Frontend\SearchController;

// Frontend Routes
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about.index');
})->name('about');

Route::get('/menu', function () {
    $menuItems = \App\Models\MenuItem::where('is_available', true)
        ->orderBy('sort_order')
        ->get();
    $groupedItems = $menuItems->groupBy('category');
    return view('frontend.menu.index', compact('groupedItems'));
})->name('menu');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/food-gallery', function () {
    $allItems = [
        // ── MOMOS ──
        [
            'id'       => 1,
            'name'     => 'Steamed Momos',
            'slug'     => 'steamed-momos',
            'category' => 'momos',
            'tag'      => 'Classic & Steamed',
            'tag_type' => 'default',
            'desc'     => 'Soft, pillowy dumplings filled with a seasoned vegetable or chicken mix, steamed to perfection and served with our house chutney.',
            'price'    => '&#8377;80',
            'image'    => 'images/gallery/momos_steamed.png',
            'hover'    => 'Soft, Flavourful & Fresh',
            'calories' => '210 kcal',
            'serves'   => '6 pcs',
            'spice'    => 'Mild',
            'badge'    => null,
        ],
        [
            'id'       => 2,
            'name'     => 'Kurkure Momos',
            'slug'     => 'kurkure-momos',
            'category' => 'momos',
            'tag'      => '#viral',
            'tag_type' => 'fire',
            'desc'     => 'Our bestselling crispy fried momos coated in a fiery Schezwan glaze. A street-food sensation that keeps you coming back for more.',
            'price'    => '&#8377;100',
            'image'    => 'images/gallery/momos_kurkure.png',
            'hover'    => 'Crispy & Addictive',
            'calories' => '320 kcal',
            'serves'   => '6 pcs',
            'spice'    => 'Hot',
            'badge'    => 'Bestseller',
        ],
        [
            'id'       => 6,
            'name'     => 'Pan-Fried Momos',
            'slug'     => 'pan-fried-momos',
            'category' => 'momos',
            'tag'      => 'Golden Bottom',
            'tag_type' => 'default',
            'desc'     => 'Half-steamed, half-fried momos with a crispy golden base and fluffy top — the best of both worlds in one bite.',
            'price'    => '&#8377;95',
            'image'    => 'images/gallery/momos_steamed.png',
            'hover'    => 'Crispy Base, Soft Top',
            'calories' => '270 kcal',
            'serves'   => '6 pcs',
            'spice'    => 'Mild',
            'badge'    => null,
        ],
        [
            'id'       => 7,
            'name'     => 'Schezwan Momos',
            'slug'     => 'schezwan-momos',
            'category' => 'momos',
            'tag'      => 'Extra Spicy',
            'tag_type' => 'fire',
            'desc'     => 'Tossed in a fiery house-made Schezwan sauce with garlic, ginger and dried red chillies — not for the faint-hearted!',
            'price'    => '&#8377;110',
            'image'    => 'images/gallery/momos_kurkure.png',
            'hover'    => 'Tongue-Tingling Heat',
            'calories' => '340 kcal',
            'serves'   => '6 pcs',
            'spice'    => 'Extra Hot',
            'badge'    => 'Spicy',
        ],

        // ── BURGERS ──
        [
            'id'       => 3,
            'name'     => 'Classic Burger',
            'slug'     => 'burgers',
            'category' => 'burgers',
            'tag'      => 'Loaded & Juicy',
            'tag_type' => 'default',
            'desc'     => 'Thick patties stacked high with crisp lettuce, tomato, pickles, and our signature smoky sauce — all inside a toasted sesame bun.',
            'price'    => '&#8377;130',
            'image'    => 'images/gallery/burger.png',
            'hover'    => 'Fresh Made to Order',
            'calories' => '520 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Medium',
            'badge'    => null,
        ],
        [
            'id'       => 8,
            'name'     => 'Double Patty Burger',
            'slug'     => 'double-patty-burger',
            'category' => 'burgers',
            'tag'      => 'Double Stack',
            'tag_type' => 'default',
            'desc'     => 'Two juicy patties, double cheese, caramelised onions and our special burger sauce. An absolute beast of a burger.',
            'price'    => '&#8377;170',
            'image'    => 'images/gallery/burger.png',
            'hover'    => 'Double the Joy',
            'calories' => '720 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Medium',
            'badge'    => 'Fan Fav',
        ],
        [
            'id'       => 9,
            'name'     => 'Spicy Chicken Burger',
            'slug'     => 'spicy-chicken-burger',
            'category' => 'burgers',
            'tag'      => 'Fiery Crunch',
            'tag_type' => 'fire',
            'desc'     => 'Crispy fried chicken thigh marinated in a spicy chilli-lime mix, served in a brioche bun with slaw and jalapeño mayo.',
            'price'    => '&#8377;150',
            'image'    => 'images/gallery/burger.png',
            'hover'    => 'Crispy & Bold',
            'calories' => '610 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Hot',
            'badge'    => null,
        ],

        // ── SANDWICHES ──
        [
            'id'       => 4,
            'name'     => 'Grilled Veggie Sandwich',
            'slug'     => 'sandwiches',
            'category' => 'sandwiches',
            'tag'      => 'Crunchy & Stacked',
            'tag_type' => 'default',
            'desc'     => 'Toasted sourdough stacked with grilled veggies, melted cheese, and a drizzle of herb mayo. Simple. Satisfying. Irresistible.',
            'price'    => '&#8377;110',
            'image'    => 'images/gallery/sandwich.png',
            'hover'    => 'Stacked & Satisfying',
            'calories' => '390 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Mild',
            'badge'    => null,
        ],
        [
            'id'       => 10,
            'name'     => 'Club Sandwich',
            'slug'     => 'club-sandwich',
            'category' => 'sandwiches',
            'tag'      => 'Triple Decker',
            'tag_type' => 'default',
            'desc'     => 'Three layers of toasted white bread with chicken, boiled egg, crispy lettuce, tomato and creamy mayo — a classic done right.',
            'price'    => '&#8377;130',
            'image'    => 'images/gallery/sandwich.png',
            'hover'    => 'Triple Stacked Goodness',
            'calories' => '480 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Mild',
            'badge'    => null,
        ],
        [
            'id'       => 11,
            'name'     => 'Bombay Masala Sandwich',
            'slug'     => 'bombay-sandwich',
            'category' => 'sandwiches',
            'tag'      => 'Street Style',
            'tag_type' => 'fire',
            'desc'     => 'Mumbai street-style sandwich with spiced potatoes, chutney, fresh veggies and grated cheese on toasted white bread. Desi comfort food at its finest.',
            'price'    => '&#8377;100',
            'image'    => 'images/gallery/sandwich.png',
            'hover'    => 'Desi Street Vibes',
            'calories' => '420 kcal',
            'serves'   => '1 pc',
            'spice'    => 'Medium',
            'badge'    => 'Desi Fav',
        ],

        // ── SIDES ──
        [
            'id'       => 5,
            'name'     => 'Bucket Fries',
            'slug'     => 'bucket-fries',
            'category' => 'sides',
            'tag'      => 'Shareable',
            'tag_type' => 'default',
            'desc'     => 'A generous bucket of golden, crispy fries seasoned with our house spice blend. Perfect for sharing — or not.',
            'price'    => '&#8377;90',
            'image'    => 'images/gallery/fries.png',
            'hover'    => 'Golden & Crispy',
            'calories' => '410 kcal',
            'serves'   => 'Regular bucket',
            'spice'    => 'Mild',
            'badge'    => null,
        ],
        [
            'id'       => 12,
            'name'     => 'Peri Peri Fries',
            'slug'     => 'peri-peri-fries',
            'category' => 'sides',
            'tag'      => 'Spiced Up',
            'tag_type' => 'fire',
            'desc'     => 'Golden fries tossed in our smoky Peri Peri seasoning with a hint of lemon. Addictively good every single time.',
            'price'    => '&#8377;100',
            'image'    => 'images/gallery/fries.png',
            'hover'    => 'Smoky & Addictive',
            'calories' => '440 kcal',
            'serves'   => 'Regular',
            'spice'    => 'Hot',
            'badge'    => 'Spicy',
        ],
        [
            'id'       => 13,
            'name'     => 'Cheesy Loaded Fries',
            'slug'     => 'cheesy-fries',
            'category' => 'sides',
            'tag'      => 'Extra Cheese',
            'tag_type' => 'default',
            'desc'     => 'Crispy fries smothered in warm nacho cheese sauce, jalapeños and a sprinkle of chives. A guilty pleasure worth every bite.',
            'price'    => '&#8377;120',
            'image'    => 'images/gallery/fries.png',
            'hover'    => 'Melty & Indulgent',
            'calories' => '560 kcal',
            'serves'   => 'Regular',
            'spice'    => 'Mild',
            'badge'    => 'Must Try',
        ],
    ];

    $activeCategory = request()->query('category', null);

    // Find the active item (first match for the clicked slug)
    $activeItem = null;
    if ($activeCategory) {
        foreach ($allItems as $item) {
            if ($item['slug'] === $activeCategory || $item['category'] === $activeCategory) {
                $activeItem = $item;
                break;
            }
        }
    }

    // All items in the same category as the active item
    $categoryItems = $activeItem
        ? array_values(array_filter($allItems, fn($i) => $i['category'] === $activeItem['category']))
        : [];

    return view('frontend.food_gallery.index', compact('allItems', 'activeItem', 'activeCategory', 'categoryItems'));
})->name('food_gallery');

// Redirect root to admin

// Auth Routes (Public)
// Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// // Protected Admin Routes
// Route::middleware(['auth', 'admin.activated'])->prefix('admin')->group(function () {
//     Route::redirect('/', '/admin/dashboard');
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.home');
    
//     // Activation Routes
//     Route::get('/activate', [ActivationController::class, 'showActivationForm'])->name('admin.activate')->withoutMiddleware(['admin.activated']);
//     Route::post('/activate/initiate', [ActivationController::class, 'initiateActivation'])->name('admin.activate.initiate')->withoutMiddleware(['admin.activated']);
//     Route::get('/verify-otp', [ActivationController::class, 'showVerifyForm'])->name('admin.verify.otp')->withoutMiddleware(['admin.activated']);
//     Route::post('/activate/verify', [ActivationController::class, 'verifyActivation'])->name('admin.activate.verify')->withoutMiddleware(['admin.activated']);

//     // Users Management
//     Route::get('/users', [AdminController::class, 'index'])->name('users.index');
//     Route::post('/users', [AdminController::class, 'store'])->name('users.store');
//     Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

//     // Profile & Password
//     Route::get('/profile', function () {
//         return view('admin.profile.index');
//     })->name('profile.index');

//     Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('admin.password.change');
//     Route::post('/password/initiate', [PasswordController::class, 'initiatePasswordChange'])->name('admin.password.initiate');
//     Route::get('/password/verify', [PasswordController::class, 'showVerifyOtpForm'])->name('admin.password.verify');
//     Route::post('/password/update', [PasswordController::class, 'verifyAndUpdatePassword'])->name('admin.password.update');

//     // Users Management
//     Route::get('/users/{user}', [AdminController::class, 'show'])->name('users.show');
//     Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');

//     // Heartbeat for activity tracking
//     Route::post('/heartbeat', [AdminController::class, 'heartbeat'])->name('admin.heartbeat');

//     // Logs
//     Route::get('/logs/signin', [LoginLogController::class, 'index'])->name('admin.logs.index');
// });
