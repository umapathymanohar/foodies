<?php

class CuisinesController extends BaseController {

    /**
     * Cuisine Repository
     *
     * @var Cuisine
     */
    protected $cuisine;

    public function __construct(Cuisine $cuisine)
    {
        $this->cuisine = $cuisine;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cuisines = $this->cuisine->all();

        return View::make('cuisines.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Cuisine::$rules);

        if ($validation->passes())
        {
            $this->cuisine->create($input);

            return Redirect::route('cuisines.index');
        }

        return Redirect::route('cuisines.create')
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cuisine = $this->cuisine->findOrFail($id);

        return View::make('cuisines.show', compact('cuisine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cuisine = $this->cuisine->find($id);

        if (is_null($cuisine))
        {
            return Redirect::route('cuisines.index');
        }

        return View::make('cuisines.edit', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Cuisine::$rules);

        if ($validation->passes())
        {
            $cuisine = $this->cuisine->find($id);
            $cuisine->update($input);

            return Redirect::route('cuisines.show', $id);
        }

        return Redirect::route('cuisines.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->cuisine->find($id)->delete();

        return Redirect::route('cuisines.index');
    }

}