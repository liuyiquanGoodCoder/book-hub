<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;
use JWTAuth;

class ProductController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
	}
	public function index()
	{
	    return $this->user
	        ->books()
	        ->paginate(15)
			->toArray();
	}
	public function show($bname)
	{
		$input = $this->user->books()->where('bname','LIKE','%'.$bname.'%')->paginate(15)->toArray();
    	if (!$input) {
    		return response()->json([
	            'success' => true,
	            'message' => 'Sorry, book with name ' . $bname . ' cannot be found'
	        ]);
    	}

    	return $input;
	    
	}
	public function store(Request $request)
	{
	    $this->validate($request, [
			'bname' => 'required',
			'ISBN' => 'required',
			'author' => 'required',
			'role' => 'required|integer',
			'pub_year' => 'required|integer',
			'publisher' => 'required',
			'img_s' => 'required',
	        'img_m' => 'required',
	        'img_l' => 'required',
			'quantity' => 'required|integer',
			'price' => 'required',
	    ]);

	    $book = new Books();
	    $book->bname = $request->bname;
	    $book->ISBN = $request->ISBN;
	    $book->author = $request->author;
	    $book->role = $request->role;
	    $book->pub_year = $request->pub_year;
	    $book->publisher = $request->publisher;
	    $book->img_s = $request->img_s;
	    $book->img_m = $request->img_m;
	    $book->img_l = $request->img_l;
	    $book->price = $request->price;
	    $book->quantity = $request->quantity;

	    if ($this->user->books()->save($book))
	        return response()->json([
	            'success' => true,
	            'book' => $book
	        ]);
	    else
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, book could not be added'
	        ]);
	}
	public function update(Request $request, $id)
	{
	    $product = $this->user->products()->find($id);

	    if (!$product) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, product with id ' . $id . ' cannot be found'
	        ]);
	    }

	    $updated = $product->fill($request->all())
	        ->save();

	    if ($updated) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, product could not be updated'
	        ]);
	    }
	}
	public function destroy($id)
	{
	    $product = $this->user->products()->find($id);

	    if (!$product) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, product with id ' . $id . ' cannot be found'
	        ]);
	    }

	    if ($product->delete()) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Product could not be deleted'
	        ]);
	    }
	}
}
