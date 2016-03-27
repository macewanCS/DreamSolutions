$(document).ready(function() {
  $('select').select2();
  $('.uActionPriority').select2();
  $(".js-basic-multiple").select2();
  var pri = ['High', 'Medium', 'Low'];
  var actionDate = '';
  var taskDate = '';
//----------------------------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------------------------
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
//----------------------------------------------------------------------------------------------------------------
    $('.actionId').on('change', function(e){
      var action_Id = e.target.value;

      if ($('#delete').hasClass('active')) {
        if ($('#daction').hasClass('active')) {
            $.get('ajax-Leads?goat_Id=' + action_Id, function(data){
            $('#dActionLeads').empty();
            $.each(data, function(index, user){
              $('#dActionLeads').append('<tr><td>' + user + '</td></tr>');
            });
          });
          $.get('ajax-Collabs?goat_Id=' + action_Id, function(data){
            $('#dActionCollabs').empty();
            $.each(data, function(index, user){
              $('#dActionCollabs').append('<tr><td>' + user + '</td></tr>');
            });
          });
          $.get('/ajax-actionData?action_Id=' + action_Id, function(data){
          $.each(data, function(index, actionData){
            $('.actionPriority').empty();
            $('.actionPriority').text(pri[actionData.priority-1]);
            });
          });
        }
      } else { // In update section.
        if ($('#uaction').hasClass('active')) {
          $.get('ajax-goat_users?goat_Id=' + action_Id, function(data){
          $.each(data, function(index, pivotData) {

            // $('#uActionLeads option[value="' + pivotData.user_id + '"]').attr('selected', true);

            if (pivotData.user_role == 'L') {
              // $('#uActionLeads').select2(pivotData, {id: pivotData.user_id});
              $('#uActionLeads').val(pivotData.user_id).trigger("change");
              $('#uActionLeads').multiselect("refresh");
            } else {
              // $('#uActionCollabs').val(pivotData.user_id).trigger("change");
            }
          });
          });
        }

        $('.actionDescription').empty();
        var actionId = $('.actionId option[value=' + action_Id + ']').first().text();
        $('.actionDescription').text(actionId);
      }
      $.get('/ajax-actionData?action_Id=' + action_Id, function(data){
        $.each(data, function(index, actionData){
          $('.uActionPriority').val(actionData.priority).trigger("change");
          $('.dDate').val(actionData.due_date);
        });
      });
      if ( $('#uTask').hasClass('active') || $('#dTask').hasClass('active')) {
        $.get('/ajax-task?action_Id=' + action_Id, function(data){
          $('.taskId').empty();
          $('.taskId').append('<option default selected disabled>Select Task</option>');
          $.each(data, function(index, taskObj){
            $('.taskId').append('<option value="' + taskObj.id + '">' + taskObj.description + '</option>');
          });
        });
      }
    });
//----------------------------------------------------------------------------------------------------------------
    $('.taskId').on('change', function(e){
      var task_Id = e.target.value;

      $.get('/ajax-taskData?task_Id=' + task_Id, function(data){
        $.each(data, function(index, taskData){
          $('.taskPriority').empty();
          $('.taskPriority').text(pri[taskData.priority-1]);
        });
      });
    });
  });
