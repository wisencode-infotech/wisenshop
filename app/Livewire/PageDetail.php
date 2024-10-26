<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FooterMenuSectionItem;
use Illuminate\Support\Str;

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
        $this->page_content = FooterMenuSectionItem::where('slug', $this->page_slug)->first();
        
        if (!$this->page_content) {
            abort(404, 'Page not found');
        }
    }

    public function render()
    {
        return view('livewire.page-detail');
    }
}
