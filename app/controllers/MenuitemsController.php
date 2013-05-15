<?php

class MenuitemsController extends BaseController {

    /**
     * Menuitem Repository
     *
     * @var Menuitem
     */
    protected $menuitem;

    public function __construct(Menuitem $menuitem)
    {
        $this->menuitem = $menuitem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($category_id)
    {
        
        $menuitems = $this->menuitem->where('category_id', '=', $category_id)->orderBy('itemPosition', 'desc')->get();

        return View::make('menuitems.index', compact('menuitems'))->with('category_id', $category_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($categories_id)
    {
        return View::make('menuitems.create')->with('categories_id', $categories_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($category_id)
    {
        $input = Input::all();
        $validation = Validator::make($input, Menuitem::$rules);

        if ($validation->passes())
        {
            $menuItem = $this->menuitem->create($input);
            $menuItem->itemPosition = $menuItem->id;
            $menuItem->save();


                  if($menuItem->id){

                if ($menuItem->category_id){
                
                    $menuItemAvailability = Menuitemavailability::where('available_id', $menuItem->category_id)->first();

                    $menuitem = Menuitem::find($menuItem->id);

                    $menuitem->menuitemavailability()->create(['availMonday' => $menuItemAvailability->availMonday, 'availTuesday' => $menuItemAvailability->availTuesday, 'availWednesday' => $menuItemAvailability->availWednesday, 'availThursday' => $menuItemAvailability->availThursday, 'availFriday' => $menuItemAvailability->availFriday, 'availSaturday' => $menuItemAvailability->availSaturday, 'availSunday' => $menuItemAvailability->availSunday]);

                }

            }

            return Redirect::route('categories.menuitems.index', $category_id);
        }

        return Redirect::route('categories.menuitems.create', $category_id)
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
    public function show($category_id, $menuitem_id)
    {
        $menuitem = $this->menuitem->findOrFail($menuitem_id);

        return View::make('menuitems.show', compact('menuitem'))->with('category_id', $category_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($category_id, $menuitem_id)
    {
        $menuitem = $this->menuitem->find($menuitem_id);

        if (is_null($menuitem))
        {
            return Redirect::route('categories.menuitems.index', $category_id);
        }

        return View::make('menuitems.edit', compact('menuitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($category_id, $menuitem_id)
    {

         $input = array_except( Input::except('availMonday', 'availTuesday', 'availWednesday', 'availThursday', 'availFriday', 'availSaturday', 'availSunday'), '_method');
        $validation = Validator::make($input, Menuitem::$rules);

        if ($validation->passes())
        {
              $menuitem = $this->menuitem->find($menuitem_id);
            $menuitem->update($input);

            $input = array_except( Input::only('availMonday', 'availTuesday', 'availWednesday', 'availThursday', 'availFriday', 'availSaturday', 'availSunday'), '_method');
            
            $menuitemavailability = Menuitemavailability::where('available_id', $menuitem_id)->where('available_type', 'Menuitem')->first();
            $menuitemavailability->update($input);
 
            return Redirect::route('categories.menuitems.index', array($category_id));
        }

        return Redirect::route('categories.menuitems.edit', array($category_id, $menuitem_id))
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


     public function change_items_order($item_id, $move)
    {
        $currentItemID = $item_id;

        $currentItem = $this->menuitem->find($item_id);

        $currentItemOrder = $currentItem->itemPosition;
        $category_id = $currentItem->category_id;
        

        if ($move == 'up') {

            $nextItemOrder = Menuitem::where('category_id', '=', $category_id)->where('itemPosition', '>', $currentItemOrder)->min('itemPosition');
            $swapItemOrder = $nextItemOrder;

            if (isset($nextItemOrder))
            {

                $nextItem = $this->menuitem->where('category_id', '=', $category_id)->where('itemPosition', '=', $nextItemOrder)->first();
                $swapItem = $nextItem;

            }


        } elseif ($move == 'down') {

           
            $previousItemOrder = Menuitem::where('category_id', '=', $category_id)->where('itemPosition', '<', $currentItemOrder)->max('itemPosition');
            $swapItemOrder = $previousItemOrder;
            if (isset($previousItemOrder))
            {

                $previousItem = $this->menuitem->where('category_id', '=', $category_id)->where('itemPosition', '=', $previousItemOrder)->first();
                $swapItem = $previousItem;

            }
        }

        if (isset($swapItemOrder)){
            $currentItem->itemPosition = $swapItemOrder;
            $currentItem->save();
            $swapItem->itemPosition = $currentItemOrder;
            $swapItem->save();
        }

           return Redirect::route('categories.menuitems.index', $category_id);
        
        
    }

    public function destroy($item_id, $menuitem_id)
    {
        $this->menuitem->find($menuitem_id)->delete();

        return Redirect::route('categories.menuitems.index', $item_id);
    }

}