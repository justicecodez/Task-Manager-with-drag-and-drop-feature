 <!-- Add Task Modal -->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="taskForm">
                        @csrf
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Task Title</label>
                            <input type="text" name="title" class="form-control" required id="taskTitle"
                                placeholder="Enter task title">
                        </div>
                        <div class="mb-3">
                            <label for="taskDescription" class="form-label">Description</label>
                            <textarea name="description" class="form-control" required id="taskDescription" rows="3"
                                placeholder="Enter task description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="taskDueDate" class="form-label">Due Date</label>
                                <input type="date" name="due_date" required class="form-control" id="taskDueDate">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="taskPriority" class="form-label">Priority</label>
                                <select name="priority" required class="form-select" id="taskPriority">
                                    <option value="" disabled selected>Select priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="taskCategory" class="form-label">Category</label>
                                <select name="category" required class="form-select" id="taskCategory">
                                    <option value="" disabled selected>Select category</option>
                                    <option value="work">Work</option>
                                    <option value="personal">Personal</option>
                                    <option value="shopping">Shopping</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="taskStatus" class="form-label">Status</label>
                                <select name="status" required required class="form-select" id="taskStatus">
                                    <option value="" disabled selected>Select status</option>
                                    <option value="todo">Todo</option>
                                    <option value="pending">Pending</option>
                                    <option value="done">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" id="addTaskBtn" class="btn btn-primary">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>