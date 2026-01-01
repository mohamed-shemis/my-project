<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Mail\ClientNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // 1) Validation أساسي
        $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:50',
            'email'        => 'nullable|email|max:255',
            'project'      => 'nullable|string|max:255',
            'unit_type'    => 'nullable|string|max:255',
            'inquiry_type' => 'nullable|string|max:255',
            'message'      => 'required|string',
        ]);

        // 2) حفظ في قاعدة البيانات
        $client = Client::create([
            'full_name'    => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'project'      => $request->project,
            'unit_type'    => $request->unit_type,
            'inquiry_type' => $request->inquiry_type,
            'message'      => $request->message,
        ]);

        // 3) إرسال إيميل إشعار
        try {
            Mail::to('mohamedshemis348@gmail.com')
                ->send(new ClientNotificationMail($client));
        } catch (\Throwable $e) {
            // في حالة أي مشكلة في الإيميل ما يكسرش الفورم
            Log::error('Mail sending failed for client #'.$client->id.' : '.$e->getMessage());
        }

        // 4) رجوع برسالة نجاح
        return back()->with('success', 'تم إرسال رسالتك بنجاح، وسيتم التواصل معك في أقرب وقت.');
    }
}
