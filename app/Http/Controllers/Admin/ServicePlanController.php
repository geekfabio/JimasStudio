<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanFeature;
use App\Models\ServiceCategory;
use App\Models\ServicePlan;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicePlanController extends Controller
{
    public function index(): View
    {
        $plans = ServicePlan::with(['category', 'subCategory'])
            ->orderBy('category_id')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.services.plans.index', compact('plans'));
    }

    public function create(): View
    {
        $categories = ServiceCategory::orderBy('title')->get();
        $subCategories = SubCategory::orderBy('name')->get();

        return view('admin.services.plans.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $plan = ServicePlan::create($data);
        $this->syncFeatures($plan, $request->input('features', []));

        return redirect()->route('admin.services.plans.index')->with('success', 'Plano criado com sucesso.');
    }

    public function edit(ServicePlan $plan): View
    {
        $categories = ServiceCategory::orderBy('title')->get();
        $subCategories = SubCategory::orderBy('name')->get();

        return view('admin.services.plans.edit', compact('plan', 'categories', 'subCategories'));
    }

    public function update(Request $request, ServicePlan $plan): RedirectResponse
    {
        $data = $this->validateData($request);
        $plan->update($data);
        $this->syncFeatures($plan, $request->input('features', []));

        return redirect()->route('admin.services.plans.index')->with('success', 'Plano actualizado com sucesso.');
    }

    public function destroy(ServicePlan $plan): RedirectResponse
    {
        $plan->features()->delete();
        $plan->delete();

        return redirect()->route('admin.services.plans.index')->with('success', 'Plano eliminado com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:service_categories,id'],
            'sub_category_id' => ['nullable', 'exists:sub_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'price_label' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_featured' => ['boolean'],
            'sort_order' => ['integer'],
            'is_active' => ['boolean'],
        ]);
    }

    private function syncFeatures(ServicePlan $plan, array $features): void
    {
        $plan->features()->delete();
        $clean = array_filter(array_map('trim', $features));

        foreach (array_values($clean) as $index => $text) {
            $plan->features()->create([
                'text' => $text,
                'sort_order' => $index,
            ]);
        }
    }
}
