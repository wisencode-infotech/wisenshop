<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FooterMenuSectionItem;
use Illuminate\Support\Facades\Cache;

class PageDetail extends Component
{
    public $page_slug;
    public $page_content;

    public function mount($page_slug)
    {
        $this->page_slug = $page_slug;
        $this->loadPageContent();
    }

    public function loadPageContent()
    {
        $cache_key = 'page_content_' . $this->page_slug;

        $this->page_content = Cache::remember($cache_key, now()->addMinutes(30), function () {
            return FooterMenuSectionItem::select('name', 'content') // Only fetch required columns
                ->where('slug', $this->page_slug)
                ->first();
        });

        if (!$this->page_content) {
            abort(404, 'Page not found');
        }
    }

    public function render()
    {
        return __appLivewireView('page-detail', ['page_content' => $this->page_content]);
    }
}