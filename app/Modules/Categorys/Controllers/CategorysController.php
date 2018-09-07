<?php 
namespace App\Modules\Categorys\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Categorys\Models\Categorys as categorys;
use Yajra\Datatables\Datatables;

class CategorysController extends Controller {

	public function index(Request $request)
	{
        if($request->ajax()){
            $users = categorys::select(['id','title','description','created_at','updated_at']);
            return Datatables::of(categorys::query())->make(true);          
        } else {
        $data['title'] = 'Category';
        return view('Categorys::main')->with(compact('data'));
        }
    }
    
    public function add() {
        echo "add";
    }

    public function edit($id) {
        echo "edit";
    }

    public function delete($id, Request $request) {
        if($request->ajax()){
            $model = categorys::find( $id );
            $model->delete();
            $data=[];
            $data['success'] = 'Record is successfully deleted';
            return $data;
        }
    }

    public function save(Request $request) {
        if($request->ajax()){
            $data['errors'] = [];
            $validator = \Validator::make($request->all(), [
                'title' => 'required|unique:posts|max:255',
            ]);

            if ($validator->fails())
            {
                $data['errors'] = $validator->errors()->all();
                return response()->json($data);
            }
            $model = new categorys;
            $model->title = $request->title;
            $model->description = $request->description;
            if ($model->save()) {
                $data['success'] = 'Record is successfully added';
            }

            return response()->json($data);
        }
    }

}