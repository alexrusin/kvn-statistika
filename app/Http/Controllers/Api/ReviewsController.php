<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController
{
    public function getUserTeamReview(Request $request, $teamId)
    {
        $review = Auth::user()
            ->reviews()
            ->where('team_id', $teamId)
            ->first();

        if ($review) {
            return response(['review' => $review], 200);
        } else {
            return response('Team not found', 404);
        }
    }

    public function save(Request $request, $teamId)
    {
        $request->validate([
            'rating' => ['required']
        ]);

        Review::updateOrCreate([
            'user_id' => Auth::id(),
            'team_id' => $teamId
        ], [
            'body' => $request->body,
            'rating' => $request->rating
        ]);

        return response(['message' => 'Оценка сохранена', 'alertType' => 'success'], 200);
    }
}
