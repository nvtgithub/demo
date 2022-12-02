<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class RevenusFilterDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'] ?? '';
        $to_date = $data['to_date'] ?? '';


        $Revenus = DB::table('orders')->join('order_details', 'orders.id', '=', 'order_details.order_id')->whereBetween('orders.created_at', [$from_date, $to_date])->where('status', 'like', '7')->select(
            DB::raw("DATE_FORMAT(orders.created_at, '%d-%m-%Y') as day"),
            DB::raw("sum(total) as Total"),
            DB::raw("sum(order_details.qty) as quantity")
        )
            ->groupBy("day")->orderBy('day', 'DESC')
            ->paginate(10);

        $total = 0;
        foreach ($Revenus as $data) {
            $total += $data->Total;
        }

        return view('admin.revenu.revenu_filter_day', compact('Revenus', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function filter_by_date()
    // {
    //     // $data = $request->all();
    //     // $from_date = $data['from_date'];
    //     // $to_date = $data['to_date'];

    //     // $Revenus = DB::table('orders')->join('order_details', 'orders.id', '=', 'order_details.order_id')->where('status', '=', 7)->select(
    //     //     DB::raw("DATE_FORMAT(orders.created_at, '%d-%m-%Y') as day"),
    //     //     DB::raw("sum(total) as Total"),
    //     //     DB::raw("sum(order_details.qty) as quantity")
    //     //   )
    //     //     ->groupBy("day")->orderBy('day', 'DESC')
    //     //     ->paginate(10);

    //     // return view('admin.revenu.revenu_filter_day', compact('Revenus'));
    // }
}
