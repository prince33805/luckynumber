<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lottery;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    function index(){
        $data=Lottery::all();
        $first=Lottery::find(1);
        $second1=Lottery::find(2);
        $second2=Lottery::find(3);
        $second3=Lottery::find(4);
        $side1=Lottery::find(5);
        $side2=Lottery::find(6);
        $twodigit=Lottery::find(7);
        $search='0';
        return view('home',compact('data','first','second1','second2'
        ,'second3','side1','side2','twodigit','search'));
    }
    
    function roll(){
        
        Lottery::truncate();
        
        $first=substr(str_shuffle("0123456789"), 0, 3);
        $second1=substr(str_shuffle("0123456789"), 0, 3);
        $second2=substr(str_shuffle("0123456789"), 0, 3);
        $second3=substr(str_shuffle("0123456789"), 0, 3);
        
        $side1=$first - 1;
        $side2=$first + 1;
        if(strlen($side1)==2){
            $side1='0'.$side1;
        }
        if(strlen($side2)==2){
            $side2='0'.$side2;
        }
        // $twodigit=random_int(0,100);
        $twodigit=substr(str_shuffle("0123456789"), 0, 2);
        // dd($first);


        $data = [
            ['name'=>'1st Prize', 'number'=> $first , 'created_at' => Carbon::now()],
            ['name'=>'2nd Prize(1) ', 'number'=> $second1 , 'created_at' => Carbon::now()],
            ['name'=>'2nd Prize(2)', 'number'=> $second2 , 'created_at' => Carbon::now()],
            ['name'=>'2bd Prize(3)', 'number'=> $second3 , 'created_at' => Carbon::now()],
            ['name'=>'Side Number of 1st Prize(1)', 'number'=> $side1 , 'created_at' => Carbon::now()],
            ['name'=>'Side Number of 1st Prize(2)', 'number'=> $side2 , 'created_at' => Carbon::now()],
            ['name'=>'Last 2 digits prize', 'number'=> $twodigit , 'created_at' => Carbon::now()],
            
        ];
        Lottery::insert($data);
        return redirect('/');
    }

    function reset(){
        Lottery::truncate();
        return redirect('/');
    }

    function search(Request $request){
        $searchText=$request->get('search');

        $data=Lottery::all();
        $first=Lottery::find(1);
        $second1=Lottery::find(2);
        $second2=Lottery::find(3);
        $second3=Lottery::find(4);
        $side1=Lottery::find(5);
        $side2=Lottery::find(6);
        $twodigit=Lottery::find(7);

        // $search2=Lottery::where('number','=',$searchText)->get(['number']);
        
        if($searchText==''){
            $search='0';
            return view('home',compact('data','first','second1','second2'
            ,'second3','side1','side2','twodigit','search'));
        }else{
            $strlen = strlen($searchText);
            if ($strlen == 2){
                $searchText='0'.$searchText;
            }else if($strlen == 1) {
                $searchText='0'.'0'.$searchText;
            }

            //normal prize
            $search = DB::table('lotteries')
                ->where('number','=',$searchText)
                ->get()
                ->pluck('name');

            //2digit
            $searchText2 = substr($searchText,1);            
            $search2 = DB::table('lotteries')
                ->where('name','=','Last 2 digits prize')
                ->where('number','LIKE','%'.$searchText2)
                ->get()
                ->pluck('name');
                            
            if (count($search) > 0){
                $message = 'Congratulation !!!';
                $message2 = 'You win '.$search[0];
            }else if(count($search2) > 0){
                $message = 'Congratulation !!!';
                $message2 = 'You win '.$search2[0];
            }else{
                $message = 'Better luck ';
                $message2 = 'Next time';    
            }
            
            return view('home',compact('data','first','second1','second2'
            ,'second3','side1','side2','twodigit','search','searchText','message','message2'));
        }
    }

}
