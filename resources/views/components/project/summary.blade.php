<?php

use Livewire\Component;
use App\Models\tblProject;

new class extends Component {
    public $plngProjectId;
    public $tblProject;
    public function mount(){
        $this->tblProject = tblProject::where([
            ["flngProjectId", $this->plngProjectId]
        ])->first();
    }
};
?>

<div>
    <div class="content">
        <div class="cards">
            <section class="panel">
                <h3 class="panelHeading">{{$tblProject->fstrProjectTitle}}</h3>
                <dl class="panelBody">
                    <dt>Status</dt><dd>running</dd>
                    <dt>Node</dt><dd>Projects</dd>
                    <dt>URL</dt><dd>{{$tblProject->fstrConsole}}</dd>
                </dl>
            </section>
            <section class="panel" id="about">
                <div class="panelHeading">
                    <h3>Notes</h3>
                    <i class="fa-solid fa-pen-to-square" onclick="document.getElementById('edit-notes-dialog').showModal()"></i>
                </div>
                <div class="panelBody">
                    <p>{{$tblProject->fstrNotes}}</p>
                </div>
            </section>
        </div>


        <section class="panel" id="skills">
            <h3 class="panelHeading">Skills &amp; tools</h3>
            <div class="panelBody">
                <p class="muted">Tools and technologies I've worked with</p>
                <div class="tags">
                    <span>PHP</span><span>Laravel</span><span>HTML5</span><span>CSS</span>
                </div>
            </div>
        </section>
    </div>
    <livewire:project.edit-notes :plngProjectId="$plngProjectId" />
</div>