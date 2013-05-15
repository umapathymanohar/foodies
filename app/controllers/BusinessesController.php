<?php

class BusinessesController extends BaseController {

    /**
     * Business Repository
     *
     * @var Business
     */
    protected $business;

    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user_id = Confide::user()->id;
        $businesses = $this->business->where('user_id',  $user_id)->first();
        if ($businesses){


             return Redirect::route('businesses.edit', $businesses->id);
        
        }
        else
        {
            return View::make('businesses.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {



        $input = Input::all();

        $businessLogo  = Input::file('businessLogo')->getClientOriginalName();
        $businessLogoExtension = Input::file('businessLogo')->getClientOriginalExtension();
        $newLogoName = 'logo.' . $businessLogoExtension;

        $input['businessLogo'] =         $newLogoName;

        
        $validation = Validator::make($input, Business::$rules);
        if ($validation->passes())
        {
         $business = $this->business->create($input);
         if ( $business->id )
         {
            $business_id = $business->id;
            if (!is_dir(base_path().'/public/business_assets/' . $business_id )) {
                mkdir(base_path().'/public/business_assets/' . $business_id);

            }
            if (Input::hasFile('businessLogo'))
            {
                $destinationPath = base_path(). '/public/business_assets/' . $business_id ;
                Input::file( 'businessLogo' )->move($destinationPath,  $newLogoName);

           }

        }


        return Redirect::route('businesses.index');
    }

    return Redirect::route('businesses.create')
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
        $business = $this->business->findOrFail($id);

        return View::make('businesses.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $business = $this->business->find($id);

        if (is_null($business))
        {
            return Redirect::route('businesses.index');
        }

        return View::make('businesses.edit', compact('business'));
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

        $validation = Validator::make($input, Business::$rules);

        if ($validation->passes())
        {
            $business = $this->business->find($id);

        if (Input::hasFile('businessLogo')) {


            $businessLogo  = Input::file('businessLogo')->getClientOriginalName();
            $businessLogoExtension = Input::file('businessLogo')->getClientOriginalExtension();
            $newLogoName = 'logo.' . $businessLogoExtension;

            $input['businessLogo'] =         $newLogoName;



            $business->update($input);


            $business_id = $business->id;
            if (!is_dir(base_path().'/public/business_assets/' . $business_id )) {
                mkdir(base_path().'/public/business_assets/' . $business_id);

            }
            if (Input::hasFile('businessLogo'))
            {
                $destinationPath = base_path(). '/public/business_assets/' . $business_id ;
                Input::file( 'businessLogo' )->move($destinationPath,  $newLogoName);

           }
           
        }
        else
        {
            $input = input::except('businessLogo');
            $business->update($input);   
        }

            // return Redirect::route('businesses.show', $id);
        return Redirect::route('businesses.edit', $id);
        }

        return Redirect::route('businesses.edit', $id)
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
        $this->business->find($id)->delete();

        return Redirect::route('businesses.index');
    }

}