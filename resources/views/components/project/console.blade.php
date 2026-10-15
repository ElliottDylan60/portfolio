<?php

use Livewire\Component;
use App\Models\tblProject;

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
    <iframe src="{{$tblProject->fstrConsole}}" title="{{$tblProject->fstrProjectTitle}}" width="100%" height="100%"></iframe>
</div>