$(document).ready(function() {
    $('.bId').on('change', function(e){
      var b_Id = e.target.value;

      $.get('/ajax-goal?b_Id=' + b_Id, function(data){
        $('.goalId').empty();
        $('.goalId').append('<option default selected disabled>Select Goal</option>');
        $.each(data, function(index, goalObj){
          $('.goalId').append('<option value="' + goalObj.id + '">' + goalObj.description + '</option>');
        });
      });
    });

    $('.goalId').on('change', function(e){
      var goal_Id = e.target.value;

      $.get('/ajax-objective?goal_Id=' + goal_Id, function(data){
        $('.objId').empty();
        $('.objId').append('<option default selected disabled>Select Objective</option>');
        $.each(data, function(index, objObj){
          $('.objId').append('<option value="' + objObj.id + '">' + objObj.description + '</option>');
        });
      });

      $('.goalDescription').empty();
      var goalId = $('.goalId option[value=' + goal_Id + ']').first().text();
      $('.goalDescription').text(goalId);

    });

    $('.objId').on('change', function(e){
      var obj_Id = e.target.value;

      $.get('/ajax-action?obj_Id=' + obj_Id, function(data){
        $('.actionId').empty();
        $('.actionId').append('<option default selected disabled>Select Action</option>');
        $.each(data, function(index, actionObj){
          $('.actionId').append('<option value="' + actionObj.id + '">' + actionObj.description + '</option>');
        });
      });

      $('.objectiveDescription').empty();
      var objId = $('.objId option[value=' + obj_Id + ']').first().text();
      $('.objectiveDescription').text(objId);
    });

    $('.actionId').on('change', function(e){
      var action_Id = e.target.value;

      $.get('/ajax-task?action_Id=' + action_Id, function(data){
        $('.taskId').empty();
        $('.taskId').append('<option default selected disabled>Select Task</option>');
        $.each(data, function(index, taskObj){
          $('.taskId').append('<option value="' + taskObj.id + '">' + taskObj.description + '</option>');
        });
      });

      $.get('/ajax-actionPriority?action_Id=' + action_Id, function(data){
        $.each(data, function(index, priorityLevel){
          $('.actionPriority').empty();
          $('.actionPriority').text(priorityLevel.priority);
        });
      });

      $('.actionDescription').empty();
      var actionId = $('.actionId option[value=' + action_Id + ']').first().text();
      $('.actionDescription').text(actionId);
    });

    $('.taskId').on('change', function(e){
      var task_Id = e.target.value;

      $.get('/ajax-taskPriority?task_Id=' + task_Id, function(data){
        $.each(data, function(index, priorityLevel){
          $('.taskPriority').empty();
          $('.taskPriority').text(priorityLevel.priority);
        });
      });

      $('.taskDescription').empty();
      var taskId = $('.taskId option[value=' + task_Id + ']').first().text();
      $('.taskDescription').text(taskId);
    });
  });
