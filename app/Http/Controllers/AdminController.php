<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * إحصائيات عدد المستخدمين لكل شهر (للجرافيك)
     */
    private function getUserStats(): array
    {
        $stats = User::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as ym, COUNT(*) as total')
            ->groupBy('ym')
            ->orderBy('ym')
            ->get();

        return [
            'labels' => $stats->pluck('ym')->toArray(),
            'data'   => $stats->pluck('total')->toArray(),
        ];
    }

    /**
     * Dashboard
     */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'usersCount'    => User::count(),
            'messagesCount' => Client::count(),
            'requestsCount' => Client::whereNotNull('project')->count(),
            'chartLabels'   => $this->getUserStats()['labels'],
            'chartData'     => $this->getUserStats()['data'],
        ]);
    }

    /**
     * Users List
     */
    public function users()
    {
        return view('admin.users', [
            'users' => User::orderBy('id', 'desc')->paginate(20),
        ]);
    }

    /**
     * Messages Page (كل العملاء)
     */
    public function messages()
    {
        $messages = Client::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.messages', compact('messages'));
    }

    /**
     * Requests Page (العملاء الذين لديهم project)
     */
    public function requests()
    {
        $requests = Client::whereNotNull('project')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.requests', compact('requests'));
    }
}
