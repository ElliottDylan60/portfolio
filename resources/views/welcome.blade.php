<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @fonts
        <style>
        :root {
            --background: #262626;
            --white: #f2f2f2;
            --default: #0060a4;
            --panelBackground: #333;
            --warn: #ffae0b;
            --crit: #ce3c3c;
            --primary: #0060a4;
            --gray: #4d4d4d;

            --orange: #e57000;
        }
        * { 
            box-sizing: border-box;
            font-family: helvetica, arial, verdana, sans-serif; 
        }
        body {
            margin: 0;
            background: var(--background);
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .title {
            display: flex;
            align-items: center
        }
        .title h1{
            color: var(--white);
            margin: 0;
            padding: 0 3px;
            font-size: 25px;
        }
        .title h1 span {
            color: var(--orange);
        }
        .title p{
            margin: 0;
            padding: 0 3px;
            color: #f2f2f2;
        }
        .resumeButton {
            color: #1a1a1a;
            background-color: #a6a6a6;
            border-color: #bfbfbf;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 15px;
        }
        .resumeButton:hover{
            background-color: #bfbfbf;
            cursor: pointer;
        }



        .serverList {
            background: var(--panelBackground);
            width: 100px;
            height: 100px;
        }
        </style>
    </head>
    <body>
        <header>
            <div class="title">
                <h1>PORTF<span>O</span>LI<span>O</span></h1>
                <p>Virtual Portfolio 1.0.0</p>
            </div>
            <div>
                <a class="resumeButton">Resume</a>
            </div>
        </header>
        <div>
            <div class="serverList">

            </div>
            <div class="informationView">

            </div>
        </div>
    </body>
</html>
