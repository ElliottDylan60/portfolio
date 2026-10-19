<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\tblSkill;

new class extends Component
{
    public $tblSkill;
    public function mount(){
        $this->tblSkill = tblSkill::get();
    }
};
?>

<div>
    <style>
        .contentHeader {
            padding: 4px 8px;
            border-bottom: 1px solid var(--gray700);
        }
        .content {
            background: var(--panelBackground);
        }
    </style>
    <main class="informationView">
        <div class="contentHeader">
            @if(Auth::id())
                <button class="grayButton" type="button" onclick="document.getElementById('add-skill-dialog').showModal()">Add</button>
                <button class="grayButton" type="button">remove</button>
            @endif
        </div>
        <div class="tableScroll">
            <table>
                <caption hidden>Skills</caption>
                <thead>
                    <tr>
                        <th scope="col">Skill</th>
                        <th scope="col">Years of Experience</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tblSkill as $skill)
                        <tr>
                            <td>{{$skill->fstrSkillTitle}}</td>
                            <td>{{$skill->flngYearsExperience}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <livewire:project-overview.add-skill />
</div>