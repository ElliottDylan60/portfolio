<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        <style>
            :root {
                --background: #1a1a1a;
                --white: #f2f2f2;
                --default: #0060a4;
                --panelBackground: #262626;
                --panelHeader: #333333;
                --warn: #ffae0b;
                --crit: #ce3c3c;
                --primary: #0078cf;
                
                
                --orange: #e57000;

                --headerText: #479cd8;

                
                --gray500: #bfbfbf;
                --gray600: #a6a6a6;
                --gray750: #595959;
                --gray700: #4d4d4d;
                --gray800: #464d4d;
                --gray900: #1a1a1a;
            }

            * { 
                box-sizing: border-box; 
            }
            body { 
                margin: 0; 
                color: var(--white); 
                background: var(--background); 
                font: 13px Arial, Helvetica, sans-serif; 
            }
            a { 
                color: inherit; 
                text-decoration: none; 
            }
            a:hover {
                cursor: pointer;
            }
            i:hover {
                cursor: pointer;
            }
            h1, h2, h3, p { 
                margin: 0; 
            }

            h1 { 
                font-size: 25px; 
                letter-spacing: -1px; 
            }
            h2 { 
                font-size: 14px; 
            }
            h3 { 
                font-size: 13px; 
            }
            small { 
                font-size: 11px; 
            }
            h1 span, .status { 
                color: var(--orange); 
            }
            .muted { 
                opacity: .65; 
            }
            .row, header, .toolbar { 
                display: flex; 
                align-items: center; 
                gap: 12px; 
            }
            .toolbar {
                background: var(--panelBackground);
                border-bottom: 1px solid var(--gray700); 
            }
            .toolbar span {
                opacity: 1;
            }
            header, .toolbar { 
                justify-content: space-between; 
                padding: 4px 12px; 
            }
            header { 
                height: 40px;
            }
            .userButton {
                font: inherit;
                color: var(--white);
                display: inline-block; 
                padding: 4px 8px; 
                border: 1px solid var(--white); 
                border-radius: 3px; 
                background: var(--gray800); 
                white-space: nowrap; 
            }
            .userButton:hover{
                cursor: pointer;
            }
            .grayButton {
                font: inherit;
                color: var(--gray900);
                display: inline-block; 
                padding: 4px 8px; 
                border: 1px solid var(--gray600); 
                border-radius: 3px; 
                background: var(--gray600); 
                white-space: nowrap; 
            }
            .grayButton:hover{
                cursor: pointer;
            }
            .button, .secondaryButton { 
                font: inherit;
                color: var(--gray900);
                display: inline-block; 
                padding: 4px 8px; 
                border: 1px solid var(--gray600); 
                border-radius: 3px; 
                background: var(--gray600); 
                white-space: nowrap; 
            }
            .button:hover, .secondaryButton:hover{ 
                background: var(--gray500); 
                border: 1px solid var(--gray500); 
                cursor: pointer;
            }
            .secondaryButton {
                color: var(--white);
                border: 1px solid var(--default); 
                background: var(--default); 
            }
            .secondaryButton:hover {
                background: var(--primary); 
                border: 1px solid var(--primary); 
            }
            
            a:focus-visible, button:focus-visible, summary:focus-visible { 
                outline: 2px solid var(--orange); 
                outline-offset: -2px; 
            }
            .workspace { 
                background: var(--background);
                display: grid; 
                grid-template-columns: 230px minmax(0, 1fr); 
                height: calc(100vh - 44px);
                overflow: hidden;
            }
            .projectList { 
                background: var(--panelBackground);
                /*top right bottom left*/
                margin: 0px 2px 0px 4px;
            }
            .panelHeading { 
                background: var(--panelHeader);
                border-bottom: 1px solid var(--gray700);
                display: flex;
                justify-content: space-between;
            }
            
            .panelHeading { 
                color: var(--headerText);
                padding: 9px 12px; 
            }
            .tree { 
                padding: 6px 0; 
            }
            .tree a, .tree summary, .sectionNav a { 
                display: block; 
                padding: 8px 12px; 
            }
            .tree summary { 
                cursor: pointer; 
                list-style: none; 
            }
            .tree summary::-webkit-details-marker { 
                display: none; 
            }
            .tree summary::before { 
                content: '▸'; 
                margin-right: 7px; 
            }
            .tree details[open] > summary::before { 
                content: '▾'; 
            }
            .tree details a { 
                padding-left: 30px; 
            }
            .tree a span, .sectionNav a span { 
                display: inline-block; 
                width: 19px; 
                text-align: center; 
                margin-right: 5px; 
            }
            .selected { 
                background: var(--gray750); 
            }
            .tree a:hover, .tree summary:hover, .sectionNav a:hover { 
                background: var(--gray750); 
            }
            .informationView { 
                display: flex; 
                flex-direction: column; 
                min-width: 0; 
                overflow: scroll;
                margin: 0px 4px 0px 2px;
                background: var(--panelBackground);
                height: 100%;
            }
            .overview { 
                display: grid; 
                grid-template-columns: 150px minmax(0, 1fr); 
                flex: 1; 
                overflow: scroll;
            }
            .sectionNav { 
                padding-top: 6px;
                border-right: 1px solid var(--gray700);
            }
            .sectionNav .selected { 
                backgorund: color var(--default);
            }
            .content { 
                min-width: 0; 
                padding: 12px; 
                overflow: scroll;
            }
            .content::-webkit-scrollbar {
                display: none;
            }
            .cards { 
                display: grid; 
                grid-template-columns: repeat(2, minmax(0, 1fr)); 
                gap: 12px; 
            }
            .panel { 
                min-width: 0; 
                border: 1px solid var(--gray700); 
                background: var(--panelBackground); 
                scroll-margin-top: 12px; 
            }
            .content > .panel { 
                margin-top: 12px; 
            }
            .panelBody { 
                padding: 14px; 
                line-height: 1.7; 
                background: var(--panelBackground);
            }
            .panelBody p + p { 
                margin-top: 8px; 
            }
            .panelBody a:not(.button) { 
                color: var(--warn); 
                text-decoration: underline; 
                text-underline-offset: 3px; 
            }
            dl { 
                display: grid; 
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); 
                gap: 7px 12px; 
                margin: 0; 
            }
            dd { 
                margin: 0; 
                text-align: right; 
            }
            .tableScroll { 
                overflow-x: auto; 
            }
            table { 
                width: 100%; 
                border-collapse: collapse; 
                text-align: left; 
                white-space: nowrap; 
            }
            th, td { 
                padding: 9px 12px; 
                border-bottom: 1px solid var(--gray700); 
            }
            th { 
                background: var(--panelBackground); 
                font-weight: normal; 
            }
            tr:nth-child(even) {
                background-color: var(--background);
            }
            tbody tr:last-child td { 
                border-bottom: 0; 
            }
            tbody tr:hover { 
                background: var(--gray750); 
            }
            tbody tr:target { 
                background: var(--gray750);  
                outline-offset: -1px; 
            }
            td a { 
                text-decoration: underline; 
                text-underline-offset: 3px; 
            }
            .tags { 
                display: flex; 
                flex-wrap: wrap; 
                gap: 7px; 
                margin-top: 12px; 
            }
            .tags span { 
                padding: 2px 9px; 
                border: 1px solid var(--gray700); 
                background: var(--background); 
                font-size: 12px; 
            }
            .taskLog { 
                margin-top: 12px; 
                border-top: 5px solid var(--gray700); 
            }
            .tabs { 
                display: flex; 
                gap: 0; 
                background: var(--background); 
                border-bottom: 1px solid var(--gray700); 
            }
            .tabs h3 { 
                padding: 9px 16px; 
                border-top: 2px solid var(--orange); 
                background: var(--background); 
            }
            footer { 
                padding: 7px 12px; 
                border-top: 1px solid var(--gray700); 
                font-size: 11px; 
            }
            



            /*
                Form
            */
            .formFields {
                display: grid;
                grid-template-columns: 100px minmax(0, 1fr);
                align-items: center;
                gap: 12px;
                margin-bottom: 12px;
            }
            input {
                width: 100%;
                min-width: 0;
                padding: 5px 7px;
                border: 0px solid var(--gray700);
                border-radius: 2px;
                color: var(--white);
                background: var(--panelHeader);
                font: inherit;
            }
            input:focus-visible {
                outline: 1px solid var(--primary); 
            }
            input::placeholder {
                color: var(--gray600);
            }
            textarea {
                width: 100%;
                min-height: 300px;
            }

        </style>
    </head>
    <body>
        {{ $slot }}

        @livewireScripts
    </body>
</html>
