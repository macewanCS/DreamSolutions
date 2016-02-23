<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <title>Business Plan Manager</title>
    <link rel="stylesheet" type="text/css" href="/css/header.css"></link>
    <link rel="stylesheet" type="text/css" href="/css/manage_plan.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    
    @include('main_header')

    <div id="manage-plan-area">

        <div id="bpYearPicker">
            <label>Business Plan Year: </label>
            <select>
                <option>2012-2014</option>
                <option>2010-2012</option>
                <option>2008-2010</option>
            </select>
        </div>

        <div id="createBusinessPlan">
            <a href="#">Create Business Plan</a>
        </div>

        <!-- Top level tab container for create, update, delete -->
        <div class="duc-tabs">
            <ul class="duc-tab-links nav-tabs">
                <li class="active"><a data-toggle="tab" href="#create">Create</a></li>
                <li><a data-toggle="tab" href="#update">Update</a></li>
                <li><a data-toggle="tab" href="#delete">Delete</a></li>
            </ul>

            <div class="tab-content">
                <!-- partials go in here? How to override create, update, delete button? -->
                <div id="create" class="tab fade in active">

                    <!-- Top level container for goal, objective, action, task -->
                    <div class="goat-tabs">
                        <ul class="goat-tabs-links nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#goal">Goal</a></li>
                            <li><a data-toggle="tab" href="#objective">Objective</a></li>
                            <li><a data-toggle="tab" href="#action">Action</a></li>
                            <li><a data-toggle="tab" href="#task">Task</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="goal" class="tab fade in active">
                                <label>
                                    Goal description
                                </label>
                                <form>
                                    <input type="text" name="goalDescription"><br>
                                    <button class="button">Create</button>
                                </form>
                            </div>

                            <div id="objective" class="tab fade">
                                <div id="objective-left">
                                    <label>
                                        Goal
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in goals here
                                        </option>
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
                                    <label>
                                        Goal
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in goals here
                                        </option>
                                    </select>
                                    <br>
                                    <label>
                                        Objective
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in objectives here
                                        </option>
                                    </select>
                                    <br>
                                    <label>
                                        Lead
                                    </label>
                                    <br>
                                    <input type="text" name="leadName"><br>
                                    <!-- If statement here? -->
                                    <label>
                                        Collaborator
                                    </label>
                                    <br>
                                    <input type="text" name="collaboratorName"><br>
                                    <!-- If statement here? -->
                                    <label>
                                        End date
                                    </label>
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
                                        <option>
                                            High
                                        </option>
                                        <option>
                                            Medium
                                        </option>
                                        <option>
                                            Low
                                        </option>
                                    </select>
                                    <button class="button">Create</button>
                                </div>
                            </div>

                            <div id="task" class="tab fade">
                                <div id="task-left">
                                    <label>
                                        Goal
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in goals here
                                        </option>
                                    </select>
                                    <br>
                                    <label>
                                        Objective
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in objectives here
                                        </option>
                                    </select>
                                    <br>
                                    <label>
                                        Action
                                    </label>
                                    <br>
                                    <select>
                                        <option>
                                            Load in actions here
                                        </option>
                                    </select>
                                    <br>
                                    <label>
                                        Lead
                                    </label>
                                    <br>
                                    <input type="text" name="leadName"><br>
                                    <!-- If statement here? -->
                                    <label>
                                        Collaborator
                                    </label>
                                    <br>
                                    <input type="text" name="collaboratorName"><br>
                                    <!-- If statement here? -->
                                    <label>
                                        End date
                                    </label>
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
                                        <option>
                                            High
                                        </option>
                                        <option>
                                            Medium
                                        </option>
                                        <option>
                                            Low
                                        </option>
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

</body>
<!-- TODO:
    Verify input -->
</html>
