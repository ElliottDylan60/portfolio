<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\tblProject;

new class extends Component
{
    public $plngProjectId;
    public $pstrAbout;
    public $tblProject;

    public function update(){
        if(Auth::id()){
            $tblProject = tblProject::where([
                ["flngProjectId", $this->plngProjectId]
            ])->first();
            $tblProject->fstrAbout = $this->pstrAbout;
            $tblProject->save();
        }
    }
    public function mount(){
        $this->tblProject = tblProject::where([
            ["flngProjectId", $this->plngProjectId]
        ])->first();
    }
};
?>

<div>
    <style>
        .editAboutDialog {
            width: 60%;
            padding: 0px;
            border-width: 0px;
            color: var(--white);
            font: inherit;
            background: var(--panelBackground);
            box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .editAboutDialog::backdrop {
            background: var(--background);
            opacity: .5;
        }
        .editAboutDialog .panelHeading {
            justify-content: space-between;
        }
        .editAboutDialog .panelHeading .button {
            padding: 1px 7px;
        }
        .dialogHeader {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            color: var(--headerText);
        }
        .dialogHeader button{
            background: var(--panelBackground);
            color: var(--headerText);
            border-radius: 100px;
            border-width: 1px;
            border-color: var(--headerText);
            width: 20px;
            height: 20px;
            font-size: 20px;
            border-style: solid;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dialogHeader button:hover {
            cursor: pointer;
        }
        .dialogBody {
            border: 1px solid var(--gray700); 
            padding: 10px;
        }
        .dialogFooter {
            display: flex;
            flex-direction: row-reverse;
            padding: 10px;
        }
    </style>
    <dialog class="editAboutDialog" id="edit-about-dialog" onclose="this.querySelector('form').reset()">
        <form method="dialog" wire:submit.prevent="update">
            <div class="dialogHeader">
                <h2>About</h2>
                <button type="button" onclick="this.closest('dialog').close('cancel')">×</button>
            </div>
            <div class="dialogBody">
                <textarea type="text" min="1" step="1" wire:model="pstrAbout">{{$tblProject->fstrAbout}}</textarea>
            </div>
            <div class="dialogFooter">
                <button type="submit" class="secondaryButton">OK</button>
            </div>
        </form>
    </dialog>
</div>
