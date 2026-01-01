@extends('admin.layout')

@section('title', 'Messages')
@section('page_title', app()->getLocale() === 'ar' ? 'الرسائل' : 'Messages')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">{{ app()->getLocale() === 'ar' ? 'الرسائل الواردة' : 'Incoming Messages' }}</h5>

        <input type="text"
               id="searchMessages"
               placeholder="{{ app()->getLocale() === 'ar' ? 'بحث...' : 'Search...' }}"
               class="form-control w-25">
    </div>

    <div class="table-responsive">
        <table class="table table-hover admin-table" id="messagesTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Name') }}</th>
                    <th>Email</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Project') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Message') }}</th>
                    <th>{{ __('Date') }}</th>
                </tr>
            </thead>

            <tbody>
            @foreach($messages as $i => $msg)
                <tr
                    data-name="{{ strtolower($msg->full_name) }}"
                    data-email="{{ strtolower($msg->email) }}"
                    data-phone="{{ strtolower($msg->phone) }}"
                >
                    <td>{{ $i+1 }}</td>
                    <td>{{ $msg->full_name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->phone }}</td>
                    <td>{{ $msg->project }}</td>
                    <td>{{ $msg->inquiry_type }}</td>
                    <td>{{ strlen($msg->message) > 50 ? substr($msg->message,0,50).'...' : $msg->message }}</td>
                    <td>{{ $msg->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $messages->links() }}
</div>

@endsection

@section('scripts')
<script>
document.getElementById("searchMessages").addEventListener("input", function() {
    let value = this.value.toLowerCase();
    document.querySelectorAll("#messagesTable tbody tr").forEach(row => {
        let name  = row.dataset.name;
        let email = row.dataset.email;
        let phone = row.dataset.phone;
        row.style.display = (name.includes(value) || email.includes(value) || phone.includes(value))
            ? ""
            : "none";
    });
});
</script>
@endsection
