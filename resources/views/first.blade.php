@extends('layout.app')

@section('title-block')Task 1
@endsection

@section('content')
<div class="company-header">Задание 1: лесенка</div>
<div class="company-text">
	<p>Нужно вывести лесенкой числа от 1 до 100.</p>
	<p>1</p>
	<p>2 3</p>
    <p>4 5 6</p>
    <p>...</p>
    <hr class="hr-horizontal-gradient">
</div>
        
    {!! $data !!}

@endsection