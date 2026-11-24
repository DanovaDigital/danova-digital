<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(): View
    {
        return view('admin.leads.index', [
            'leads' => Lead::query()->orderByDesc('updated_at')->orderByDesc('id')->paginate(20),
        ]);
    }
}
