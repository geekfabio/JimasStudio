<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeUniqueSlug($data['title']);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image');

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Evento criado com sucesso.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['cover_image'] = $this->uploadImage($request, 'cover_image', $event->cover_image);

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Evento actualizado com sucesso.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->cover_image) {
            Storage::disk('public')->delete($event->cover_image);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Evento eliminado com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'event_date' => ['nullable', 'date'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['boolean'],
            'sort_order' => ['integer'],
        ]);
    }

    private function uploadImage(Request $request, string $field, ?string $existing = null): ?string
    {
        if (! $request->hasFile($field)) {
            return $existing;
        }

        if ($existing) {
            Storage::disk('public')->delete($existing);
        }

        return $request->file($field)->store('events', 'public');
    }

    private function makeUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (Event::where('slug', $slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
}
