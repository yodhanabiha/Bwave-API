<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\ListUMKM;
use App\Models\LikeUMKM;
use App\Models\ReviewUmkm;
use App\Models\ViewUmkm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Validator;

class DataUMKMController extends BaseController
{
    public function index() 
    {
        $data = ListUMKM::take(6)->get();
        return $data;
    }

    public function search(Request $request) {

        $validator = Validator::make($request->all(), [
            'search' => 'required',
            'page' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('validator not completed', $validator->errors());       
        }

        $search = $request->input('search'); 
        $page = $request->input('page', 1);

        $data = ListUMKM::where('title', 'LIKE', '%' . $search . '%')->paginate(10, ['*'], 'page', $page);
        return $data;
    }

    public function detail($id) 
    {
        $data = ListUMKM::find($id);
        return $data;
    }
    
    public function like($idumkm) {
        $user = Auth::user();
        $iduser = $user->id;

        $isLiked = $this->checklike($idumkm);

        if(!$isLiked){
            $like = new LikeUMKM();
            $like->idumkm = $idumkm;
            $like->iduser = $iduser;
            $like->save();
        }
    }

    public function unlike($idumkm) {
        $user = Auth::user();
        $iduser = $user->id;

        $isLiked = $this->checklike($idumkm);

        if ($isLiked) {
            $like = LikeUMKM::where('idumkm', $idumkm)->where('iduser', $iduser)->first();
            $like->delete();
        } 
    }

    public function checklike($idumkm){
        $user = Auth::user();
        $iduser = $user->id;
        
        $like = LikeUMKM::where('idumkm', $idumkm)->where('iduser', $iduser)->first();
        
        if($like){
            return 1;
        } 
        else {
            return 0;
        }
    }

    public function view($idumkm){
        $user = Auth::user();
        $iduser = $user->id;
        
        $viewcheck = ViewUmkm::where('idumkm', $idumkm)->where('iduser', $iduser)->first();
        
        if(!$viewcheck){
            $view = new ViewUmkm();
            $view->idumkm = $idumkm;
            $view->iduser = $iduser;
            $view->save();

            $umkm = ListUMKM::find($idumkm);
            $umkm->view += 1;
            $umkm->save();
        } 
        
    }
}
