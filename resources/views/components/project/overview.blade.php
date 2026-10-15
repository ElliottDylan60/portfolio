<?php

use Livewire\Component;
use App\Models\tblProject;

new class extends Component {
    public $pstrPage = "Summary";
    public $plngProjectId;
    public $tblProject;

    public function btnPage_click($pstrPage){
        $this->pstrPage = $pstrPage;
    }

    public function mount(){
        $this->tblProject = tblProject::where([
            ["flngProjectId", $this->plngProjectId]
        ])->first();
    }
};
?>

<div>
    <main class="informationView">
        <div class="toolbar">
            <h2>Project {{$plngProjectId}} ({{$tblProject->fstrProjectTitle}})</h2>
        </div>
        <div class="overview">
            <nav class="sectionNav">
                <a class="{{$pstrPage == 'Summary' ? 'selected' : ''}}" wire:click="btnPage_click('Summary')">Summary</a>
                <a class="{{$pstrPage == 'Console' ? 'selected' : ''}}" wire:click="btnPage_click('Console')">Console</a>
                <a>Source code</a>
                <a class="{{$pstrPage == 'About' ? 'selected' : ''}}" wire:click="btnPage_click('About')">About</a>
            </nav>
            @switch($pstrPage)
                @case('Summary')
                    <livewire:project.summary :plngProjectId="$tblProject->flngProjectId" />
                    @break
                @case('Console')
                    <livewire:project.console :plngProjectId="$tblProject->flngProjectId" />
                    @break
                @case('About')
                    <livewire:project.about :plngProjectId="$tblProject->flngProjectId" />
                    @break
                
            @endswitch
            
        </div>
    </main>
</div>