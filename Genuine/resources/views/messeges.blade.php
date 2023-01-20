<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@component('home')
    <div style="margin-top: 20px">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="/storage/{{$user->image}}" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>Chat with {{$user->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        @foreach ($finalResult as $result)
                            @if ($result->sender_id == Auth::user()->id && $result->receiver_id == $user->id)
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="/storage/{{Auth::user()->image}}" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                {{$result->messege}}
                                <span class="msg_time">{{$result->created_at}}</span>
                            </div>
                        </div>
                            @endif
                            @if ($result->sender_id == $user->id && $result->receiver_id == Auth::user()->id)
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            {{$result->messege}}
                            <span class="msg_time">{{$result->created_at}}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="/storage/{{$user->image}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                                @endif
                        @endforeach
                    </div>
    
                    <div class="card-footer">
                        <form method="POST" action="/sendMessege">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" value="{{Auth::user()->id}}", name="sender_id">
                                <input type="hidden" value="{{$user->id}}" name="receiver_id">
                                <textarea name="messege" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn">Send</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div></div>
            <div class="col-md-2 col-xl-2"></div>
        </div>
        </div>
        



@endcomponent

<style>
.chat{
margin-top: auto;
margin-bottom: auto;
}
.card{
height: 500px;
border-radius: 15px !important;
background-color: rgba(0,0,0,0.4) !important;
}
.contacts_body{
padding:  0.75rem 0 !important;
overflow-y: auto;
white-space: nowrap;
}
.msg_card_body{
overflow-y: auto;
}
.card-header{
border-radius: 15px 15px 0 0 !important;
border-bottom: 0 !important;
}
.card-footer{
border-radius: 0 0 15px 15px !important;
border-top: 0 !important;
}
.container{
align-content: center;
}
.search{
border-radius: 15px 0 0 15px !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color:white !important;
}
.search:focus{
box-shadow:none !important;
outline:0px !important;
}
.type_msg{
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color:white !important;
height: 60px !important;
overflow-y: auto;
}
.type_msg:focus{
box-shadow:none !important;
outline:0px !important;
}
.attach_btn{
border-radius: 15px 0 0 15px !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.send_btn{
border-radius: 0 15px 15px 0 !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.search_btn{
border-radius: 0 15px 15px 0 !important;
background-color: rgba(0,0,0,0.3) !important;
border:0 !important;
color: white !important;
cursor: pointer;
}
.contacts{
list-style: none;
padding: 0;
}
.contacts li{
width: 100% !important;
padding: 5px 10px;
margin-bottom: 15px !important;
}
.active{
background-color: rgba(0,0,0,0.3);
}
.user_img{
height: 70px;
width: 70px;
border:1.5px solid #f5f6fa;

}
.user_img_msg{
height: 40px;
width: 40px;
border:1.5px solid #f5f6fa;

}
.img_cont{
position: relative;
height: 70px;
width: 70px;
}
.img_cont_msg{
height: 40px;
width: 40px;
}
.online_icon{
position: absolute;
height: 15px;
width:15px;
background-color: #4cd137;
border-radius: 50%;
bottom: 0.2em;
right: 0.4em;
border:1.5px solid white;
}
.offline{
background-color: #c23616 !important;
}
.user_info{
margin-top: auto;
margin-bottom: auto;
margin-left: 15px;
}
.user_info span{
font-size: 20px;
color: white;
}
.user_info p{
font-size: 10px;
color: rgba(255,255,255,0.6);
}
.video_cam{
margin-left: 50px;
margin-top: 5px;
}
.video_cam span{
color: white;
font-size: 20px;
cursor: pointer;
margin-right: 20px;
}
.msg_cotainer{
margin-top: auto;
margin-bottom: auto;
margin-left: 10px;
border-radius: 25px;
background-color: #82ccdd;
padding: 10px;
position: relative;
}
.msg_cotainer_send{
margin-top: auto;
margin-bottom: auto;
margin-right: 10px;
border-radius: 25px;
background-color: #78e08f;
padding: 10px;
position: relative;
}
.msg_time{
    position: absolute;
left: 0;
bottom: -25px;
color: rgba(255,255,255,0.5);
font-size: 8px;
}
.msg_time_send{
position: absolute;
right:0;
bottom: -15px;
color: rgba(255,255,255,0.5);
font-size: 10px;
}
.msg_head{
position: relative;
}
#action_menu_btn{
position: absolute;
right: 10px;
top: 10px;
color: white;
cursor: pointer;
font-size: 20px;
}
.action_menu{
z-index: 1;
position: absolute;
padding: 15px 0;
background-color: rgba(0,0,0,0.5);
color: white;
border-radius: 15px;
top: 30px;
right: 15px;
display: none;
}
.action_menu ul{
list-style: none;
padding: 0;
margin: 0;
}
.action_menu ul li{
width: 100%;
padding: 10px 15px;
margin-bottom: 5px;
}
.action_menu ul li i{
padding-right: 10px;

}
.action_menu ul li:hover{
cursor: pointer;
background-color: rgba(0,0,0,0.2);
}
@media(max-width: 576px){
.contacts_card{
margin-bottom: 15px !important;
}
}
</style>
