<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $userId = $request->get('search');

        $query = Activity::query();

        if ($filter === 'day') {
            $query->whereDate('performed_at', Carbon::today());
        } elseif ($filter === 'month') {
            $query->whereMonth('performed_at', Carbon::now()->month)
                ->whereYear('performed_at', Carbon::now()->year);
        } elseif ($filter === 'year') {
            $query->whereYear('performed_at', Carbon::now()->year);
        }

        $activities = $query->get()->groupBy('user_id')->map(function ($acts) {
            return [
                'user_id' => $acts->first()->user_id,
                'total_points' => $acts->sum('points')
            ];
        })->sortByDesc('total_points')->values();

        $rank = 1;
        $prev_points = null;
        $same_rank_count = 0;

        UserPoint::truncate();

        foreach ($activities as $data) {
            if ($data['total_points'] === $prev_points) {
                $same_rank_count++;
            } else {
                $rank += $same_rank_count;
                $same_rank_count = 1;
            }

            UserPoint::create([
                'user_id' => $data['user_id'],
                'total_points' => $data['total_points'],
                'rank' => $rank,
            ]);

            $prev_points = $data['total_points'];
        }

        $query = UserPoint::with('user')->orderBy('rank');

        if ($userId) {
            $query->whereHas('user', function ($q) use ($userId) {
                $q->where('id', 'like', "%{$userId}%");
            });
        }

        $leaderboard = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.leaderboard_table', compact('leaderboard', 'userId'))->render()
            ]);
        }

        return view('leaderboard', compact('leaderboard'));
    }


    public function recalculate()
    {
        return $this->index(new Request());
    }
}
