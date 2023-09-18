<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListUMKM;
use App\Models\LikeUMKM;
use App\Models\ReviewUmkm;
use App\Models\ViewUmkm;
use Illuminate\Support\Facades\Auth;

class DataUMKMController extends Controller
{
    public function index() 
    {
        $data = ListUMKM::get();
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
