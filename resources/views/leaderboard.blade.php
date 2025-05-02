@extends('layouts.app')

@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4 text-center">🏆 Leaderboard</h2>

    <!-- Flash message -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filters & Search -->
    <form method="GET" action="{{ route('leaderboard.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="filter" class="form-select">
                <option value="">All Time</option>
                <option value="day" {{ request('filter') == 'day' ? 'selected' : '' }}>Today</option>
                <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>This Month</option>
                <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>This Year</option>
            </select>
        </div>

        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search by User ID" value="{{ request('search') }}">
        </div>

        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-primary">🔍 Filter</button>
        </div>

        <div class="col-md-3 d-grid">
            <a href="{{ route('leaderboard.recalculate') }}" class="btn btn-warning">🔄 Recalculate</a>
        </div>
    </form>

    <!-- Leaderboard Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>🏅 Rank</th>
                    <th>🆔 User ID</th>
                    <th>👤 Full Name</th>
                    <th>✨ Total Points</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leaderboard as $entry)
                <tr class="{{ request('search') == $entry->user_id ? 'table-success' : '' }}">
                    <td>{{ $entry->rank }}</td>
                    <td>{{ $entry->user->id }}</td>
                    <td>{{ $entry->user->full_name }}</td>
                    <td>{{ $entry->total_points }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No results found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection