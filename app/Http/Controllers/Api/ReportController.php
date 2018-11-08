<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Transactions;
use App\Model\FiscalData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

class ReportController extends Controller
{
    //

    public function profitandloss(Request $request){
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $mode = $request->query('mode');
        $term = $request->query('term');
        $toReturn = [];
        $finalData =[];
        $year = date('Y', strtotime("+1 day"));
        $fiscaldata = FiscalData::where(['fiscal_year'=>$year])->first();


        // $date_today = date('Y-m-d', strtotime("+1 day"));
        // $date_end =  date("Y-m-d", strtotime("-1 year", strtotime($date_today)));
        $date_today = $fiscaldata['end_date'];
        $date_end = $fiscaldata['start_date'];

        if($mode=='pnl'){
            $transactions = Transactions::select('id', 'account','account_code','entry', 'price', 'created_at')->whereBetween("created_at",[$date_end, $date_today])->orderBy('created_at')
            ->get()
            ->groupBy([function($date) {
                return Carbon::parse($date->created_at)->format('n'); // grouping by years
            },'entry']);

            $transactions = $transactions->map(function($data){
                if(!isset($data['credit'])){
                    $data['credit']=[];
                }
                if(!isset($data['debit'])){
                    $data['debit']=[];
                }
                return $data;
            });
            

            $toReturn = $transactions->keys();

            $toReturn = $toReturn->map(function($data) use ($months){
                return ["Month" =>$months[$data-1],"Debit"=>'', "Credit"=>''];
            });

            $transactions = $transactions->map(function($data){
               return $data->map(function($entry){
                    if(count($entry) > 0){
                        return $entry->sum('price');
                    }
                    return 0;
               });
            });
            $data = $transactions->values();

            
            foreach($toReturn as $key => $value){
                array_push($finalData, $value);
                $finalData[$key]['Debit'] = $data[$key]['debit'];
                $finalData[$key]['Credit'] = $data[$key]['credit'];
            }
            

        }

        if($mode=='cashflow'){
            $startingBalance = $fiscaldata['starting_balance'];

            
            $transactions = Transactions::select('id', 'account','account_code','entry', 'price', 'created_at')->orderBy('created_at')
            ->get()
            ->groupBy([function($date) {
                return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                // return Carbon::parse($date->created_at)->format('n'); // grouping by months
            },'entry']);

            if($term == 'monthly'){
                $transactions = Transactions::select('id', 'account','account_code','entry', 'price', 'created_at')->whereBetween("created_at",[$date_end, $date_today])->orderBy('created_at')
                ->get()
                ->groupBy([function($date) {
                    // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('Y-m'); // grouping by months
                },'entry']);
            }

            $transactions = $transactions->map(function($data){
                if(!isset($data['credit'])){
                    $data['credit']=[];
                }
                if(!isset($data['debit'])){
                    $data['debit']=[];
                }
                return $data;
            });

            $toReturn = $transactions->keys();

            if($term == "monthly"){
                $toReturn = $toReturn->map(function($data) use ($months){
                    return ["Period" => $data];
                });
            } else {
                $toReturn = $toReturn->map(function($data) use ($months){
                    return ["Period" => (string)$data];
                });
            }
            $transactions = $transactions->map(function($data){
                return $data->map(function($entry){
                    if(count($entry) > 0){
                        return $entry->sum('price');
                    }
                    return 0;
                });
             });
             $data = $transactions->values();
            //  dd($data);
             
             foreach($toReturn as $key => $value){
                if(is_array($value)){
                    array_push($finalData, $value);
                } 
                 $finalData[$key]['Total'] = ($startingBalance) + ($data[$key]['debit'] - ($data[$key]['credit']));
             }

        }


        
        // $transactions
        return response()->json($finalData);
    }

    public function financial(Request $request){
        $fy = $request->query('fy');
        $fiscaldata = FiscalData::where(['fiscal_year'=>$fy])->first();
        $transactions = Transactions::whereBetween('created_at',[$fiscaldata['start_date'],$fiscaldata['end_date']])->get()
        ->groupBy(['entry','account']);
        return response()->json($transactions);
    }
}
