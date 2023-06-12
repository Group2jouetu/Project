<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DB::select('select * from bookmarks');
        return view('map',[
            'items' => $items,
        ]);
    }

    //登録処理
    public function create(Request $request)
    {
        $param = [
            'user_id' => $request->user_id, 
            'pin_id' => $request->pin_id, 
        ];
        DB::insert('insert into bookmarks(user_id,pin_id) value(:user_id, :pin_id)',$param);
        return redirect('map');
    }

    //削除処理
    public function delete(Request $request)
    {
        $param = [
            'id' => $request->id,
        ];
        DB::delete('delete from bookmarks where id = :id',$param);
        return redirect('map');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
