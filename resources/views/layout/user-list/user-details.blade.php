<div class="card-body detail-user">
    <table class="table table-detail-user">
        <tbody>
            <tr>
                <td><p> Full Name </p></td>
                <td><p><strong> {{ $details->firstName }} {{ $details->lastName }} </strong></p></td>
            </tr>
            <tr>
                <td><p> Address </p></td>
                <td><p><strong> {{ $details->address->address }},
                                {{ $details->address->city }}</strong></p>
                </td>
            </tr>
            <tr>
                <td><p> Email </p></td>
                <td><p><strong> {{ $details->email }} </strong></p></td>
            </tr>
            <tr>
                <td><p> Username </p></td>
                <td><p><strong> {{ $details->username }} </strong></p></td>
            </tr>
            <tr>
                <td><p> Company Name </p></td>
                <td><p><strong> {{ $details->company->name }} </strong></p></td>
            </tr>
            <tr>
                <td><p> Company Address </p></td>
                <td><p><strong> {{ $details->company->address->address}},
                                {{ $details->company->address->city }} </strong></p>
                </td>
            </tr>
        </tbody>
    </table>
    <a type="button" class="btn btn-light" href="/user-list"> Back </a>
</div>
