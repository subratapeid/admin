<?php

namespace AdminPanel\Http\Controllers;

use Illuminate\Http\Response;

class DashboardController
{
    public function index(): Response
    {
        return response()->view('admin-panel::dashboard');
    }
}