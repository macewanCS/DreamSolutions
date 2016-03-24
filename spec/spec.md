EPL Business Plan Manager
=========================

The goal of this application is to allow library users to manage goals, objectives, actions, and tasks in the EPL Business Plan.

The EPL Business Plan Manager is a PHP application using the Laravel framework.

Data Structure
--------------

The data is organized in a hierarchical structure as described below:
```
Goal
└───Objective
    └──Action
       └───Task
```

The above items are colloquially referred to as GOATs.

All objectives must belong to a goal, all actions must belong to an objective, and all tasks must belong to an action.

Each of the GOATs have the following attributes:

| GOAT | Description | Department | Lead | Collaborator | Due date | Priority | Budget | Status | Success Measures | Notes |
|------|:-----------:|:--:|:--:|:------------:|:--------:|:--------:|:------:|:------:|:--:|:--:|
| Goal | &#9989;   |      |              |          |          |        |        |  |   |
| Objective | &#9989; |    |              |          |          |        |  |   |   |
| Action| &#9989; |&#10003;|&#10003;|&#10003;|&#9989;|&#10003;|&#10003;|&#9989;|&#10003;|&#10003;|
| Task | &#9989; |&#10003;|&#10003;|&#10003;|&#9989;|&#10003;|&#10003;|&#9989;|&#10003;|&#10003;|

&#9989; Required ;
&#10003; Optional

Description: a description of the GOAT
Department: The department the action or task belongs to
Lead: The users assigned as leads to the GOAT
Collaborations: The users or departments/teams assigned as collaborators to the GOAT
Due date: When the goat should be completed by
Priority: Either high, medium, or low
Budget: Amount of money allocated for GOAT completion
Status: Either completed or incomplete
Success Measures: How to tell when the GOAT is complete
Notes: Status notes

GOATs can be either be part of a business plan, or they can belong just to one department or team.

Users
-----

The following table describes the user roles along with their allowed actions:

| Role | Manage Users/Depts/Teams | Create BPs | Manage Goals | Manage Objectives | Manage Actions | Manage Tasks | Update GOAT status/notes | View BPs |
|---|:--:|:--:|:--:|:--:|:--:|:--:|:--:|:--:|
|Administrator | &#10003;|  |    |   |   |   |  |   &#10003; |
| BP Lead |     | &#10003;|&#10003;|&#10003;|&#10003;|&#10003;|   |&#10003;|
| Dept/Team Lead |  |   |   |   | Dept/Team only| Dept/Team only | &#10003; | &#10003; |
| Assigned GOAT Lead |  |   |   |   |   |   |   &#10003;   |&#10003;|
| Basic User    |   |   |   |   |   |  | |  &#10003; |

- A Dept/Team Lead can create actions and tasks for their own department, given a goal and objective. 
- BP Leads can also create actions and tasks, which a Dept/Team Lead can later assign to their own department.

Using the Business Plan Manager
===============================

Logging in
----------
You must have an account set up by an administrator to access the system. Without an account, you can only view the business plan. Simply type
your username and password on the login screen to access your dashboard.

The dashboard
-------------
From the dashboard, you can see your assigned GOATs as well as your recent activity. You will be able to change the status of or add a note to an assigned GOAT by clicking the &#9998; (edit) button beside the GOAT.

There is a summary of your incomplete, complete, and overdue tasks.

Viewing the Business Plan
-------------------------
The Business Plan is represented by a large sortable and filterable table. GOATs by their nature follow the above hierarchical structure and
are collapsible by clicking the triangle on the left side of a particular GOAT. 

Sorting is done by clicking the table headers. Once the table is sorted, goals and objectives are hidden.

Filtering is done using the filter bar at the top of the table.

You can remove all sorts and filters by clicking the Reset View button at the top of the table.

You can click on an action or task to view more specific details. Depending on your user role, you will be able to click the &#9998; (edit) or 
&#10133; (create a child of) a particular GOAT.

The BP can exported to a variety of formats, including CSV and JSON.

Viewing specific action/task details
------------------------------------
From the dashboard or viewing business plan pages, you can access a page with more specific details, including success measures and budget.

From this screen, you view the current attributes of an action and task, and its change history.

You can add notes, add/update any of the attributes, and change its completion status depending on your user role.

Viewing the BP history
----------------------
The history is also viewed in a large sortable and filterable table similar to viewing the business plan.

Managing the BP
---------------
First, you have to click Create, Update, or Delete to choose the action you wish you perform. Then, you choose the particular GOAT type
the action is performed on. Afterwards, a form will appear which will contain the following elements depending on the GOAT type is selected:

Create/Update

| GOAT          | BP Year | Goal    | Objective | Action| Description | Leads | Collaborators | Due date | Priority | Budget |
|---------------|:-------:|:-------:|:---------:|:-----:|:-----------:|:-----:|:-------------:|:--------:|:--------:|:------:|
| Goal          | &#9989; |         |           |       | &#9989;     |       |               |          |          |        |
| Objective     | &#9989; | &#9989; |           |       | &#9989;     |       |               |          |          |        |
| Action        | &#9989; | &#9989; | &#9989;   |       | &#9989;     |&#9989;| &#10003;      | &#9989;  | &#9989;  |&#10003;|
| Task          | &#9989; | &#9989; | &#9989;   |&#9989;| &#9989;     |&#9989;| &#10003;      | &#9989;  | &#9989;  |&#10003;|

&#9989; Required ;
&#10003; Optional

To select a GOAT, you must select the parent goals, objectives, and/or actions.

When deleting the GOAT, the attributes are shown in a read-only format so that you will be able to verify which GOAT you are deleting.

Creating a new BP
-----------------
There is a guided system to help BP Leads create new business plans.

1. Select the start and end years of the BP
2. Write goals description
3. For each goal, create objectives
4. For each objective, create actions
5. Verify the business plan structure and create it.

Creating goals, objectives, and actions is done similar to the `Managing a BP` section above.

Managing Users
--------------
To create a user, a username, first/last name, email, and a temporary password must be assigned.

These fields can also be updated by the administrator.

Forgotten passwords can be reset from this screen.

Users can be "archived" but not deleted to preserve former BP history.

Users can be assigned to departments or teams.

To assign roles to a user, a user must exist (and be selected). Roles are assigned through a table structure.

A user can change their own email, password, and name.

Managing departments and teams
------------------------------
The administrator can create, update, and archive departments and teams.

These departments and teams must have an assigned name.

Users are added to these departments and teams from the user management page.

Supplemental Materials
======================

    Database schema

License
=======
Copyrighted by default. Please contact [Cody Moorhouse](mailto:moorhousec2@mymacewan.ca) for more information.