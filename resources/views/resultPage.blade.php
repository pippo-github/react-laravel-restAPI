@extends('layouts.layout')
@section('title', 'sei nella POST page')
@section('contents')

<link rel="stylesheet" href={{ asset('css/pageResult.css') }}>  

<h1 class='mt-3 mb-5'>
    Result page
</h1>


{{-- {{ dd($restAPI_tables) }} --}}
@if(count($restAPI_tables) > 0)

    @foreach ($restAPI_tables as $key => $item)

    <div class="card mb-3 p-3 block_card">

        <div class=''>
            <div class="">
                @php


                    
                    if($restAPI_tables[$key]["poster"]["image_url"] != "N/A") 
                     echo "<img style='width: 224px; height:224px' src=" . $restAPI_tables[$key]["poster"]["image_url"] . 'alt="">'; 
                     
                    else
                  
                    echo "<img style='width: 224px; height:224px' src=" .  "'http://127.0.0.1:8000/storage/image/noImage.jpg'"  . "alt='image not present'>"; 
                    
                @endphp
                
            
                
            </div>
            <div class=" text_block">
                <span class='labelContent'>Title: </span><span class='content'>{{ $restAPI_tables[$key]["Title"] }} </span> <br />
                <span class='labelContent'>Year: </span><span class='content'> {{ $restAPI_tables[$key]["Year"] }} </span> <br />
                <span class='labelContent'>imdbID: </span><span class='content'> {{ $restAPI_tables[$key]["imdbID"] }} </span> <br />
                <span class='labelContent'>created at: </span><span class='content'> {{ $restAPI_tables[$key]["updated_at"] }} </span> <br />
    
            </div>
        </div>

    </div>
    @endforeach

@endif

@endsection
