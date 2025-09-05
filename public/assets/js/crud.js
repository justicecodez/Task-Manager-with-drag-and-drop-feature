$('#taskForm').on('submit', function (e) {
    e.preventDefault();
    let form= this
    let formData = new FormData(this);

    $.ajax({
        url: create,  // Use the 'create' variable defined in the Blade template
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $('#addTaskBtn').attr('disabled', true).text('Adding...');
        },
        success: function (response) {
            // Handle success (e.g., close modal, refresh task list)
            $('#addTaskModal').modal('hide');
            form.reset()
            location.reload(); // Reload the page to see the new task
        },
        error: function (xhr) {
            // Handle error
            alert('An error occurred while creating the task.');
            form.reset()
            $('#addTaskBtn').attr('disabled', false).text('Add Task');
        }
    });
});

