<table class="table">
    <thead>
        <tr>
            <th scope="col">No. </th>
            <th scope="col"> First Name </th>
            <th scope="col"> Last Name </th>
            <th scope="col"> Username </th>
            <th scope="col"> Email </th>
            <th scope="col" class="text-center"> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profiles as $profile => $value)
        <tr>
            <th scope="row"> {{ $profile +1 }} </th>
            <td> {{ $value->firstName }} </td>
            <td> {{ $value->lastName }} </td>
            <td> {{ $value->username }} </td>
            <td> {{ $value->email }} </td>
            <td class="text-center">
                <button data-id="{{ $value->id }}" type="button" class="btn btn-info text-light"> Info
                </button>
                <button data-id="{{ $value->id }}" type="button" class="btn btn-danger"> Delete </button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>


