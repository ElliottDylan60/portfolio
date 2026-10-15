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
    <main class="informationView">
        <div class="toolbar">
            <h2>Project {{$plngProjectId}} ({{$tblProject->fstrProjectTitle}})</h2>
        </div>
        <div class="overview">
            <nav class="sectionNav">
                <a class="selected">Summary</a>
                <a>Console</a>
                <a>Source code</a>
                <a>About</a>
            </nav>

            <div class="content" id="summary">
                <div class="cards">
                    <section class="panel">
                        <h3 class="panelHeading">{{$tblProject->fstrProjectTitle}}</h3>
                        <dl class="panelBody">
                            <dt>Status</dt><dd>running</dd>
                            <dt>Node</dt><dd>Projects</dd>
                            <dt>URL</dt><dd>https://example.com</dd>
                        </dl>
                    </section>
                    <section class="panel" id="about">
                        <h3 class="panelHeading">Notes</h3>
                        <div class="panelBody">
                            <p>Notes about this project</p>
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
        </div>
    </main>
</div>