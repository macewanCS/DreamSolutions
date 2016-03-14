$(document).ready(function() {
    $('.bId').on('change', function(e){
      console.log('Im in the on change listener.');
      console.log('This is the event: ');
      console.log(e);

      var b_Id = e.target.value;
      console.log('This is b_Id: ' + b_Id);

      $.get('/ajax-goal?b_Id=' + b_Id, function(data){
        console.log('Im in the ajax get.');
        console.log(data);
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
    });

    $('.actionId').on('change', function(e){
      var action_Id = e.target.value;
      console.log('This is action_Id: ' + action_Id);

      $.get('/ajax-task?action_Id=' + action_Id, function(data){
        $('.taskId').empty();
        $('.taskId').append('<option default selected disabled>Select Task</option>');
        $.each(data, function(index, taskObj){
          $('.taskId').append('<option value="' + taskObj.id + '">' + taskObj.description + '</option>');
        });
      });
    });
  });
