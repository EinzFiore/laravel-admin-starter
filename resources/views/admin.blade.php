@extends('layouts.base')
@section('page-title', 'Dashboard Users')
@section('content')

@endsection

@push('script.custom')
    <script>
      window.livewire.on('userStored', () => {
          $('#addUser').modal('hide');
      });
    </script>
@endpush
