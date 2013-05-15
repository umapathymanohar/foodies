<?php

class RestaurantsController extends BaseController {

    /**
     * Restaurant Repository
     *
     * @var Restaurant
     */
    protected $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

         
              $logged_in_user = Confide::user()->id;
              $business = Business::where('user_id', '=', $logged_in_user)->first();  
              if ($business){
                $business_id = $business->id;
               
              }
              else
              {
               $business_id = 0 ;
              }
          $restaurants = Restaurant::where('business_id','=' , $business_id)->get();
                

        

       return View::make('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('restaurants.create');
    }

       public function manage($restaurant_id)
    {
           return View::make('restaurants.manage')->with('restaurant_id', $restaurant_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
     public function store()
    {
        $input = Input::all();
        
        
        $restaurantPhoto  = Input::file('restaurantPhoto')->getClientOriginalName();
        $restaurantPhotoExtension = Input::file('restaurantPhoto')->getClientOriginalExtension();
        $newPhotoName = 'photo.' . $restaurantPhotoExtension;

        $input['restaurantPhoto'] =         $newPhotoName;

        $validation = Validator::make($input, Restaurant::$rules);

                $logged_in_user = Confide::user()->id;

                 $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
                

        if ($validation->passes())
        {
        $restaurant = $this->restaurant->create($input);

        if ( $restaurant->id )
         {
            $restaurant_id = $restaurant->id;
            if (!is_dir(base_path().'/public/business_assets/'. $business_id .'/restaurant')) {
                mkdir(base_path().'/public/business_assets/'. $business_id .'/restaurant');
            }
            if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id)) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id);
            }
            
            if (Input::hasFile('restaurantPhoto'))
            {
                $destinationPath = base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id;
                Input::file( 'restaurantPhoto' )->move($destinationPath,  $newPhotoName);
           }
        }



            return Redirect::route('restaurants.index');
        }

        return Redirect::route('restaurants.create')
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
        $restaurant = $this->restaurant->findOrFail($id);

        return View::make('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $restaurant = $this->restaurant->find($id);

        if (is_null($restaurant))
        {
            return Redirect::route('restaurants.index');
        }

        return View::make('restaurants.edit', compact('restaurant'));
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
        $validation = Validator::make($input, Restaurant::$rules);

        if ($validation->passes())
        {
            $restaurant = $this->restaurant->find($id);

          if (Input::hasFile('restaurantPhoto')){
              $restaurantPhoto  = Input::file('restaurantPhoto')->getClientOriginalName();
        $restaurantPhotoExtension = Input::file('restaurantPhoto')->getClientOriginalExtension();
        $newPhotoName = 'photo.' . $restaurantPhotoExtension;

        $input['restaurantPhoto'] =         $newPhotoName;

  $logged_in_user = Confide::user()->id;

                 $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
                
        $restaurant->update($input); 
        if ( $restaurant->id )
         {
            $restaurant_id = $restaurant->id;
            if (!is_dir(base_path().'/public/business_assets/'. $business_id .'/restaurant')) {
                mkdir(base_path().'/public/business_assets/'. $business_id .'/restaurant');
            }
            if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id)) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id);
            }
            
            if (Input::hasFile('restaurantPhoto'))
            {
                $destinationPath = base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id;
                Input::file( 'restaurantPhoto' )->move($destinationPath,  $newPhotoName);
           }
        }

            }
            else
            {
                 $input = input::except('restaurantPhoto');
                $restaurant->update($input);
            }
            

            return Redirect::route('restaurants.show', $id);
        }

        return Redirect::route('restaurants.edit', $id)
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
        $this->restaurant->find($id)->delete();

        return Redirect::route('restaurants.index');
    }

}