<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Trademarks\TrademarksServiceInterface;
use Illuminate\Http\Request;

class TrademarksController extends Controller
{
  private $trademarksService;

  public function __construct(TrademarksServiceInterface $trademarksService)
  {
    $this->trademarksService = $trademarksService;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $trademarks = $this->trademarksService->searchAndPaginate('name', $request->get('search'));
    return view('admin.trademark.index', compact('trademarks'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.trademark.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $this->trademarksService->create($data);
    return redirect('admin/trademark');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $trademark = $this->trademarksService->find($id);
    return view('admin.trademark.edit', compact('trademark'));
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
    $data = $request->all();
    $this->trademarksService->update($data, $id);
    return redirect('admin/trademark');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->trademarksService->delete($id);
    return redirect('admin/trademark');
  }
}
