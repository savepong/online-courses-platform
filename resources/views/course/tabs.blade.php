<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ isActive(['course.edit'], 'active tab-active') }}" href="{{ route('course.edit', $course->slug) }}">Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive(['lesson.index', 'lesson.edit'], 'active tab-active') }}" href="{{ route('lesson.index', ['course' => $course->id]) }}">Lessons</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isActive(['course.students'], 'active tab-active') }}" href="{{ route('course.students', $course->slug) }}">Students</a>
    </li>
</ul>
<br>