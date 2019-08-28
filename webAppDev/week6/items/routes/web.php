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

Route::get('/', function(){
	return redirect('/items');
});

Route::get('/items', function(){
	return view('items', ['items' => DB::select('SELECT * FROM item')]);
});
Route::get('/items/{id}', function($id){
	$items = DB::select('SELECT * FROM item WHERE id = ?', [$id]);
	return view('item', ['item' => (empty($items) ? null : $items[0])]);
});

Route::get('/create', function(){
	return view('create');
});
Route::post('/create', function(){
	$summary = request('summary');
	$details = request('details');
	// Some really stupidly naive sanity checking. Won't block any real attempts to bypass.
	if (is_string($summary) && is_string($details) && strlen($summary) <= 80)
	{
		$id = DB::table('item')->insertGetId(
			['summary' => $summary, 'details' => $details]
		);
		return redirect('/items/'.$id);
	}
	return redirect('/items');
});

Route::post('/delete', function(){
	$id = request('id');
	// Some really stupidly naive sanity checking. Won't block any real attempts to bypass.
	if (!empty($id))
	{
		DB::delete('DELETE FROM item WHERE id = ?', [$id]);
	}
	return redirect('/items');
});

Route::post('/update', function(){
	$id = request('id');
	$summary = request('summary');
	$details = request('details');
	// Some really stupidly naive sanity checking. Won't block any real attempts to bypass.
	if (is_string($summary) && is_string($details) && strlen($summary) <= 80)
	{
		DB::update('UPDATE item SET summary = ?, details = ? WHERE id = ?', [$summary, $details, $id]);
	}
	return redirect('/items');
});

