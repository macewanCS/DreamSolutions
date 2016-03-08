@extends('app')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/create-plan.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.steps.css">

    <script src="/js/jquery-1.12.1.min.js"></script>
    <script src="/js/jquery.steps.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/jquery.steps.create-plan.js"></script>
@stop

@section('content')

    <div id="create-plan-section">
        <form id="create-plan-form" action="#">
            <div>
                <h3>Years</h3>
                <section>
                    <h1 class="create-plan-year-labels">Start Year</h1>
                    <select class="create-plan-years required">
                        {!! $startYear = date('Y') !!}

                        @for ($startYear; $startYear < (date('Y') + 10); $startYear++)
                             {!! "\t<option value='".$startYear."'>".$startYear."</option>\n\r" !!}
                        @endfor
                    </select>

                    <h1 class="create-plan-year-labels">End Year</h1>
                    <select class="create-plan-years">
                        {!! $endYear = date('Y') + 1 !!}

                        @for ($endYear; $endYear < (date('Y') + 11); $endYear++)
                            {!! "\t<option value='".$endYear."'>".$endYear."</option>\n\r" !!}
                        @endfor
                    </select>
                </section>
                <h3>Goals</h3>
                <section>
                    <label for="goal1">Goal 1</label>
                    <input id="goal1" name="goal1" type="text" class="required">
                    <label for="goal2">Goal 2</label>
                    <input id="goal2" name="goal2" type="text">
                    <label for="goal3">Goal 3</label>
                    <input id="goal3" name="goal3" type="text">
                    <label for="goal4">Goal 4</label>
                    <input id="goal4" name="goal4" type="text">
                </section>
                <h3>Objectives</h3>
                <section>
                    <label for="objective1">Objective 1</label>
                    <input id="objective1" name="objective1" type="text" class="required">
                    <label for="objective2">Objective 2</label>
                    <input id="objective2" name="objective2" type="text">
                    <label for="objective3">Objective 3</label>
                    <input id="objective3" name="objective3" type="text">
                    <label for="objective4">Objective 4</label>
                    <input id="objective4" name="objective4" type="text">
                </section>
                <h3>Actions</h3>
                <section>
                    <label for="action1">Action 1</label>
                    <input id="action1" name="action1" type="text" class="required">
                    <label for="action2">Action 2</label>
                    <input id="action2" name="action2" type="text">
                    <label for="action3">Action 3</label>
                    <input id="action3" name="action3" type="text">
                    <label for="action4">Action 4</label>
                    <input id="action4" name="action4" type="text">
                </section>
            </div>
        </form>
    </div>
@stop
