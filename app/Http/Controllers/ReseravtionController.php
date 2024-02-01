<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reseravtion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReseravtionRequest;
use App\Http\Requests\UpdateReseravtionRequest;
use App\Models\User;

class ReseravtionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('admin.reservation.index',[
            'reservations'=>Reseravtion::with('user', 'book')
                ->paginate(5)
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReseravtionRequest $request,User $user,Book $book )
    {
        //

        Reseravtion::create([
            'description'=>'description',
            'is_returned'=>0,
            'user_id'=>$user->id,
            'book_id'=>$book->id,
        ]);

        $book->decrement('available_copies');

        return redirect('/')->with('success', " your Book reserved successfully");


    }

    /**
     * Display the specified resource.
     */
    public function show(Reseravtion $reseravtion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reseravtion $reseravtion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReseravtionRequest $request, Reseravtion $reseravtion,Book $book)
    {

        $reseravtion->update(['is_returned' => 1]);
        $book->increment('available_copies');

        return redirect()->route('reservation.index')->with('success', "Book number $book->id  restored ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reseravtion $reseravtion)
    {
        // Your delete logic
       $reseravtion->delete();
        return redirect()->route('reservation.index')->with('success', "Reservation number $reseravtion->id deleted successfully");
    }

}
