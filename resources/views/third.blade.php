@extends('layout.app')

@section('title-block')Task 3
@endsection

@section('content')
<div class="company-header">Задача 3: фронт</div>
<div class="company-text">
	<p>Вы работаете в компании, присутствующей в нескольких городах РФ. На сайте компании есть страница с контактной информацией. Маркетолог поставил задачу и уехал, к его приезду задача должна быть реализована.</p>
	<p>На страницу контактов заходят люди из разных городов, нужно чтобы они видели телефон из своего города. По умолчанию, в HTML-страницы прописан телефон 8-800-DIGITS. Телефон размещен в верху и внизу страницы.</p>
	<p>Вот и все что рассказал маркетолог прежде чем уехать.</p>
    <hr class="hr-horizontal-gradient">
</div>
<br>
	<p>Для быстрого теста можно передать ip разных регионов</p>
<br>
<div class="test_link">
	<a href="#" class="btn-update" id="update">2.59.215.255</a>
	<a href="#" class="btn-update" id="update">5.3.81.255</a>
	<a href="#" class="btn-update" id="update">82.193.132.255</a>
	<a href="#" class="btn-update" id="update">5.164.245.255</a>
	<a href="#" class="btn-update" id="update">5.206.39.255</a>
	<a href="#" class="btn-update" id="update">31.163.99.255</a>
	<a href="#" class="btn-update" id="update">31.47.184.0</a>
</div>
<script type="module">
    // $('body').html('<h1>jQuery Laravel Vite JS</h1>');
    $(".btn-update").on('click', function(e) {
        e.preventDefault();
		var ip=$(this).html();
        $.ajax({
			url: '/get?ip='+ip,
			method: 'get',
			dataType: 'json',
            success: function(response){
                var data = JSON.parse(JSON.stringify(response));
                console.log(data);
                $(".telephone").html('8-800-'+data[0]);
				if (data[1]) {
					$('.city').remove();
					$("#head_phone").parent().append('<div class="city">'+data[1]+'</div>');
				} else {
					$('.city').remove();
				}
	        }
		});
	});
</script>

@endsection

@section('header')
	@parent
	<div class="contacts">
		<div class="telephone" id="head_phone">8-800-{{ $data[0] }}</div>
		@if(!empty($data[1]))
			<div class="city">{{ $data[1] }}</div>
        @endif
	</div>
@endsection

@section('footer')
	@parent
		<div class="telephone">8-800-{{ $data[0] }}</div>
@endsection