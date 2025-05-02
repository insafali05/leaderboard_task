@extends('layouts.app')

@section('content')
<div class="card shadow p-4">

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" id="filterForm" action="{{ route('leaderboard.index') }}">
        <div class="row g-3 mb-4 justify-content-center">
            <div class="col-4 d-grid">
                <a href="{{ route('leaderboard.recalculate') }}" class="btn btn-light"> Recalculate</a>
            </div>
        </div>

        <div class="row g-3 mb-4 justify-content-center">
            <div class="col-6">
                <input type="text" name="search" class="form-control" placeholder="Search by User ID" value="{{ request('search') }}">
            </div>
            <div class="col-4 d-grid">
                <button type="submit" class="btn btn-light">Filter</button>
            </div>
        </div>

        <div class="row g-3 mb-4 justify-content-end">
            <div class="col-5">
                <select name="filter" class="form-select">
                    <option value="">Sort by Day</option>
                    <option value="day" {{ request('filter') == 'day' ? 'selected' : '' }}>Today</option>
                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>This Month</option>
                    <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>This Year</option>
                </select>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-dark table-bordered align-middle">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Total Points</th>
                </tr>
            </thead>
            <tbody id="leaderboard-data">
                @include('partials.leaderboard_table', ['leaderboard' => $leaderboard, 'userId' => request('search')])
            </tbody>
        </table>

    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('select[name="filter"], input[name="search"]').on('change keyup', function() {
        let filter = $('select[name="filter"]').val();
        let search = $('input[name="search"]').val();

        $.ajax({
            url: "{{ route('leaderboard.index') }}",
            type: "GET",
            data: {
                filter: filter,
                search: search
            },
            success: function(res) {
                $('#leaderboard-data').html(res.html);
            },
            error: function() {
                alert('Something went wrong!');
            }
        });
    });
</script>
@endpush