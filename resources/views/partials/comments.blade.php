  <div class="col-lg-12 col-md-12 col-sm-12">
                    
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="fa fa-comment"></span>
                            Recent Comments
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="media-list">
                            @foreach($comments as $comment)
                            <li class="media">
                                <div class="media-left">
                                    <img src="" class="imd-circle">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <small>
                                            <a href="users/{{$comment->user->id}}"> {{ $comment->user->first_name }} {{ $comment->user->last_name }} {{ $comment->user->email }}</a>
                                        <br>
                                            comment on {{ $comment->created_at }}
                                        </small>
                                    </h4>
                                    <p>
                                        {{ $comment->body }}
                                    </p>
                                    <b>Proof:</b>
                                    <p>
                                        <a href="#" class="text-info">{{ $comment->url }}</a>
                                    </p>
                                </div>
                            </li>
                
                @endforeach
                        </ul>
                    </div>
                </div>
            </div>