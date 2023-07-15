<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background: #6D4C41;
            color:white;
        }

        .list-group-item, .alert {
            background: #8D6E63;
        }

        span {
            color:#D7CCC8;
        }

        .btn {
            background:#D7CCC8;
        }

        .completed {
            text-decoration: line-through;
        }

        .fas {
            color:#8D6E63;
        }

        .close-btn {
            background-color:transparent;
            color:white;
            outline:none;
            border:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 text-center display-4"><span>Simple</span> Todo <span>List</span></h1>
        
        @if (session('success'))
            <div class="alert mt-4 d-flex align-items-center justify-content-between" onclick="this.remove()">
                 {{ session('success') }}
                <button class="close-btn">x</button>
            </div>
        @endif



        <form method="POST" action="{{ route('todos.store') }}" class="my-5">
            @csrf
            <h3 class="lead">What you wanna do?</h3>
            <div class="input-group mb-3">
                <input type="text" name="title" class="form-control " placeholder="Enter a new todo" style=" box-shadow: none;">
                <div class="input-group-append">
                    <button class="btn" type="submit">Add</button>
                </div>
            </div>
        </form>

        <ul class="list-group">
            <h3 class="lead">List of things you will do</h3>
            @forelse ($todos as $todo)
                <li class="list-group-item mb-2 d-flex justify-content-between align-items-center border-0 shadow-sm">
                    <form method="POST" action="{{ route('todos.update', $todo) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                            <label class="form-check-label {{ $todo->completed ? 'completed' : '' }}">{{ $todo->title }}</label>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('todos.destroy', $todo) }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm" type="submit">  <i class="fas fa-trash delete-icon"></i></button>
                    </form>
                </li>
            @empty
                <li class="list-group-item">No todos found.</li>
            @endforelse
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
