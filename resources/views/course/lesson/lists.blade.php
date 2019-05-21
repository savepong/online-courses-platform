<div class="card">
    <div class="card-header">
        <h4 class="card-title">Lessons</h4>
    </div>
    <ul class="list-group list-group-fit">
        <?php $i = 1;?>
        @foreach ($course->lessons as $ls)
        <li class="list-group-item {{ $lesson->id != $ls->id ?: 'active' }}">
            
            <a href="{{ route('lesson.edit', $ls->id) }}"><i class="material-icons text-muted-light  btn__icon--left">keyboard_arrow_left</i>Lesson {{ $i++ }}.</a>
        </li>
        @endforeach
    </ul>
    <div class="card-footer">
        <a href="{{ route('lesson.create', ['course' => $course->id]) }}" class="btn btn-default btn-block">
            Add Lesson<i class="material-icons btn__icon--right">add</i>
        </a>
    </div>
</div>