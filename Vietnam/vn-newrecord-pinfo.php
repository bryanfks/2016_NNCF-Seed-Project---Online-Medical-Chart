<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href="{{asset('/css/selectBar.css')}}">
        <link rel="stylesheet" href="{{asset('/css/VNPInfoContent.css')}}">
    </head>
    <body>
        <header>
            <div class="RealTimeMsg">
                <div class="RTMsg">
                    Welcome Sir.
                </div>
            </div>
        </header>
        <nav>
            <div>@include('layouts.selectBar')</div>
        </nav>
        <section>
            <div class="layer1">@include('layouts.Vietnam.vn-add-content')</div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
</html>