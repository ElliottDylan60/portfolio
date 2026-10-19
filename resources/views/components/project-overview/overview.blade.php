<?php

use Livewire\Component;


new class extends Component{
    public $pstrPage = "Summary";

    public function btnPage_click($pstrPage){
        $this->pstrPage = $pstrPage;
    }
};
?>
<div style="overflow:scroll; margin: 0; padding: 0">
    <main class="informationView">
        <div class="toolbar">
            <span>Virtual Portfolio</span>
        </div>
        <div class="overview">
            <nav class="sectionNav">
                <a class="{{$pstrPage == 'Summary' ? 'selected' : ''}}" wire:click="btnPage_click('Summary')"><i class="fa-solid fa-book"></i> Summary</a>
                <a class="{{$pstrPage == 'Skills' ? 'selected' : ''}}" wire:click="btnPage_click('Skills')"><i class="fa-solid fa-code"></i> Skills</a>
            </nav>
            @switch($pstrPage)
                @case('Summary')
                    <livewire:project-overview.summary />
                    @break
                @case('Skills')
                    <livewire:project-overview.skills />
                    @break
            @endswitch
            
        </div>
    </main>
</div>
