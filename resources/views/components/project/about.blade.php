<?php

use Livewire\Component;
use App\Models\tblProject;
use Illuminate\Support\Str;

new class extends Component
{
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
        <section class="panel" id="about">
            <div class="panelHeading">
                <h3>About</h3>
                @if(Auth::id())
                    <i class="fa-solid fa-pen-to-square" onclick="document.getElementById('edit-about-dialog').showModal()"></i>
                @endif
            </div>
            <div class="panelBody">
                {!! Str::markdown($tblProject->fstrAbout) !!}
            </div>
        </section>
    </div>
    <livewire:project.edit-about :plngProjectId="$plngProjectId" />
</div>