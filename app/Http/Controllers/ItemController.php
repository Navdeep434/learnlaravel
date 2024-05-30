<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    // public function getItemTypes()
    // {
    //     return view('your-view-name', compact('itemTypes'));
    // }
    public function saveItem(Request $request)
    {
        // Validate the request data
        $request->validate([
            'requestText' => 'required|string',
            'requestTypes' => 'required|array',
            'requestTypes.*' => 'integer', 
        ]);

        // Save the item to the database
        $requestData = $request->all();
        $item = new Item();
        $item->users = $requestData['requestText'];
        $item->Requested_type = $requestData['requestTypes'];
        $item->itemType = $requestData['requestType'];
        $item->Updated_on = now();
        $item->created_on = now();
        $item->save();

        // Return a success response
        return response()->json(['message' => 'Item saved successfully'],);

    }
}

