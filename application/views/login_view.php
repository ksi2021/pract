<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
<form method="post" class="border rounded border-primary p-2" action="/user/post_login" style="">
    <h3>Авторизация</h3>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
               placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <a href="/user/register">еще не зарагистрированы ?</a> <br>
    <button type="button" class="btn btn-primary mt-2" onclick="connect();">Submit</button>
</form>

<div id="myModal" class="modal">


    <div class="modal-content">
        <div class="modal-header">
            <h2>Modal Window</h2>
            <span class="close">&times;</span>

        </div>
        <div class="modal-body">
            <p>Вы успешно авторизировались</p>
        </div>
        <div class="modal-footer">
            <h3>Перейти в панель администратора</h3><span class="block"> <a  class="yes">&#10004;</a> </span>
        </div>
    </div>

</div>

<style>
    .block{

    }
    .yes{
        cursor: pointer;
        width: 50px;
        height: 50px;
        font-size: 24px;
    }
    #myBtn {
        background-color: #9C27B0;
        color: white;
        padding: 12px 16px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        width: 180px;
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }


    .modal-content {
        position: relative;
        background-color: #E1BEE7;
        margin: auto;
        padding: 0;
        border: 5px solid #7B1FA2;
        width: 50%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }


    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }


    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #9C27B0;
        color: white;
    }

    .modal-body {padding: 2px 16px; height:50px;}

    .modal-footer {
        padding: 2px 16px;
        /*margin-right: auto;*/
        widht:100%;
        background-color: #9C27B0;
        color: white;
    }
</style>


<script>
    function connect() {
        $('.yes').click(function (e) {
            document.location.pathname = "/admin/";
        });
        $('.close').click(function (e) {
            $('#myModal').hide();
        });
        var jqxhr = $.ajax("/user/post_login")
            .done(function (data) {
                switch(JSON.parse(data).status) {
                    case false:
                        var modal = document.getElementById('myModal');
                        modal.style.display = "block";
                        break;

                    case true:
                        break;
                }

            })
            .fail(function () {
                alert("error");
            });
    }

</script>