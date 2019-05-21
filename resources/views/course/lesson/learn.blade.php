@extends('layouts.learn')
@section('title', $course->title)


@section('content')
    <div class="panel-full">
        <div class="video-panel">
            <div class="panel-body">
                <div class="panel-tools">
                    <a href="{{ route('profile') }}">
                        <i class="fa fa-arrow-left mr-5" aria-hidden="true"></i>My Courses
                    </a>
                    @isset($lesson->file)
                    <div class="download-document">
                        <a href="{{ route('lesson.file.download', $lesson->id) }}" class="link-download" target="_blank">
                            <i class="fa fa-download" aria-hidden="true"></i> Download File
                        </a>
                    </div>
                    @endisset
                </div>
                <div class="video-frame">
                    <iframe id="" width="560" height="315" src="https://player.vimeo.com/video/{{ $lesson->video }}?title=0&byline=0&portrait=0&autoplay=1&color=FFC107&speed=1&transparent=1" frameborder="0"
                        allowfullscreen >
                    </iframe>
                </div>
            </div>
            <div class="panel-right">
                <div class="panel-title">
                    <a href="{{ route('course.view', $course->slug) }}"><h4 class="course-title">{{ $course->title }}</h4></a>
                    <p>
                        <a href="{{ route('user.profile', $course->author->username) }}"><img src="{{ $course->author->avatar_url }}"  style="height:20px;border-radius: 50%;"> {{ $course->author->name }}</a>
                    </p>
                    {{--  <p>
                        <strong>Time left :
                            <span class="text-primary" id="countdown"></span>
                        </strong>
                    </p>  --}}
                </div>
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#content" aria-controls="content" role="tab" data-toggle="tab">Video</a>
                    </li>
                    <li role="presentation">
                        <a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a>
                    </li>
                    <li role="presentation">
                        <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Comment</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="content">
                        <div class="list-group">
                            <?php $i = 1;?>
                            @foreach($course->lessons as $ls)
                            <a href="{{ route('course.learn', $course->slug) }}?lesson={{ $ls->id }}" class="list-group-item {{ request('lesson')==$ls->id ? 'active' : '' }}">
                                <span class="list-title"><i class="fa fa-play-circle-o" aria-hidden="true"></i> {{ $i++ }} : {{ $ls->title }}</span>
                                <small class="list-right text-muted text-right">
                                    {{ $ls->video_duration }}
                                </small>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="description">
                        <div class="box">
                            {!! $lesson->text !!}
                            
                            <?php // $student = $lesson->students()->where('lesson_id', request('lesson'))->where('user_id', request()->user()->id)->first(); ?>
                            {{-- <div class="well">
                                @if(empty($student->pivot->file))
                                    {!! Form::open(['method' => 'POST', 'route' => ['lesson.homework.upload', request('lesson')], 'files' => TRUE]) !!}
                                        <div class="form-group">
                                            <label for="file">Send homework file</label>
                                            {!! Form::file('file') !!}
                                        </div>
                                        <button type="submit" class="btn btn-info">Upload</button>
                                    
                                    {!! Form::close() !!}
                                @else
                                    <label for="file">Homework sent</label>
                                    <br>
                                    <a href="{{ route('lesson.homework.download' , $lesson->id) }}" target="_blank"><strong>{{ $lesson->homework_filename }}</strong></a>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="comment">
                        <div class="box">
                            <div class="comment-box">
                                <div class="fb-comments" data-href="{{ route('course.view', $course->slug) }}" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="daysleft" value="2018-02-02 21:17:08">
    <input type="hidden" id="checkClass" value="">
    <input type="hidden" id="course_id" value="2">
    <div id="fb-root"></div>
@endsection


@section('styles')
    <style>
        body {
            font-size: 1.6em;
        }

        .download-document {
            z-index: 1059;
            position: relative;
            text-align: right;
            top: 7px;
            color: white;
            width: 50%;
            float: right;
        }

        .link-download {
            color: #d8d8d8!important;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=111559082983624&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var iframe = document.querySelector('iframe');
        var player = new Vimeo.Player(iframe);
        var currentTime = 0;
        var progress = 0;
        var url = "{{ url('api/learning/progress/') }}" + "/{{ request('lesson') }}/{{ Auth::user()->id }}/";
        
        player.on('progress', function(data) {
            progress = data.percent * 100;
            axios.get(url + progress)
                .then(response => {
                    console.log(response.data);
                });
        });
    </script>
@endsection


@section('old-scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8&appId=1429890293689612";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <script>
        $(document).ready(function () {

            var daysleft = $('#daysleft').val();
            $('#countdown').countdowntimer({
                dateAndTime: daysleft,
            });

            var checkClass = $('#checkClass').val();
            if (checkClass == 'video') {
                var iframe = document.querySelector('iframe#video');
                var player = new Vimeo.Player(iframe);

                player.on('ended', function (data) {
                    bootbox.prompt({
                        size: "medium",
                        title: "กรุณากรอกบัญชี Account Trade เพื่อรับโปรแกรม",
                        callback: function (result) {
                            if (result == '') {
                                bootbox.alert({
                                    message: "คุณยังไม่ได้กรอกข้อมูล",
                                    backdrop: true,
                                    size: 'medium'
                                });
                                return false;
                            } else if (result == null) {
                                return true
                            } else {
                                var course_id = $('#course_id').val();
                                $.ajax({
                                    type: "POST",
                                    url: url + 'courses/finish_course',
                                    data: {
                                        content: result,
                                        course_id: course_id
                                    },
                                    beforeSend: function () {
                                        $("#pageloader").show();
                                    },
                                    success: function (data) {
                                        if (data == true) {
                                            bootbox.alert({
                                                title: "ระบบได้รับข้อมูลของคุณแล้ว",
                                                message: "Account Trade ของคุณคือ : " +
                                                    "<b>" +
                                                    result +
                                                    "</b>",
                                                backdrop: true,
                                                size: 'medium'
                                            });
                                        } else {
                                            bootbox.alert({
                                                title: "<h4> แจ้งเตือน! </h4>",
                                                message: "<h5>ขออภัย.. คุณใช้สิทธิ์ไปแล้ว</h5>",
                                                backdrop: true,
                                                size: 'medium'
                                            });
                                        }
                                    }
                                });
                            }
                        }
                    });
                });
            }

        });
    </script>
@endsection