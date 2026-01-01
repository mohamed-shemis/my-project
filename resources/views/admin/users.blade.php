@extends('admin.layout')

@section('title', 'Users')
@section('page_title', 'Users')

@section('content')

<div class="admin-card">

    {{-- Search bar --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0">All Users</h4>

        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
            <input id="searchInput" type="text" class="form-control"
                   placeholder="Search name or email...">
        </div>
    </div>

    {{-- Table --}}
    <table class="table table-bordered align-middle" id="usersTable">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Verified</th>
            <th>Role</th>
            <th>Date</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $i => $u)
            <tr data-name="{{ strtolower($u->name) }}"
                data-email="{{ strtolower($u->email) }}">

                <td>{{ $i+1 }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->phone }}</td>

                <td>
                    @if($u->email_verified_at)
                        <span class="badge badge-success">Verified</span>
                    @else
                        <span class="badge badge-danger">Pending</span>
                    @endif
                </td>

                <td>
                    @if($u->is_admin)
                        <span class="badge badge-admin">Admin</span>
                    @else
                        <span class="badge badge-user">User</span>
                    @endif
                </td>

                <td>{{ $u->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('scripts')
<script>
document.getElementById("searchInput").addEventListener("input", function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#usersTable tbody tr");

    rows.forEach(row => {
        let name = row.dataset.name;
        let email = row.dataset.email;
        row.style.display = (name.includes(value) || email.includes(value)) ? "" : "none";
    });
});
</script>
@endsection
