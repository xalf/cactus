@section('drop-down-accounts')
    <div class="dropdown menu">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            My Instagram Accounts
            <span class="caret"></span>
        </button>
        <br/>
            <ul class="dropdown-menu dropdown-menu-center">
                <li>
                    <a href="/account/logout-instagram" id="add-new-account">
                        <span  class="glyphicon glyphicon-plus-sign"></span>
                        Add new account
                    </a>
                </li>
                @foreach($accounts as $account)
                    <li>
                        <form method="POST" action="feed" role="form">

                            <button formaction="feed" formmethod="post" type="submit" name="user_name" value="{{$account['user_name']}}">
                                <img src="">{{$account['user_name']}}
                            </button>
                            <button formaction="feed" formmethod="post" class="glyphicon glyphicon-trash delete" type="submit" data-toggle="modal" data-target="#myModal" name="delete_account" value="{{$account['user_name']}}"></button>
                            <button formaction="feed" formmethod="post" class="glyphicon glyphicon-ok default @if($account['user_name'] == $defaultAccount->user_name) green-tick @endif" type="submit" name="make_default" value="{{$account['user_name']}}"></button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </li>
                    @endforeach
            </ul>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content modal-edit">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p>Are you sure you want to remove your account? All data will be lost.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop