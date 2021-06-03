<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Poster;
use App\Models\AllDataTable; 

use Artisan;
use DB;

class ApplicationController extends Controller
{
    //

    protected $tablesArray = []; 
    
    public function index(){
        return view("index");
    }


    public function resetDB(){
        Artisan::call('migrate:fresh');
        return view("index");
    }


    
    public function recordIsPresent($table, $column, $value){
        
        $recordObj = DB::select('select ' . $column . ' from ' . $table . ' where ' .  $column . ' = ' . '"'. $value . '"');

        if($recordObj){
            $ret = json_decode(json_encode($recordObj), true);
            return true;
        }
        else{
            return false;
        }

        
    }


    public function splitInTable(){



     $baseTable = new AllDataTable();   
     $allRecord = $baseTable::all();
          
     $allRowsArray = json_decode($allRecord, true);
          
     foreach($allRowsArray as $key => $row){

         $movieTable = new Movie();
         $posterTable = new Poster();

         $titlePresent = $this->recordIsPresent("movie_table", "title", $row["title"]);

         if(!$titlePresent) {

             $movieTable->id = $row["id_movie"]; 
             $movieTable->Title = $row["title"]; 
             $movieTable->Year = $row["year"]; 
             $movieTable->imdbID = $row["imdbID"]; 
             $movieTable->save();    

         }


         $posterPresent = $this->recordIsPresent("poster_table", "id", $row["id_poster"]);

         if(!$posterPresent) {

             $posterTable->id = $row["id_poster"];
             $posterTable->movie_id = $row["id_movie"];
             $posterTable->image_url = $row["image_url"];
             $posterTable->save();

         }

        }
    }



    public function getNumOfRecords($column, $table){

        $query = 'select count(' . $column . ') as numRecords from ' . $table;

        $recordObj = DB::select($query);
        
        if($recordObj){
            $records = json_decode(json_encode($recordObj), true);      
            return $records[0]["numRecords"];
        }
    }


    public function saveAIO($dataBlock)
    {

        echo "<br />";    

// Artisan::call('migrate:fresh');

        $num_records = $this->getNumOfRecords("id_movie", "all_data_table");

        foreach($dataBlock as $key => $data){

             $recordPresent = $this->recordIsPresent("all_data_table", "title", $dataBlock[$key]["Title"]);

             if(!$recordPresent) {

                 $table = new AllDataTable();
 
                 $table->id_movie = $key + ($num_records);
                 $table->title = $dataBlock[$key]["Title"];
                 $table->year = $dataBlock[$key]["Year"];
                 $table->imdbID = $dataBlock[$key]["imdbID"];
                 $table->id_poster = $key + ($num_records);
                 $table->image_url = $dataBlock[$key]["Poster"];
                 $table->save();

             }


        }
    }


    public function sendDataToView()
    {
        $movieTable = new Movie();

        $records = $movieTable::with("poster")->get();
        $dataForView = json_decode($records, true);
        $this->tablesArray = $dataForView;
        return ;
    }


    public function postAPI(Request $request){

        $arrayData = json_decode($request->dataAPI,true);

        $this->saveAIO($arrayData);
        $this->splitInTable();

        $this->sendDataToView();

// Artisan::call('migrate:fresh');

        return view("resultPage")->with("restAPI_tables", $this->tablesArray);
    }
}
