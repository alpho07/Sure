<?php

namespace App\Http\Controllers;
require_once(base_path().'/html2pdf.class.php');
use DB;
use App\Caveats;
use App\ViewCount;
use HTML2PDF;
use View;
class CaveatsDisplay extends Controller {

    function __construct() {
        
    }
    
    function pdf($id){
      // $caveats = Caveats::where('id', $id)->get()->toArray();
        //SELECT c.*,u.name FROM caveats c JOIN user_caveats uc ON c.id = uc.caveat_id JOIN users u ON uc.email = u.email 
        $caveats = DB::select(DB::raw("SELECT c.*,u.name,u.email, u.user_type_id, ci.*, c.id as cavid FROM caveats c JOIN user_caveats uc ON c.id = uc.caveat_id JOIN users u ON uc.email = u.email LEFT JOIN caveat_infos ci ON ci.Cid = c.id WHERE c.id = '$id'"));
        $previous = Caveats::where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
        $next = Caveats::where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->get();
        $last = Caveats::where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
       
        if (empty($caveats)) {
            return redirect('nocaveat');
        }


        if ($next == '[]') {
            $nex = $id;
            $n = 'disabled';
        } else {
            $nex = $next[0]->id;
            $n = '';
        }
        if ($previous == '[]') {
            $prev = $id;
            $p = 'disabled';
        } else {
            $prev = $previous[0]->id;
            $p = '';
        }
        
           if (\is_null($caveats[0]->Cid)) {
          
            $m = 'disabled';
        } else {
           
            $m = '';
        }
        
        $this->setVisitorCount($id);

      $view= View::make('front.caveats.pdf',[
                
                    'caveats' => $caveats, 
                    'prev' => $prev, 
                    'next' => $nex,
                    'p'=>$p,
                    'n'=>$n,
                    'm'=>$m,
                    'id'=>$id,
                    'vcount'=>$this->getViewCount($id)
                        
                      ]);
// $view->render();
   
    $html2pdf = new HTML2PDF('P','A4','en');
    $html2pdf->WriteHTML($view->render());
    $html2pdf->Output($caveats[0]->LR_No.'_'.$caveats[0]->IR_IC_Nos.'.pdf');
    
    }

    public function index($id) {

        // $caveats = Caveats::where('id', $id)->get()->toArray();
        //SELECT c.*,u.name FROM caveats c JOIN user_caveats uc ON c.id = uc.caveat_id JOIN users u ON uc.email = u.email 
        $caveats = DB::select(DB::raw("SELECT c.*,u.name,u.email, u.user_type_id, ci.*, c.id as cavid FROM caveats c JOIN user_caveats uc ON c.id = uc.caveat_id JOIN users u ON uc.email = u.email LEFT JOIN caveat_infos ci ON ci.Cid = c.id WHERE c.id = '$id'"));
        $previous = Caveats::where('id', '<', $id)->orderBy('id', 'DESC')->limit(1)->get();
        $next = Caveats::where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->get();
        $last = Caveats::where('id', '>', $id)->orderBy('id', 'DESC')->limit(1)->get();
       
        if (empty($caveats)) {
            return redirect('nocaveat');
        }


        if ($next == '[]') {
            $nex = $id;
            $n = 'disabled';
        } else {
            $nex = $next[0]->id;
            $n = '';
        }
        if ($previous == '[]') {
            $prev = $id;
            $p = 'disabled';
        } else {
            $prev = $previous[0]->id;
            $p = '';
        }
        
           if (\is_null($caveats[0]->Cid)) {
          
            $m = 'disabled';
        } else {
           
            $m = '';
        }
        
        $this->setVisitorCount($id);

        return view('front.caveats.display')
                ->with([
                    'caveats' => $caveats, 
                    'prev' => $prev, 
                    'next' => $nex,
                    'p'=>$p,
                    'n'=>$n,
                    'm'=>$m,
                    'id'=>$id,
                    'vcount'=>$this->getViewCount($id)
                        
                      ]);
    }

    function nocaveat() {
        $message = 'No Caveat Found linked with that ID';
        return view('front.caveats.nocaveat')->with(['message' => $message]);
    }
    
    
    public function show($id){
    }
    
    
        function getUserIP() {
        return $_SERVER['REMOTE_ADDR'];
    }

    function setVisitorCount($id) {
        $check = DB::table('view_counts')->where('caveat_id',$id)->where('visitor',$this->getUserIP())->count();
        if ($check > 0):

        else:
        $view_count = new ViewCount();
        $view_count->caveat_id = $id;
        $view_count->visitor= $this->getUserIP();
        $view_count->save();    

        endif;
    }
    
    function getViewCount($id){
    return ViewCount::where('caveat_id', $id)->count();
    }
    

}
