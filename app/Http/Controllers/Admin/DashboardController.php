<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\News;
use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\ServiceCategory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'servicesCount' => ServiceCategory::count(),
            'newsCount' => News::count(),
            'portfolioCount' => PortfolioItem::count(),
            'contactsCount' => Contact::count(),
            'pagesCount' => Page::count(),
        ]);
    }
}
