document.addEventListener("DOMContentLoaded", function (){
    // Show Tasks
    function loadTasks() {
        $.ajax({
            url: "../model/show-tasks.php",
            type: "POST",
            success: function(data) {
                $("#tasks").html(data);
            }
        });
    }

    loadTasks();

    // Add Task
    $("#addBtn").on("click", function(e) {
        e.preventDefault();

        var task = $("#taskValue").val();

        $.ajax({
            url: "../model/add-task.php",
            type: "POST",
            data: {task: task},
            success: function(data) {
                loadTasks();
                $("#taskValue").val('');
            }
        });
    });

    // Remove Task
    $(document).on("click", "#removeBtn", function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: "../model/remove-task.php",
            type: "POST",
            data: {id: id},
            success: function(data) {
                loadTasks();
            }
        });
    });
});