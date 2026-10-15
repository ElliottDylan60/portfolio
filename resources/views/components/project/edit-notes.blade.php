<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;

use App\Models\tblProject;

new class extends Component
{
    public $plngProjectId;
    public $pstrNotes;
    public $tblProject;

    public function update(){
        $tblProject = tblProject::where([
            ["flngProjectId", $this->plngProjectId]
        ])->first();
        $tblProject->fstrNotes = $this->pstrNotes;
        $tblProject->save();
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
        .editNotesDialog {
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
        .editNotesDialog::backdrop {
            background: var(--background);
            opacity: .5;
        }
        .editNotesDialog .panelHeading {
            justify-content: space-between;
        }
        .editNotesDialog .panelHeading .button {
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
    <dialog class="editNotesDialog" id="edit-notes-dialog" onclose="this.querySelector('form').reset()">
        <form method="dialog" wire:submit.prevent="update">
            <div class="dialogHeader">
                <h2>Notes</h2>
                <button type="button" onclick="this.closest('dialog').close('cancel')">×</button>
            </div>
            <div class="dialogBody">
                <textarea type="text" min="1" step="1" placeholder="Add a note" wire:model="pstrNotes">{{$tblProject->fstrNotes}}</textarea>
            </div>
            <div class="dialogFooter">
                <button type="submit" class="secondaryButton">OK</button>
            </div>
        </form>
    </dialog>
</div>
