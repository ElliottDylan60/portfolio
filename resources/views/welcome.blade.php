<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A developer portfolio with projects, skills, and a resume in a familiar infrastructure dashboard.">

        <title>{{ config('app.name', 'Laravel') }} — Portfolio</title>
        @fonts
        <style>
            :root {
                --background: #1a1a1a;
                --white: #f2f2f2;
                --default: #0060a4;
                --panelBackground: #262626;
                --panelHeader: #333333;
                --warn: #ffae0b;
                --crit: #ce3c3c;
                --primary: #0060a4;
                
                
                --orange: #e57000;

                --headerText: #479cd8;


                --gray500: #bfbfbf;
                --gray600: #a6a6a6;
                --gray750: #595959;
                --gray700: #4d4d4d;
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
            header, .toolbar { 
                justify-content: space-between; 
                padding: 4px 12px; 
            }
            header { 
                border-bottom: 1px solid var(--gray700);
                height: 40px;
            }
            .button { 
                color: var(--gray900);
                display: inline-block; 
                padding: 5px 14px; 
                border: 1px solid var(--gray600); 
                border-radius: 3px; 
                background: var(--gray600); 
                white-space: nowrap; 
            }
            .button:hover { 
                background: var(--gray500); 
                border: 1px solid var(--gray500); 
                cursor: pointer;
            }
            a:focus-visible, summary:focus-visible { 
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
            .projectList, .sectionNav { 
                padding: 2px;
                
            }
            .projectList { 
                border-right-width: 5px; 
                background: var(--panelBackground);
                margin: 2px;
            }
            .panelHeading { 
                background: var(--panelHeader);
                border-bottom: 1px solid var(--gray700); 
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
                margin: 2px;
                background: var(--panelBackground);
            }
            .overview { 
                margin: 2px;
                display: grid; 
                grid-template-columns: 150px minmax(0, 1fr); 
                flex: 1; 
                overflow: scroll;
            }
            .sectionNav { 
                padding-top: 6px; 
            }
            .sectionNav .selected { 
                backgorund: color var(--default);
            }
            .content { 
                min-width: 0; 
                padding: 12px; 
                overflow: scroll;
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
            @media (max-width: 1000px) {
                .workspace { 
                    grid-template-columns: 190px minmax(0, 1fr); 
                }
                .overview { 
                    grid-template-columns: 125px minmax(0, 1fr); 
                }
                .cards { 
                    grid-template-columns: 1fr; 
                }
                header .muted { 
                    display: none; 
                }
            }
            @media (max-width: 650px) {
                header { flex-wrap: wrap; gap: 8px; }
                h1 { font-size: 22px; }
                .workspace, .overview { grid-template-columns: 1fr; }
                .projectList { border-right: 0; border-bottom: 5px solid var(--gray700); }
                .tree { display: flex; flex-wrap: wrap; align-items: flex-start; }
                .tree details { padding-left: 0; }
                .sectionNav { display: flex; flex-wrap: wrap; padding: 0; border-right: 0; border-bottom: 1px solid var(--gray700); }
                .toolbar { flex-wrap: wrap; gap: 6px; }
                .content { padding: 10px; }
                .row { gap: 8px; }
                .taskLog { margin-top: 0; }
            }
        </style>
    </head>
    <body>
        <header>
            <div class="row">
                <h1>PORTF<span>O</span>LI<span>O</span></h1>
                <span class="muted">Virtual Portfolio Environment</span>
                <small class="muted">1.0.0</small>
            </div>
            <div class="row">
                <a class="button" href="#resume">Resume</a>
                <span class="muted">visitor@portfolio</span>
            </div>
        </header>
        <div class="workspace">
            <aside class="projectList">
                <h2 class="panelHeading">Project View</h2>
                <nav class="tree">
                    <details open>
                        <summary class="selected">Projects</summary>
                        <a href="#portfolio">100 (portfolio)</a>
                        <a href="#web-app">101 (web-app)</a>
                        <a href="#homelab">102 (homelab)</a>
                    </details>
                    <a href="#skills">Skills</a>
                    <a href="#resume">Resume</a>
                </nav>
            </aside>

            <main class="informationView">
                <div class="toolbar">
                    <h2>Portfolio</h2>
                </div>
                <div class="overview">
                    <nav class="sectionNav">
                        <a class="selected" href="#summary">Summary</a>
                        <a href="#console">Console</a>
                        <a href="#projects">Projects</a>
                        <a href="#skills">Skills</a>
                        <a href="#about">About</a>
                    </nav>

                    <div class="content" id="summary">
                        <div class="cards">
                            <section class="panel">
                                <h3 class="panelHeading">Portfolio status</h3>
                                <dl class="panelBody">
                                    <dt>Status</dt><dd class="status">● Online</dd>
                                    <dt>Environment</dt><dd>Developer portfolio</dd>
                                    <dt>Projects</dt><dd>3 example entries</dd>
                                    <dt>Interface</dt><dd>Proxmox inspired</dd>
                                    <dt>Version</dt><dd>1.0.0</dd>
                                </dl>
                            </section>
                            <section class="panel" id="about">
                                <h3 class="panelHeading">About this portfolio</h3>
                                <div class="panelBody">
                                    <p>Welcome to my corner of the web. A place for the things I build, the tools I use, and what I learn along the way.</p>
                                </div>
                            </section>
                        </div>

                        <section class="panel" id="projects">
                            <div class="panelHeading row">
                                <h3>Project inventory</h3>
                                <small class="muted">3 example projects</small>
                            </div>
                            <div class="tableScroll">
                                <table>
                                    <caption hidden>Example portfolio projects</caption>
                                    <thead>
                                        <tr><th scope="col">ID</th><th scope="col">Name</th><th scope="col">Status</th><th scope="col">Type</th><th scope="col">Stack</th><th scope="col">Description</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr id="portfolio"><td>100</td><td><a href="#portfolio">portfolio</a></td><td class="status">● Starter</td><td>Website</td><td>Laravel / CSS</td><td>A familiar dashboard for my work</td></tr>
                                        <tr id="web-app"><td>101</td><td><a href="#web-app">web-app</a></td><td class="muted">◇ Placeholder</td><td>Application</td><td>To be added</td><td>Your next application goes here</td></tr>
                                        <tr id="homelab"><td>102</td><td><a href="#homelab">homelab</a></td><td class="muted">◇ Placeholder</td><td>Infrastructure</td><td>To be added</td><td>Your infrastructure project goes here</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <section class="panel" id="skills">
                            <h3 class="panelHeading">Skills &amp; tools</h3>
                            <div class="panelBody">
                                <p class="muted">Tools and technologies I've worked with</p>
                                <div class="tags">
                                    <span>PHP</span><span>Laravel</span><span>HTML5</span><span>CSS</span>
                                </div>
                            </div>
                        </section>

                        <section class="panel" id="resume">
                            <h3 class="panelHeading">Resume</h3>
                            <div class="panelBody">
                                <p>Experience, education, and the work behind the projects.</p>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
