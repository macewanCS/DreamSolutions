$(document).ready(function() {
  $('select').select2({width: '232px'});
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
            $('.dActionPriority').empty();
            $('.dActionPriority').text(pri[actionData.priority-1]);
            $('.dActionDate').val(actionData.due_date);
            });
          });
        } else { // Delete, task
          $.get('/ajax-task?action_Id=' + action_Id, function(data){
            $('.taskId').empty();
            $('.taskId').append('<option default selected disabled>Select Task</option>');
            $.each(data, function(index, taskObj){
              $('.taskId').append('<option value="' + taskObj.id + '">' + taskObj.description + '</option>');
            });
          });
        }
      } else { // In update section.
        if ($('#uaction').hasClass('active')) {
          var lUsers = new Array();
          $.get('ajax-goat_lUsers?goat_Id=' + action_Id, function(data){
          $.each(data, function(index, userData) {
            lUsers.push(userData.id);
          });
          $('#uActionLeads').val(lUsers).trigger("change");
          });
          var cUsers = new Array();
          $.get('ajax-goat_cUsers?goat_Id=' + action_Id, function(data){
          $.each(data, function(index, userData) {
            cUsers.push(userData.id);
          });
          $('#uActionCollabs').val(cUsers).trigger("change");
          });
          $.get('/ajax-actionData?action_Id=' + action_Id, function(data){
          $.each(data, function(index, actionData){
            $('.uActionPriority').val(actionData.priority).trigger("change");
            $('.uActionDate').val(actionData.due_date);
          });
          });
          $('.actionDescription').empty();
          var actionId = $('.actionId option[value=' + action_Id + ']').first().text();
          $('.actionDescription').text(actionId);
        } else {
          $.get('/ajax-task?action_Id=' + action_Id, function(data){
            $('.taskId').empty();
            $('.taskId').append('<option default selected disabled>Select Task</option>');
            $.each(data, function(index, taskObj){
              $('.taskId').append('<option value="' + taskObj.id + '">' + taskObj.description + '</option>');
            });
          });
        }
      }
    });
//----------------------------------------------------------------------------------------------------------------
    $('.taskId').on('change', function(e){
      var task_Id = e.target.value;

      if ($('#delete').hasClass('active')) {
        if ($('#dtask').hasClass('active')) {
          $.get('ajax-Leads?goat_Id=' + task_Id, function(data){
            $('#dTaskLeads').empty();
            $.each(data, function(index, user){
              $('#dTaskLeads').append('<tr><td>' + user + '</td></tr>');
            });
          });
          $.get('ajax-Collabs?goat_Id=' + task_Id, function(data){
            $('#dTaskCollabs').empty();
            $.each(data, function(index, user){
              $('#dTaskCollabs').append('<tr><td>' + user + '</td></tr>');
            });
          });
          $.get('/ajax-taskData?task_Id=' + task_Id, function(data){
            $.each(data, function(index, taskData){
              $('.taskPriority').empty();
              $('.taskPriority').text(pri[taskData.priority-1]);
            });
          });
          $.get('/ajax-taskData?task_Id=' + task_Id, function(data){
          $.each(data, function(index, taskData){
            $('.dTaskPriority').val(taskData.priority).trigger("change");
            $('.dTaskDate').val(taskData.due_date);
          });
          });
        }
      } else { // In update section.
        if ($('#utask').hasClass('active')) {
          var lUsers = new Array();
          $.get('ajax-goat_lUsers?goat_Id=' + task_Id, function(data){
          $.each(data, function(index, userData) {
            lUsers.push(userData.id);
          });
          $('#uTaskLeads').val(lUsers).trigger("change");
          });
          var cUsers = new Array();
          $.get('ajax-goat_cUsers?goat_Id=' + task_Id, function(data){
          $.each(data, function(index, userData) {
            cUsers.push(userData.id);
          });
          $.get('/ajax-taskData?task_Id=' + task_Id, function(data){
          $.each(data, function(index, taskData){
            $('.uTaskPriority').val(taskData.priority).trigger("change");
            $('.uTaskDate').val(taskData.due_date);
          });
          });
          $('#uTaskCollabs').val(cUsers).trigger("change");
          });
          $('.taskDescription').empty();
          var taskId = $('.taskId option[value=' + task_Id + ']').first().text();
          $('.taskDescription').text(taskId);
      }
    }
    });
  });
