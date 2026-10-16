<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\tblProject;

new class extends Component
{
    public $plngProjectId;
    public $pstrProjectTitle;
    public $pstrConsole;
    public $pstrSource;
    public $pstrStatus;
    public $pstrType;
    public $pstrDescription;

    public function create(){
        if(Auth::id()){
            tblProject::create([
                "flngProjectId" => $this->plngProjectId,
                "fstrProjectTitle" => $this->pstrProjectTitle,
                "fstrConsole" => $this->pstrConsole,
                "fstrSource" => $this->pstrSource,
                "fstrStatus" => $this->pstrStatus,
                "fstrType" => $this->pstrType,
                "fstrDescription" => $this->pstrDescription,
            ]);
        }
    }
};
?>

<div>
    <style>
        .projectDialog {
            width: min(460px, calc(100% - 24px));
            max-height: calc(100dvh - 24px);
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
        .projectDialog::backdrop {
            background: var(--background);
            opacity: .5;
        }
        .projectDialog .panelHeading {
            justify-content: space-between;
        }
        .projectDialog .panelHeading .button {
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
    <dialog class="projectDialog" id="add-project-dialog" onclose="this.querySelector('form').reset()">
        <form method="dialog" wire:submit.prevent="create">
            <div class="dialogHeader">
                <h2 id="add-project-title">Create Project</h2>
                <button type="button" onclick="this.closest('dialog').close('cancel')">×</button>
            </div>
            <div class="dialogBody">
                <div class="formFields">
                    <label for="project-id">Project ID:</label>
                    <input id="project-id" type="number" min="1" step="1" placeholder="100" required wire:model="plngProjectId">

                    <label for="project-name">Name:</label>
                    <input id="project-name" type="text" placeholder="my-project" required wire:model="pstrProjectTitle">

                    <label for="project-name">Console:</label>
                    <input id="project-name" type="text" placeholder="https://example.com" wire:model="pstrConsole">
                    
                    <label for="project-name">Source:</label>
                    <input id="project-name" type="text" placeholder="https://example.com" wire:model="pstrSource">

                    <label for="project-status">Status:</label>
                    <input id="project-status" type="text" placeholder="running" wire:model="pstrStatus">

                    <label for="project-type">Type:</label>
                    <input id="project-type" type="text" placeholder="Website, Mobile App, Etc." wire:model="pstrType">

                    <label for="project-description">Description:</label>
                    <input id="project-description" type="text" placeholder="" wire:model="pstrDescription">
                </div>
            </div>
            <div class="dialogFooter">
                <button type="submit" class="secondaryButton">Create</button>
            </div>
        </form>
    </dialog>
</div>
