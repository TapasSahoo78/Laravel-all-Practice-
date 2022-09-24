@extends('layouts.app')
@push('styles')
    <style>
        span {
            color: red;
        }

        .result {
            color: green;
        }
    </style>
@endpush
@section('content')
    <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
    <form id="addSubject">
        @csrf
        <input type="text" name="subject" id="subject">
        <br>
        <span class="error subject_error"></span>
        <br><br>
        <input type="text" name="description" id="description">
        <br>
        <span class="error description_error"></span>
        <br><br>
        <button type="submit">Add</button>
    </form>
    <br>
    <p class="result"></p>

    <div>
        <table border="1" style="width: 500px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @if (count($subjects) > 0)
                    @foreach ($subjects as $key => $subject)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subject->subject }}</td>
                            <td>{{ $subject->description }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Subject not available!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addSubject").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('addSubject') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success == true) {
                            location.reload();
                        } else {
                            printErrorMsg(res);
                        }
                    }
                });
            });

            function printErrorMsg(res) {
                $('.error').text("");
                $.each(res, function(key, value) {
                    $('.' + key + '_error').text(value);
                });
            }
        });
    </script>
