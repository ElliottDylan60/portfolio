<?php

use Livewire\Component;
use App\Models\tblProject;

new class extends Component
{
    public $tblProject;
    public function mount(){
        $this->tblProject = tblProject::get();
    }
};
?>

<div>
    
    
    <div class="content">
        <div class="cards">
            <section class="panel">
                <h3 class="panelHeading">Portfolio status</h3>
                <dl class="panelBody">
                    <dt>Status</dt><dd>running</dd>
                    <dt>Environment</dt><dd>Developer portfolio</dd>
                    <dt>Role</dt><dd>DevOps Engineer</dd>
                    <dt>Experience</dt><dd>7+ Years</dd>
                    <dt>Location</dt><dd>Massachusetts</dd>
                    <dt>Availability</dt><dd>Open to Opportunities</dd>
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
            </div>
            <div class="tableScroll">
                <table>
                    <caption hidden>Portfolio projects</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tblProject as $project)
                            <tr>
                                <td>{{$project->flngProjectId}}</td>
                                <td><a>{{$project->fstrProjectTitle}}</a></td>
                                <td class="status">● {{$project->fstrStatus}}</td>
                                <td>{{$project->fstrType}}</td>
                                <td>{{$project->fstrDescription}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="panel" id="githubActivityContainer">
            <h3 class="panelHeading">Github Activity</h3>
            <div class="panelBody">
                <div id="githubActivity"></div>
            </div>
        </section>
        <section class="panel" id="coffeeConsumptionContainer">
            <h3 class="panelHeading">Coffee Consumption</h3>
            <div class="panelBody">
                <div id="coffeeConsumption"></div>
            </div>
        </section>

        <section class="panel" id="CareerAccomplishments">
            <h3 class="panelHeading">Career Accomplishments</h3>
            <div class="panelBody">
                <code>
                    [2019-02-01 09:00:00] INFO  Started development career<br>
                    [2022-06-01 10:30:00] INFO  Expanded backend expertise<br>
                    [2024-05-07 12:00:00] INFO  Deployed production infrastructure<br>
                    [2025-08-01 14:00:00] INFO  Expanded DevOps automation<br>
                    [2026-02-09 08:00:00] INFO  Promoted to Tech Team Manager<br>
                    [2026-10-17 18:00:00] INFO  Portfolio system operational<br>
                </code>
            </div>
        </section>
        
    </div>
    <script>
        async function githubActivity() {
            const response = await fetch('https://api.github.com/users/elliottdylan60/events');
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const responseData = await response.json();
            
            const dateCounts = {};
            responseData.forEach((element, index, array) => {
                const dateTime = new Date(element.created_at);
                const dateOnly = dateTime.toISOString().split('T')[0]; 
                dateCounts[dateOnly] = (dateCounts[dateOnly] || 0) + 1;
            });
            const x = Object.keys(dateCounts);
            const y = Object.values(dateCounts); 
            var trace = {
                x: x,
                y: y,
                type: 'scatter',
                mode: 'lines',
                line: {color: "#94ae0a"}, 
                fill: 'tozeroy',
            };
            var data = [trace];

            var layout = {
                uirevision:'true',
                xaxis: {
                    type: 'date',
                    showgrid: true,
                    gridcolor: 'rgba(242, 242, 242, 0.2)',
                    gridwidth: 1,
                    tickfont: { color: '#f2f2f2' },
                    tickformat: '%Y-%m-%d'
                },
                yaxis: {
                    autorange: true, 
                    showgrid: true,
                    gridcolor: 'rgba(242, 242, 242, 0.2)',
                    gridwidth: 1,
                    tickfont: { color: '#f2f2f2' }
                },
                "plot_bgcolor": "#262626",
                "paper_bgcolor": "#262626",
                margin: {
                    l: 20,  // Left
                    r: 0,  // Right
                    b: 20,  // Bottom
                    t: 0,  // Top
                    pad: 0  // Padding
                },
                
            };

            Plotly.react('githubActivity', data, layout);

            var myPlot = document.getElementById('githubActivity');
        }
        async function coffeeComsumption() {
            const x = ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'];
            const y = [0,0,0,0,0,30,60,80,100,100,100,100,100,100,100,100,100,100,80,40,20,10,0,0]; 
            var trace = {
                x: x,
                y: y,
                type: 'scatter',
                mode: 'lines',
                line: {color: "#94ae0a"}, 
                fill: 'tozeroy',
            };
            var data = [trace];

            var layout = {
                uirevision:'true',
                xaxis: {
                    showgrid: true,
                    gridcolor: 'rgba(242, 242, 242, 0.2)',
                    gridwidth: 1,
                    tickfont: { color: '#f2f2f2' }
                },
                yaxis: {
                    autorange: true, 
                    showgrid: true,
                    gridcolor: 'rgba(242, 242, 242, 0.2)',
                    gridwidth: 1,
                    tickfont: { color: '#f2f2f2' }
                },
                "plot_bgcolor": "#262626",
                "paper_bgcolor": "#262626",
                margin: {
                    l: 20,  // Left
                    r: 0,  // Right
                    b: 20,  // Bottom
                    t: 0,  // Top
                    pad: 0  // Padding
                },
                
            };

            Plotly.react('coffeeConsumption', data, layout);

            var myPlot = document.getElementById('githubActivity');
        }
        githubActivity();
        coffeeComsumption();
    </script>
</div>