<?php

class RestaurantLocationsController extends BaseController {

    /**
     * Restaurantlocation Repository
     *
     * @var Restaurantlocation
     */
    protected $restaurantlocation;

    public function __construct(RestaurantLocation $restaurantlocation)
    {
        $this->restaurantlocation = $restaurantlocation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($restaurant_id)


    {
        
        $restaurantlocations = $this->restaurantlocation->where('restaurant_id', '=', $restaurant_id)->get();
        
        return View::make('restaurantlocations.index', compact('restaurantlocations'))->with('restaurant_id', $restaurant_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($restaurant_id)
    {

        return View::make('restaurantlocations.create')->with('restaurant_id', $restaurant_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($restaurant_id)
    {
        $input = Input::all();
        $validation = Validator::make($input, Restaurantlocation::$rules);

        if ($validation->passes())
        {
            $this->restaurantlocation->create($input);

            return Redirect::route('restaurants.restaurantlocations.index', $restaurant_id);
        }

        return Redirect::route('restaurants.restaurantlocations.create', $restaurant_id)
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
    public function show($id, $comment)
    {
        
        $restaurantlocation = $this->restaurantlocation->findOrFail($comment);

        return View::make('restaurantlocations.show', compact('restaurantlocation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($restaurant_id, $restaurantlocation_id)
    {
        $restaurantlocation = $this->restaurantlocation->find($restaurantlocation_id);

        if (is_null($restaurantlocation))
        {
            return Redirect::route('restaurants.restaurantlocations.index', array($restaurant_id));
        }

        return View::make('restaurantlocations.edit', compact('restaurantlocation'))->with( array('restaurantlocation_id' => $restaurantlocation_id, 'restaurant_id' => $restaurant_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($restaurant_id, $restaurantlocation_id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Restaurantlocation::$rules);

        if ($validation->passes())
        {
            $restaurantlocation = $this->restaurantlocation->find($restaurantlocation_id);
            $restaurantlocation->update($input);

            return Redirect::route('restaurants.restaurantlocations.show', array ($restaurant_id, $restaurantlocation_id));
        }

        return Redirect::route('restaurants.restaurantlocations.edit', array ($restaurant_id, $restaurantlocation_id))
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
    public function destroy($restaurant_id, $restaurantlocation_id)
    {
        
        //$this->restaurantlocation->find($restaurantlocation_id)->delete();

        return Redirect::route('restaurants.restaurantlocations.index',array ($restaurant_id));
    }

}