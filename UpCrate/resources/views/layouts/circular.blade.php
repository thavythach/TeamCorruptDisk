<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UpCrate</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
        *, *:before, *:after {
    box-sizing: border-box;
    }



    html,
    body{
        margin: 0px;
        padding: 0px;
        background-image: url('img/BG.jpg');
        background-size: 100% 100%;
        background-attachment: fixed;
    }    

    .radial-menu {
    background: #c1ced9;
    border: 0 solid transparent;
    border-radius: 50%;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.05);
    height: 300px;
    left: 50%;
    opacity: 1;
    position: absolute;
    top: 50%;
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
    transition: opacity .1s ease, background .1s ease;
    width: 300px;
    }
    .radial-menu.is-hidden {
    -webkit-animation-name: scale-down;
            animation-name: scale-down;
    -webkit-animation-duration: .2s;
            animation-duration: .2s;
    -webkit-animation-delay: 0;
            animation-delay: 0;
    -webkit-animation-iteration-count: 1;
            animation-iteration-count: 1;
    -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
    /* this prevents the animation from restarting! */
    -webkit-animation-timing-function: cubic-bezier(0.25, 0.25, 0.25, 1.25);
            animation-timing-function: cubic-bezier(0.25, 0.25, 0.25, 1.25);
    -webkit-transform: translate(-50%, -50%) scale(0) !important;
            transform: translate(-50%, -50%) scale(0) !important;
    opacity: 0;
    }
    .radial-menu.is-active {
    -webkit-animation-name: scale-up;
            animation-name: scale-up;
    -webkit-animation-duration: .2s;
            animation-duration: .2s;
    -webkit-animation-delay: 0;
            animation-delay: 0;
    -webkit-animation-iteration-count: 1;
            animation-iteration-count: 1;
    -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
    /* this prevents the animation from restarting! */
    -webkit-animation-timing-function: cubic-bezier(0.25, 0.25, 0.25, 1.25);
            animation-timing-function: cubic-bezier(0.25, 0.25, 0.25, 1.25);
    opacity: 1;
    -webkit-transform: translate(-50%, -50%) scale(1);
            transform: translate(-50%, -50%) scale(1);
    }
    .radial-menu.item-is-hovered {
    background-color: #6d9bc5;
    border-color: transparent;
    border-width: 0;
    }

    @-webkit-keyframes scale-up {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(0);
                transform: translate(-50%, -50%) scale(0);
    }
    100% {
        -webkit-transform: translateX(-50%, -50%) scale(1);
                transform: translateX(-50%, -50%) scale(1);
    }
    }

    @keyframes scale-up {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(0);
                transform: translate(-50%, -50%) scale(0);
    }
    100% {
        -webkit-transform: translateX(-50%, -50%) scale(1);
                transform: translateX(-50%, -50%) scale(1);
    }
    }
    @-webkit-keyframes scale-down {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
    }
    100% {
        -webkit-transform: translateX(-50%, -50%) scale(0);
                transform: translateX(-50%, -50%) scale(0);
    }
    }
    @keyframes scale-down {
    0% {
        -webkit-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
    }
    100% {
        -webkit-transform: translateX(-50%, -50%) scale(0);
                transform: translateX(-50%, -50%) scale(0);
    }
    }
    .radial-menu__label {
    background-color: #e7ecf1;
    border: 3px solid #ced8e1;
    border-radius: 50%;
    color: #c1ced9;
    cursor: default;
    font-size: 12px;
    font-weight: bold;
    height: 80px;
    left: 50%;
    letter-spacing: .1em;
    line-height: 74px;
    position: absolute;
    text-align: center;
    text-transform: uppercase;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    width: 80px;
    z-index: 4;
    }

    .radial-menu__menu-content {
    background-color: #e7ecf1;
    border: 3px solid #ced8e1;
    border-radius: 50%;
    height: 80px;
    left: 50%;
    position: absolute;
    text-align: center;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    width: 80px;
    z-index: 1;
    }

    /* .radial-menu__menu-item.hovered .radial-menu__menu-content {
    background-color: #578cbc;
    border-color: #578cbc;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    z-index: 4;
    } */

    .radial-menu__menu-item.hovered .glyph-color-file  {
        background-color: purple;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-question-sign {
        background-color: blue;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-link {
        background-color: orange;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-envelope {
        background-color: brown;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-heart {
        background-color: pink;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-remove {
        background-color: red;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-user {
        background-color: black;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    .radial-menu__menu-item.hovered .glyph-color-upload {
        background-color: green;
        border-color: #578cbc;
        -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        z-index: 4;
    }
    
     .radial-menu__menu-item.hovered .glyph-color-remove {
    background-color: red;
    border-color: #578cbc;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    z-index: 4;
    }

    .radial-menu__menu-content-wrapper {
    padding-left: 10px;
    padding-right: 10px;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    width: 100%;
    }

    .radial-menu__menu-content-title {
    color: #fff;
    font-size: 0.7em;
    font-weight: bold;
    line-height: 1.3;
    }

    .radial-menu__menu-content-description {
    color: rgba(255, 255, 255, 0.5);
    display: none;
    font-size: 0.4em;
    font-weight: normal;
    letter-spacing: .1em;
    line-height: 1.3;
    text-transform: uppercase;
    }

    .radial-menu__menu-icon {
    background-color: transparent;
    height: 25px;
    left: 0;
    position: absolute;
    text-align: center;
    top: 0;
    -webkit-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
    width: 25px;
    z-index: 2;
    }
    .radial-menu__menu-icon .oi {
    color: #8ea6bb;
    font-size: 16px;
    line-height: 25px;
    transition: font-size 0.3s cubic-bezier(0.25, 0.25, 0.25, 1.5), color 0.1s ease;
    }

    .radial-menu.item-is-hovered .radial-menu__menu-icon {
    background-color: transparent;
    }
    .radial-menu.item-is-hovered .radial-menu__menu-icon .oi {
    color: #a8baca;
    }

    .radial-menu.item-is-hovered .radial-menu__menu-item.hovered .radial-menu__menu-icon {
    background-color: transparent;
    height: 50px;
    width: 50px;
    }
    .radial-menu.item-is-hovered .radial-menu__menu-item.hovered .radial-menu__menu-icon .oi {
    color: #fff;
    font-size: 21px;
    line-height: 50px;
    }

    .radial-menu__menu-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
    }

    .radial-menu__menu-item {
    display: block;
    left: 50%;
    position: absolute;
    top: 50%;
    z-index: 1;
    }
    .radial-menu__menu-item.hovered {
    z-index: 10;
    }

    .radial-menu__menu-link,
    .radial-menu__menu-link-bg {
    height: 22px;
    padding: 5px 20px;
    position: absolute;
    -webkit-transform: translateY(-50%) perspective(200px) rotateY(-77.5deg) scaleX(1.25);
            transform: translateY(-50%) perspective(200px) rotateY(-77.5deg) scaleX(1.25);
    -webkit-transform-origin: 0;
            transform-origin: 0;
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
    width: 125px;
    }

    .radial-menu__menu-link {
    border-bottom: 1px solid transparent;
    border-top: 1px solid transparent;
    display: block;
    z-index: 3;
    }

    .radial-menu__menu-link-bg {
    background-color: #dae2e9;
    border-bottom: 1px solid #d4dde5;
    border-top: 1px solid #d4dde5;
    font-size: 12px;
    text-decoration: none;
    text-transform: uppercase;
    transition: background .1s ease;
    z-index: 1;
    }
    .radial-menu__menu-link-bg:after {
    background: #c1ced9;
    content: '';
    display: none;
    height: 106%;
    right: -1px;
    position: absolute;
    top: 0;
    transition: all .1s ease;
    -webkit-transform: translateY(-3%);
            transform: translateY(-3%);
    width: 2px;
    }

    .radial-menu__menu-item.hovered .radial-menu__menu-link-bg {
    background-color: #6d9bc5;
    border: 0;
    }
    .radial-menu__menu-item.hovered .radial-menu__menu-link-bg:after {
    background: #6d9bc5;
    height: 106%;
    -webkit-transform: translateY(-3%);
            transform: translateY(-3%);
    width: 0;
    }

    .menu-items-select {
    bottom: 0;
    right: 0;
    margin: 0 auto;
    padding: 40px;
    position: absolute;
    }

    .menu-items-select__label {
    color: #c1ced9;
    display: block;
    font-size: .7em;
    font-weight: bold;
    letter-spacing: .05em;
    margin-bottom: 10px;
    text-transform: uppercase;
    }

    .menu-items-select__select {
    -webkit-appearance: none;
        -moz-appearance: none;
            appearance: none;
    background-color: #e7ecf1;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3ppVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTMyIDc5LjE1OTI4NCwgMjAxNi8wNC8xOS0xMzoxMzo0MCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpjYmU2ZGJmMC0zMWRkLTQyN2EtYjIyYi02YjExMGU5ZDVmODciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6REM2MzE0REVCNjkzMTFFNkIxODVBOTBFNDM1NDFDOEUiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6REM2MzE0RERCNjkzMTFFNkIxODVBOTBFNDM1NDFDOEUiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUuNSAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmI4YTU2Zjg5LTM0MzAtNDcxNS1iOGQyLWQ5NWM4NzdmYmIyOSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpjYmU2ZGJmMC0zMWRkLTQyN2EtYjIyYi02YjExMGU5ZDVmODciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4RdGokAAAAf0lEQVR42mL8//8/AzUBEwOVwaiBlAMWbIKMjIxEG4CeSujq5fkgB+DBC3E6GR1DARcQX8Zh2HUg5samH5+BIKABxF/QDPsKxLq4HETIQBCIQTMwFZ8PiTEQBGZBDVtKKMiINZATiFcCMS8hAxmxGUBJOmQhRtFo4UBfAwECDADAD7B6p+ae7AAAAABJRU5ErkJggg==");
    background-position: 97.5% 50%;
    background-repeat: no-repeat;
    border: 2px solid #d4dde5;
    border-radius: 0;
    display: block;
    font-family: sans-serif;
    font-size: .9em;
    font-weight: bold;
    height: 40px;
    padding: 5px 10px;
    width: 100px;
    }

    .right-click-prompt {
    bottom: 0;
    color: #c1ced9;
    font-size: .7em;
    font-weight: bold;
    left: 50%;
    letter-spacing: .05em;
    padding: 40px;
    position: absolute;
    text-transform: uppercase;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    }

    @media (max-height: 430px) {
    .right-click-prompt {
        left: 0;
        -webkit-transform: translateX(0);
                transform: translateX(0);
    }
    }

            .d1{
                margin-top: 135px;
                margin-left: 300px;
            }
            .d8{
                margin-top: 135px;
                margin-left: 1200px;
            }
            .d2{
                margin-top: 135px;
                margin-left: 1500px;
            }
            .d3{
                margin-top: -650px;
            }
            .d4{
                margin-top: -1050px;
            }
            .d5{
                margin-top: -600px;
                margin-left: 100px;
            }
            .d6{
                margin-top: 250px;
                margin-left: 840px;
            }
            .d7{
                margin-top: 500px;
                margin-left: 800px;
            }

    .view {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  -webkit-perspective: 400;
          perspective: 400;
    }

    .plane {
    width: 120px;
    height: 120px;
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
    }
    .plane.main {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    -webkit-transform: rotateX(60deg) rotateZ(-30deg);
            transform: rotateX(60deg) rotateZ(-30deg);
    -webkit-animation: rotate 20s infinite linear;
            animation: rotate 20s infinite linear;
    }
    .plane.main .circle {
    width: 120px;
    height: 120px;
    position: absolute;
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
    border-radius: 100%;
    box-sizing: border-box;
    box-shadow: 0 0 60px crimson, inset 0 0 60px crimson;
    }

    a:hover .plane.main .circle {
    width: 120px;
    height: 120px;
    position: absolute;
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
    border-radius: 100%;
    box-sizing: border-box;
    box-shadow: 0 0 60px green, inset 0 0 60px crimson;
    }

    a:hover .plane.main .circle::before, .plane.main .circle::after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 10%;
    height: 10%;
    border-radius: 100%;
    background: crimson;
    box-sizing: border-box;
    box-shadow: 0 0 60px 2px crimson;
    }

    .plane.main .circle::before, .plane.main .circle::after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    width: 10%;
    height: 10%;
    border-radius: 100%;
    background: crimson;
    box-sizing: border-box;
    box-shadow: 0 0 60px 2px crimson;
    }
    .plane.main .circle::before {
    -webkit-transform: translateZ(-90px);
            transform: translateZ(-90px);
    }
    .plane.main .circle::after {
    -webkit-transform: translateZ(90px);
            transform: translateZ(90px);
    }
    .plane.main .circle:nth-child(1) {
    -webkit-transform: rotateZ(72deg) rotateX(63.435deg);
            transform: rotateZ(72deg) rotateX(63.435deg);
    }
    .plane.main .circle:nth-child(2) {
    -webkit-transform: rotateZ(144deg) rotateX(63.435deg);
            transform: rotateZ(144deg) rotateX(63.435deg);
    }
    .plane.main .circle:nth-child(3) {
    -webkit-transform: rotateZ(216deg) rotateX(63.435deg);
            transform: rotateZ(216deg) rotateX(63.435deg);
    }
    .plane.main .circle:nth-child(4) {
    -webkit-transform: rotateZ(288deg) rotateX(63.435deg);
            transform: rotateZ(288deg) rotateX(63.435deg);
    }
    .plane.main .circle:nth-child(5) {
    -webkit-transform: rotateZ(360deg) rotateX(63.435deg);
            transform: rotateZ(360deg) rotateX(63.435deg);
    }

    @-webkit-keyframes rotate {
    0% {
        -webkit-transform: rotateX(0) rotateY(0) rotateZ(0);
                transform: rotateX(0) rotateY(0) rotateZ(0);
    }
    100% {
        -webkit-transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
                transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
    }
    }

    @keyframes rotate {
    0% {
        -webkit-transform: rotateX(0) rotateY(0) rotateZ(0);
                transform: rotateX(0) rotateY(0) rotateZ(0);
    }
    100% {
        -webkit-transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
                transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
    }
    }

    @yield('css');
    
</style>

</head>
<body>
        <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script>
            function yesnoCheck() {
              if (document.getElementById('privateVis').checked) {
                  document.getElementById('userSelect').style.visibility = 'visible';
              }
              else document.getElementById('userSelect').style.visibility = 'hidden';
            }
    </script>

<script>
        var rellax = new Rellax('.rellax', {
        // center: true
        callback: function(position) {
            // callback every position change
            console.log(position);
        }
      });
    </script>

<script>
        @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"
    
        
            switch(type){
                case 'info':
                     toastr.info("{{ Session::get('message') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                 case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    
    {{-- MODALS --}}

    {{-- uploadModal --}}
    <div class="modal fade" id="uploadModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload New File</h4>
            </div>
            <div class="modal-body">
            {{-- <div class="container"> --}}
                    <div id="content">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#red" data-toggle="tab">Upload New File</a></li>
                            {{-- <li><a href="#orange" data-toggle="tab">Upload Group File</a></li> --}}
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="red">
                                <br>
                                    <form action="/process" enctype="multipart/form-data" method="POST" class="md-form">
                                        
                                        {{-- <div class="form-row"> --}}
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label for="file">Select a 2MB file</label>
                                                <input type="file" class="form-control-file" name="file" id="file">
                                            </div>

                                            <br>
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <label for="visibility">Visibility</label><br>
                                                    <input onclick="javascript:yesnoCheck();" class="form-check-input" type="radio" name="visibility" id="privateVis" value="Private" checked>
                                                    <label class="form-check-label" for="privateVis">Private</label>
                                                    <br>
                                                    <input onclick="javascript:yesnoCheck();"class="form-check-input" type="radio" name="visibility" id="publicVis" value="Public">
                                                    <label class="form-check-label" for="publicVis">Public</label>

                                                    <div id="userSelect" style="visibility:visible">
                                                        <div class="form-group col-md-4">
                                                            <label for="userSelect">Select users that can access: </label>
            
                                                            <select multiple class="form-control" name="item_id[]">
                                                                @foreach($data['users'] as $item)
                                                                    @if ($item->name == Auth::user()->name)
                                                                        <option>None</option>
                                                                    @else 
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select> 
                                                        </div>
            
                                                    </div> 
                                                </div>
                                            </div>

                                        </div>
                                        <br><br>
                                        
                                    
                                        
                                        <button class="btn btn-primary btn-lg">Upload</button>
                                        {{ csrf_field() }}
                                    </form>
                                <br>
                            </div>
                            <div class="tab-pane" id="orange">
                                <br>
                                Upload Group file
                                <br>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    {{-- friendShareModal --}}
    <div class="modal fade" id="friendShareModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tell your friends to register!</h4>
            </div>
            <div class="modal-body">
            {{-- <div class="container"> --}}
                    <div id="content">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#red" data-toggle="tab">Generate Registration Email!</a></li>
                            {{-- <li><a href="#orange" data-toggle="tab">Upload Group File</a></li> --}}
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="red">
                                <br>
                                    <center>
                                    <p>Fill in the form with an email.</p>
                                    <form action="/friendShare/process" method="POST" enctype="multipart/form-data">
                                        <label for="file">Friend's Email:</label>
                                        <input type="text" name="email" value="">
                                        <input type="submit" name="submit" value="Submit">
                                        {{ csrf_field() }}
                                    </form>
                                    </center>
                                <br>
                            </div>
                            {{-- <div class="tab-pane" id="orange">
                                <br>
                                Too much swag
                                <br>
                            </div> --}}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    {{-- profileModal --}}
    <div class="modal fade" id="profileModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">
            {{-- <div class="container"> --}}
                    <div id="content">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#red" data-toggle="tab">Delete Account or Change your Password</a></li>
                            {{-- <li><a href="#orange" data-toggle="tab" style="color:red;">Delete My Account Permanently</a></li> --}}
                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="red">
                                <br>
                                <div class="panel panel-default">
                                        <div class="panel-heading">Change password</div>
                        
                                        <div class="panel-body">
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                                {{ csrf_field() }}
                        
                                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                    <label for="new-password" class="col-md-4 control-label">Current Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
                        
                                                        @if ($errors->has('current-password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('current-password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                    <label for="new-password" class="col-md-4 control-label">New Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="new-password" type="password" class="form-control" name="new-password" required>
                        
                                                        @if ($errors->has('new-password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('new-password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <br>

                                <a href="#" data-toggle="popover" data-container="body" data-html="true" id="deleteAccount" data-placement="bottom" title="Delete {{ Auth::user()->name }}!" data-trigger="focus">
                                    <center><h1>Delete<h1></center>
                                </a>
                                
                                <div id="popover-content-deleteAccount" class="hide">
                                        <p>Delete Account Permanently</p>
                                        <a href="/deleteAccount"><button type="button" class="btn btn-danger btn-lg">Delete</button></a>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    {{-- groupManagementModal --}}
    <div class="modal fade" id="groupManagementModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create New Group</h4>
                </div>
                <div class="modal-body">
                {{-- <div class="container"> --}}
                        <div id="content">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#red" data-toggle="tab">Create New Group</a></li>
                                {{-- <li><a href="#orange" data-toggle="tab">Upload Group File</a></li> --}}
                            </ul>
                            <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane active" id="red">
                                    <br>
                                        <form action="/group/process" enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
                                                <label>Group Name</label>
                                                <input type="text" name="group_name" value="">
                                                
                                            </div>
                            
                                            <label for="file">Select a 2MB file</label>
                                            <input type="file" class="form-control-file" name="GroupFile" id="Groupfile">
                                            <br>
                                            <div class="form-group">
                                                <label for="userSelect">Select users that can access: </label>
                                                {{-- {!! Form::Label('item', 'Item:') !!} --}}
                                                <select multiple class="form-control" name="item_id[]">
                                                    @foreach($data['users'] as $item)
                                                    @if ($item->name == Auth::user()->name)
                                                        <option>None</option>
                                                    @else 
                                                     <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary btn-lg">Create Group</button>
                                            {{ csrf_field() }}
                                        </form>
                                    <br>
                                </div>
                                {{-- <div class="tab-pane" id="orange">
                                    <br>
                                    Upload Group file
                                    <br>
                                </div> --}}
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    
    {{-- groupUploadModal --}}
    <div class="modal fade" id="groupUploadModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Group File</h4>
                </div>
                <div class="modal-body">
                {{-- <div class="container"> --}}
                        <div id="content">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#red" data-toggle="tab">Upload Group File</a></li>
                                {{-- <li><a href="#orange" data-toggle="tab">Upload Group File</a></li> --}}
                            </ul>
                            <div id="my-tab-content" class="tab-content">
                                <div class="tab-pane active" id="red">
                                    <br>
                                    <p>Fill out the form to upload a file to a specific group.</p>
                                    <form action="/groupFile" method="POST" enctype="multipart/form-data">
                                        <label for="file">Select a 2MB file</label>
                                        <input type="file" class="form-control-file" name="new_file" id="new_file">
                                        <div class="form-group">
                                                <label for="userSelect">Select groups that can access: </label>
                                                {{-- {!! Form::Label('item', 'Item:') !!} --}}
                                                <select multiple class="form-control" name="item_id[]">
                                                    @foreach($data['groups'] as $group)
                                                    <option value="{{$group['groupID']}}">{{$group['groupName']}}</option>
                                                    @endforeach
                                                    <option value="None" selected>None</option>
                                                </select>
                                            </div>
                                        <input type="submit" name="submit" value="Submit">
                                        {{ csrf_field() }}
                                    </form>
                                    <br>
                                </div>
                                {{-- <div class="tab-pane" id="orange">
                                    <br>
                                    Upload Group file
                                    <br>
                                </div> --}}
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    {{-- <div class="rellax d1" data-rellax-speed="1">
            {{-- <img src="{{ asset('img/nick.jpg') }}" width="15%"/> 
        <a href="#"><div class="view">
                <div class="plane main">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </a>
      </div> --}}

    

    
    {{-- <div id="GroupToggle"> --}}
            <div id="GroupToggle" style="display: none;">
        @if(count($data['groups']) > 0)
            @for ($i=0; $i < count($data['groups']); $i++)
                    
            <div class="@if ( ($i % 2) == 0 ) rellax d1 @else rellax d2 @endif" data-rellax-speed="5">
                <a href="#" data-toggle="popover" data-container="body" data-html="true" id="{{ "myGroupView-" . $i }}" data-placement="bottom" title="{{$data['groups'][$i]['groupName']}} Group" data-trigger="focus">
                        {{$data['groups'][$i]['groupName']}}
                        <img src="{{ asset('img/group.png') }}" width="@if ( ($i % 2) == 0 ) 5% @else 19% @endif"/>
                </a>
                
                <div id="{{ "popover-content-myGroupView-" . $i }}" class="hide">
                    Group Files <br>
                    @foreach ($data['groups'][$i]['files_names'] as $grpFile)
                        <a href="/groupFile/{{ $grpFile->id }}" class="glyphicon glyphicon-download"> {{ $grpFile->name }} </a><br>
                    @endforeach

                </div>
            </div>
            @endfor
 
        @else 
            {{-- swag --}}
            {{-- <p> I don't own any groups. </p> --}}
        @endif
    </div>



    <div id="OwnedFiles" style="display: none;">
         {{-- show files as I scroll --}}
        @if(count($data['files']) > 0)
            @for ($i=0; $i < count($data['files']); $i++)
                
                <div class="@if ( ($i % 2) == 0 ) rellax d1 @else rellax d2 @endif" data-rellax-speed="5">
                        <a href="#" data-toggle="popover" data-container="body" data-html="true" id="{{ "myFilesView-" . $i }}" data-placement="bottom" title="{{$data['files'][$i]->name}} by {{ Auth::user()->name }}" data-trigger="focus">
                                {{$data['files'][$i]->name}}
                                <img src="@if( $data['files'][$i]->visibility == 1) {{ asset('img/document.png') }} @else {{ asset('img/priv_document.png') }} @endif" width="@if ( ($i % 2) == 0 ) 5% @else 19% @endif"/>

                        </a>
                        
                        <div id="{{ "popover-content-myFilesView-" . $i }}" class="hide">
                            <a href="/files/{{$data['files'][$i]->id}}" class="glyphicon glyphicon-download">Download</a><br>
                            Private Content: @if ( $data['files'][$i]->visibility == 1 ) No. @else Yes. @endif <br>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#renameModal">Rename</button>
                            
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#replaceModal">Replace</button>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </div>

                        <!-- Rename Modal -->
                        <div class="modal fade" id="renameModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Rename File</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Fill in the form with a new name to rename the file</p>
                                    <form action="/renameFile" method="POST" enctype="multipart/form-data">
                                        <label for="file">Filename:</label>
                                        <input type="text" name="new_filename" value="{{ $data['files'][$i]->name }}">
                                        <input type="hidden" id="fileid" name="fileid" value="{{$data['files'][$i]->id}}">
                                        <input type="submit" name="submit" value="Submit">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                            
                        <!-- Replace Modal -->
                        <div class="modal fade" id="replaceModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Replace File</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Fill out the form to replace file.</p>
                                    <form action="/replaceFile" method="POST" enctype="multipart/form-data">
                                        <label for="file">Select a file</label>
                                        <input type="file" class="form-control-file" name="new_file" id="new_file">
                                        <input type="hidden" id="fileid" name="fileid" value="{{$data['files'][$i]->id}}">
                                        <input type="submit" name="submit" value="Submit">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Delete File</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you want to delete your file?</p>
                                  <a href="/files/delete/{{$data['files'][$i]->id}}"><button>Delete</button></a>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                </div>

            @endfor
                @else 
                    {{-- <p> I don't own any files. </p> --}}
                @endif
    </div>
    <div id="SharedFiles" style="display: none;">
        {{-- show files as I scroll --}}
        @if(count($data['iaFiles']) > 0)
            @for ($i=0; $i < count($data['iaFiles']); $i++)
                
                <div class="@if ( ($i % 2) == 0 ) rellax d1 @else rellax d2 @endif" data-rellax-speed="5">

                    <a href="#" data-toggle="popover" data-container="body" data-html="true" id="{{ "myIAFilesView-" . $i }}" data-placement="bottom" title="{{$data['iaFiles'][$i]->name}} by {{$data['iaFiles'][$i]->user_name}}" data-trigger="focus">
                            {{$data['iaFiles'][$i]->name}}
                            <img src="@if( $data['iaFiles'][$i]->visibility == 1) {{ asset('img/document.png') }} @else {{ asset('img/priv_document.png') }} @endif" width="@if ( ($i % 2) == 0 ) 5% @else 19% @endif"/>

                    </a>

                    <div id="{{ "popover-content-myIAFilesView-" . $i }}" class="hide">
                        <a href="/files/{{$data['iaFiles'][$i]->id}}" class="glyphicon glyphicon-download">Download</a><br>
                    </div>

                    
                    
                </div>

            </a>
            @endfor
                @else 
                    {{-- <p> I don't own any files. </p> --}}
                @endif
    </div>
    <div id="PublicFiles" style="display: none;">
        {{-- show files as I scroll --}}
        @if(count($data['publicFiles']) > 0)
            @for ($i=0; $i < count($data['publicFiles']); $i++)
                <div class="@if ( ($i % 2) == 0 ) rellax d1 @else rellax d2 @endif" data-rellax-speed="5">

                    <a href="#" data-toggle="popover" data-container="body" data-html="true" id="{{ "myPublicFilesView-" . $i }}" data-placement="bottom" title="{{$data['publicFiles'][$i]->name}} by {{$data['publicFiles'][$i]->user_name}}" data-trigger="focus">
                            {{$data['publicFiles'][$i]->name}}
                            <img src="@if( $data['publicFiles'][$i]->visibility == 1) {{ asset('img/document.png') }} @else {{ asset('img/priv_document.png') }} @endif" width="@if ( ($i % 2) == 0 ) 5% @else 19% @endif"/>

                    </a>

                    <div id="{{ "popover-content-myPublicFilesView-" . $i }}" class="hide">
                        <a href="/files/{{$data['publicFiles'][$i]->id}}" class="glyphicon glyphicon-download">Download</a><br>
                    </div>

                    
                    
                </div>
            </a>
            @endfor
                @else 
                    {{-- <p> I don't own any files. </p> --}}
                @endif
    </div>

   
	<div class="container">
            <div class="radial-menu">
                    <ul class="radial-menu__menu-list">
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-cloud-upload" style="color:green" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-upload">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Upload New File
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Upload New Files
                            </p>
                          </div>
                        </div>
                        <a class="radial-menu__menu-link" data-toggle="modal" data-target="#uploadModal"></a>

                        
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-user" style="color:black" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-user">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                             {{ Auth::user()->name }}
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Profile
                            </p>
                          </div>
                        </div>
                        <a href="#" class="radial-menu__menu-link" data-toggle="modal" data-target="#profileModal"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-remove" style="color:red" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-remove">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Logout
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Logout
                            </p>
                          </div>
                        </div>
                        <a href="{{ route('logout') }}" class="radial-menu__menu-link"
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();"></a>                      
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-paperclip" style="color:pink" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-heart">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Upload New Group File
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Surprise
                            </p>
                          </div>
                        </div>
                        <a data-toggle="modal" data-target="#groupUploadModal" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-envelope" style="color:brown" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-envelope">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Friend Share
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Email Friends!
                            </p>
                          </div>
                        </div>
                        <a href="#" class="radial-menu__menu-link" data-toggle="modal" data-target="#friendShareModal"></a>

                        
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-file" style="color:purple" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-file">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              <div id="toggleFileView_label"> Show Files </div>
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              List Files
                            </p>
                          </div>
                        </div>
                        <a onclick="toggleFileView()" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-info-sign" style="color:blue" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-question-sign">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Visit our GitHub!
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Navigate UpCrate
                            </p>
                          </div>
                        </div>
                        <a href="https://github.com/thavythach/TeamCorruptDisk" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi glyphicon glyphicon-screenshot" style="color:orange" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content glyph-color-link">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Create New Group
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Add an image
                            </p>
                          </div>
                        </div>
                        <a data-toggle="modal" data-target="#groupManagementModal" class="radial-menu__menu-link" ></a>
                      </li>
                  
                      <li class="radial-menu__menu-item" style="display: none;">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi" data-glyph="paperclip" title="Attach File" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Attach File
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Attach a file
                            </p>
                          </div>
                        </div>
                        <a href="/" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item" style="display: none;">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi" data-glyph="code" title="Code" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Code
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Add some HTML
                            </p>
                          </div>
                        </div>
                        <a href="/" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item" style="display: none;">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi" data-glyph="eyedropper" title="Font Color" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Font Color
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Set font color
                            </p>
                          </div>
                        </div>
                        <a href="/" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item" style="display: none;">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi" data-glyph="droplet" title="Highlight Color" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              Highlight Color
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Set font color
                            </p>
                          </div>
                        </div>
                        <a href="/" class="radial-menu__menu-link"></a>
                      </li>
                  
                      <li class="radial-menu__menu-item" style="display: none;">
                        <div class="radial-menu__menu-link-bg"></div>
                        <div class="radial-menu__menu-icon">
                          <span class="oi" data-glyph="ellipses" title="More" aria-hidden="true"></span>
                        </div>
                        <div class="radial-menu__menu-content">
                          <div class="radial-menu__menu-content-wrapper">
                            <h6 class="radial-menu__menu-content-title">
                              More
                            </h6>
                            <p class="radial-menu__menu-content-description">
                              Add more things
                            </p>
                          </div>
                        </div>
                        <a href="/" class="radial-menu__menu-link"></a>
                      </li>
                    </ul>
                    <div class="radial-menu__label">
                      {{-- <p>{{ Auth::user()->name }}</p> --}}
                      <a href="/" style="text-decoration: none">UpCrate</a>
                    </div>
                  </div>
                  
                  {{-- <div class="menu-items-select">
                    <label class="menu-items-select__label" for="menu-items-to-show">Menu items</label>
                    <select class="menu-items-select__select" name="menu-items-to-show" id="menu-items-to-show">
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                      <option value="6">Six</option>
                      <option value="7">Seven</option>
                      <option value="8">Eight</option>
                      <option value="9">Nine</option>
                      <option value="10" selected>Ten</option>
                      <option value="11">Eleven</option>
                      <option value="12">Twelve</option>
                      <option value="13">Thirteen</option>
                      <option value="14">Fourteen</option>
                      <option value="15">Fifteen</option>
                    </select>
                  </div> --}}
                  
                  <div class="right-click-prompt">
                    <p class="right-click-prompt__label">
                    {{ Auth::user()->name}} @ UpCrate </p>
                  </div>

       	   @yield('content')
	</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<script>
            //
    //  BASIC SETUP
    //–––––––––––––––––––––––––––––––––––––

    var container = document.querySelector('.radial-menu');

    var menuDimensions = container.offsetWidth;

    var menuItems = container.querySelectorAll('.radial-menu__menu-item');

    var menuItemsCount = countMenuItems( menuItems );


    //
    //  COUNT MENU ITEMS
    //–––––––––––––––––––––––––––––––––––––

    function countMenuItems( elems ) {

    // Count elems.
    var elemsCount = elems.length;

    // Initialise empty counter.
    var elemCounter = 0;

    for (var i = 0; i < elemsCount; i++) {

    var elem = elems[i];

    // Get elements current "display" value.
    var elemDisplay = elem.currentStyle ? elem.currentStyle.display : getComputedStyle(elem, null).display;

    // If the elem is not hidden.
    if ( elemDisplay !== 'none' ) {

    // Increment the elem counter.
    elemCounter++;
    }
    }

    return elemCounter;
    }


    //
    //  LINKS
    //–––––––––––––––––––––––––––––––––––––

    var links = document.querySelectorAll('.radial-menu__menu-link');

    setupLinks( links );
    setupLinkHovers( links );


    //
    //  LINK BGs
    //–––––––––––––––––––––––––––––––––––––

    var linkBGs = document.querySelectorAll('.radial-menu__menu-link-bg');

    setupLinks( linkBGs );


    //
    //  SETUP LINKS
    //–––––––––––––––––––––––––––––––––––––

    function setupLinks( elems ) {

    // Count elems.
    var elemsCount = elems.length;
    // var elemsCount = countMenuItems( menuItems );

    var menuItems = container.querySelectorAll('.radial-menu__menu-item');

    // Count menu items.
    var menuItemsCount = countMenuItems( menuItems );


    // Find degree interval.
    var degreeInterval = 360 / menuItemsCount;

    // Loop through elems.
    for (var i = 0; i < elemsCount; i++) {

    var elem = elems[i];

    var parentMenuItem = elem.parentElement;

    // Get parent menu item's current "display" value.
    var parentMenuItemDisplay = parentMenuItem.currentStyle ? parentMenuItem.currentStyle.display : getComputedStyle(parentMenuItem, null).display;

    if ( parentMenuItemDisplay !== 'none' ) {
    var phase = i / menuItemsCount;    
    // console.log('phase(' + i + '): ' + phase);

    var theta = phase * 2 * Math.PI;
    // console.log('theta(' + i + '): ' + theta);
    
    var cssTransform = 'translateY(-50%) translateZ(0) rotateZ(' + degreeInterval*i  + 'deg) perspective(' + menuDimensions/1.5 + 'px)';

    var transformString = getLinkTransforms( menuItemsCount );
    
    // cssTransform += 'rotateY(-83.8deg) scaleX(1.38)';
    cssTransform += transformString;
    
    // console.log(cssTransform);
    
    elem.style.transform = cssTransform;
    }
    }
    }


    //
    //  ON LINK HOVER
    //–––––––––––––––––––––––––––––––––––––

    function setupLinkHovers( elems ) {

    // Count elems.
    var elemsCount = elems.length;

    // Loop through elems.
    for (var i = 0; i < elemsCount; i++) {

    var elem = elems[i];
    var parentMenuItem  = elem.parentElement;

    // Get parent menu item's current "display" value.
    var parentMenuItemDisplay = elem.currentStyle ? elem.currentStyle.display : getComputedStyle(elem, null).display;

    // If the menu item's display is not set to none.'
    if ( parentMenuItemDisplay !== 'none' ) {
    elem.addEventListener('mouseenter', function( event ) {
        var parentMenuItem = this.parentElement;
        parentMenuItem.classList.add('hovered');
        container.classList.add('item-is-hovered');
    });

    elem.addEventListener('mouseleave', function( event ) {
        var parentMenuItem = this.parentElement;
        parentMenuItem.classList.remove('hovered');
        container.classList.remove('item-is-hovered');
    });
    }
    }
    }


    //
    //  GET LINK TRANSFORMS
    //–––––––––––––––––––––––––––––––––––––

    function getLinkTransforms( count ) {

    var transformString;

    switch (count) {
    case 3: 
    transformString = 'rotateY(-88.012deg) scaleX(1.45)';
    break;

    case 4:
    transformString = 'rotateY(-86.45deg) scaleX(1.425)';
    break;

    case 5:
    transformString = 'rotateY(-85.025deg) scaleX(1.39)';
    break;

    case 6:
    transformString = 'rotateY(-83.65deg) scaleX(1.36)';
    break;

    case 7:
    transformString = 'rotateY(-82.1deg) scaleX(1.325)';
    break;

    case 8:
    transformString = 'rotateY(-80.8deg) scaleX(1.3)';
    break;

    case 9:
    transformString = 'rotateY(-79deg) scaleX(1.265)';
    break;

    case 10:
    transformString = 'rotateY(-77.3deg) scaleX(1.23)';
    break;

    case 11:
    transformString = 'rotateY(-76deg) scaleX(1.21)';
    break;

    case 12:
    transformString = 'rotateY(-74.75deg) scaleX(1.185)';
    break;

    case 13:
    transformString = 'rotateY(-72.1deg) scaleX(1.14)';
    break;

    case 14:
    transformString = 'rotateY(-69.8deg) scaleX(1.11)';
    break;

    case 15:
    transformString = 'rotateY(-67.7deg) scaleX(1.086)';
    break;
    }

    return transformString;
    }


    //
    //  ICONS
    //–––––––––––––––––––––––––––––––––––––

    var icons = document.querySelectorAll('.radial-menu__menu-icon');
    var iconDistance = 95;

    positionIcons( icons, iconDistance );

    function positionIcons( icons, iconDistance ) {

    var menuItems = container.querySelectorAll('.radial-menu__menu-item');

    // Count menu items.
    var menuItemsCount = countMenuItems( menuItems );

    // Count icons.
    var iconsCount = icons.length;
    var iconOffset = 1.575; // Used to rotate 90deg.

    // Loop through icons.
    for (var i = 0; i < iconsCount; i++) {
    var icon = icons[i];

    var parentMenuItem = icon.parentElement;

    // Get parent menu item's current "display" value.
    var parentMenuItemDisplay = parentMenuItem.currentStyle ? parentMenuItem.currentStyle.display : getComputedStyle(parentMenuItem, null).display;

    // If the menu item's display is not set to none.'
    if ( parentMenuItemDisplay !== 'none' ) {

    var phase = i / menuItemsCount;
    // console.log('phase(' + i + '): ' + phase);

    var theta = phase * 2 * Math.PI;
    theta = theta + iconOffset;
    // console.log('theta(' + i + '): ' + theta);

    icon.style.top = (-iconDistance * Math.cos(theta)).toFixed(1) + 'px';
    icon.style.left = (iconDistance * Math.sin(theta)).toFixed(1) + 'px';
    }
    }
    }


    //
    //  RIGHT CLICK
    //–––––––––––––––––––––––––––––––––––––

    document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    var mousePosX = e.clientX;
    var mousePosY = e.clientY;
    // console.log( 'mousePosX: ' + mousePosX );
    // console.log( 'mousePosY: ' + mousePosY );

    container.classList.remove('is-hidden');
    container.classList.add('is-active');

    container.style.top = mousePosY + 'px';
    container.style.left = mousePosX + 'px';

    mouseMoveListener( mousePosX, mousePosY );

    return false;
    }, false);


    //
    //  RIGHT CLICK MOUSE UP
    //–––––––––––––––––––––––––––––––––––––

    document.addEventListener('mouseup', function(e) {

    var mouseButton = e.button;

    // If it's the right mouse button.
    if ( mouseButton == 2 ) {

    // Hide the menu.
    container.classList.add('is-hidden');
    container.classList.remove('is-active');
    }
    });


    //
    //  MOUSE MOVE LISTENER
    //–––––––––––––––––––––––––––––––––––––

    function mouseMoveListener(x, y) {
    document.addEventListener('mousemove', function(e) {

    // If the radial menu is active.
    if ( container.classList.contains('is-active') ) {

    var newX = e.clientX;
    var newY = e.clientY;

    var scale = Math.round(Math.sqrt(Math.pow(y - newY, 2) + Math.pow(x - newX, 2)));

    // console.log('scale: ' + scale);

    scale = scale * 0.01;
    // console.log('scale / 100: ' + scale);

    // container.style.transform = 'translate(-50%, -50%) scale(' + scale  + ')';
    // console.log('e.clientX: ' + e.clientX);
    // console.log('e.clientY: ' + e.clientY);
    }
    });
    }


    //
    //  MENU ITEMS DROPDOWN
    //–––––––––––––––––––––––––––––––––––––

    onMenuItemsDropdownChange();

    function onMenuItemsDropdownChange() {

    // Instantiate the menu items to show select.
    var menuItemsSelect = document.getElementById('menu-items-to-show');

    // Listen for changes on the select.
    menuItemsSelect.addEventListener('change', function(e){

    // Get the selected value.
    var optionValue = this.value;

    // Update menu items accordingly.
    updateMenuItemDisplayValues( optionValue );
    });
    }


    //
    //  UPDATE MENU ITEMS
    //–––––––––––––––––––––––––––––––––––––

    function updateMenuItemDisplayValues( itemsToShow ) {

    var menuItems = container.querySelectorAll('.radial-menu__menu-item');

    for (var i = 0; i < menuItems.length; i++) {
    if ( i < itemsToShow ) {
    menuItems[i].style.display = 'block';
    } else {
    menuItems[i].style.display = 'none';
    }
    }

    // Set up links.
    var links = document.querySelectorAll('.radial-menu__menu-link');
    setupLinks( links );
    setupLinkHovers( links );

    // Set up link BGs.
    var linkBGs = document.querySelectorAll('.radial-menu__menu-link-bg');
    setupLinks( linkBGs );

    // Set up icons.
    var icons = document.querySelectorAll('.radial-menu__menu-icon');
    var iconDistance = 95;

    positionIcons( icons, iconDistance );
    }

</script>

<script>
    function toggleFileView() {
        var x = document.getElementById("OwnedFiles"); // Files I've uploaded personally.
        var y = document.getElementById("SharedFiles"); // Files I own because someone shared it with me.
        var z = document.getElementById("PublicFiles"); // files i dont own, but are publicly accessible.
        var w = document.getElementById("GroupToggle"); // files i dont own, but are publicly accessible.
        var l = document.getElementById("toggleFileView_label");

        if (x.style.display === "none" && y.style.display === "none" && z.style.display === "none" && w.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
            w.style.display = "none";
            l.innerHTML = "Show Files Shared";
        } else if (x.style.display !== "none" && y.style.display === "none" && z.style.display === "none" && w.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
            l.innerHTML = "Show Public Files";
        } else if (x.style.display === "none" && y.style.display !== "none" && z.style.display === "none" && w.style.display === "none") {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "block";
            w.style.display = "none";
            l.innerHTML = "Show Groups";
        } else if (x.style.display === "none" && y.style.display === "none" && z.style.display !== "none" && w.style.display === "none") {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            w.style.display = "block";
            l.innerHTML = "Show Nothing";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            w.style.display = "none";
            l.innerHTML = "Show My Files";
        }
    }
</script>

<script>
$("[data-toggle=popover]").each(function(i, obj) {

    $(this).popover({
    html: true,
    content: function() {
        var id = $(this).attr('id')
        return $('#popover-content-' + id).html();
    }
    });

});

$('.popover-dismiss').popover({
  trigger: 'focus'
})
</script>




</body>
</html>
