<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\tblSkill;

new class extends Component
{
    public $pstrSkillTitle;
    public $plngYearsExperience;

    public function create(){
        if(Auth::id()){
            tblSkill::create([
                "fstrSkillTitle" => $this->pstrSkillTitle,
                "flngYearsExperience" => $this->plngYearsExperience
            ]);
        }
    }
};
?>

<div>
    <style>
        .addSkillDialog {
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
        .addSkillDialog::backdrop {
            background: var(--background);
            opacity: .5;
        }
        .addSkillDialog .panelHeading {
            justify-content: space-between;
        }
        .addSkillDialog .panelHeading .button {
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
    <dialog class="addSkillDialog" id="add-skill-dialog" onclose="this.querySelector('form').reset()">
        <form method="dialog" wire:submit.prevent="create">
            <div class="dialogHeader">
                <h2 id="add-skill-title">Add Skill</h2>
                <button type="button" onclick="this.closest('dialog').close('cancel')">×</button>
            </div>
            <div class="dialogBody">
                <div class="formFields">
                    <label for="skill-title">Skill:</label>
                    <input id="skill-title" type="text" placeholder="skill" required wire:model="pstrSkillTitle">
                    
                    <label for="years">Years:</label>
                    <input id="years" type="number" min="1" step="1" placeholder="100" required wire:model="plngYearsExperience">
                </div>
            </div>
            <div class="dialogFooter">
                <button type="submit" class="secondaryButton">OK</button>
            </div>
        </form>
    </dialog>
</div>
