Summary
=======
The Edmonton Public Library (EPL) develops a business plan every 3-5 years
that is currently tracked using Excel spreadsheets. It is difficult to
maintain the spreadsheets because multiple copies are made throughout
departments. A new web-based system would remove inconsistencies between
departments and provide a rigid structure. It will provide a single point of
access that is easily manageable.

User Requirements
=================
- The administrator can add users, modify their information/permission levels, and delete users. They can also add, modify or delete departments and teams.
- The Business Plan Lead can create, modify, and delete business plan-related
  goals and objectives. They cannot change non-business plan department/team
  goals.
- The Team Lead can create, modify, and delete  *actions* and *tasks* 
  for their own deparment as well as assign them to anyone within the 
  department. They can also create, modify, and delete *non-business plan goals*
  and *tasks*. They can also be assigned tasks.
- A basic user can update the status of an *action* or *task* assigned to them
  as a lead or a collaborator.
- The lead of a given *action* or *task* can appoint another user to
  collaborate on that task, but collaborators can only be removed by the
  Team Lead of the department that owns the *action*/*task* or the
  Business Plan Lead.
- All users can view a table of all the goals and objectives as well as the
  changelog for each. 


Functional Requirements
=======================
- Supports the following elements:
  - Action
  - Budget
  - Due date
  - Lead
  - Collaborator
  - Department or team that owns each goal
  - Status updates - with dates
  - Success measure(s)
  - Notes
- The business plan and tracked is organized in the following hierarchy:
  - *Business Plan Goals*
    - *Business Plan Objectives*
      - *Team/Department Actions*
        - *Team/Department Tasks*
  - *Non-business plan team/department Goals*
    - *Team/Department Tasks*
- An interface for users to create and update goals
- A user management system (add, modify, delete users)
- Ability to sort, search, and filter data
- A dashboard view showing on time, completed and overdue actions

Options
- A changelog for each goal or objective
- A notification system for approaching deadlines
- Generate reports by exporting to Excel


