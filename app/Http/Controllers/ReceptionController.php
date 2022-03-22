<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Card;
use App\Http\Requests\UserCheckInReceptionRequest;
use App\Http\Resources\UserCheckedInReceptionResource;

class ReceptionController extends Controller
{
    /**
     * Check in a user to a gym
     *
     * @param App\Http\Requests\UserCheckInReceptionRequest $request
     */
    public function checkIn(UserCheckInReceptionRequest $request)
    {
        $card = Card::where('card_uuid', $request->card_uuid)->first();
        $gym = Gym::where('gym_uuid', $request->object_uuid)->first();
        $user = $card->user;
        if (!$user) {
            return response()->json(['message' => 'User not found!'], 404);
        }
        if ($user->hasUsedCardToday()) {
            return response()->json(['message' => 'User has already checked in today!'], 400);
        }
        $card->visits()->attach($gym->id);
        return (new UserCheckedInReceptionResource($user, $gym))->response()->setStatusCode(200);
    }
}
