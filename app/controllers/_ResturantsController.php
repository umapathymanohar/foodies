<?php

class ResturantsController extends BaseController {

    /**
     * Resturant Repository
     *
     * @var Resturant
     */
    protected $resturant;

    public function __construct(Resturant $resturant)
    {
        $this->resturant = $resturant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resturants = $this->resturant->all();

        return View::make('resturants.index', compact('resturants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('resturants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        
        
        $resturantPhoto  = Input::file('resturantPhoto')->getClientOriginalName();
        $resturantPhotoExtension = Input::file('resturantPhoto')->getClientOriginalExtension();
        $newPhotoName = 'photo.' . $resturantPhotoExtension;

        $input['resturantPhoto'] =         $newPhotoName;

        $validation = Validator::make($input, Resturant::$rules);

                $logged_in_user = Confide::user()->id;

                 $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
                

        if ($validation->passes())
        {
        $resturant = $this->resturant->create($input);

        if ( $resturant->id )
         {
            $resturant_id = $resturant->id;
            if (!is_dir(base_path().'/public/business_assets/'. $business_id .'/resturant')) {
                mkdir(base_path().'/public/business_assets/'. $business_id .'/resturant');
            }
            if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id)) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id);
            }
            
            if (Input::hasFile('resturantPhoto'))
            {
                $destinationPath = base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id;
                Input::file( 'resturantPhoto' )->move($destinationPath,  $newPhotoName);
           }
        }



            return Redirect::route('resturants.index');
        }

        return Redirect::route('resturants.create')
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
        $resturant = $this->resturant->findOrFail($id);

        return View::make('resturants.show', compact('resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $resturant = $this->resturant->find($id);

        if (is_null($resturant))
        {
            return Redirect::route('resturants.index');
        }

        return View::make('resturants.edit', compact('resturant'));
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
        $validation = Validator::make($input, Resturant::$rules);

        if ($validation->passes())
        {
            $resturant = $this->resturant->find($id);

          if (Input::hasFile('resturantPhoto')){
              $resturantPhoto  = Input::file('resturantPhoto')->getClientOriginalName();
        $resturantPhotoExtension = Input::file('resturantPhoto')->getClientOriginalExtension();
        $newPhotoName = 'photo.' . $resturantPhotoExtension;

        $input['resturantPhoto'] =         $newPhotoName;

  $logged_in_user = Confide::user()->id;

                 $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
                
        $resturant->update($input); 
        if ( $resturant->id )
         {
            $resturant_id = $resturant->id;
            if (!is_dir(base_path().'/public/business_assets/'. $business_id .'/resturant')) {
                mkdir(base_path().'/public/business_assets/'. $business_id .'/resturant');
            }
            if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id)) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id);
            }
            
            if (Input::hasFile('resturantPhoto'))
            {
                $destinationPath = base_path().'/public/business_assets/'.$business_id.'/resturant/'.$resturant_id;
                Input::file( 'resturantPhoto' )->move($destinationPath,  $newPhotoName);
           }
        }

            }
            else
            {
                 $input = input::except('resturantPhoto');
                $resturant->update($input);
            }
            

            return Redirect::route('resturants.show', $id);
        }

        return Redirect::route('resturants.edit', $id)
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
        $this->resturant->find($id)->delete();

        return Redirect::route('resturants.index');
    }

}