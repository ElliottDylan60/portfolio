<?php

use Livewire\Component;

new class extends Component {

};
?>

<div style="overflow:scroll">
    <style>
        .resume h1,
        .resume h2,
        .resume h3 {
            color: var(--headerText);
        }
        .jobHeader {

        }
        .jobContent {
            margin-left: 20px;
        }
        .jobContent ul {
            margin-left: 20px;
        }
        .jobContent li {
            list-style-type: '- ';
        }
    </style>
    <main class="informationView resume">
        <div class="content">
            <section class="panel" id="about">
                <div class="panelHeading">
                    <h3>Resume</h3>
                </div>
                <div class="panelBody">
                    <h1>Dylan Elliott</h1>
                    <p>509.306.6011 | elliottdylan@protonmail.com</p>
                    <br>
                    <h2>Professional Objective</h2>
                    <p>Backend devOps engineer with experience designing, developing, and optimizing scalable systems. Strong background in PHP/Laravel, PostgreSQL, Microsoft SQL server, API security, and enterprise-level system integration. Seeking to contribute technical leadership and backend architecture expertise to a high-growth, data-driven organization.</p>

                    <br>

                    <h2>Experience</h2>
                        <div class="job">
                            <div class="jobHeader">
                                <dl class="panelBody">
                                    <dt>Technical Team Manager</dt><dd>September 2023 - Current</dd>
                                </dl>
                            </div>
                            <div class="jobContent">
                                <p><strong>Fast Enterprises | Boston, MA</strong></p>
                                <ul>
                                    <li> Lead  engineering initiative supporting large-scale data and operations 	systems used by government and public-sector partners.</li>
                                    <li> Collaborate directly with non-technical stakeholders to identify operational bottlenecks and translate them into high-impact engineering requirements.</li>
                                    <li> Analyze and optimize database process, improving data reliability and accelerating key workflows.</li>
                                    <li> Guide others through system design decisions, debugging, and delivery of production features under evolving constraints.</li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="job">
                            <div class="jobHeader">
                                <dl class="panelBody">
                                    <dt>Web and App Developer</dt><dd>Feburary 2019 - September 2023</dd>
                                </dl>
                            </div>
                            <div class="jobContent">

                                <p><strong>KCWU | Washington</strong></p>
                                <ul>
                                    <li>Design and build end-to-end web and mobile applications using .NET, Laravel, PHP, JavaScript, and modern front-end frameworks.</li>
                                    <li>Earned national recognition for UI/UX design and overall product functionality of KCWU's digital platforms.</li>
                                </ul>
                            </div>
                        </div>
                    <br>

                    <h2>Education</h2>
                        <div>
                            <p><strong>Bachelors - Computer Science</strong></p>
                            <p>Central Washington University</p>
                        </div>
                    
                </div>
            </section>
        </div>
    </main>
</div>