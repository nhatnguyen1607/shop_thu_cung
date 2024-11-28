@extends('layout')
@section('content')
<style>

.body {
    text-align: center;
    padding: 20px; 
}

.image-container {
    display: flex;
    justify-content: center; 
    gap: 40px; 
    flex-wrap: wrap;
    padding: 20px;
}

.image-wrapper {
    position: relative; 
    display: inline-block;
    width: 45%; 
    max-width: 400px; 
}

.image-wrapper img {
    width: 100%; 
    height: auto; 
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.image-text {
    font-size: 40px; 
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 24px;
    color: white;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
    padding: 5px 10px; 
    border-radius: 5px; 
}


.image-wrapper:hover .image-text {
    background-color: rgba(0, 0, 0, 0.8); 
    opacity: 1; 
}
.image-wrapper:hover{
    transform: scale(1.1); 
    transition: transform 0.3s ease;
}

@media (max-width: 768px) {
    .image-wrapper img {
        width: 90%;
        height: 90%;
    }

    .image-text {
        font-size: 18px; 
    }
}

</style>
<div class="body">
    <div class="image-container">
        <a href="{{route('cho')}}" class="image-wrapper">
            <img src="{{asset('frontend/img/cho.png')}}" alt="Chó">
            <div class="image-text">Chó</div>
        </a>
        <a href="{{route('meo')}}" class="image-wrapper">
            <img src="{{asset('frontend/img/meo.jpg')}}" alt="Mèo">
            <div class="image-text">Mèo</div>
        </a>
    </div>
</div>
@endsection
