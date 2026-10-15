<?php

use Livewire\Component;
use App\Models\tblProject;

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
            <span class="muted">Virtual Portfolio Environment 1.0.0</span>
        </div>
        <div class="row">
            <a class="button">Resume</a>
            <button class="secondaryButton" type="button" onclick="document.getElementById('add-project-dialog').showModal()">Create Project</button>
            <span class="muted">visitor@portfolio</span>
        </div>
    </header>
    <div class="workspace">
        <aside class="projectList">
            <h2 class="panelHeading">Project View</h2>
            <nav class="tree">
                <details open>
                    <summary class="{{$pstrPage == 'Projects' ? 'selected' : ''}}" wire:click="btnPage_click('Projects')">Projects</summary>
                    @foreach($tblProject as $project)
                        <a class="{{$pstrPage == $project->flngProjectId ? 'selected' : ''}}" wire:click="btnPage_click({{$project->flngProjectId}})">{{$project->flngProjectId}} ({{$project->fstrProjectTitle}})</a>
                    @endforeach
                </details>
                <a class="{{$pstrPage == 'Skills' ? 'selected' : ''}}" wire:click="btnPage_click('Skills')">Skills</a>
                <a class="{{$pstrPage == 'Resume' ? 'selected' : ''}}" wire:click="btnPage_click('Resume')">Resume</a>
                <a class="{{$pstrPage == 'About' ? 'selected' : ''}}" wire:click="btnPage_click('About')">About</a>
            </nav>
        </aside>
        @switch($pstrPage)
            @case('Projects')
                <livewire:project-overview />
                @break
            @case('Skills')
                <p>Skills</p>
                @break
            @case('Resume')
                <p>Resume</p>
                @break
            @case('About')
                <p>About</p>
                @break
            @default
                <livewire:project.overview :plngProjectId="$pstrPage" />
        @endswitch
        

    </div>

    <livewire:project.create />
</div>
