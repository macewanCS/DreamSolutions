@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@stop

@section('content')
    <div id="manage-plan-area">

        <div style="height: 25px">
            <div style="float: left">
                <label>Business Plan Year: </label>
                <select>
                    <option>Load years here</option>
                </select>
            </div>

            <div style="float: right;">
                <a href="{{ action('WizardController@create') }}">Create Business Plan</a>
            </div>
        </div>

        <!-- Top level tab container for create, update, delete -->
        <div class="duc-tabs">
            <nav>
                <ul class="duc-tab-links">
                    <li class="active"><a data-toggle="tab" href="#create">Create</a></li>
                    <li><a data-toggle="tab" href="#update">Update</a></li>
                    <li><a data-toggle="tab" href="#delete">Delete</a></li>
                </ul>
            </nav>

            <div class="tab-content">
                <!-- partials go in here? How to override create, update, delete button? -->
                <div id="create" class="tab fade in active">

                    <!-- Top level container for goal, objective, action, task -->
                    <div class="goat-tabs">
                        <nav>
                            <ul class="goat-tabs-links">
                                <li class="active"><a data-toggle="tab" href="#goal">Goal</a></li>
                                <li><a data-toggle="tab" href="#objective">Objective</a></li>
                                <li><a data-toggle="tab" href="#action">Action</a></li>
                                <li><a data-toggle="tab" href="#task">Task</a></li>
                            </ul>
                        </nav>

                        <div class="tab-content">
                            <div id="goal" class="tab fade in active">
                                <form>
                                    <label>Goal description</label>
                                    <br>
                                    <input type="text" name="goalDescription"><br>
                                    <button class="button">Create</button>
                                </form>
                            </div>

                            <div id="objective" class="tab fade">
                                <div id="objective-left">
                                    <label>Goal</label>
                                    <br>
                                    <select>
                                        <option>Load in goals here</option>
                                    </select>
                                </div>
                                <div id="objective-right">
                                    <label>
                                        Objective description
                                    </label>
                                    <form>
                                        <input type="text" name="objectiveDescription"><br>
                                        <button class="button">Create</button>
                                    </form>
                                </div>
                            </div>

                            <div id="action" class="tab fade">
                                <div id="action-left">
                                    <label>Goal</label>
                                    <br>
                                    <select>
                                        <option>Load in goals here</option>
                                    </select>
                                    <br>
                                    <label>Objective</label>
                                    <br>
                                    <select>
                                        <option>Load in objectives here</option>
                                    </select>
                                    <br>
                                    <label>Lead</label>
                                    <br>
                                    <form>
                                        <input type="text" name="leadName"><br>
                                        <button>+</button>
                                    </form>
                                    <label>Collaborator</label>
                                    <br>
                                    <input type="text" name="collaboratorName"><br>
                                    <label>End date</label>
                                    <br>
                                    <input type="date" name="endDate"><br>
                                </div>
                                <div id="action-right">
                                    <label>
                                    Action description
                                    </label>
                                    <br>
                                    <input type="text" name="actionDescription"><br>
                                    <label>
                                        Priority
                                    </label>
                                    <br>
                                    <select>
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                    <button class="button">Create</button>
                                </div>
                            </div>

                            <div id="task" class="tab fade">
                                <div id="task-left">
                                    <label>Goal</label>
                                    <br>
                                    <select>
                                        <option>Load in goals here</option>
                                    </select>
                                    <br>
                                    <label>Objective</label>
                                    <br>
                                    <select>
                                        <option>Load in objectives here</option>
                                    </select>
                                    <br>
                                    <label>Action</label>
                                    <br>
                                    <select>
                                        <option>Load in actions here</option>
                                    </select>
                                    <br>
                                    <label>Lead</label>
                                    <br>
                                    <input type="text" name="leadName"><br>
                                    <!-- If statement here? -->
                                    <label>Collaborator</label>
                                    <br>
                                    <input type="text" name="collaboratorName"><br>
                                    <!-- If statement here? -->
                                    <label>End date</label>
                                    <br>
                                    <input type="date" name="endDate"><br>
                                </div>
                                <div id="task-right">
                                    <label>
                                        Action description
                                    </label>
                                    <br>
                                    <input type="text" name="actionDescription"><br>
                                    <label>
                                        Priority
                                    </label>
                                    <br>
                                    <select>
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                    <button class="button">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="update" class="tab fade">
                    <p>Lorem ipsum hgocbijdcbks</p>
                </div>

                <div id="delete" class="tab fade">
                    <p>Tab #3gfgfgfgfgfgfgfgfgfgfgfgfgfg content goes here!</p>
                </div>
            </div>
        </div>

    </div>
@stop
