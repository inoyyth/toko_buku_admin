<?php 
namespace App\Modules\Posts\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Posts\Models\Posts as posts;

class PostsController extends Controller {

	public function index()
	{
        $data['title'] = 'Post';
        $data['posts'] = posts::all();

        return view('Posts::main')->with(compact('data'));
    }
    
    public function add() {
        echo "add";
    }

    public function edit($id) {
        echo "edit";
    }

}