<?php

use Livewire\Component;
use App\Models\tblProject;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $pstrPage = "Projects";
    public $tblProject;

    public function btnPage_click($pstrPage){
        $this->pstrPage = $pstrPage;
    }
    public function mount(){
        $this->tblProject = tblProject::get();
    }
};
?>

<div>
    <header>
        <div class="row">
            <h1>PORTF<span>O</span>LI<span>O</span></h1>
            <span class="muted">Virtual Environment 1.0.0</span>
        </div>
        <div class="row">
            <a class="button"><i class="fa-solid fa-book"></i> Resume</a>
            @if(Auth::id())
                <button class="secondaryButton" type="button" onclick="document.getElementById('add-project-dialog').showModal()"><i class="fa-solid fa-desktop"></i> Create Project</button>
            @endif
            <span class="userButton" onclick="document.getElementById('login-dialog').showModal()"><i class="fa-solid fa-user"></i> {{Auth::id() ? 'root@portfolio' : 'visitor@portfolio'}} <i class="fa-solid fa-chevron-down"></i></span>
        </div>
    </header>
    <div class="workspace">
        <aside class="projectList">
            <h2 class="panelHeading">Project View</h2>
            <nav class="tree">
                <details open>
                    <summary class="{{$pstrPage == 'Projects' ? 'selected' : ''}}" wire:click="btnPage_click('Projects')">Projects</summary>
                    @foreach($tblProject as $project)
                        <a class="{{$pstrPage == $project->flngProjectId ? 'selected' : ''}}" wire:click="btnPage_click({{$project->flngProjectId}})"><i class="fa-solid fa-desktop"></i> {{$project->flngProjectId}} ({{$project->fstrProjectTitle}})</a>
                    @endforeach
                </details>
                <a class="{{$pstrPage == 'Skills' ? 'selected' : ''}}" wire:click="btnPage_click('Skills')"><i class="fa-solid fa-code"></i> Skills</a>
                <a class="{{$pstrPage == 'Resume' ? 'selected' : ''}}" wire:click="btnPage_click('Resume')"><i class="fa-solid fa-book"></i> Resume</a>
                <a class="{{$pstrPage == 'About' ? 'selected' : ''}}" wire:click="btnPage_click('About')"><i class="fa-solid fa-circle-question"></i> About</a>
            </nav>
        </aside>
        @switch($pstrPage)
            @case('Projects')
                <livewire:project-overview.overview />
                @break
            @case('Skills')
                <livewire:pages::skills />
                @break
            @case('Resume')
                <livewire:pages::resume />
                @break
            @case('About')
                <livewire:pages::about />
                @break
            @default
                <livewire:project.overview :plngProjectId="$pstrPage" :key="$pstrPage"/>
        @endswitch
        

    </div>

    <livewire:project.create />
    <livewire:user.login />
</div>
