@extends('admin.layout')

@section('title', 'Requests')
@section('page_title', app()->getLocale() === 'ar' ? 'الطلبات' : 'Requests')

@section('content')

<div class="admin-card">
    <h5 class="mb-3">
        {{ app()->getLocale() === 'ar' ? 'طلبات العملاء' : 'Customer Requests' }}
    </h5>

    <div class="table-responsive">
        <table class="table table-hover admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Name') }}</th>
                    <th>Email</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Project') }}</th>
                    <th>{{ __('Unit') }}</th>
                    <th>{{ __('Date') }}</th>
                </tr>
            </thead>

            <tbody>
            @foreach($requests as $i => $r)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $r->full_name }}</td>
                    <td>{{ $r->email }}</td>
                    <td>{{ $r->phone }}</td>
                    <td>{{ $r->project }}</td>
                    <td>{{ $r->unit_type }}</td>
                    <td>{{ $r->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $requests->links() }}
</div>

@endsection
