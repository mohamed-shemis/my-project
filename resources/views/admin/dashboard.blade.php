@extends('admin.layout')

@section('title', app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard')
@section('page_title', app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Dashboard')

@section('content')

<div class="admin-dashboard">

    {{-- رأس الصفحة --}}
    <div class="admin-dashboard-header d-flex justify-content-between align-items-start mb-3">
        <div>
            <h3 class="mb-1">
                {{ app()->getLocale() === 'ar'
                    ? 'مرحباً في لوحة تحكم مجموعة العمار'
                    : 'Welcome to El Amar Admin Panel' }}
            </h3>
            <p class="text-muted small mb-0">
                {{ app()->getLocale() === 'ar'
                    ? 'نظرة سريعة على حالة العملاء والرسائل والنشاط الشهري.'
                    : 'Quick overview of users, messages and monthly activity.' }}
            </p>
        </div>

        <div>
            <select class="form-select form-select-sm">
                <option>{{ app()->getLocale() === 'ar' ? 'آخر 12 شهر' : 'Last 12 months' }}</option>
                <option>{{ app()->getLocale() === 'ar' ? 'آخر 6 أشهر' : 'Last 6 months' }}</option>
                <option>{{ app()->getLocale() === 'ar' ? 'هذا الشهر' : 'This month' }}</option>
            </select>
        </div>
    </div>

    {{-- الكروت --}}
    <div class="row g-3 mb-3">

        <div class="col-md-4">
            <div class="admin-card d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small mb-1">
                        {{ app()->getLocale() === 'ar' ? 'إجمالي المستخدمين' : 'Total Users' }}
                    </p>
                    <h3 class="mb-0">{{ $usersCount }}</h3>
                </div>
                <div class="fs-3 text-primary">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-card d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small mb-1">
                        {{ app()->getLocale() === 'ar' ? 'الرسائل الواردة' : 'Messages' }}
                    </p>
                    <h3 class="mb-0">{{ $messagesCount }}</h3>
                </div>
                <div class="fs-3 text-success">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="admin-card d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small mb-1">
                        {{ app()->getLocale() === 'ar' ? 'الطلبات المسجلة' : 'Requests' }}
                    </p>
                    <h3 class="mb-0">{{ $requestsCount }}</h3>
                </div>
                <div class="fs-3 text-warning">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- الجرافيك + ملخص سريع --}}
    <div class="row g-3">

        <div class="col-lg-8">
            <div class="admin-card" style="min-height: 280px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <h5 class="mb-0">
                            {{ app()->getLocale() === 'ar' ? 'المستخدمين الجدد شهرياً' : 'New users per month' }}
                        </h5>
                        <small class="text-muted">
                            {{ app()->getLocale() === 'ar'
                                ? 'تطور التسجيلات على مدار الشهور.'
                                : 'User growth over time.' }}
                        </small>
                    </div>
                </div>

                <div style="position:relative; height:220px;">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card h-100">
                <h5 class="mb-3">
                    {{ app()->getLocale() === 'ar' ? 'ملخص سريع' : 'Quick Summary' }}
                </h5>
                <ul class="list-unstyled small mb-3">
                    <li class="d-flex justify-content-between py-1 border-bottom">
                        <span class="text-muted">
                            {{ app()->getLocale() === 'ar' ? 'آخر تسجيل مستخدم' : 'Last user signup' }}
                        </span>
                        <span>
                            {{-- ممكن لاحقاً نجيبها من الكونترولر --}}
                            —
                        </span>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                        <span class="text-muted">
                            {{ app()->getLocale() === 'ar' ? 'أعلى شهر نشاطاً' : 'Most active month' }}
                        </span>
                        <span>—</span>
                    </li>
                    <li class="d-flex justify-content-between py-1">
                        <span class="text-muted">
                            {{ app()->getLocale() === 'ar' ? 'متوسط مستخدمين شهرياً' : 'Avg users / month' }}
                        </span>
                        <span>—</span>
                    </li>
                </ul>
                <p class="text-muted small mb-0">
                    {{ app()->getLocale() === 'ar'
                        ? 'يمكن لاحقاً ربط هذه البيانات بتقارير أكثر تفصيلاً أو فلاتر زمنيّة.'
                        : 'Later you can connect these numbers to detailed reports and date filters.' }}
                </p>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>
    const ctx = document.getElementById('usersChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: "{{ app()->getLocale() === 'ar' ? 'المستخدمين الجدد' : 'New Users' }}",
                    data: @json($chartData),
                    borderWidth: 3,
                    borderColor: '#032642',
                    backgroundColor: 'rgba(3, 38, 66, 0.12)',
                    pointBackgroundColor: '#b09e85',
                    pointRadius: 4,
                    fill: true,
                    tension: 0.35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#032642',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                    }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' }
                    }
                }
            }
        });
    }
</script>
@endsection
