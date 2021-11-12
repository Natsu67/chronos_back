<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function getCalendarsForUser(Request $request)
    {
        if(!$this->check_auth($request)) {
            return response("Forbidden", 403);
        }

        return \DB::select("select * from calendars where user_id = ".$this->get_auth($request)->id);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function getCalendar(Request $request, $id)
    {

        if(!$calendar = Calendar::find($id))
            return response("Calendar not found", 404);

        if(!$this->check_auth($request)) {
            return response("You have no auth", 401);
        }

        if($this->get_auth($request)->id == $calendar->user_id) {
            return $calendar;
        }

        return response("Something wring", 403);

    }
        /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if(!$calendar = Calendar::find($id)) {
            return response("Calendar not found", 404);
        }

        if(!$this->check_auth($request)) {
            return response("You have no auth", 401);
        }

        if($this->get_auth($request)->id == $calendar->user_id) {
            $validated = $request->validate([
                'title'=> 'string',
                'description'=> 'string',
            ]);

            $calendar->update($validated);
            return $calendar;
        }

        return response("Something wring", 403);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if(!$calendar = Calendar::find($id)) {
            return response("Calendar not found", 404);
        }

        if(!$this->check_auth($request)) {
            return response("You have no auth", 401);
        }

        if($this->get_auth($request)->id == $calendar->user_id) {
            return Calendar::destroy($id);
        }
    }
}
