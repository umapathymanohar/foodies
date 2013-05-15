<?php

class MenuitemimagesController extends BaseController {

    /**
     * Menuitemimage Repository
     *
     * @var Menuitemimage
     */
    protected $menuitemimage;

    public function __construct(Menuitemimage $menuitemimage)
    {
        $this->menuitemimage = $menuitemimage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($item_id)
    {
        $menuitemimages = $this->menuitemimage->where('item_id', '=', $item_id)->get();

        return View::make('menuitemimages.index', compact('menuitemimages'))->with('item_id', $item_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($item_id)
    {
        return View::make('menuitemimages.create')->with('item_id', $item_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( $item_id)
    {
     // $input = Input::except('itemImageName');
     // $validation = Validator::make($input, Menuitemimage::$rules);

     // if ($validation->passes())
     // {

echo $item_id;
     //     $logged_in_user = Confide::user()->id;
     //     $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
     //     $category_id = Menuitem::where('id', '=', $item_id)->first()->category_id;  
     //     $restaurant_id = Menucategory::where('id', '=', $category_id)->first()->restaurant_id;  



     //     if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id)) {
     //        mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id);
     //    }


     //    if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id . '/items')) {
     //        mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id. '/items');
     //    }


     //    if (Input::hasFile('itemImageName'))
     //    {
     //        $destinationPath = base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id. '/items';

     //        foreach((array) Input::file( 'itemImageName' ) as $file) {

     //         $itemImage = $this->menuitemimage->create($input);

     //         if ($itemImage->id){

     //             $itemImageExtension  =  $file->getClientOriginalExtension();
     //             $itemImage = Menuitemimage::find($itemImage->id);
     //             $itemImage->itemImageName =  $itemImage->id . '.' .  $itemImageExtension;
     //             $itemImage->save();

     //         }

     //         $file->move($destinationPath,  $itemImage->id .  '.' . $itemImageExtension);

     //     }
     // }

     //return Redirect::route('item.images.index', $item_id);
 //}

 // return Redirect::route('item.images.create', $item_id)
 // ->withInput()
 // ->withErrors($validation)
 // ->with('flash', 'There were validation errors.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($item_id, $image_id)
    {
        $menuitemimage = $this->menuitemimage->findOrFail($image_id);

        return View::make('menuitemimages.show', compact('menuitemimage'))->with('image_id', $image_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($item_id, $image_id)
    {
        $menuitemimage = $this->menuitemimage->find($image_id);

        if (is_null($menuitemimage))
        {
            return Redirect::route('item.images.index', $image_id);
        }

        return View::make('menuitemimages.edit', compact('menuitemimage'))->with('image_id', $image_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($item_id, $image_id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Menuitemimage::$rules);

        if ($validation->passes())
        {



             if (Input::hasFile('itemImageName')) {



             $logged_in_user = Confide::user()->id;
             $business_id = Business::where('user_id', '=', $logged_in_user)->first()->id;  
             $category_id = Menuitem::where('id', '=', $item_id)->first()->category_id;  
             $restaurant_id = Menucategory::where('id', '=', $category_id)->first()->restaurant_id;  



             if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id)) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id);
            }


            if (!is_dir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id . '/items')) {
                mkdir(base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id. '/items');
            }


            if (Input::hasFile('itemImageName'))
            {
                $destinationPath = base_path().'/public/business_assets/'.$business_id.'/restaurant/'.$restaurant_id. '/items';
        $file = Input::file( 'itemImageName' );
               
               $itemImageExtension  =  $file->getClientOriginalExtension();
                  
               

                $file->move($destinationPath,  $image_id .  '.' . $itemImageExtension, true);

             
         }


     }




    return Redirect::route('item.images.show', array($item_id, $image_id));


 }

 return Redirect::route('item.images.edit', array($item_id, $image_id))
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
    public function destroy($item_id, $image_id)
    {
        $this->menuitemimage->find($image_id)->delete();

        return Redirect::route('item.images.index', array($item_id));
    }

}