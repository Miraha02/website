<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    /**

     */
    public function index()
    {
        $serie = Serie::all();
        $serie5 = Serie::all()->sortByDesc('note')->take(5);
        $serie3 = Serie::all()->sortByDesc('note')->take(3);

        return view('serie.serie', ['series' => $serie, 'cinqSeries'=> $serie5, 'treeSeries'=> $serie3]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
          [
              'maBox' =>'required',
          ]
        );
        DB::table("seen")->insert(
            [
                'user_id'=>Auth::user()->id,
                'episode_id'=>$request->maBox,
                'date_seen'=>now(),
            ]
        );
       $episode = Episode::find($request->maBox);
       return $this->show($episode->serie_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie= Serie::find($id);
        $episode = $serie->episodes->sortBy('saison');
        $comment=$serie->comments;
        return view('serie.show',['serie'=> $serie, 'episodes' => $episode, 'comments' => $comment]);
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
