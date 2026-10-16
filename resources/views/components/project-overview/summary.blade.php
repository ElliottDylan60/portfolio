<?php

use Livewire\Component;
use App\Models\tblProject;

new class extends Component
{
    public $tblProject;
    public function mount(){
        $this->tblProject = tblProject::get();
    }
};
?>

<div>
    <div class="content">
        <div class="cards">
            <section class="panel">
                <h3 class="panelHeading">Portfolio status</h3>
                <dl class="panelBody">
                    <dt>Status</dt><dd>running</dd>
                    <dt>Environment</dt><dd>Developer portfolio</dd>
                    <dt>Interface</dt><dd>Proxmox inspired</dd>
                    <dt>Version</dt><dd>1.0.0</dd>
                </dl>
            </section>
            <section class="panel" id="about">
                <h3 class="panelHeading">About this portfolio</h3>
                <div class="panelBody">
                    <p>Welcome to my corner of the web. A place for the things I build, the tools I use, and what I learn along the way.</p>
                </div>
            </section>
        </div>

        <section class="panel" id="projects">
            <div class="panelHeading row">
                <h3>Project inventory</h3>
            </div>
            <div class="tableScroll">
                <table>
                    <caption hidden>Portfolio projects</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tblProject as $project)
                            <tr>
                                <td>{{$project->flngProjectId}}</td>
                                <td><a>{{$project->fstrProjectTitle}}</a></td>
                                <td class="status">● {{$project->fstrStatus}}</td>
                                <td>{{$project->fstrType}}</td>
                                <td>{{$project->fstrDescription}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="panel" id="skills">
            <h3 class="panelHeading">Skills & tools</h3>
            <div class="panelBody">
                <p class="muted">Tools and technologies I've worked with</p>
                <div class="tags">
                    <span>PHP</span><span>Laravel</span><span>HTML5</span><span>CSS</span>
                </div>
            </div>
        </section>
    </div>
</div>