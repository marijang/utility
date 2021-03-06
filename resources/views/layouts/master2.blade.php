<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Utility</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
 
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> 

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">

    <div class="navbar navbar--black">
            <div class="container">
                <div class="navbar__header">
                    <a class="navbar__logo">
                        {{env('APP_NAME')}}
                    </a>
                    <div class="navbar__mobilemenu">
                            <div class="burger-icon">
                            </div>
                    </div>
                </div>
                <div class="responsive_menu">
                <ul class="menu menu__horizontal">
                    <li class="menu__item"><a  class="menu__link menu__link--dot" href="{{ url('/home') }}">Home</a></li>
                    @if (Auth::check())
                        <li class="menu__item"><a href="{{ url('/upload') }}" class="menu__link menu__link--dot">Upload</a></li>
                        <li class="menu__item"><a href="{{ url('/history') }}"  class="menu__link menu__link--dot">History</a></li>
                    @endif
                </ul>
                <ul class="menu menu__horizontal right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="menu__item"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="menu__item"><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="menu__item menu__hasdropdown">
                            <div class="menu__link">
                                {{ Auth::user()->name }}
                                
                            </div>
                            <ul class="menu__dropdown">
                                   <li class="dropdown__item"><a href="{{ url('/profile') }}" class="dropdown__link">Profile</a></li>
                                   <li class="dropdown__item"><a href="{{ url('/faq') }}" class="dropdown__link">Faq</a></li>     
                                    <li><a href="{{ url('/logout') }}" class="dropdown__link">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                </div>
            </div>        
    </div>

  

    @yield('content')


  


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('footer')

   

    <footer class="footer__small">
         <div class="container">
              © Copyright <a href="#" target="_blank">Nesto</a> Products, Inc. All rights reserved.
                <div class="social">
                </div>
         </div>
    </footer>




<script>
$(function() {
  
// Dropdown toggle
$('.menu__hasdropdown').click(function(){
  
  $(this).find('.menu__dropdown').toggle();
});

$(document).click(function(e) {
  var target = e.target;
  if (!$(target).is('.menu__hasdropdown') && !$(target).parents().is('.menu__hasdropdown')) {
    $('.menu__dropdown').hide();
  }
});

$('.burger-icon').on('click',function(){
        $(this).toggleClass('active');
        $('.responsive_menu').slideToggle();
});

});
</script>

</body>
</html>
