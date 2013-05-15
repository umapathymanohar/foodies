<?php

class MenuitemavailabilitiesController extends BaseController {

    /**
     * Menuitemavailability Repository
     *
     * @var Menuitemavailability
     */
    protected $menuitemavailability;

    public function __construct(Menuitemavailability $menuitemavailability)
    {
        $this->menuitemavailability = $menuitemavailability;
    }



    public function edit($id, $section_id)
    {

        $menuitemavailability = $this->menuitemavailability->where('available_id', $section_id)->first();

        if ($menuitemavailability->available_type == "Menucategory"){


            $menuCategory = Menucategory::find($section_id);

            $menuCategoryavailability = $menuCategory->menuitemavailability()->first();


            if (is_null($menuitemavailability))
            {
            //return Redirect::route('restaurant.menucategories.index', $category_id);
            }

            return View::make('menuitemavailabilities.edit', compact('menuitemavailability'));


        }

        else {


            $menuItem = Menuitem::find($section_id);

            $menuitemavailability = $menuItem->menuitemavailability()->first();


            if (is_null($menuitemavailability))
            {
            //return Redirect::route('restaurant.menucategories.index', $category_id);
            }

            return View::make('menuitemavailabilities.edit', compact('menuitemavailability'));


        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, $section_id)
    {

        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Menuitemavailability::$rules);

        if ($validation->passes())
        {
            echo $menuitemavailability = Menuitemavailability::find($id);
            //$menuitemavailability->update($input);

            if ($menuitemavailability->available_type == "Menucategory"){
                return Redirect::route('restaurants.index');

            }
            else
            {

                return Redirect::route('restaurants.index');

            }

            
        }

        return Redirect::route('section.availability.edit', array($id, $section_id))
        ->withInput()
        ->withErrors($validation)
        ->with('flash', 'There were validation errors.');
    }



}