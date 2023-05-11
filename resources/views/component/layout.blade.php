<!doctype html>
<html lang="en">
    @include("component.head")
<body class="vh-100">
    @include("component.header")


    

    <div class="container">
        <div class="col">
            
            <!-- CAROUSEL SLIDER -->
            @if(isset($intro_carousel))
                @include("component.intro")
            @endif
            <div class="row justify-content-center mt-5">
                <div class="col-9">
                    <h5 id="user-login">{{$title}}</h5>
                    <hr/>
                </div>
            </div>

            @include("$body")
        </div>
    </div>

    @if(session('message') != '')
        <script>
            alert('{{session('message')}}');
        </script>
        @php 
            session()->forget('message');
        @endphp
    @endif

    <div class="h-25"></div>
    @include("component.footer")
</body>
</html>