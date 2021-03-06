<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuisineCreate;
use App\Models\Cuisine;
use App\Models\Keyword;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    /**
     * @param Cuisine $cuisine
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Cuisine $cuisine)
    {
        $cuisines = $cuisine->all();
        return view('cuisine.index', compact('cuisines'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $keywords = Keyword::all();
        return view('cuisine.create', compact('keywords'));
    }

    /**
     * @param CuisineCreate $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CuisineCreate $request)
    {
        $cuisine = new Cuisine($request->all('name'));
        $cuisine->save();
        $keywords = $request->input('keywords');
        $cuisine->keywords()->attach($keywords);
        return redirect()->route('cuisines.index');
    }

    /**
     * @param Cuisine $cuisine
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cuisine $cuisine)
    {
        $keywords = Keyword::all();
        return view('cuisine.edit', compact('cuisine', 'keywords'));
    }

    /**
     * @param CuisineCreate $request
     * @param Cuisine       $cuisine
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CuisineCreate $request, Cuisine $cuisine)
    {
        $cuisine->name = $request->input('name');
        $cuisine->save();
        $cuisine->keywords()->detach();
        $keywords = $request->input('keywords');
        $cuisine->keywords()->attach($keywords);
        return redirect()->route('cuisines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        return redirect()->route('cuisines.index');
    }
}
