@extends('layouts.app',['bodyclass'=>'bg-light'])

@section('content')
<admin-addtransaction></admin-addtransaction>
@endsection

@section('scripts')
<script>

@if(isset($data))
    window.data = {!! $data !!}
@endif

</script>
@endsection