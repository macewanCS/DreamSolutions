<!-- this page is shown when a user clicks the extra notes button in View Plan -->
<head>
<link rel="stylesheet" type="text/css" href="/css/goat.history.css"></link>
</head>

<body>
<div id="container" align="center">
@if ( count($changes) === 0)
No changes to display
@else
<table>
    <thead>
        <th>Date</th>
        <th>User</th>
        <th>Change</th>
    </thead>
    <tbody>
        @foreach ($changes as $change)
        <tr>
        <td>{{ $change->created_at }}</td>
        <td>{{ $change->user->name() }}</td>
        <td>{{ ($change->change_type === 'S' ? 'Status: ' : 
                ($change->change_type === 'N' ? 'Note: ' :
                ($change->change_type === 'G' ? '' :
                ($change->change_type === 'L' ? 'Leads: ' :
                ($change->change_type === 'C' ? 'Collaborators: ' :
                ($change->change_type === 'T' ? 'Date ' :
                ($change->change_type === 'D' ? 'Description: ' :
                ($change->change_type === 'P' ? 'Priority: ' :
                '')))))))) . $change->description }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endif
</div>
</body>