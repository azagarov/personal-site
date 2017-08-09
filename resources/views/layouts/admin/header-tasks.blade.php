<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-flag-o"></i>
    <span class="label label-danger">{{ $_tasks['count'] }}</span>
</a>
<ul class="dropdown-menu">
    <li class="header">You have {{ $_tasks['count'] }} tasks</li>
    <li>
        <!-- Inner menu: contains the tasks -->
        <ul class="menu">

            @foreach($_tasks['recent'] as $_task)
            <li><!-- Task item -->
                <a href="{{ url('/admin/tasks/edit/'.$_task->id) }}">
                    <!-- Task title and progress text -->
                    <h3>
                        {{ $_task->ShortTitle() }}

                        <small class="pull-right">&nbsp; &nbsp; {{ $_task->percentage }}%</small>

                        @if($_task->priority == \App\Task::PRIORITY_LOW)
                            <small class="label label-success pull-right">Low</small>
                        @elseif($_task->priority == \App\Task::PRIORITY_MEDIUM)
                            <small class="label label-primary pull-right">Medium</small>
                        @elseif($_task->priority == \App\Task::PRIORITY_HIGH)
                            <small class="label label-warning pull-right">High</small>
                        @elseif($_task->priority == \App\Task::PRIORITY_CRITICAL)
                            <small class="label label-danger pull-right">Critical</small>
                        @endif

                    </h3>
                    <!-- The progress bar -->
                    <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: {{ $_task->percentage }}%" role="progressbar" aria-valuenow="{{ $_task->percentage }}" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">{{ $_task->percentage }}% Complete</span>
                        </div>
                    </div>
                </a>
            </li>
            <!-- end task item -->
            @endforeach
        </ul>
    </li>
    <li class="footer">
        <a href="{{ url('/admin/tasks') }}">View all tasks</a>
    </li>
</ul>
