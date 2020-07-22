<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){

    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');

    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function() {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        // Route::prefix('stores')->name('stores.')->group(function(){

        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');


        // });

        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');

    });
});

Route::get('/model', function(){
    // $products = \App\Product::all(); //select from products

    // ACTIVE RECORD
    //FORMULA CRIAÇÃO DE DADOS NO BANCO DE DADOS
    // $user = new \App\User();
    // $user->name = 'Usuário Teste';
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('12345678');

    // $user->save();

    //FORMULA ATUALIAÇÃO DE DADOS NO BANCO DE DADOS
    // $user = \App\User::find(1);
    // $user->name = 'Matheus Multini';

    // $user->save();

    // return \App\User::all(); //Collection retorn json -> retorna todos os usuários
    // return \App\User::find(1); //Collection retorn json -> retorna apenas um usuário com base no ID
    // return \App\User::where('name', 'Matheus Multini')->get(); //selection * from users where name = 'Matheus Multini'  get()->colecao / first() somente o primeiro
    // return \App\User::paginate(10); //PAGINAR DADOS

    //MASS ASSIGNMENT - ATIBUIÇÃO EM MASSA

    // $user = \App\User::create([
    //     'name' => 'Matheus Henryan Multini',
    //     'email' => 'matheus@teste.com',
    //     'password' => bcrypt('12345678')
    // ]);
    // dd($user);

    //MASS UPDATE
    // $user = \App\User::find(43);
    // $user = $user->update([
    //     'name' => 'Atualizando com mass update'
    // ]); //true or false
    // dd($user);

    //COMO PEGAR A LOJA DE UM USUÁRIO
    // $user = \App\User::find(4);

    // return $user->store; //retorna o objeto unico (STORE)
    // dd($user->store()->count()); //retorna o objeto unico (STORE)

    //PEGAR OS PRODUTOS DE UMA LOJA
        // $loja = \App\Store::find(4);
        // return $loja->products;

    //PEGAR AS LOJAS DE UMA CATEGORIA
    // $categoria = \App\Category::find(1);
    // $categoria->products;

    //CRIAR UMA LOJA PARA UM USUÁRIO
        // $user = \App\User::find(4);
        // $store = $user->store()->create([
        //     'name' => 'Loja Teste',
        //     'description' => 'Loja Teste de Produtos de Informática',
        //     'mobile_phone' => 'XX-XXXX-XXXX',
        //     'phone' => 'XX-XXXX-XXXX',
        //     'slug' => 'loja-teste'
        // ]);

        // dd($store);

    //CRIAR UM PRODUTO PARA UMA LOJA
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Toshiba',
    //     'description' => 'Core i7 1TB',
    //     'body' => 'Somente teste',
    //     'price' => 2999.90,
    //     'slug' => 'notebook-toshiba',
    // ]);

    // dd($product);

    //CRIAR UM CATEGORIA
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => 'Games e Acessórios',
    //     'slug' => 'games',
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => 'Computadores e Periféricos',
    //     'slug' => 'notebooks',
    // ]);

    // return \App\Category::all();

    //ADICIONAR UM PRODUTO PARA CATEGORIA OU VICE-VERSA
    // $product = \App\Product::find(41);
    // dd($product->categories()->detach([1]));  //attach - adicionar //detach - remover //sync - adiciona e remove

    //     RELACIONAMENTO
    // 1:1 - Um pra um (Usuário e Loja) - hasOne (usuario tem uma loja e a loja pertence ao usuario) e belongsTo
    // 1:N - Um pra Muitos (Loja e Produtos) - hasMany (tem muitos produtos) e belongsTo (Pertence a)
    // N:N - Muitos pra muitos (Produtos e Categorias) - belongsToMany

    // MÉTODOS
    // CREATE -> Trabalha com objeto
    // SAVE -> Trabalha com arrays

    // TIPOS DE ROTAS
    // Route::get
    // Route::post
    // Route::put
    // Route::patch
    // Route::delete
    // Route::options

    //VERBOS HTTP (HyperText Transfer Protocol)
    //GET - recupera / acessa as coisas / form html
    //POST - criar coisas / form html
    //PUT ou PATCH - atualiza coisas
    //DELETE - remove coisas

    //Controller como Recurso (RESOURCE)
    //GET - /products - index
    //GET - /products/10 - show
    //GET - /products/10/edit - edit
    //GET - /products/create - create
    //POST - /products - store
    //PUT ou PATCH - /product/10 - update
    //DELETE - /product/10 - destroy

    //Route::resource('products')


    return \App\User::all();
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
