<?php 
namespace App\Modules\Tags\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Tags\Models\Tags as tags;

class TagsController extends Controller {

	public function index()
	{
        $data['title'] = 'Tag';
        $data['posts'] = tags::all();

        return view('Tags::main')->with(compact('data'));
    }
    
    public function add() {
        echo "add";
    }

    public function edit($id) {
        echo "edit";
    }

}