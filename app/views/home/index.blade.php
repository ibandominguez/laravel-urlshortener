@extends('master')

@section('container')
	<h1 class="page-header">Url Shortener App</h1>
	{{ $errors->first('url', '<p class="alert alert-danger">:message</p>') }}
	<blockquote>
		<strong>Simply Add your url</strong> and let magic take care!
	</blockquote>
	{{ Form::open( 
		array( 
			'action' => 'UrlController@store',
			'method' => 'post',
			'class' => 'well', 
			'role' => 'form' 
		) 
	) }} 
		<div class="form-group">
			{{ Form::text(
				'url', '', 
				array( 
					'placeholder' => 'http://...',  
					'class' => 'form-control')
			) }}
		</div>
		{{ Form::submit('Shorten it up!', array('class' => 'btn btn-default')) }}
	{{ Form::close() }}
@endsection

