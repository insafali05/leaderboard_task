@forelse ($leaderboard as $entry)
<tr class="{{ request('search') == $entry->user_id ? 'highlight-row' : '' }}">
    <td>{{ $entry->rank }}</td>
    <td>{{ $entry->user->id }}</td>
    <td>{{ $entry->user->full_name }}</td>
    <td>{{ $entry->total_points }}</td>
</tr>
@empty
<tr>
    <td colspan="4" class="text-center text-white">No results found.</td>
</tr>
@endforelse