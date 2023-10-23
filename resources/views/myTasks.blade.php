<html>
<body>
<link rel="stylesheet" type="text/css" href="{{ asset('css/myTasks.css') }}">

    <h1><u> ToDo Tasks of {{auth()->user()->full_name}}</u></h1>
    <table>
        <tr>
            <th>Name of Task</th>
            <th>Description</th>
            <th>User name</th>
            <th>Created_at</th>
        </tr>

 @foreach ($tableData as $tableData)<!-- $tableData  from task controller -->
        <tr>              
                <td>{{ $tableData->name }}</td>
                <td>{{ $tableData->description }}</td>
                <!-- userRelation=fun name @model named Task -->
                <td>{{ $tableData->userRelation->full_name }}</td>
                <td>{{ $tableData->created_at ->format('d/m/Y')}}</td>
        </tr>
                @endforeach
    </table>
<div class="backToHome">
  <a href="{{'homePage'}}">Back to Home Page</a>
</div>
</body>
</html>