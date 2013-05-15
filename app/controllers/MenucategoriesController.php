<?php

class MenucategoriesController extends BaseController {

    /**
     * Menucategory Repository
     *
     * @var Menucategory
     */
    protected $menucategory;

    public function __construct(Menucategory $menucategory)
    {
        $this->menucategory = $menucategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($restaurant_id)
    {

        $menucategories= $this->menucategory->tree($restaurant_id);
        return View::make('menucategories.index', compact('menucategories'))->with('restaurant_id', $restaurant_id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($restaurant_id)
    {
        return View::make('menucategories.create')->with('restaurant_id',$restaurant_id);
    }


    public function createsubmenu($restaurant_id, $category_id)
    {
        return View::make('menucategories.create')->with(array('restaurant_id' => $restaurant_id, 'category_id' => $category_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($restaurant_id)
    {
        $input = Input::all();
        $validation = Validator::make($input, Menucategory::$rules);

        if ($validation->passes())
        {
            $category  = $this->menucategory->create($input);
            $category->categoryPosition = $category->id;
            $category->save();

            if($category->id){

                if ($category->parent_id == 0){
                $menucategory = Menucategory::find($category->id);
                $menucategory->menuitemavailability()->create(['availMonday' => 1]);
                }
                else
                {

                    $parentCategoryAvailability = Menuitemavailability::where('available_id', $category->parent_id)->first();

                    $menucategory = Menucategory::find($category->id);

                    $menucategory->menuitemavailability()->create(['availMonday' => $parentCategoryAvailability->availMonday, 'availTuesday' => $parentCategoryAvailability->availTuesday, 'availWednesday' => $parentCategoryAvailability->availWednesday, 'availThursday' => $parentCategoryAvailability->availThursday, 'availFriday' => $parentCategoryAvailability->availFriday, 'availSaturday' => $parentCategoryAvailability->availSaturday, 'availSunday' => $parentCategoryAvailability->availSunday]);

                }

            }


           return Redirect::route('restaurant.menucategories.index', $restaurant_id);
        }

        return Redirect::route('restaurant.menucategories.create', $restaurant_id)
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
    public function show($restaurant_id, $menucategories_id)
    {
        $menucategory = $this->menucategory->findOrFail($menucategories_id);

        return View::make('menucategories.show', compact('menucategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($restaurant_id, $menucategories_id)
    {
        $menucategory = $this->menucategory->find($menucategories_id);

        if (is_null($menucategory))
        {
            return Redirect::route('restaurant.menucategories.index', $restaurant_id);
        }

        return View::make('menucategories.edit', compact('menucategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($restaurant_id, $menucategories_id)
    {

        $input = array_except( Input::except('availMonday', 'availTuesday', 'availWednesday', 'availThursday', 'availFriday', 'availSaturday', 'availSunday'), '_method');
        $validation = Validator::make($input, Menucategory::$rules);

        if ($validation->passes())
        {
            $menucategory = $this->menucategory->find($menucategories_id);
            $menucategory->update($input);

            $input = array_except( Input::only('availMonday', 'availTuesday', 'availWednesday', 'availThursday', 'availFriday', 'availSaturday', 'availSunday'), '_method');
            
            $menuitemavailability = Menuitemavailability::where('available_id', $menucategories_id)->where('available_type', 'Menucategory')->first();
            $menuitemavailability->update($input);


           return Redirect::route('restaurant.menucategories.show', array($restaurant_id, $menucategories_id));
        }

        return Redirect::route('restaurant.menucategories.edit',  array($restaurant_id, $menucategories_id))
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

    public function change_category_order($category_id, $move)
    {
        $currentCategoryID = $category_id;

        $currentCategory = $this->menucategory->find($category_id);

        $currentCategoryOrder = $currentCategory->categoryPosition;
        $restaurant_id = $currentCategory->restaurant_id;
        $parent_id = $currentCategory->parent_id;


        if ($move == 'up') {

            $nextCategoryOrder = Menucategory::where('parent_id', '=', $parent_id)->where('restaurant_id', '=', $restaurant_id)->where('categoryPosition', '>', $currentCategoryOrder)->min('categoryPosition');
            $swapCategoryOrder = $nextCategoryOrder;

            if (isset($nextCategoryOrder))
            {

                $nextCategory = $this->menucategory->where('parent_id', '=', $parent_id)->where('restaurant_id', '=', $restaurant_id)->where('categoryPosition', '=', $nextCategoryOrder)->first();
                $swapCategory = $nextCategory;

            }


        } elseif ($move == 'down') {

           
            $previousCategoryOrder = Menucategory::where('parent_id', '=', $parent_id)->where('restaurant_id', '=', $restaurant_id)->where('categoryPosition', '<', $currentCategoryOrder)->max('categoryPosition');
            $swapCategoryOrder = $previousCategoryOrder;
            if (isset($previousCategoryOrder))
            {

                $previousCategory = $this->menucategory->where('parent_id', '=', $parent_id)->where('restaurant_id', '=', $restaurant_id)->where('categoryPosition', '=', $previousCategoryOrder)->first();
                $swapCategory = $previousCategory;

            }
        }

        if (isset($swapCategoryOrder)){
            $currentCategory->categoryPosition = $swapCategoryOrder;
            $currentCategory->save();
            $swapCategory->categoryPosition = $currentCategoryOrder;
            $swapCategory->save();
        }

        return Redirect::route('restaurant.menucategories.index',  array($restaurant_id));
        
    }

    public function destroy($restaurant_id, $menucategories_id)
    {

         $category = $this->menucategory->find($menucategories_id);

        if ($category->parent_id == 0) {
            $children = $this->menucategory->where('parent_id', '=', $menucategories_id)->get();

            foreach ($children as $child) {
                $child->parent_id = 0;
                $child->save();
            } 
        }
        $this->menucategory->find($menucategories_id)->delete();
        

        return Redirect::route('restaurant.menucategories.index',  array($restaurant_id));
    }

}