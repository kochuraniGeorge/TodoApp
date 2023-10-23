<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homePage.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/homePage.js') }}"></script>
</head>

<body>
    <h1>WELCOME TO ToDo APP</h1>
    <h2 class="personName"><u> {{auth()->user()->full_name}}</u></h2>
    <form method="POST" action="{{ route('addtask') }}">
        @csrf

    <table id="taskTable">
            <tr>
                <td>
                    <label class="enterName" for="name"><b>Name of Task</b></label>
                </td>
                <td>
                    <label for="description"><b>New ToDo</b></label>
                </td>
            </tr>


            <!-- retrieve the value of an input field named 'task' from a previous form submission.If there is no old input data for 'task', it defaults to an array containing a single element, [0].if there is no data consider as one element,ie [0] . so 0<1. condition true. print error  -->
            @for ($i = 0; $i < count(old('task', [0])); $i++) 
            <tr class='tableData template'>
           
                <td>
                    <input class="name" type="text" id="name" name="task[0][name]" placeholder="Enter name of task">
                </td>

                <td>
                    <input class="task" type="text" id="description" name="task[0][description]" placeholder="Enter task..." value="" size="60" maxlength="100">
                </td>
                <td>
                    <button class="plus" type="button">+</button><br>  
                </td>
            </tr>
            
            <!-- asd -->
            <tr class="error-message">
                <td>
                    @error('task.'.$i.'.name')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </td>
                <td>
                    @error('task.'.$i.'.description')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                </td>   
            </tr>
</table>   
    @endfor
        <button class="addTaskBtn" type="submit">Add Task</button><br>
    </form>
        <!-- <input class="name" type="text" id="name" name="name" placeholder="Enter name of task"><br>
        <input class="task" type="text" id="description" name="description" placeholder="Enter task..." value="" size="60" maxlength="100"><br> --> 
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="logOutButton" type="submit">Logout</button>
    </form>
    <form method="POST" action="{{ route('profile_off') }}">
        @csrf
        <button class="photoBtn" type="submit">Upload Photo</button>
    </form>


    @if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
    @endif

    <a href="/myTasks" class="btn">
        <h3><u>My tasks</u></h3>
    </a>

    @if(session('successPhotoUpdation'))
    <div class="alert alert-success">
        {{ session('successPhotoUpdation') }}
    </div>
    @endif

    <form method="POST" action="{{ route('view_profile_pic') }}">
        @csrf
        <button class="viewProfileButton" type="submit">View Profile</button>
    </form>

</body>

</html>