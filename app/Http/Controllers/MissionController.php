<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Mission;
//import auth
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class MissionController extends Controller
{
/**
 * Handle the creation of a new mission.
 *
 * Validates the incoming request data, creates a new mission entry
 * in the database, and returns a JSON response indicating success
 * or failure.
 *
 * @param Request $request The HTTP request instance containing mission data.
 * @return \Illuminate\Http\JsonResponse JSON response with creation status.
 */
    //
    public function create(Request $request){


        $validatedData = $request->validate([
            'title' => 'required|min:4|string',
            'preority' => 'required|min:1|max:2|integer',
            'publisher' => 'required|string',
        ]);
        $creating = Mission::create([
            'title' => $validatedData['title'],
            'preority' => $validatedData['preority'],
            'publisher' => $validatedData['publisher'],
            'finished' => 0,
        ]);
        if($creating){
            return response()->json(['status' => '1 Row Created'],201);

        }else{
            return response()->json(['status' => 'Error'],500);
        }
    }


/**
 * Retrieve and display missions for the authenticated user.
 *
 * Fetches missions from the database where the publisher matches
 * the currently authenticated user's name and returns a view
 * to display these missions.
 *
 * @return \Illuminate\View\View The view displaying the user's missions.
 */
    public function fetch(){
        $authenticatedUser = Auth::user();

        $missions = Mission::where('publisher',$authenticatedUser->name)->get();
        return view('show',compact('missions'));
    }


    //Update
    /**
     * Update a mission to mark it as finished.
     *
     * Retrieves a mission with the given ID from the database, marks it as
     * finished by setting the `finished` column to 1, and returns a JSON
     * response indicating success or failure.
     *
     * @param Request $request The HTTP request instance containing the mission ID.
     * @return \Illuminate\Http\JsonResponse JSON response with update status.
     */
    public function update(Request $request){
        $id = $request->id;
        $mission = Mission::find($id);
        if($mission){
            // Mark the mission as finished
            $mission->update([
                'finished' => 1,
            ]);
            return response()->json(['status' => '1 Row Updated'],201);
        } else {
            // Return an error if the mission could not be found
            return response()->json(['status' => 'Error'],500);
        }
    }





    
    //Delete

    /**
     * Delete a mission.
     *
     * Retrieves a mission with the given ID from the database and deletes it.
     * Returns a JSON response indicating success or failure.
     *
     * @param Request $request The HTTP request instance containing the mission ID.
     * @return \Illuminate\Http\JsonResponse JSON response with delete status.
     */
    public function delete(Request $request){
        $id = $request->id;
        $delete = Mission::find($id)->delete();
        if($delete){
            return response()->json(['status' => '1 Row Deleted'],201);
        }else{
            return response()->json(['status' => 'Error'],500);
        }
    }
    public function logout(Request $request)
{
    //logout logic
    Auth::logout();
     return redirect()->route('login');
}
}
