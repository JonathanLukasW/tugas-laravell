let todoList = [];
let editIndex = -1; // -1 artinya tidak sedang edit

function validateForm(todo, date) {
    if (todo.trim() === '' || date.trim() === '') {
        alert('Please enter a todo item and a due date.');
        return false;
    }
    return true;
}

function addTodo(todo, date) {
    const todoItem = {
        task: todo,
        date: date,
        status: 'Pending'
    };
    todoList.push(todoItem);
    displayTodos();
}

function displayTodos(filter = 'all') {
    const todoListElement = document.getElementById('todo-list');
    todoListElement.innerHTML = '';

    let filteredList = todoList;
    if (filter === 'pending') {
        filteredList = todoList.filter(item => item.status === 'Pending');
    } else if (filter === 'completed') {
        filteredList = todoList.filter(item => item.status === 'Completed');
    }

    if (filteredList.length === 0) {
        todoListElement.innerHTML = `<tr><td colspan="4" style="text-align:center;">No task found</td></tr>`;
        return;
    }

    filteredList.forEach((item, index) => {
        todoListElement.innerHTML += `
            <tr>
                <td>${item.task}</td>
                <td>${item.date}</td>
                <td>${item.status}</td>
                <td>
                    <button class="complete-btn" onclick="markComplete(${index})">Complete</button>
                    <button class="edit-btn" onclick="editTodo(${index})">Edit</button>
                    <button class="delete-btn" onclick="deleteTodo(${index})">Delete</button>
                </td>
            </tr>
        `;
    });
}

function markComplete(index) {
    todoList[index].status = 'Completed';
    displayTodos(document.getElementById('filter-select').value);
}

function deleteTodo(index) {
    todoList.splice(index, 1);
    displayTodos(document.getElementById('filter-select').value);
}

function deleteAll() {
    todoList = [];
    displayTodos(document.getElementById('filter-select').value);
}

function editTodo(index) {
    const item = todoList[index];
    document.getElementById('todo-input').value = item.task;
    document.getElementById('date-input').value = item.date;
    editIndex = index;
    document.getElementById('add-btn').textContent = "✓";
}

document.getElementById('todo-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const todo = document.getElementById('todo-input').value;
    const date = document.getElementById('date-input').value;

    if (validateForm(todo, date)) {
        if (editIndex === -1) {
            addTodo(todo, date);
        } else {
            todoList[editIndex].task = todo;
            todoList[editIndex].date = date;
            editIndex = -1;
            document.getElementById('add-btn').textContent = "+";
            displayTodos(document.getElementById('filter-select').value);
        }
        document.getElementById('todo-input').value = '';
        document.getElementById('date-input').value = '';
    }
});

document.getElementById('delete-all-btn').addEventListener('click', deleteAll);

document.getElementById('filter-select').addEventListener('change', function() {
    displayTodos(this.value);
});

displayTodos();
