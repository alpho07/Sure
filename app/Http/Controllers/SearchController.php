<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DB;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Collection;

class SearchController extends Controller
{

  



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display(Request $request)
    {    
        //Keyword to search for
        $search =  $request->get('keyword');    
        
          $caveats = DB::select(DB::raw("SELECT * FROM caveats WHERE LR_No LIKE '%$search%' OR IR_IC_Nos LIKE '%$search%' OR Town LIKE '%$search%' OR 
          County LIKE '%$search%' OR Description LIKE '%$search%' OR Area LIKE '%$search%' OR Landmark LIKE '%$search%' OR Road LIKE '%$search%'"));                
                
                  
          
          
        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($caveats);

        //Define how many items we want to be visible in each page
        $perPage = 5;

        //Slice the collection to get the items to display in current page
       // $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();
        $currentPageSearchResults = $collection-> slice (($currentPage - 1) * $perPage, $perPage) -> all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        $paginatedSearchResults->setPath($request->url());
        $paginatedSearchResults->appends($request->except(['_token']));
        return view('front.caveats.search')->with(['search'=>$search,'caveats'=>$paginatedSearchResults,'total'=>$caveats]);
        
    }

    
}
