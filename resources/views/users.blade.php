<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin – Users</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    <style>
        .admin-wrapper{max-width:1200px;margin:30px auto;padding:20px;}
        .admin-card{background:#fff;border-radius:12px;padding:20px;}
        table{width:100%;border-collapse:collapse;margin-top:15px;}
        th,td{padding:10px;border-bottom:1px solid #eee;font-size:14px;text-align:left;}
        th{background:#f5f5f5;}
        .badge-admin{background:#27ae60;color:#fff;padding:3px 7px;border-radius:6px;font-size:11px;}
        .badge-user{background:#aaa;color:#fff;padding:3px 7px;border-radius:6px;font-size:11px;}
    </style>
</head>
<body>

    <main class="admin-wrapper">
        <section class="admin-card">
            <h1>Users List</h1>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>

                <tbody>
                @php $i = $users->firstItem(); @endphp

                @foreach($users as $u)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>
                            @if($u->is_admin)
                                <span class="badge-admin">Admin</span>
                            @else
                                <span class="badge-user">User</span>
                            @endif
                        </td>
                        <td>{{ $u->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div style="margin-top:15px;">
                {{ $users->links() }}
            </div>

        </section>
    </main>

</body>
</html>
