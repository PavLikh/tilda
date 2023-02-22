@extends('layout.app')

@section('title-block')Task 2
@endsection

@section('content')
<div class="company-header">Задача 2: массивы</div>
<div class="company-text">
	<p>Нужно заполнить массив 5 на 7 случайными уникальными числами от 1 до 1000.</p>
	<p>Вывести получившийся массив и суммы по строкам и по столбцам.</p>
    <hr class="hr-horizontal-gradient">
</div>
<table>
    <thead>
        <tr>
            <th></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>Сумма</th>
        </tr>
    </thead>
    <tbody>
    
    @for ($i = 0; $i < 8; $i++)
        <tr>
        @if( $i == 7)
            <th>Сумма</th>
        @else
            <th>{{ $i+1 }}</th>
        @endif
        
        @foreach($data[$i] as $val)
            <td>{{ $val }}</td>
        @endforeach
        </tr>
    @endfor
    
    </tbody>
</table>

@endsection