@extends('layouts.app')
@push('styles')
@endpush

@section('content')
    <form id="addTodo">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter name">
        <br><br>
        <input type="number" name="price" min="1" id="price" placeholder="Enter price">
        <br><br>
        <button type="submit">Add</button>
    </form>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#addTodo").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            //console.log(formData);

            $.ajax({
                url: "{{ route('addTodo') }}",
                method: "POST",
                data: formData,
                success: function(data) {
                    if (data.success == true) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });
    </script>
@endpush
