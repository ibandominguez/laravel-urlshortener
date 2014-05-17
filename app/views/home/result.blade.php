@extends('master')

@section('container')
	<h2 class="page-header">Results</h2>
	<p class="alert alert-success">Here is your short url!</p>
	{{ HTML::link('url/' . $shortened, "www.yourdomain.com/url/$shortened") }}
@endsection