<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ContactUserController extends Controller
{
    private $productCategoryService;
    private $userService;


    public function __construct(ProductCategoryServiceInterface $productCategoryService, UserServiceInterface $userService)
    {
        $this->productCategoryService = $productCategoryService;
        $this->userService = $userService;
    }

    public function index()
    {

        $categories = $this->productCategoryService->all();
        return view('front.account.my-contact.index', compact('categories'));
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
    public function edit()
    {
        $categories = $this->productCategoryService->all();
        return view('front.account.my-contact.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        //cập nhật dữ liệu
        $this->userService->update($data, Auth::user()->id);

        return redirect('front.account.my-contact');
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
}
