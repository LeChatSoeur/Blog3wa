<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

    <!-- script éditeur de texte -->


    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>



<!--
    <link rel="stylesheet" href="{{asset('ckeditor/sample/styles.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ckeditor/sample/toolbarconfigurator/lib/codemirror/neo.css')}}">
-->

    <title>Dashboard</title>
</head>
