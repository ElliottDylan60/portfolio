<?php

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $pstrUsername;
    public $pstrPassword;
    public function login(){
        $credentials = [
            'email' => $this->pstrUsername,
            'password' => $this->pstrPassword,
        ];

        if (Auth::attempt($credentials)) {
            Log::debug('Success');
        }else{
            Log::debug('Failed');
        }
    }
};
?>

<div>
    <style>
        .loginDialog {
            width: 40%;
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
        .loginDialog::backdrop {
            background: var(--background);
            opacity: .5;
        }
        .loginDialog .panelHeading {
            justify-content: space-between;
        }
        .loginDialog .panelHeading .button {
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
    <dialog class="loginDialog" id="login-dialog" onclose="this.querySelector('form').reset()">
        <form method="dialog" wire:submit.prevent="login">
            <div class="dialogHeader">
                <h2>Portfolio VE Login</h2>
                <button type="button" onclick="this.closest('dialog').close('cancel')">×</button>
            </div>
            <div class="dialogBody">
                <div class="formFields">
                    <label for="username">User name:</label>
                    <input id="username" type="text" required wire:model="pstrUsername">

                    <label for="password">Password:</label>
                    <input id="password" type="password" required wire:model="pstrPassword">
                </div>
            </div>
            <div class="dialogFooter">
                <button type="submit" class="secondaryButton">Login</button>
            </div>
        </form>
    </dialog>
</div>
